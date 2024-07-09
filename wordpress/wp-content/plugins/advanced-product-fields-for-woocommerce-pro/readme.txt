=== Advanced Product Fields Pro for WooCommerce ===
Contributors: studiowombat,maartenbelmans
Tags: woocommerce, custom fields, product, addon, acf
Requires at least: 4.7
Tested up to: 6.5.2
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Stable tag: 2.7.11
Build: 0001

Customize WooCommerce product pages with extra form fields ( = product add-ons). This is the premium version.

== Description ==

The premium version of Advanced Product Fields for WooCommerce.

== Changelog ==

= version 2.7.11 =

 * Fix: fixed an issue with iOS devices not scrolling and focusing checkboxes when validation happens.
 * Fix: undo pagination.

= version 2.7.10 =
 * Improvement: big performance improvements on the admin side when working with large forms.
 * Improvement: improved the formula parser when dealing with numbers.
 * Fix: fixed a bug where conditionals in the admin would sometimes be empty.

= version 2.7.9 =
 * Improvement: improved integration with the "Yith Request a Quote" plugin.
 * Improvement: improved support for the calendar in combination with Google-translated sites.
 * Improvement: small performance improvement when uninstalling the plugin.
 * Fix: fixed an issue where the date field "dates in past/future" settings were sometimes ignored.
 * Other: bump minimum required WooCommerce version to 4.1.

= version 2.7.8 =
 * New: integration with Aelia Currency Switcher.
 * Fix: fixed an issue with dynamic date calculation.
 * Fix: fixed an issue where pressing the "Add new rule group" button wouldn't work.

= version 2.7.7 =
 * Improvement: improved compatibility with the Woodmart theme's custom gallery.
 * Improvement: improved "order again" functionality.
 * Fix: resolved licensing issue preventing some users from activating the plugin.

= version 2.7.6 =
 * Improvement: compatibility with WooCommerce's "single product" block.
 * Fix: fixed an issue with not validating multi-select swatches on the front-end whose min and max attribute were set.
 * Fix: fixed an issue with invalid carts when ordering 2 specific variations at the same time.

= version 2.7.5 =
 * Fix: fixed a PHP warning.
 * Fix: fixed an edge case where repeated items were split in the cart.
 * Fix: fixed an issue with using [qty] in lookup tables.

= version 2.7.4 =
 * Improvement: performance improvements for the "select" field.
 * Fix: fixed an issue where the import functionality would only render fields after page refresh.
 * Fix: fixed an issue where the date field would return "invalid date format" in rare cases.
  = version 2.7.3 =
 * Fix: fixed an issue with file upload fields in combination with repeatable sections.
 * Fix: fixed a bug with WooCommerce's "Order Again" functionality when adding a 2nd product to cart without any options.
 = version 2.7.2 =
 * Fix: fixed an issue with some formulas not saving correctly.

= version 2.7.1 =
 * New: ability to use "[qty]" shortcode in lookuptable formulas.
 * Fix: duplicating field groups or products now correctly updates calculation field formulas.
 * Other: test and marked as compatible with the upcoming High Performance Order Storage (HPOS) update.
 * Other: added a filter for developers to change price including VAT: wapf/pricing/price_with_tax.

= version 2.7 =
 * New: redesigned the calendar/date field to be more user-friendly.
 * New: added a "delete files" button on every order that contains uploaded files.
 * Improvement: improved cart validation at checkout to take into account the fact that checkout can happen 48 hours after adding to cart.
 * Improvement: improved performance and code-footprint of the calendar.
 * Improvement: improved mobile UX of the calendar.
 * Improvement: improved the "remove trailing zeroes" function for pricing hints.
 * Improvement: improved the product admin page load time when you have a lot of fields (50+) attached to it.
 * Fix: fixed a niche issue where uploaded files were removed when adding a 2nd product to cart through ajax.
 * Fix: fixed an add-to-cart validation error when ordering the last unit of a product.
 * Other: filter "wapf/html/field_description" now also fires when the field description is empty.

= version 2.6.1 =
 * Fix: fixed a bug with some price hints wrongly updating in rare cases.
 * Other: if you are using the snippet to update the WooCommerce price label, please check our website and update your code snippet.


