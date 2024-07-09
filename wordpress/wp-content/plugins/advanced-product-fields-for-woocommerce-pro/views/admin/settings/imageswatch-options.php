<?php /* @var $model array */ ?>

<div style="width: 100%;" rv-show="field.choices | isNotEmpty">
    <div class="wapf-options__header">
        <div class="wapf-option__sort"></div>
        <div class="wapf-option__image"><?php _e('Image','sw-wapf'); ?></div>
        <div class="wapf-option__flex"><?php _e('Option label','sw-wapf'); ?></div>
        <?php if(isset($model['show_pricing_options']) && $model['show_pricing_options']) { ?>
            <div class="wapf-option__flex"><?php _e('Adjust pricing','sw-wapf'); ?></div>
            <div class="wapf-option__flex"><?php _e('Pricing amount','sw-wapf'); ?></div>
        <?php } ?>
	    <?php if(!empty($model['inputs'])) { foreach ($model['inputs'] as $input) { ?>
            <div class="wapf-option__flex"><?php echo isset($input['title']) ? esc_html($input['title']) : ''; ?></div>
	    <?php }} ?>
        <div class="wapf-option__selected"><?php _e('Selected', 'sw-wapf'); ?></div>
        <div  class="wapf-option__delete"></div>
    </div>
    <div rv-sortable-options="field.choices" class="wapf-options__body">
        <div class="wapf-option" style="display: flex;align-items: center" rv-each-choice="field.choices" rv-data-option-slug="choice.slug">
            <div class="wapf-option__sort"><span rv-sortable-option class="wapf-option-sort">☰</span></div>
            <div class="wapf-option__image">
                <div class="wapf-media-selector">
                    <input rv-mediaselector="choice.image" rv-on-change="onChange" type="hidden" rv-value="choice.image" />
                    <a class="wapf-btn-add-media" href="#">
                        <img rv-show="choice.image | isNotEmpty" rv-src="choice.image" />
                        <span><?php _e('Select', 'sw-wapf'); ?></span>
                    </a>
                </div>
            </div>
            <div class="wapf-option__flex"><input rv-on-keyup="onChange" rv-on-change="onChange" type="text" class="choice-label" rv-value="choice.label"/></div>
            <?php if(isset($model['show_pricing_options']) && $model['show_pricing_options']) { ?>
                <div class="wapf-option__flex">
                    <select class="wapf-pricing-list" rv-on-change="onChange" rv-value="choice.pricing_type">
                        <option value="none"><?php _e('No price change','sw-wapf'); ?></option>
                        <?php
                        foreach(\SW_WAPF_PRO\Includes\Classes\Fields::get_pricing_options() as $k => $v) {
                            echo '<option value="'.$k.'">'.$v.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="wapf-option__flex">
                    <input rv-if="choice.pricing_type | eq 'fx'" placeholder="<?php _e('Enter a formula','sw-wapf');?>" rv-on-change="onChange" type="text" rv-value="choice.pricing_amount" />
                    <input rv-if="choice.pricing_type | neq 'fx'" placeholder="<?php _e('Amount','sw-wapf');?>" rv-on-change="onChange" type="number" step="any" rv-value="choice.pricing_amount" />
                </div>
            <?php } ?>
	        <?php if(!empty($model['inputs'])) { foreach ($model['inputs'] as $input) { ?>
                <div class="wapf-option__flex">
                    <input
                            placeholder="<?php echo isset($input['placeholder']) ? esc_attr($input['placeholder']) : '';?>"
                            rv-on-change="onChange" type="<?php echo isset($input['type']) && $input['type'] === 'number' ? 'number' : 'text';?>"
                            rv-value="choice.options.<?php echo esc_attr($input['key']); ?>" />
                </div>
	        <?php } } ?>
            <div class="wapf-option__selected"><input data-multi-option="<?php echo isset($model['multi_option']) ? $model['multi_option'] : '0' ;?>" rv-on-change="field.checkSelected" rv-checked="choice.selected" type="checkbox" /></div>
            <div class="wapf-option__delete"><a href="#" rv-on-click="field.deleteChoice" class="wapf-button--tiny-rounded">&times;</a></div>
        </div>
    </div>
</div>

<div style="padding-top:12px;text-align: right;width: 100%;">
    <a href="#" rv-on-click="field.addChoice" class="button button-small"><?php _e('Add option','sw-wapf'); ?></a>
</div>
<div style="text-align: right;width: 100%;margin-top:10px;">
    <a href="https://www.studiowombat.com/knowledge-base/all-pricing-options-explained/?ref=wapf_admin" target="_blank">
        <?php _e('Help with pricing','sw-wapf'); ?>
    </a>
</div> 