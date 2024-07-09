<?php
namespace SW_WAPF_PRO\Includes\Classes\Integrations {

	use SW_WAPF_PRO\Includes\Classes\Helper;

	class Product_Table
    {
	    public function __construct() {
		    add_action('wp_footer',                         [$this, 'add_javascript']);
		    add_filter('wc_product_table_data_add_to_cart', [$this, 'add_attributes_to_html'], 10, 2);
	    }

	    public function add_attributes_to_html($cart_column_html, $product) {

		    if($product->get_type() !== 'variation')
			    return $cart_column_html;

		    $barn2_options = get_option('wcpt_shortcode_defaults',[]);
		    $variations = $barn2_options ? $barn2_options['variations'] : 'separate';

		    if($variations !== 'separate')
			    return $cart_column_html;

		    $attributes = $product->get_variation_attributes();

		    $cart_column_html = str_replace('name="add-to-cart"', 'name="add-to-cart"" data-available-attributes="'.Helper::thing_to_html_attribute_string($attributes).'"',$cart_column_html);

		    return $cart_column_html;
        }

	    public function add_javascript() {
		    ?>
            <script>
                jQuery(document).on('init.wcpt', function(ev,d) {
                    if(d)
                        d.$table.find('tr.product-type-simple,tr.product-type-variable,tr.product-type-variation').each(function(i,e) {
                            var $e = jQuery(e);
                            if($e.hasClass('product-type-variation') && !$e.find('[data-product_variations]').length) {
                                var $btn_cart = $e.find('[name=add-to-cart]');
                                $btn_cart
                                    .attr('data-product_variations', '')
                                    .data('product_variations', [{
                                        variation_id: parseInt($e.attr('id').replace('product-row-', '')),
                                        attributes: $btn_cart.data('available-attributes')
                                    }]);
                            }
                            new WAPF.Frontend($e);
                        });
                });
            </script>
		    <?php
        }

    }
} 