= version 2.6 =
 * New: setting to define the pricing hint (you can now remove brackets and plus symbol).
 * Improvement: "required" validation now also works with the modern file upload field.
 * Improvement: pricing hint format now follows WooCommerce standards to trim zeroes.
 * Improvement: improved admin styling for RTL displays.
 * Improvement: minor performance improvements in rendering the fields on your website.
 * Fix: fixed bug in "lookuptable" formula duplication in repeater field.
 * Other: verify compatibility with WooCommerce 7.5 (beta 1).

= version 2.5 =
 * New: improved and refreshed admin UI (less overwhelming and easier to read).
 * New: you can now easily import options in bulk to multiple choice fields like checkboxes, swatches, ...
 * New: formula-builder to help you write your formulas for complex pricing schemes.
 * Improvement: you can now easily copy a field ID from the admin.
 * Improvement: with formula-based pricing, you can define variables only within local field groups, eliminating the need for additional fields.
 * Fix: fixed an issue with formula based pricing showing incorrect currency when using WOOCS and a non-default currency.
 * Fix: fixed an issue with our plugin's "image switching" feature when switching back to a variation image.
 * Fix: fixed a few minor bugs in the admin settings screens.
 * Other: bump minimum required WooCommerce version to 3.6.

= version 2.2.5 =
 * Improvement: support for numbers in scientific notation in formula-based pricing.
 * Improvement: update integration with the Tiered Pricing Table plugin version 3 and above.

= version 2.2.4 =
 * Fix: fixed an "add to cart" issue with WooCommerce subscriptions and manually renewing early renewals.
 * Other: for developers: added filter 'wapf/pricing/cart_item_options' to change the calculated options total for a cart item.

= version 2.2.3 =
 * Improved: improved compatibility with some themes' "ajax add to cart" functionality.

= version 2.2.2 =
 * Fix: fixed an issue where the date field's "today" was not always set correctly when the client timezone was different from the server timezone.
 * Other: added a filter so developers can change the "edit" text to edit products from the cart.

= version 2.2.1 =
 * Fix: fixed an issue with Greek characters being counted double when using the "amount x price" pricing setting.
 * Fix: fixed an issue with the datediff() formula when no dates are entered in the field.
 * Fix: now properly hiding fields from the admin emails when "hide on order received" is turned on.
 * Fix: fixed a bug with multi-select fields who have a conditional and min/max allowed values set.

= version 2.2 =
 * Improvement: fixed position of tooltips to 'top' for color swatches for a better user experience.
 * Improvement: improved WOOCS price hint output by respecting the settings added via the WOOCS plugin.
 * Fix: fixed a layout issue for the tooltip and Right-to-Left websites.
 * Fix: fixed a layout issue for the tooltip when labels are appearing below the field.

