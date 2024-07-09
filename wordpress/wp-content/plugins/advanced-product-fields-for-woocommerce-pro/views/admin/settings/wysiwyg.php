<?php /* @var $model array */ ?>

<?php
    $content = '';
    $editor_id = 'editor_content';
    $settings =   [
        'wpautop' => true, // use wpautop?
        'media_buttons' => false, // show insert/upload button(s)
        'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
        'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
    ];
    wp_editor( $content, $editor_id, $settings );
?> 