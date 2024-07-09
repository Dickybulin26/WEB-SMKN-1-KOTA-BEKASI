<?php
namespace SW_WAPF_PRO\Includes\Classes\Integrations {

    class Quickview
    {
        public function __construct() {
            add_action('wp_footer', [ $this, 'add_javascript' ]);
        }

        public function add_javascript() {
            ?>
            <script>
                jQuery(document).on('quick_view_pro:load',function(e,el){ el.find('.wapf-product-totals').hide(); new WAPF.Frontend(el); });
                jQuery("body").on("adding_to_cart", function(a,b,c) {
                    var o = b.closest('form.cart').find('.wapf-wrapper :input').serializeArray(); if(!o) return c;
                    o.forEach(function(ob){ if(ob.name.indexOf('[]') > -1) { var n = ob.name.replace('[]', ''); if(!c[n]) c[n] = []; c[n].push(ob.value); } else c[ob.name] = ob.value; });
                });
            </script>
            <?php
        }

    }
} 