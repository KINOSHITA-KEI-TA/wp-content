<?php
function blog_meta_box() {
  // $post_types = array ( 'page' );
  add_meta_box(
    'blog_meta_box',//ID of meta box
    __('Basic setting', 'tcd-w'),//label
    'show_blog_meta_box',//callback function
    'page',// post type
    'normal',// context
    'high'// priority
  );
}
add_action('add_meta_boxes', 'blog_meta_box');

function show_blog_meta_box() {
  global $post, $layout_options;

  $page_content_width = array(
    'type1' => array( 'value' => 'type1', 'label' => __( '750px', 'tcd-w' ) ),
    'type2' => array( 'value' => 'type2', 'label' => __( '990px', 'tcd-w' ) ),
  );

  $page_header_title = get_post_meta($post->ID, 'page_header_title', true);

  $page_header_image = get_post_meta($post->ID, 'page_header_image', true);

  $page_content_type = get_post_meta($post->ID, 'page_content_type', true) ?  get_post_meta($post->ID, 'page_content_type', true) : 'type1';

  $side_content_layout = get_post_meta($post->ID, 'side_content_layout', true) ?  get_post_meta($post->ID, 'side_content_layout', true) : 'type2';

  echo '<input type="hidden" name="blog_custom_fields_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
  

  //���͗� ***************************************************************************************************************************************************************************************
?>
<div class="tcd_custom_fields">

  <div class="theme_option_message2">
     <p><?php _e('The width of the content will be reflected when the side content is not displayed.', 'tcd-w'); ?></p>
  </div>
  <ul class="option_list">
   <li class="cf"><span class="label"><?php _e('Hide title area', 'tcd-w'); ?></span><input name="page_header_title" type="checkbox" value="1" <?php checked( $page_header_title, 1 ); ?>></li>
   <li class="cf"><span class="label"><?php _e('Hide featured image', 'tcd-w'); ?></span><input name="page_header_image" type="checkbox" value="1" <?php checked( $page_header_image, 1 ); ?>></li>
   <li class="cf" id="side_content_layout">
      <span class="label"><?php _e('Side content position', 'tcd-w'); ?></span>
      <select name="side_content_layout">
       <?php foreach ( $layout_options as $option ) { ?>
      <option style="padding-right: 10px;" value="<?php echo esc_attr($option['value']); ?>" <?php selected( $side_content_layout, $option['value'] ); ?>><?php echo $option['label']; ?></option>
      <?php }; ?>
      </select>
    </li>
    <li class="cf" id="page_content_type">
      <span class="label"><?php _e('Content width', 'tcd-w'); ?></span>
      <select name="page_content_type">
      <?php foreach ($page_content_width as $option) : ?>
      <option value="<?php echo esc_attr($option['value']); ?>" <?php selected( $page_content_type, $option['value'] ); ?>><?php echo esc_html($option['label']); ?></option>
      <?php endforeach; ?>
      </select>
    </li>

  </ul>

</div><!-- END #tcd_custom_fields -->

<?php
}

function save_blog_meta_box( $post_id ) {

  // verify nonce
  if (!isset($_POST['blog_custom_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['blog_custom_fields_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }

  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }

  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
      return $post_id;
  }

  // save or delete
  $cf_keys = array('page_content_type','side_content_layout','page_header_title','page_header_image');
  foreach ($cf_keys as $cf_key) {
    $old = get_post_meta($post_id, $cf_key, true);

    if (isset($_POST[$cf_key])) {
      $new = $_POST[$cf_key];
    } else {
      $new = '';
    }

    if ($new && $new != $old) {
      update_post_meta($post_id, $cf_key, $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $cf_key, $old);
    }
  }

}
add_action('save_post', 'save_blog_meta_box');



?>