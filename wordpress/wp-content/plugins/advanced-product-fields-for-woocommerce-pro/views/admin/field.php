<?php
/* @var $field [] */
/* @var $type string */
$types = \SW_WAPF_PRO\Includes\Classes\Fields::get_field_definitions();
?>

<div rv-each-field="fields" rv-cloak class="wapf-field" rv-data-type="field.type"
     rv-data-level="field.level"
     rv-data-field-id="field.id" rv-data-grouptype="field.group"
     rv-class-wapf--active="activeField | equalIds field">
    <div class="wapf-field__header">
        <div class="wapf-field__sort sort--left" title="<?php _e('Drag & drop','sw-wapf');?>">☰</div>
        <div class="wapf-field__icon">
            <?php
                foreach ($types as $type) {
                    ?>
                    <div rv-if="field.type | eq '<?php echo $type['id']; ?>'">
                        <?php if(isset($type['icon'])) echo $type['icon']; ?>
                    </div>
                    <?php
                }
            ?>
        </div>
        <div rv-if="field.group|in 'field,content'" class="wapf-field__label" rv-on-click="setActiveField">
            <span rv-text="field.label|ifEmpty '<?php _e('(No label)','sw-wapf'); ?>'"></span> <span class="wapf-field__type"><span rv-text="fieldDefinitions | query 'first' 'id' '==' field.type 'get' 'title'"></span>&nbsp;&nbsp;&nbsp;&nbsp;ID: {field.id}</span>
        </div>
        <div rv-if="field.group|eq 'layout'" class="wapf-field__label" rv-on-click="setActiveField">
            <span style="font-weight: bold" rv-text="fieldDefinitions | query 'first' 'id' '==' field.type 'get' 'title'"></span>
        </div>

        <div class="wapf-field__actions">
            <div class="wapf__action_icon" rv-on-click="deleteField" title="<?php _e('Delete field','sw-wapf');?>">
                <svg height="16" width="16" viewBox="0 0 16 16"><path d="M13 3s0-0.51-2-0.8v-0.7c-0.017-0.832-0.695-1.5-1.53-1.5-0 0-0 0-0 0h-3c-0.815 0.017-1.47 0.682-1.47 1.5 0 0 0 0 0 0v0.7c-0.765 0.068-1.452 0.359-2.007 0.806l-0.993-0.006v1h12v-1h-1zM6 1.5c0.005-0.274 0.226-0.495 0.499-0.5l3.001-0c0 0 0.001 0 0.001 0 0.282 0 0.513 0.22 0.529 0.499l0 0.561c-0.353-0.042-0.763-0.065-1.178-0.065-0.117 0-0.233 0.002-0.349 0.006-0.553-0-2.063-0-2.503 0.070v-0.57z" ></path><path d="M2 5v1h1v9c1.234 0.631 2.692 1 4.236 1 0.002 0 0.003 0 0.005 0h1.52c0.001 0 0.003 0 0.004 0 1.544 0 3.002-0.369 4.289-1.025l-0.054-8.975h1v-1h-12zM6 13.92q-0.51-0.060-1-0.17v-6.75h1v6.92zM9 14h-2v-7h2v7zM11 13.72c-0.267 0.070-0.606 0.136-0.95 0.184l-0.050-6.904h1v6.72z" ></path></svg>
            </div>
            <div class="wapf__action_icon" rv-on-click="duplicateField" title="<?php _e('Duplicate field','sw-wapf');?>">
                <svg height="16" width="16" viewBox="0 0 16 16"><path d="M6 0v3h3z"></path><path d="M9 4h-4v-4h-5v12h9z" ></path><path d="M13 4v3h3z" ></path><path d="M12 4h-2v9h-3v3h9v-8h-4z" ></path></svg>
            </div>
        </div>
    </div>

    <div class="wapf-field__body" style="display: none;">
        <?php

        do_action('wapf/admin/before_field_settings');

        \SW_WAPF_PRO\Includes\Classes\Html::setting([
            'type'              => 'field-type',
            'id'                => 'type',
            'label'             => __('Type','sw-wapf'),
            'description'       => __('What type of field should this be?','sw-wapf'),
            'options'           => $types,
        ]);
        ?>
        <div rv-if="field.group|neq 'layout'">
        <?php
        \SW_WAPF_PRO\Includes\Classes\Html::setting([
            'type'              => 'text',
            'id'                => 'label',
            'label'             => __('Label','sw-wapf'),
            'description'       => __('This is the label that is shown near the field.','sw-wapf'),
            'is_field_setting'  => true
        ]);
        ?>
        </div>
        <div rv-if="field.group | notin 'content,layout'">
        <?php
        \SW_WAPF_PRO\Includes\Classes\Html::setting([
            'type'              => 'textarea',
            'id'                => 'description',
            'label'             => __('Instructions','sw-wapf'),
            'description'       => __('Instructions can be used to display extra information near the field. Keep it short.','sw-wapf'),
            'is_field_setting'  => true
        ]);

        \SW_WAPF_PRO\Includes\Classes\Html::setting([
            'type'              => 'true-false',
            'id'                => 'required',
            'label'             => __('Required','sw-wapf'),
            'description'       => __('Select "yes" if the field should require input from the user.','sw-wapf'),
            'is_field_setting'  => true
        ]);
        ?>
        </div>
        <?php

        do_action('wapf/admin/before_additional_field_settings');

        foreach(\SW_WAPF_PRO\Includes\Classes\Fields::get_field_options() as $field_type => $options) { ?>
            <div rv-if="field.type | eq '<?php echo $field_type; ?>'" class="wapf_field__options">
                <?php
                    foreach($options as $option) {
                        if(!empty($option) && isset($option['type']))
                            \SW_WAPF_PRO\Includes\Classes\Html::setting( array_merge($option,['field_type' => $field_type]) );
                    }
                ?>
            </div>
        <?php
        }

        do_action('wapf/admin/after_additional_field_settings');
        ?>

        <div rv-if="field.type | notin 'p,img,sectionend'">
        <?php
       /* \SW_WAPF_PRO\Includes\Classes\Html::setting([
	        'type'              => 'repeater',
	        'id'                => 'repeat',
	        'label'             => __('Enable repeater','sw-wapf'),
	        'description'       => __('This will make the element repeatable.','sw-wapf'),
	        'is_field_setting'  => true
        ]);*/
        \SW_WAPF_PRO\Includes\Classes\Html::setting([
            'type'              => 'qty-based',
            'id'                => 'qty_based',
            'label'             => __('Quantity based','sw-wapf'),
            'description'       => __('Should this field appear multiple times depending on the chosen quantity?','sw-wapf'),
            'is_field_setting'  => true
        ]);

        ?>
        </div>
        <div rv-if="field.type | neq 'sectionend'">
        <?php
        \SW_WAPF_PRO\Includes\Classes\Html::setting([
	        'type'              => 'conditionals',
	        'id'                => 'conditionals',
	        'label'             => __('Conditionals','sw-wapf'),
	        'description'       => __('Only show this field when conditional rules are true.','sw-wapf'),
	        'is_field_setting'  => true
        ]);
        ?>
        </div>

        <div rv-if="field.group | notin 'content,layout'">
		    <?php
		    \SW_WAPF_PRO\Includes\Classes\Html::setting([
			    'type'              => 'true-falses',
			    'options'           => [
                    'hide_cart'     => __('Hide this field & value on the cart page','sw-wapf'),
                    'hide_checkout' => __('Hide this field & value on the checkout page','sw-wapf'),
                    'hide_order'    => __('Hide this field & value on the "order received" page and emails.','sw-wapf'),
                ],
			    'label'             => __('Hide on cart, checkout, order','sw-wapf'),
			    'description'       => __("Per default, filled out fields are shown on the customer's cart, checkout and order. You can change that here.",'sw-wapf'),
			    'is_field_setting'  => true
		    ]);
		    ?>
        </div>

        <div rv-if="field.type | neq 'sectionend'">
        <?php
        \SW_WAPF_PRO\Includes\Classes\Html::setting([
            'type'              => 'attributes',
            'id'                => 'attributes',
            'label'             => __('Wrapper attributes','sw-wapf'),
            'is_field_setting'  => true
        ]);
        ?>
        </div>
        <?php do_action('wapf/admin/after_field_settings'); ?>
    </div>

</div>