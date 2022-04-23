<?php
/*
 * ブログの設定
 */


// Add default values
add_filter( 'before_getting_design_plus_option', 'add_blog_dp_default_options' );


//  Add label of blog tab
add_action( 'tcd_tab_labels', 'add_blog_tab_label' );


// Add HTML of blog tab
add_action( 'tcd_tab_panel', 'add_blog_tab_panel' );


// Register sanitize function
add_filter( 'theme_options_validate', 'add_blog_theme_options_validate' );


// タブの名前
function add_blog_tab_label( $tab_labels ) {
	$tab_labels['blog'] = __( 'Blog', 'tcd-w' );
	return $tab_labels;
}


// 初期値
function add_blog_dp_default_options( $dp_default_options ) {


  $dp_default_options['single_blog_title_font_size'] = '20';
  $dp_default_options['single_blog_title_font_size_mobile'] = '18';
  
  $dp_default_options['single_blog_content_font_size'] = '16';
  $dp_default_options['single_blog_content_font_size_mobile'] = '14';
  
  // $dp_default_options['single_blog_show_category'] = 1;
  $dp_default_options['single_blog_show_meta_tag'] = 1;
  $dp_default_options['single_blog_show_date'] = 1;
	$dp_default_options['single_blog_show_update'] = 1;
  $dp_default_options['single_blog_show_sns_top'] = 1;
	$dp_default_options['single_blog_show_sns_btm'] = 1;
  $dp_default_options['single_blog_show_copy_btm'] = 1;
  $dp_default_options['single_blog_show_comment'] = 1;
	$dp_default_options['single_blog_show_trackback'] = 1;

	return $dp_default_options;

}


// 入力欄の出力　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_blog_tab_panel( $options ) {

  global $dp_default_options, $pagenation_type_options, $layout_options, $para_options;

?>

<div id="tab-content-blog" class="tab-content">


   <?php // 記事ページの設定 -------------------------------------------------------------------- ?>
   <div class="theme_option_field cf theme_option_field_ac open active">
    <h3 class="theme_option_headline"><?php _e('Post setting', 'tcd-w');  ?></h3>
    <div class="theme_option_field_ac_content">

     <h4 class="theme_option_headline2"><?php _e('Post title setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_title_font_size]" value="<?php esc_attr_e( $options['single_blog_title_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_title_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_title_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Post content setting', 'tcd-w');  ?></h4>
		 <div class="theme_option_message2">
 		 	<p><?php _e( 'The text size will also be reflected in the body of the Pages.', 'tcd-w' ); ?></p>
		 </div>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Font size of content', 'tcd-w'); ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_content_font_size]" value="<?php esc_attr_e( $options['single_blog_content_font_size'] ); ?>" /><span>px</span></li>
      <li class="cf"><span class="label"><?php _e('Font size of content (mobile)', 'tcd-w');  ?></span><input class="font_size hankaku" type="text" name="dp_options[single_blog_content_font_size_mobile]" value="<?php esc_attr_e( $options['single_blog_content_font_size_mobile'] ); ?>" /><span>px</span></li>
     </ul>

     <h4 class="theme_option_headline2"><?php _e('Display setting', 'tcd-w');  ?></h4>
     <ul class="option_list">
      <li class="cf"><span class="label"><?php _e('Display tag', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_meta_tag]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_meta_tag'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display date', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_date]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_date'] ); ?> /></li>
      <li class="cf blog_single_show_update"><span class="label"><?php _e('Display modified date', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_update]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_update'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display social button under featured image', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_sns_top]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_sns_top'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display social button under post content', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_sns_btm]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_sns_btm'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display "COPY Title&amp;URL" button under post content', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_copy_btm]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_copy_btm'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display comment', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_comment]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_comment'] ); ?> /></li>
      <li class="cf"><span class="label"><?php _e('Display trackbacks', 'tcd-w');  ?></span><input name="dp_options[single_blog_show_trackback]" type="checkbox" value="1" <?php checked( '1', $options['single_blog_show_trackback'] ); ?> /></li>
     </ul>

     <ul class="button_list cf">
      <li><input type="submit" class="button-ml ajax_button" value="<?php echo __( 'Save Changes', 'tcd-w' ); ?>" /></li>
      <li><a class="close_ac_content button-ml" href="#"><?php echo __( 'Close', 'tcd-w' ); ?></a></li>
     </ul>
    </div><!-- END .theme_option_field_ac_content -->
   </div><!-- END .theme_option_field -->


</div><!-- END .tab-content -->

<?php
} // END add_blog_tab_panel()


// バリデーション　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
function add_blog_theme_options_validate( $input ) {

  global $dp_default_options, $pagenation_type_options, $layout_options, $para_options;


  $input['single_blog_title_font_size'] = wp_filter_nohtml_kses( $input['single_blog_title_font_size'] );
  $input['single_blog_title_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_title_font_size_mobile'] );

  $input['single_blog_content_font_size'] = wp_filter_nohtml_kses( $input['single_blog_content_font_size'] );
  $input['single_blog_content_font_size_mobile'] = wp_filter_nohtml_kses( $input['single_blog_content_font_size_mobile'] );

  // $input['single_blog_show_category'] = ! empty( $input['single_blog_show_category'] ) ? 1 : 0;
  $input['single_blog_show_meta_tag'] = ! empty( $input['single_blog_show_meta_tag'] ) ? 1 : 0;
  $input['single_blog_show_date'] = ! empty( $input['single_blog_show_date'] ) ? 1 : 0;
	$input['single_blog_show_update'] = ! empty( $input['single_blog_show_update'] ) ? 1 : 0;
  $input['single_blog_show_sns_top'] = ! empty( $input['single_blog_show_sns_top'] ) ? 1 : 0;
  $input['single_blog_show_sns_btm'] = ! empty( $input['single_blog_show_sns_btm'] ) ? 1 : 0;
  $input['single_blog_show_copy_btm'] = ! empty( $input['single_blog_show_copy_btm'] ) ? 1 : 0;
  $input['single_blog_show_comment'] = ! empty( $input['single_blog_show_comment'] ) ? 1 : 0;
  $input['single_blog_show_trackback'] = ! empty( $input['single_blog_show_trackback'] ) ? 1 : 0;

	return $input;

};


?>