= version 2.1.1 =
 * New: export & import features. [Read about it here](https://www.studiowombat.com/knowledge-base/how-to-export-fields-and-import-somewhere-else/?ref=readme).
 * Improvement: improved duplication of field groups, now also correctly changing field ID's in formulas and variables.

= version 2.1.0 =
 * New: tooltips! You can now show field instructions as tooltips.
 * Improvement: improved tooltip behavior for image & color swatches.
 * Fix: fixed a bug in the admin settings screen where conditionals were sometimes not saved.
 * Other: added a filter so a developers can control the size image swatches are rendered in.

= version 2.0.1 =
 * Fix: fixed an issue where hidden true-false fields would still be displayed in cart.
 * Other: improvement to the get_field_groups_of_product() function by caching results.

= version 2.0 =
 * New: Repeatable fields & sections. Fields/sections can repeat by clicking an "add new" button.
 * New: repeatable fields/sections can have a maximum number of allowed repetitions.
 * New: added a "price display" setting to simple products where you can change how the WooCommerce price is displayed. You can hide it or add a label before/after the price.
 * New: newly created image swatches and image fields now use include lazy loading and other SEO improvements (alt + srcset).
 * New: added a "download files" button in the admin order screen to download all user uploaded files in one click.
 * New: added a setting to hide the pricing summary, or only show the "grand totals" line.
 * Improvement: big performance improvements on the frontend. Complex forms get a ~45% performance boost.
 * Improvement: on page load, the pricing summary (if any) is not hidden anymore for simple products, improving Google Pagespeed's "CLS" score for your page.
 * Improvement: for variable products, the pricing summary is not shown anymore if no variation is selected.
 * Improvement: better max file size handling for uploaded files.
 * Improvement: the "len" function can now ignore white space. Pass a 2nd parameter to the function ("true") to enable it.
 * Improvement: if you change field type in the admin, the "options" setting will no longer be reset if switching to a similar field type.
 * Improvement: deleting a "section" field in the backend also deletes its children.
 * Improvement: improved styling for themes and page builders that use modern CSS techniques (including Elementor, AstraWP, Avada).
 * Fix: fixed an edge-case bug with using conditional logic inside quantity-based sections.
 * Fix: fixed an issue with min & max allowed checkboxes sometimes resetting.
 * Fix: fixed an issue with quantity-based sections sometimes disappearing when increasing product quantity.
 * Fix: implemented a fix for some themes wrongly using WooCommerce's "adding_to_cart" event with Ajax add to cart.
 * Fix: fixed an issue where duplicating a product would not update the field group ID.
 * Fix: fixed an issue in the backend where some users without screen options would see 1 field group per page instead of 20.
 * Fix: fixed an issue where formula-based pricing hints sometimes shows "(...)" in cart instead of the calculated number.
 * Fix: fixed an issue with min & max validation for number fields when the entered value was zero.
 * Other: removed legacy code for older versions.

= version 1.9.10 =
 * Fix: Fixed an edge case bug where some "min" and "max" rules for multi-select swatches wouldn't work correctly when adding a product to cart.
 * Other: verify compatibility with WooCommerce 6.5.

= version 1.9.8 =
 * Fix: fixed a bug where some users couldn't edit pages when the Kadence theme is active.
 * Other: bumped minimum WordPress version to 4.7.

= version 1.9.7 =
 * Improvement: add global field groups to Polylang so they can be translated.
 * Improvement: only fire "wapf/dependencies" event when a dependency changed, resulting in a slight performance boost.
 * Fix: fixed an issue where adding to cart via the URL ('?add-to-cart=' parameter) would fail.
 = version 1.9.6 =
 * Improvement: performance improvements by limiting allowed HTML in labels & descriptions.
 * Improvement: allow HTML tables in the "HTML/Text" field.

= version 1.9.5 =
 * Improvement: improved calendar styling.
 * Improvement: added WordPress's "auto update" functionality to the plugin.
 * Fix: fixed "add to cart" vs. "select options" text bug on shop page.
 * Fix: fixed a bug for file upload fields when editing the cart (file name was blank).

= version 1.9.4 =
 * Improvement: improved Firefox usability by adding "autocomplete=off" so Firefox doesn't wrongly remembers color, text, and image swatches on page refresh.
 * Fix: fixed an edge case bug in the image switching feature.
 * Fix: fixed a bug in product_has_field_group().
 * Fix: fixed an issue when saving a product that contained no fields. An empty field group would be wrongly created.

= version 1.9.3 =
 * Fix: fixed a bug of some values not saving when publishing a new field group.
 * Fix: fixed a bug where you couldn't enter a date conditional rule when selecting "later than" or "older than".
 * Fix: fixed a bug with the "Yith Request a Quote" integration.
 * Fix: fixed a bug with section fields not showing for variations.
 * Fix: fixed a display issue when using "order again" and uploaded files.
 * Fix: fixed a PHP warning in PHP 7+ when using the plugin in combination with an addon.
 * Other: for developers: changed the format of meta data saved on the order.

= version 1.9.2 =
 * New: Danish translations
 * Fix: fixed an issue where the default value of the text area field could not contain newlines.
 * Fix: fixed the "per character" and "percentage" pricing label wrongly showing on the cart page.
 = version 1.9.1 =
 * Fix: fixed an issue with validating quantity based fields.

= version 1.9.0 =
 * Improvement: better UX for the ajax file uploader when only 1 file is allowed.
 * Improvement: improved support for "order again" functionality.
 * Improvement: write our own 'wp_timezone' for backward compat with WP < 5.3.
 * Improvement: admin settings page performance improvements.
 * Improvement: changed backend image selector layout to be more user friendly.
 * Improvement: improved integration with Barn2 quick view to support radio buttons and "ajax add to cart".
 * Fix: fixed an issue with formula shortcode "[field.xxx]" sometimes falsly being replaced with the wrong value in formulas.
 * Other: this version now supports add-on plugins to extend APF even further. 3 addons are already created.
 * Other: for developers: various filters added and code changes to support creating external addons.

= version 1.8.3 =
 * Fix: fixed a typo with the ajax file upload field.

= version 1.8.2 =
 * Improvement: remove "readonly" attribute from date fields in favor of the "required" attribute ('readonly' can't have 'required' in the same element).
 * Fix: fixed a bug with WooCommerce Subscriptions sometimes showing faulty pricing.

= version 1.8.1 =
 * Improvement: allow sorting of variables for easier reference.
 * Improvement: changed the admin "drag/drop" icon to be more standardized across sortable components.
 * Improvement: small improvements to the variable builder in the admin.
 * Fix: fixed an issue with hiding pricing hints on "select" field options if 'pricing hints' is disabled.
 * Fix: fixed "order again" button not validating the cart data in some cases.
 * Fix: fixed a PHP warning issued by the Polylang plugin.

= version 1.8.0 =
 * Improvement: improved support for the Flatsome theme's image slider. Users without this theme are not impacted.
 * Fix: fixed an issue with adding to cart when several field groups for one variation are in play.
 * Other: tested & verified Woo version 5.6

= version 1.7.9 =
 * Fix: fixed a bug in formula pricing calculation on the backend.

= version 1.7.8 =
 * Fix: fixed a bug with getting the correct field groups for variable products.

= version 1.7.7 =
 * Improvement: enhanced/secured "add to cart" validation.
 * Improvement: enhanced integration with Tiered Pricing Table.
 * Improvement: the date field now uses the WordPress setting "Week Starts On".
 * Improvement: date field is now readonly (so it doesn't trigger the keyboard on mobile).
 * Improvement: decrease size of frontend javascript code, resulting in a faster site.
 * Fix: fixed a bug where some pricing hints were still showing even when "show pricing hints" was deselected.
 * Other: for developers: enhanced JS events on file upload.

= version 1.7.6 =
 * New: ability to edit data from the cart.
 * New: ability to add a default date to the date field.
 * Improvement: added a screen option for pagination in the admin "field groups" page.
 * Improvement: improved integration with Woo Discount Rules.
 * Improvement: improved integration with WOOCS and using their "geo pricing" features.
 * Fix: fixed a bug with some hosts failing to update to version 1.7.5.
 * Fix: fixed an issue with the len() formula function and multibyte characters (Hebrew, etc..).
 * Fix: fixed an issue with the ajax file uploader's deletion functionality.
 * Fix: fixed a bug with parsing formulas inside functions when the formula started with a bracket '('.

= version 1.7.5 =
 * Improvement: declutter admin screens by only displaying field descriptions on hover.
 * Improvement: enhanced our Woo Discount Rules integration.
 * Fix: fix for mini-cart subtotal bug in WooCommerce (WooCommerce issue 26422 on Github).
 * Fix: fixed an issue with sales prices in combination with our plugin and WooCommerce subscription.
 * Fix: for developers: fixed an issue in our beta API function "wapf_get_custom_fields_in_cart".
 * Fix: fixed an edge-case bug where fields (with conditions set) inside a section field (with 2 conditions set), would duplicate the conditions upon saving.

= version 1.7.4 =
 * Fix: fixed some more complex formula logic where variables were wrongly calculated.
 * Improvement: allow list codes (ul,ol,li) in "minimal allowed HTML" for the paragraph field.

= version 1.7.3 =
 * Fix: fixed file upload link not being clickable in order admin for PHP versions below 7.4.

= version 1.7.2 =
 * Fix: fixed file upload link not being clickable in order admin.

= version 1.7.1 =
 * Fix: fixed corrupt .mo files for use with Loco translate.

= version 1.7.0 =

This is a major release with bug fixes and updates.

 * New: added a setting to hide pricing hints.
 * New: integration with Astra theme's quick view module (no bloat added for those not using Astra).
 * Improvement: performance improvements when calculating formulas or conditionals on the frontend.
 * Improvement: enhanced our integration with WooCommerce Subscriptions to cover subscriptions with a one-time setup fee and zero monthly cost.
 * Improvement: enhanced the integration with Tiered Pricing Tables.
 * Improvement: order item meta data no longer has the pricing hint HTML in it, which is better for exporting orders.
 * Improvement: file upload field: the progress bar now disappears when the file upload is completed.
 * Fix: the pricing summary for variable products showed the lowest price as "product total", even if no variation was selected yet.
 * Fix: fixed a bug when adding gallery images based on "true-false" checkboxes, the "checked" or "unchecked" setting wouldn't save.
 * Fix: related to the above bug, fixed an issue where gallery images weren't returning to default state when a true-false field is unchecked.
 * Fix: fixed an issue with some products still showing the "add to cart" button instead of "select options".
 * Fix: fixed an issue with Yith Request a Quote.

= version 1.6.0 =

This is a major release with edge case bug fixes and updates.

 * New: option for "number" fields to hide the field in cart & checkout when the value is zero.
 * New: options to better layout image swatches on mobile & tablets.
 * Improvement: changed the layout CSS for image swatches. If you're using custom CSS, check your layout after updating.
 * Improvement: added validation for the number field's minimum & maximum settings on the backend.
 * Improvement: update cart/checkout prices with correct VAT when a user changes the "address country" field during checkout.
 * Improvement: enhanced our integration with Woo Discount Rules plugin.
 * Improvement: enhanced our integration with WOOCS.
 * Fix: fixed an issue where non-ascii characters were counted double with the "len" formula.
 * Fix: fixed an edge case bug where reordering fields in the backend didn't work.
 * Fix: fixed an issue with VAT-inclusive prices in combination with 0% VAT classes and calculating incorrect base price in the cart.
 * Fix: updated our "featured image switching" logic to account for multiple field groups on a page changing the same image.
 * Fix: fixed quantity based file & date fields not duplicating correctly when included in a "section" field.
 * Language: added Polish & Estonian translations.
 * Other verify WooCommerce 5.0 and 5.1 (beta) compatibility.

= version 1.5.4 =
 * New: new field type "Date".
 * New: integration with Discount Rules for WooCommerce.
 * Improvement: the field group conditions "tag" and "category" now also return true for variations and their parent product ID.
 * Improvement: added German formal (Deutsch Sie) translations.
 * Fix: fixed an issue with hidden field groups for variable products still requiring validation.
 * Fix: as a result of the previous fix, we also updated our integration with Barn2's Product Table plugin.
 * Fix: fixed an issue where number fields where "zero" was filled out, would not show meta data in the cart.
 * Fix: field was wrongly marked as "required" when users would select an option in a non-required multi-choice field and then uncheck it.
 * Fix: fixed an issue with the ajax file uploader not opening in some cases.
 * Other: removed jQuery 3.4 deprecated functions.
 * Other: for developers: renamed PHP filter "wapf/pricing/base" to "wapf/pricing/cart_item_base".

= version 1.5.3 =
 * Added: some Swedish translations.
 * Improvement: better support for modern ("ajax add to cart" enabled) themes.
 * Improvement: the field group condition "show if product" now also returns true for variations and their parent product ID.
 * Fix: fixed an issue with image swatches and min/max settings.
 * Fix: fixed an issue with "wp_slash" for versions older than WP 5.5.
 * Other: modified minification process resulting in a smaller javascript file (shaving off 0.2 kb).
 * Other: removed deprecated jquery selector ':eq()'.
 * Other: for developers: renamed filter "wapf/condition_options_products" to "wapf/field_group/condition_options".
 * Other: for developers: added filter "wapf/field_group/is_condition_valid".
 * Other: for developers: added filter "wapf/add_to_cart_url" to change the "add to cart url" on product archive pages.
 * Others: for developers: changed the argument list & inner working of the "do_pricing" function.
 * Others: for developers: changed the argument list & inner working of the "to_cart_item_field" function.
 * Others: for developers: changed the argument list & inner working of the "is_valid_rule" function.

= version 1.5.2 =
 * Improvement: matrix pricing is now based on an unlimited amount of fields (earlier versions had matrix pricing for 2 fields)
 * Fix: fixed a bug where pricing would be wrongfully added when you are using the "max selection" settings in combination with pricing options.
 * Fix: fixed a bug with ajax file upload and quantity-based fields.
 * Fix: fixed an error in the license manager.
 * Other: removed "keyup" event on the quantity box for better mobile experience.

= version 1.5.1 =
 * Fix: fixed a bug in frontend variation calculation.

= version 1.5.0 =
 * New: a modern drag & drop file upload interface that works with ajax.
 * New: color swatch and image swatch have an option to display the label as a tooltip, default (below), or hide it altogether.
 * Update: added support for themes implementeming "ajax add to cart" on single progulduct pages.
 * Update: image swatches are now responsive.
 * Update: all swatch options can now be re-ordered on the backend.
 * Improvement: changed the styling of the image swatch: no padding between image & border. Selection color is also darker.
 * Improvement: removed the color settings for color swatches (plugin footprint becomes smaller). Styling can be done through CSS (we have easy guides available).
 * Improvement: minor HTML changes for the color swatches, making it easier to style with CSS.
 * Improvement: added Norwegian translations.
 * Improvement: added Portuguese translations.
 * Improvement: added Italian translations.
 * Fix: fixed a bug with double serialization on fields added via "edit product", sometimes causing a fatal error when migrating your site from dev to live.
 * Fix: fixed a bug where a field that was set to be hidden on the cart, would still be visible on the mini cart.
 * Fix: fixed a bug where variations weren't seen as variable products.
 * Fix: fixed bugs in complex (nested) formulas.
 * Fix: fixed a bug with the Tiered Pricing Table integration.
 * Fix: fixed PHP notices when saving fields in the backend.

= version 1.4.5 =
 * New: new conditional rules based on product attributes.
 * New: compatibility with WooCommerce subscriptions (beta).
 * New: paragraph field can now contain HTML links with style & class attributes.
 * Fix: fixed return statement in recalculate_cart_item_price filter function.
 * Fix: fixed a bug with the conditional setting "product type" in the backend.
 * Fix: fixed edge case bug in the lookup tables functionality.

= version 1.4.4 =
 * New: now works with WooCommerce's "order again" functionality.
 * Fix: fixed an issue where the multi select swatches couldn't have multiple swatches pre-selected from the admin.
 * Fix: fixed an issue where some price formulas showed rounding errors of 0.1 cents.
 * Fix: fixed "advanced" tab of Yoast SEO plugin not showing.
 * Fix: minor WP 5.5 admin style changes.

= version 1.4.3 =
 * New: pricing options can now add negative pricing (below zero).
 * Fix: fixed a bug where in some cases, the system would automatically add duplicated rules to fields.
 * Fix: improved admin settings performance when adding many gallery images.
 * Fix: fixed a bug with required multi-select images and "min" and "max" selections.
 * Tweak: for devs: replaced filter "wapf/field_classes/{field id}" with "wapf/html/field_classes" on field level.
 * Tweak: for devs: replaced filter "wapf/field_classes" with "wapf/html/field_container_classes" on container level.

= version 1.4.2 =
 * New: options to hide fields from the cart, checkout, order & order emails.
 * New: support for WooCommerce [product_page] shortcode.
 * New: new hook for developers "wapf/pricing/mini_cart_item_price".
 * Improvement: bumped required WooCommerce from 3.2 to 3.4, but 3.2 compatibility is still ensured for min. 3 updates.
 * Fix: removed some PHP warnings that were appearing in certain cases.
 * Fix: fixed mini cart display with the WOOCS plugin integration.

= verion 1.4.1 =
 * Fix: fixed a PHP warning with stripslashes().

= version 1.4 =
 * New: product images can now change according to the last selected option from the user.
 * New: integration with a new plugin: Yith Request a Quote.
 * New: new hook for developers: wapf/html/product_totals/data.
 * New: new hook for developers: wapf/html/pricing_hint/amount.
 * Improvement: hide Stripe's "buy now" buttons on product page as an integration is sadly not possible.
 * Improvement: "add to cart" backend validation now also takes into account min/max selections for cloned fields.
 * Improvement: improved saving product fields to the database.
 * Improvement: added WOOCS compatibility for formula-based pricing.
 * Fix: fixed an edge-case bug where empty conditionals would be added to the field backend.
 * Fix: fixed a bug with recalculating pricing on cart page when cart was updated.
 * Fix: fixed a bug with WOOCS compatibility and recalculating pricing on page reload.
 * Fix: removed "wapf-checked:hover" styles for image swatches to fix android mobile issues where deselect styling wasn't correctly applied.
 * Fix: fixed a bug when changing field types in the backend. The "required" attribute didn't revert to "false" when doing so.
 * Fix: fixed "Delete permanently" label in the backend.
 * Fix: fixed an issue when refreshing the page after duplicating would generate another duplicate.
 * Fix: fixed an issue when a user entered text with a quote symbol, a slash would appear before it in cart/checkout.

= version 1.3 =
 * New: lookup tables for pricing options (currently beta).
 * New: new option for "number" field to allow decimal numbers as well.
 * New: option to define maximum selectable choices in a multiple-choice option.
 * New: option to define the minimum selectable choices in a multiple-choice option.
 * New: added filter "wapf/html/field_label" to change field labels programmatically.
 * New: added filter "wapf/html/field_description" to change field descriptions programmatically.
 * New: frontend & backend filters so developers can add their own functions in formulas.
 * Improvement: if needed, upgrade notices will be shown on the plugin update page of your dashboard. So you know when a large update requires testing.
 * Fix: fixed an issue with duplicating field groups in the admin screen.
 * Fix: fixed a CSS issue with portrait thumbnail preview of "change product image" option.
 * Fix: fixed an issue where the pricing hint didn't have the same HTML across all pages (cart, checkout, order).
 * Fix: fixed a bug where admin screen keeps on loading when you added a section field that had "variable product" conditions.

= version 1.2.6 =
 * Fix: fixed a small pricing display issue with taxed products.
 * Fix: fixed an issue with some mini carts.
 * Fix: fixed a small bug with deleting fields in the backend that were used in the variable builder.
 * Fix: fixed a bug with the "pattern" option on the text field.
 * Fix: fixed a small bug with deleting some variables from the variable builder.
 * Fix: fixed a bug with duplicating field groups under "WooCommerce > Product Fields". field ID's weren't unique when duplicating.

= version 1.2.5 =
  * New: new field "File Upload".
  * New: variable builder for more complex pricing options.
  * New: support for the Flatsome theme.
  * New: new options for the "text" field: for the HTML5 validation pattern, min. character and max. character length.
  * New: new options for the "textarea" field: min. character and max. character length.
  * Improvement: the paragraph field can now contain shortcodes.
  * Improvement: added some styling for compatibility with Elementor page builder to layout your product pages.
  * Improvement: update the backend UI for conditional rules so there's less clutter on the screen.
  * Improvement: verify compatibility with Woo 4.0 an 4.0.1.
  * Fix: fixed an issue with mini cart and options pricing.
  * Fix: fixed a bug with cart validation and choice fields.
  * Fix: fixed a bug with quantity-based select fields & custom formulas.
  * Fix: fixed a compatibility issue when using variable products in the Product Table plugin of Barn2 Media.
  * Fix: fixed a bug with validating cart data and the true/false field in a conditional setting.

= version 1.2.4 =
 * Fix: fixed an issue with required radio buttons not firing "onchange" event.

= version 1.2.3 =
 * Improvement: added "quantity based percentage fee" as pricing option.
 * Improvement: added possibility to use min() and max() in pricing formulas.
 * Improvement: added an invisible order meta array with extra info for other plugins or our API.
 * Improvement: improved plugin update notification for multisite networks that don't have the plugin globally activated.
 * Fix: fixed a bug with percentage based pricing in cart.
 * Fix: fixed wrong addon price being shown in cart for checkbox fields with different prices.

= version 1.2.2 =
 * New: new integration with Woodmart theme (if you don't use that theme, it won't be loaded).
 * Improvement: The HTLM "i" element is now allowed in option labels and descriptions.
 * Improvement: better error indication when saving field groups in the admin.
 * Improvement: UX improvement: duplicating sections in the backend will now also duplicate children in these sections.
 * Improvement: support lazy loading by Jetpack on the frontend.
 * Fix: field labels were sometimes not displaying in the same order on the cart or checkout page.
 * Fix: fix a bug with system generated conditionals for nested fields.

= version 1.2.1
 * New: formulas can now contain other field values.
 * New: added extra API call to fetch fields from an order.
 * New: added a filter so developers can easily edit attributes of input elements.
 * New: added two new options to the "true-false" field.
 * Improvement: swatches can now be deselected.
 * Improvement: added field ID in the backend order meta information so it can be picked up by our API.
 * Fix: fixed a bug with "multi select text swatch" not being selectable in the backend settings screen.
 * Fix: fixed an issue with non-selected checkboxes of duplicated quantity-based fields.
 * Fix: bugfixes & various improvements when working with quantity-based "section" fields.

= version 1.2.0 =
 * Fix: fixed a bug with conditional rules on a 'paragraph' field.
 * Fix: fixed a bug with the pricing of the first quantity-based true-false field in a set of fields.
 * Fix: fixed a bug with the HTML label of quantity-based radio buttons & checkboxes.
 * Fix: fixed a bug with dependency fields and radio buttons defaulting back to their original state without UI update.

=version 1.1.9=
 * New: action hooks for developers.
 * Improvement: allow multiple class names in the "class" setting of each field.
 * Improvement: allow more HTML tags in the paragraph field.
 * Improvement: allow some HTML in the swatch labels.
 * Fix: fixed minor CSS issue for fields of different widths.
 * Fix: fixed wrong labels being shown when duplicating a whole section.
 * Fix: fixed a bug where duplicated sections didn't appear in "cart" screen.

=version 1.1.8=
 * New: new field type "section" which allows to group fields.
 * New: section field can group quantity fields together.
 * Fix: when min/max value of number field was 0, it wasn't output to the frontend.
 * Fix: fixed a bug with "required" fields and variable product conditions.

=version 1.1.7=
 * New: new conditional: product tags.
 * Improvement: the frontend Javascript is smaller (from 5kb to 4.8kb gzipped).
 * Improvement: changed some admin CSS to better match the new WordPress admin UI.

=version 1.1.6=
 * New: new field type: "text swatch".
 * New: new field type: "paragraph".
 * New: new field type: "image".
 * New: Added support for Tiered Pricing plugin (if applicable).
 * Improvement: uses less JavaScript dependencies now.
 * Fix: better image zooming support on single product page (if enabled within the theme).
 * Fix: "select options" was sometimes showing incorrectly.
 * Other: Added more filters so developers can extend.

=version 1.1.5=
 * New: formula-based pricing for more advanced pricing options.
 * Fix: fixed a bug with "ajax add to cart" themes and "required" image swatches.
 * Fix: fixed a bug when calculating percentage based pricing on the frontend.
 * Fix: fixed a bug with jQuery in the "product edit" screen in the backend.
 * Fix: fixed the "percentage pricing" hint output.

=version 1.1.4=
 * New: support taxation.
 * New: support multi-currency with the WOOCS plugin.
 * New: support for multilingual stores with Polylang & WPML.
 * New: the settings "show in cart" & "show in checkout" now default to "yes".
 * New: more layout options for multi-image swatches.
 * New: option to show/hide field summary in the mini cart.
 * Fix: fixed a bug with color swatches and the "required" HTML attribute.

=version 1.1.3=
 * New: better dependency checking on the frontend.
 * New: the dropdown label "choose an option" now only appears when necessary.
 * New: added frontend translations for Dutch, French, German, and Spannish.
 * Fix: fixed an issue with select lists and pricing.
 * Fix: fixed an issue with true-false field price labeling.
 * Fix: fixed an issue with columns wrapping on a new line when setting variable widths.


=version 1.1.2=
 * New: added new pricing method: value x amount.
 * New: added new pricing method: characters x amount.
 * New: support for variations loaded via ajax.
 * New: better support for adding quantity-based fields to the cart.
 * New: better support for the image slider on page load.
 * New: you can now also find products in draft when searching products in the backend.
 * New: added extra info dialogs to the pricing options, so you better understand all options available.
 * Fix: fixed an issue with themes using a "section" element instead of a "div" in single product templates.
 * Fix: fixed an image-switching issue with true/false fields.
 * Fix: fixed an issue with hidden fields wrongly validating in cart.
 * Fix: fixed an issue with removing quantity-based fields on the frontend.
 * Fix: minor styling corrections for the color swatches.

=version 1.1.1=
 * Fix: better compatibility when switching from free to premium.
 * Fix: fixed a bug with duplicating a field in the backend.
 * Fix: fixed jQuery image zoom issue with some themes.

=version 1.1.0=
 * New: added tootlips to the color swatches.
 * New: added more design options to the color swatches.
 * Improvement: Your options can now also change the product image on the product page.
 * Fix: fixed decimal issue in numbers with USA format.
 * Fix: fixed color swatch file issue.
 * Fix: fixed an issue with images and non ascii characters in their file name.

=version 1.0.7=
 * Fix: fixed a HTML bug with checkbox series.

=version 1.0.6=
 * New: added a few API functions for developers. This will grow in the future.
 * Fix: fixed a small issue with price labels showing even if price addition was zero.

=version 1.0.5=
 * New: added .pot file for translators.
 * New: added filter for devs to change the "product totals" HTML.
 * Improvement: allow some HTML in field descriptions & labels.

= version 1.0.4 =
* Fix: fixed a bug with item pricing when changing item quantity on the cart page.

= version 1.0.3 =
 * Fix: small backend Javascript bugfix.

= version 1.0.2 =
 * Improvement: Made frontend Javascript file 19% smaller.

= version 1.0.1 =
 * Improvement: HTML Changes so it can more easily be styled with CSS

= version 1.0.0 =
 * Initial version