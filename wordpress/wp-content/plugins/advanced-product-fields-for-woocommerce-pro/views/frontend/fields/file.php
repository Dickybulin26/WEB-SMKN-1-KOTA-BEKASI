<?php
/** @var array $model */
use \SW_WAPF_PRO\Includes\Classes\File_Upload;

if(File_Upload::can_upload()) {
    if ( File_Upload::is_ajax_upload() ) {

        $allows_multiple =  isset($model['field']->options['multiple']) && $model['field']->options['multiple'];

	    $dropzone_options = [
	        'maxFiles'              => $allows_multiple ? 99 : 1,
            'thumbnailWidth'        => 1000,
            'thumbnailHeight'       => 1000,
            'dictFileTooBig'        => __('File is too big ({{filesize}}MB). Max filesize is {{maxFilesize}}MB.','sw-wapf'),
            'dictInvalidFileType'   => __("You can't upload files of this type.",'sw-wapf'),
            'dictMaxFilesExceeded'  => __("You can't upload any more files.",'sw-wapf'),
            'previewTemplate'       => '<div class="dz-preview"><div class="dz-filename" data-dz-name></div><div class="dz-left"><div class="dz-progress-wrapper"><div class="dz-progress"></div><div class="dz-upload" data-dz-uploadprogress></div></div><div class="dz-remove" data-dz-remove>&times;</div></div>',
        ];

	    $defaults = $model['is_edit'] ?  \SW_WAPF_PRO\Includes\Classes\Helper::extract_upload_urls_from_html($model['default'][0]) : [];
	    $field_id = esc_attr($model['field']->id);
        $nonce =  wp_create_nonce('wapf_fupload');
        ?>
        <div class="dzone" id="wapf-dz-<?php echo $field_id;?>">
            <div class="dz-message" data-dz-message>
                    <?php _e('Drag files here or <span>browse</span>','sw-wapf'); ?>
            </div>
        </div>
        <div class="wapf-dz-error wapf-dz-error-<?php echo $field_id;?>"></div>
        <input type="hidden" data-is-file="1" value="<?php echo esc_attr(join(', ', $defaults));?>" <?php echo $model['field_attributes']; ?> name="wapf[field_<?php echo $field_id;?>]" />
        <script>
            jQuery(function($) {
                Dropzone.autoDiscover = false;
                window.initWapfFileUpload = window.initWapfFileUpload || [];
                if(!window.initWapfFileUpload['<?php echo $field_id; ?>'])
                    window.initWapfFileUpload['<?php echo $field_id; ?>'] = function(fieldId) {
                        var uploaded = {};
                        var toVal = function() {
                            var tmpArr = [];
                            Object.keys(uploaded).forEach(function(k){ tmpArr.push(uploaded[k]['path']); });
                            $('[name="wapf[field_'+fieldId+']"]').val(tmpArr.join(',')).trigger('change');
                        };
                        $('#wapf-dz-'+fieldId+' .wapf-dz-btn').on('click',function(e){e.preventDefault();});
                        if($('#wapf-dz-'+fieldId)[0].dropzone)
                            return;
                        $('#wapf-dz-'+fieldId).dropzone($.extend(
	                        <?php echo wp_json_encode($dropzone_options) ?>, {
                                paramName: 'wapf[field_'+fieldId+']',
                                uploadMultiple:  !1,
                                parallelUploads: 1,
                                url: wapf_config.ajax,
                                params: function() {
                                    return {
                                        action : 'wapf_upload',
                                        nonce: '<?php echo $nonce; ?>',
                                        field_groups: $('[name=wapf_field_groups]').val()
                                    };
                                },
                                init: function() {

                                    this.on('sending', function() {
                                        $('form.cart .single_add_to_cart_button').prop('disabled',true);
                                    });
                                    this.on('complete', function() {
                                        $('form.cart .single_add_to_cart_buttonn').prop('disabled',false);
                                    });
                                    this.on('success', function(file, response) {
                                        uploaded[file.upload.uuid] = response.data[0];
                                        $(file.previewElement).data('uuid',file.upload.uuid);
                                        $(document).trigger('wapf/file_uploaded',{response: response.data,file: file,fieldId: fieldId, uploads: uploaded});
                                        toVal();
                                        <?php if(!$allows_multiple) { ?>
                                        $('#wapf-dz-'+fieldId).find('.dz-message').hide();
                                        <?php } ?>
                                    });
                                    this.on('error', function( file, msg ) {
                                        var $wrapper = $('.wapf-dz-error-'+fieldId);
                                        var error = ( typeof msg === 'string' ? msg : (!msg.success && msg.data ? msg.data : '') );
                                        if(error) {
                                            this.removeFile(file);
                                            var $e = $('<div>'+error+'</div>').prependTo($wrapper);
                                            setTimeout( function(){$e.hide('fast',function(){$e.remove()}); }, 9000);
                                        }
                                    });
                                    this.on('removedfile', function( file ) {
                                        if(uploaded[file.upload.uuid]) {
                                            $.getJSON(wapf_config.ajax + '?action=wapf_upload_remove&nonce=<?php echo $nonce; ?>&file=' + decodeURIComponent(uploaded[file.upload.uuid].path));
                                            delete uploaded[file.upload.uuid];
                                            $(document).trigger('wapf/file_deleted ', {file: file,fieldId:fieldId, uploads: uploaded});
                                            toVal();
	                                        <?php if(!$allows_multiple) { ?>
                                            $('#wapf-dz-'+fieldId).find('.dz-message').show();
	                                        <?php } ?>
                                        }
                                    });
			                        <?php if(!empty($defaults)) {  ?>
                                    this.addCustomFile = function(file, responce){
                                        this.files.push(file);
                                        this.emit("addedfile", file);
                                        this.emit("processing", file);
                                        this.emit("success", file, responce , false);
                                        this.emit("complete", file);
                                    };
                                    var _this = this;
			                        <?php echo wp_json_encode($defaults); ?>.forEach(function(u) {
                                        _this.addCustomFile(
                                            {
                                                processing: true,
                                                accepted: true,
                                                name: u.substring(u.lastIndexOf("/") + 1),
                                                size: 1,
                                                type: 'image/jpeg',
                                                status: Dropzone.SUCCESS,
                                                upload: {uuid: Date.now()}
                                            },
                                            {
                                                status: "success",
                                                data: [{path:u}]
                                            }
                                        )
                                    });
			                        <?php } ?>
                                }
                            }
                        ));
                    };
                    window.initWapfFileUpload['<?php echo $field_id; ?>']('<?php echo $field_id; ?>');
                    $(document).on('wapf/cloned', function(e,fieldId,idx,$clone){
                        var isSection = $('[for='+fieldId+']').hasClass('wapf-section');
                        if(!isSection && fieldId !== '<?php echo $field_id;?>') return;
                        var $f = $clone.find((isSection ? '[for=<?php echo $field_id;?>] ' : '')+'input');
                        $f.val('');
                        var newId = '<?php echo $field_id;?>_clone_' + idx;
                        $clone.find('.dzone').attr('id','wapf-dz-'+newId).children().not('.dz-message').html('');
                        $clone.find('.wapf-dz-error').removeClass('wapf-dz-error-'+fieldId).addClass('wapf-dz-error-'+newId);
                        window.initWapfFileUpload['<?php echo $field_id;?>'](newId);
                    });

            });
        </script>
        <?php
    } else {
        echo '<input type="file" ' . $model['field_attributes'] . ' />';
    }

}
else {
    echo esc_html(get_option('wapf_settings_upload_msg'));
}