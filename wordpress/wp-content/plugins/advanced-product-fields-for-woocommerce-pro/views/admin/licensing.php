<?php
 /** @var array $model */
$nonce = $model['license_id'] . '_' . ($model['has_license'] ? 'deactivate' : 'activate');
$nonce_name = '_' .$model['license_id'] . '_nonce';
//$nonce = $model['has_license'] ? 'deactivate-pro' : 'activate-pro';
?>
<div class="mabel-wapf-license">
    <table class="form-table">
        <tr valign="top">
            <th scope="row" class="titledesc">
                <label for="wapf_license"><?php _e('License key','sw-wapf'); ?></label>
            </th>
            <td class="forminp">
                <input type="hidden" name="<?php echo $nonce_name ?>" value="<?php echo wp_create_nonce($nonce); ?>">
                <input class="input-text regular-input"
                       type="text"
                       name="<?php echo $model['license_id'] ?>"
                       id="<?php echo $model['license_id'] ?>"
                       value="<?php echo $model['has_license'] ? '***************' : ''; ?>" />
                <?php if(!$model['has_license']) { ?>
                    <span class="description">
                        <button type="submit" class="button-secondary" name="<?php echo $model['license_id'] ?>_activate" value="wapf" style="margin-left:10px">
                            <?php _e('Activate license','sw-wapf'); ?>
                        </button>
                    </span>
                    <p class="description">
                        <?php _e("Please enter your license key to activate the plugin and click 'Activate license'.",'sw-wapf'); ?>
                    </p>
                <?php } else { ?>
                    <button name="<?php echo $model['license_id'] ?>_activate" class="button-secondary" type="submit" value="wapf"><?php _e('Deactivate','sw-wapf'); ?></button>
                <?php } ?>
            </td>
        </tr>
    </table>

</div>