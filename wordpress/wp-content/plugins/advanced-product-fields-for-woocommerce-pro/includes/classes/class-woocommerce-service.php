<?php

namespace SW_WAPF_PRO\Includes\Classes {

    class Woocommerce_Service {

	    private static $display_options = null;

        public static function find_tags_by_name($term) {

            if(empty($term))
                return [];

            $tag_args = [
                'taxonomy'   => 'product_tag',
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => false,
                'name__like' => $term
            ];

            $product_tags = get_terms( $tag_args );

            if(!is_array($product_tags))
                return [];

            return Enumerable::from($product_tags)->select(function($term){
                return ['id' => $term->term_id, 'name' => $term->name];
            })->toArray();

        }

        public static function find_category_by_name($term) {
            if(empty($term))
                return [];

            $tag_args = [
                'taxonomy'   => 'product_cat',
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => false,
                'name__like' => $term
            ];

            $product_tags = get_terms( $tag_args );

            if(!is_array($product_tags))
                return [];

            return Enumerable::from($product_tags)->select(function($term){
                return ['id' => $term->term_id, 'name' => $term->name];
            })->toArray();
        }

        public static function find_coupons_by_name($term){

            if(empty($term))
                return [];

            $args = [
                'posts_per_page'   => 10,
                'orderby'          => 'title',
                'order'            => 'asc',
                'post_type'        => 'shop_coupon',
                'post_status'      => 'publish',
            ];

            $coupons = get_posts( $args );

            return Enumerable::from($coupons)->select(function($coupon){
                return [
                    'name' => $coupon->post_title,
                    'id' => $coupon->ID
                ];
            })->toArray();
        }

        public static function find_products_by_name($term)
        {

            if(empty($term))
                return [];

            $ds = new \WC_Product_Data_Store_CPT();
            $product_ids = $ds->search_products($term, '', false, true, 10);

            $products = [];

            foreach($product_ids as $pid) {
                if($pid === 0)
                    continue;

                $product = wc_get_product($pid);
                if(empty($product))
                    continue;

                $products[] = [
                    'name' => $product->get_title(),
                    'id' => $product->get_id()
                ];

            }

            return $products;
        }

        public static function find_attributes_by_name($term) {
	        if(empty($term))
		        return [];

	        $searchterms = explode('-',$term);

			$attrs = wc_get_attribute_taxonomies();
			if(empty($attrs))
				return [];

			$searchterm = strtolower(trim($searchterms[0]));
			$filtered = Enumerable::from($attrs)->where(function($a) use ($searchterm) {
				return preg_match('/'.$searchterm.'/', strtolower($a->attribute_label)) === 1;
			})->select(function($x) {
				return [
					'name' => $x->attribute_label,
					'id' => $x->attribute_name
				];
			})->toArray();

			$filtered_with_terms = [];

			foreach($filtered as $f) {
				$terms = get_terms( [
					'taxonomy' => wc_attribute_taxonomy_name($f['id']),
					'hide_empty' => false
				]);
				if(!empty($terms)) {
					$filtered_with_terms[] = [
						'name' => $f['name'] . ' - ' .  __('Any value', 'sw-wapf'),
						'id'   => $f['id'] . '|*'
					];
					foreach ( $terms as $t ) {
						$filtered_with_terms[] = [
							'name' => $f['name'] . ' - ' . $t->name,
							'id'   => $f['id'] . '|' . $t->slug
						];
					}
				}
			}

			return $filtered_with_terms;
        }

        public static function find_variations_by_name($term) {

            if(empty($term))
                return [];

            $args = [
                'posts_per_page'    => -1,
                'post_type'         => 'product_variation',
                'post_status'       => [ 'publish', 'pending', 'draft', 'future', 'private', 'inherit' ],
                'fields'            => 'ids',
                's'                 => $term
            ];

            $variable_product_ids = get_posts($args);

            $products = [];

            foreach($variable_product_ids as $id) {

                $product = self::get_product($id);
                if($product === null)
                    continue;

                $attributes = $product->get_variation_attributes();

                foreach ($attributes as $key => $attribute) {
                    if ($attribute === '')
                        $attributes[$key] = __('any', 'sw-wapf') . ' ' .  strtolower(wc_attribute_label(str_replace('attribute_', '', $key)));
                }

                $products[] = [
                    'name'  => sprintf('%s (%s)', $product->get_title(), join(', ',$attributes)),
                    'id'    => $id
                ];

            }

            return $products;

        }

        public static function get_product($id)
        {
            $product = wc_get_product($id);
            if($product)
                return $product;
            return null;
        }

        public static function get_current_page_type() {
            if(is_product())
                return 'product';
            if(is_checkout())
                return 'checkout';
            if(is_shop())
                return 'shop';
            if(is_cart())
                return 'cart';

            return 'other';
        }

	    public static function get_price_display_options() {

		    if(!self::$display_options) {

			    return [
				    'format'        => get_woocommerce_price_format(),
				    'symbol'        => get_woocommerce_currency_symbol(),
				    'decimals'      => wc_get_price_decimals(),
				    'decimal'       => wc_get_price_decimal_separator(),
				    'thousand'      => wc_get_price_thousand_separator()
			    ];

		    }

		    return self::$display_options;

	    }

	    public static function get_product_attributes($product, $strict = false)
	    {
		    $attributes = [];

		    if(is_int($product))
		        $product = wc_get_product($product);

		    if (!$strict && $product->is_type('variation')) {
			    $product_id = $product->get_parent_id();
			    $product = wc_get_product($product_id);
		    }

		    if (!is_object($product))
			    return $attributes;

		    $product_attributes = $product->get_attributes();

		    foreach ($product_attributes as $key => $attribute) {
				if(is_string($attribute)) {
					$attributes[ $key ] = [$attribute];
				} else {
					if ( ! $attribute->is_taxonomy() ) {
						continue;
					}

					$terms = [];

					foreach ( $attribute->get_terms() as $term ) {
						$terms[] = $term->slug;
					}

					if ( ! empty( $terms ) ) {
						$attributes[ $attribute->get_name() ] = $terms;
					}
				}
            }

		    return $attributes;
	    }


    }
}
 