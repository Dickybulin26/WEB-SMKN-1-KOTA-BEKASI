<?php

namespace SW_WAPF_PRO\Includes\Classes {

	class Util {

		public static function show_pricing_hints() {
			return get_option('wapf_show_pricing_hints','yes') === 'yes';
		}

	}
} 