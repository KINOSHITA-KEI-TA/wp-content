<?php
     function tcd_head() {
       $options = get_design_plus_option();
?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/design-plus.css?ver=<?php echo version_num(); ?>">
<link rel="stylesheet" media="screen and (max-width:1050px)" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css?ver=<?php echo version_num(); ?>">
<?php if(is_single()) { ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sns-botton.css?ver=<?php echo version_num(); ?>">
<script src="<?php echo get_template_directory_uri(); ?>/js/comment.js?ver=<?php echo version_num(); ?>"></script>
<?php } ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.4.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jscript.js?ver=<?php echo version_num(); ?>"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.min.js?ver=<?php echo version_num(); ?>"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/js/simplebar.css?ver=<?php echo version_num(); ?>">
<script src="<?php echo get_template_directory_uri(); ?>/js/simplebar.min.js?ver=<?php echo version_num(); ?>"></script>
<?php 

/* URLやモバイル等でcssが変わらないものをここで出力 */ 
?>
<style type="text/css">
<?php

/* ----------------------------------------------------------------------
 色の設定 メインカラー、サブカラー等
---------------------------------------------------------------------- */

     // メインカラー #333 ----------------------------------
     $main_color = $options['main_color'];

?>
#footer, #side_col, #global_menu, #global_menu ul ul a, #return_top,
.post_list_title h3,
#bread_crumb, .article_top, #related_post h3, #comments h3,
.page_navi span.current,.page_navi a:hover
 { background-color:<?php echo esc_html($main_color); ?>; }

.category_list_widget li a, 
#side_col .styled_post_list1_widget li a,
.tcdw_archive_list_widget .no_dropdown__list li a,
#footer_widget .widget_headline,
#return_top a, .article_top .title, #bread_crumb ul
  { background-color:rgba(255,255,255,0.2); }
#footer_bottom { border-color: rgba(255,255,255,0.2); }
#global_menu > ul > li:first-of-type a, #global_menu > ul > li > a
{ border-color: rgb(255 255 255 / 30%); }

.page_navi span.current, .page_navi a:hover
  { border-color:<?php echo esc_html($main_color); ?>; }
<?php

     // ホバーカラー #999 ----------------------------------
     $sub_color = $options['sub_color'];
?>

.widget_content a:hover, #global_menu > ul > li.current-menu-item > a,
#global_menu > ul > li > a:hover, #global_menu ul ul a:hover,
.category:hover, #header_post_slider .category:hover, .post_tag a:hover,
#footer a:hover, .blog_list .link:hover .desc, .blog_list .title_link:hover,
#related_post a:hover, #next_prev_post a:hover
  { color:<?php echo esc_html($sub_color); ?>; }  
<?php

     // 詳細ページのテキストカラー ----------------------------------
     $content_link_color = $options['content_link_color'];
     $content_link_hover_color = $options['content_link_hover_color'];
?>
.post_content a, .custom-html-widget a { color:<?php echo esc_html($content_link_color); ?>; }
.post_content a:hover, .custom-html-widget a:hover { color:<?php echo esc_html($content_link_hover_color); ?>; }
<?php

     // ページヘッダーの背景色 ----------------------------------
     $index_slider_bg_color = $options['index_slider_bg_color'];
?>
#container:before { background-color:<?php echo esc_html($index_slider_bg_color); ?>;}
<?php

/* ----------------------------------------------------------------------
 フォントタイプ
---------------------------------------------------------------------- */

     // 基本のフォントタイプ
     if($options['font_type'] == 'type1') {
?>
body, input, textarea { font-family: Arial, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ ProN W3", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['font_type'] == 'type2') { ?>
body, input, textarea { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; }
<?php } else { ?>
body, input, textarea { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php }; 

     // 見出しのフォントタイプ
     if($options['headline_font_type'] == 'type1') {
?>
.rich_font, .p-vertical { font-family: Arial, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ ProN W3", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['headline_font_type'] == 'type2') { ?>
.rich_font, .p-vertical { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; font-weight:500; }
<?php } else { ?>
.rich_font, .p-vertical { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; font-weight:500; }
<?php };

     // ウィジェットのフォントタイプ
     if($options['widget_headline_font_type'] == 'type1') {
?>
.widget_headline, .widget_tab_post_list_button a, .search_box_headline { font-family: Arial, "Hiragino Kaku Gothic ProN", "ヒラギノ角ゴ ProN W3", "メイリオ", Meiryo, sans-serif; }
<?php } elseif($options['widget_headline_font_type'] == 'type2') { ?>
.widget_headline, .widget_tab_post_list_button a, .search_box_headline { font-family: Arial, "Hiragino Sans", "ヒラギノ角ゴ ProN", "Hiragino Kaku Gothic ProN", "游ゴシック", YuGothic, "メイリオ", Meiryo, sans-serif; }
<?php } else { ?>
.widget_headline, .widget_tab_post_list_button a, .search_box_headline { font-family: "Times New Roman" , "游明朝" , "Yu Mincho" , "游明朝体" , "YuMincho" , "ヒラギノ明朝 Pro W3" , "Hiragino Mincho Pro" , "HiraMinProN-W3" , "HGS明朝E" , "ＭＳ Ｐ明朝" , "MS PMincho" , serif; }
<?php }; 

/* ----------------------------------------------------------------------
 サムネイルのホバーエフェクト
---------------------------------------------------------------------- */

     // サムネイルのアニメーション設定　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■
     if($options['hover_type']!="type4"){

       // ズーム ------------------------------------------------------------------------------
       if($options['hover_type']=="type1"){
?>
.author_profile .avatar_area img, .animate_image img, .animate_background .image {
  width:100%; /*height:auto;*/ height:100%;
  -webkit-transition: transform  0.75s ease;
  transition: transform  0.75s ease;
}
.author_profile a.avatar:hover img, .animate_image:hover img, .animate_background:hover .image {
  -webkit-transform: scale(<?php echo $options['hover1_zoom']; ?>);
  transform: scale(<?php echo $options['hover1_zoom']; ?>);
}
<?php

     // スライド ------------------------------------------------------------------------------
     } elseif($options['hover_type']=="type2"){
?>
.animate_image, .animate_background .image_wrap {
  background: <?php echo $options['hover2_bgcolor']; ?>;
}
.animate_image img, .animate_background .image {
  -webkit-width:calc(100% + 30px) !important; width:calc(100% + 30px) !important; height:100%; /*max-width:inherit !important;*/ position:relative;
  <?php if($options['hover2_direct']=='type1'): ?>
  -webkit-transform: translate(-15px, 0px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, 0px); transition-property: opacity, translateX; transition: 0.5s;
  <?php else: ?>
  -webkit-transform: translate(-15px, 0px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, 0px); transition-property: opacity, translateX; transition: 0.5s;
  <?php endif; ?>
}
.animate_image:hover img, .animate_background:hover .image {
  opacity:<?php echo $options['hover2_opacity']; ?>;
  <?php if($options['hover2_direct']=='type1'): ?>
  -webkit-transform: translate(0px, 0px);
  transform: translate(0px, 0px);
  <?php else: ?>
  -webkit-transform: translate(-30px, 0px);
  transform: translate(-30px, 0px);
  <?php endif; ?>
}
.animate_image.square img {
  -webkit-width:calc(100% + 30px) !important; width:calc(100% + 30px) !important; height:auto; max-width:inherit !important; position:relative;
  <?php if($options['hover2_direct']=='type1'): ?>
  -webkit-transform: translate(-15px, -15px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, -15px); transition-property: opacity, translateX; transition: 0.5s;
  <?php else: ?>
  -webkit-transform: translate(-15px, -15px); -webkit-transition-property: opacity, translateX; -webkit-transition: 0.5s;
  transform: translate(-15px, -15px); transition-property: opacity, translateX; transition: 0.5s;
  <?php endif; ?>
}
.animate_image.square:hover img {
  opacity:<?php echo $options['hover2_opacity']; ?>;
  <?php if($options['hover2_direct']=='type1'): ?>
  -webkit-transform: translate(0px, -15px);
  transform: translate(0px, -15px);
  <?php else: ?>
  -webkit-transform: translate(-30px, -15px);
  transform: translate(-30px, -15px);
  <?php endif; ?>
}
<?php

     // フェードアウト ------------------------------------------------------------------------------
     } elseif($options['hover_type']=="type3"){
?>
.author_profile .avatar_area, .animate_image, .animate_background .image_wrap {
  background: <?php echo $options['hover3_bgcolor']; ?>;
}
.author_profile a.avatar img, .animate_image img, .animate_background .image {
  -webkit-transition-property: opacity; -webkit-transition: 0.5s;
  transition-property: opacity; transition: 0.5s;
}
.author_profile a.avatar:hover img, .animate_image:hover img, .animate_background:hover .image {
  opacity: <?php echo $options['hover3_opacity']; ?>;
}
<?php }; }; // アニメーションここまで 


/* ----------------------------------------------------------------------
 トップページ
---------------------------------------------------------------------- */

  // トップページ 記事スライダーの文字サイズ
  if(is_front_page()) {
    if( ($options['show_index_slider']) ){

?>
.index_slider .title { font-size:<?php echo esc_attr($options['index_slider_title_font_size']); ?>px; }
@media screen and (max-width:750px) { .index_slider .title { font-size:<?php echo esc_attr($options['index_slider_title_font_size_mobile']); ?>px; } }
<?php
     };
     // オーバーレイ
     if($options['index_slider_use_overlay']) {
       $overlay_color = hex2rgb($options['index_slider_overlay_color']);
       $overlay_color = implode(",",$overlay_color);
       $overlay_opacity = $options['index_slider_overlay_opacity'];
?>
.index_slider .overlay { background:rgba(<?php echo esc_html($overlay_color); ?>,<?php echo esc_html($overlay_opacity); ?>); }
<?php };

  // トップページ 記事一覧の文字サイズ
  if( ($options['show_index_left_post_list']) || ($options['show_index_right_post_list']) || ($options['show_index_bottom_post_list']) ){

?>
#index_post_list .design_headline1 { font-size:<?php echo esc_attr($options['index_post_list_headline_font_size']); ?>px; }
@media screen and (max-width:750px) { #index_post_list .design_headline1 { font-size:<?php echo esc_attr($options['index_post_list_headline_font_size_mobile']); ?>px; } }
<?php };


/* ----------------------------------------------------------------------
 個別投稿ページ 
---------------------------------------------------------------------- */

  // 個別投稿ページ タイトルと記事本文の文字サイズ
} elseif(is_single() || is_page()){

?>
#post_title .title { font-size:<?php echo esc_attr($options['single_blog_title_font_size']); ?>px;  }
.post_content { font-size:<?php echo esc_attr($options['single_blog_content_font_size']); ?>px; }
@media screen and (max-width:750px) {
  #post_title .title { font-size:<?php echo esc_attr($options['single_blog_title_font_size_mobile']); ?>px; }
  .post_content { font-size:<?php echo esc_attr($options['single_blog_content_font_size_mobile']); ?>px; }
}
<?php };

/* ----------------------------------------------------------------------
 テーマオプションのCSS
---------------------------------------------------------------------- */


     // カスタムCSS --------------------------------------------
     if($options['css_code']) {
       echo wp_kses_post($options['css_code']."\n");
     };

     // クイックタグ --------------------------------------------
     if ( $options['use_quicktags'] ) :

     // 見出し
?>
.styled_h2 {
  font-size:<?php echo esc_attr($options['qt_h2_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h2_text_align']); ?>; color:<?php echo esc_attr($options['qt_h2_font_color']); ?>; <?php if($options['show_qt_h2_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h2_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h2_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h2_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h2_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h2_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h2_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h2_padding_top']); ?>px <?php echo esc_attr($options['qt_h2_padding_right']); ?>px <?php echo esc_attr($options['qt_h2_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h2_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h2_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h2_margin_bottom']); ?>px !important;
}
.styled_h3 {
  font-size:<?php echo esc_attr($options['qt_h3_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h3_text_align']); ?>; color:<?php echo esc_attr($options['qt_h3_font_color']); ?>; <?php if($options['show_qt_h3_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h3_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h3_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h3_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h3_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h3_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h3_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h3_padding_top']); ?>px <?php echo esc_attr($options['qt_h3_padding_right']); ?>px <?php echo esc_attr($options['qt_h3_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h3_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h3_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h3_margin_bottom']); ?>px !important;
}
.styled_h4 {
  font-size:<?php echo esc_attr($options['qt_h4_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h4_text_align']); ?>; color:<?php echo esc_attr($options['qt_h4_font_color']); ?>; <?php if($options['show_qt_h4_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h4_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h4_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h4_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h4_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h4_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h4_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h4_padding_top']); ?>px <?php echo esc_attr($options['qt_h4_padding_right']); ?>px <?php echo esc_attr($options['qt_h4_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h4_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h4_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h4_margin_bottom']); ?>px !important;
}
.styled_h5 {
  font-size:<?php echo esc_attr($options['qt_h5_font_size']); ?>px !important; text-align:<?php echo esc_attr($options['qt_h5_text_align']); ?>; color:<?php echo esc_attr($options['qt_h5_font_color']); ?>; <?php if($options['show_qt_h5_bg_color']) { ?>background:<?php echo esc_attr($options['qt_h5_bg_color']); ?>;<?php }; ?>
  border-top:<?php echo esc_attr($options['qt_h5_border_top_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_top_color']); ?>;
  border-bottom:<?php echo esc_attr($options['qt_h5_border_bottom_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_bottom_color']); ?>;
  border-left:<?php echo esc_attr($options['qt_h5_border_left_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_left_color']); ?>;
  border-right:<?php echo esc_attr($options['qt_h5_border_right_width']); ?>px solid <?php echo esc_attr($options['qt_h5_border_right_color']); ?>;
  padding:<?php echo esc_attr($options['qt_h5_padding_top']); ?>px <?php echo esc_attr($options['qt_h5_padding_right']); ?>px <?php echo esc_attr($options['qt_h5_padding_bottom']); ?>px <?php echo esc_attr($options['qt_h5_padding_left']); ?>px !important;
  margin:<?php echo esc_attr($options['qt_h5_margin_top']); ?>px 0px <?php echo esc_attr($options['qt_h5_margin_bottom']); ?>px !important;
}
<?php
     // ボタン
     for ( $i = 1; $i <= 3; $i++ ) {
       $qt_custom_button_border_color = hex2rgb($options['qt_custom_button_border_color' . $i]);
       $qt_custom_button_border_color = implode(",",$qt_custom_button_border_color);
       $qt_custom_button_border_color_hover = hex2rgb($options['qt_custom_button_border_color_hover' . $i]);
       $qt_custom_button_border_color_hover = implode(",",$qt_custom_button_border_color_hover);
?>
.q_custom_button<?php echo $i; ?> {
  color:<?php echo esc_attr($options['qt_custom_button_font_color' . $i]); ?> !important;
  border-color:rgba(<?php echo esc_attr($qt_custom_button_border_color); ?>,<?php echo esc_attr($options['qt_custom_button_border_color_opacity' . $i]); ?>);
}
.q_custom_button<?php echo $i; ?>.animation_type1 { background:<?php echo esc_attr($options['qt_custom_button_bg_color' . $i]); ?>; }
.q_custom_button<?php echo $i; ?>:hover, .q_custom_button<?php echo $i; ?>:focus {
  color:<?php echo esc_attr($options['qt_custom_button_font_color_hover' . $i]); ?> !important;
  border-color:rgba(<?php echo esc_attr($qt_custom_button_border_color_hover); ?>,<?php echo esc_attr($options['qt_custom_button_border_color_hover_opacity' . $i]); ?>);
}
.q_custom_button<?php echo $i; ?>.animation_type1:hover { background:<?php echo esc_attr($options['qt_custom_button_bg_color_hover' . $i]); ?>; }
.q_custom_button<?php echo $i; ?>:before { background:<?php echo esc_attr($options['qt_custom_button_bg_color_hover' . $i]); ?>; }
<?php }; ?>
<?php
     // 吹き出し
?>
.speech_balloon_left1 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color1'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color1'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color1'] ); ?> }
.speech_balloon_left1 .speach_balloon_text p { color: <?php echo esc_html( $options['qt_speech_balloon_font_color1'] ); ?>; }
.speech_balloon_left1 .speach_balloon_text::before { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_border_color1'] ); ?> }
.speech_balloon_left1 .speach_balloon_text::after { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color1'] ); ?> }
.speech_balloon_left2 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color2'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color2'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color2'] ); ?> }
.speech_balloon_left2 .speach_balloon_text p { color: <?php echo esc_html( $options['qt_speech_balloon_font_color2'] ); ?>; }
.speech_balloon_left2 .speach_balloon_text::before { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_border_color2'] ); ?> }
.speech_balloon_left2 .speach_balloon_text::after { border-right-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color2'] ); ?> }
.speech_balloon_right1 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color3'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color3'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color3'] ); ?> }
.speech_balloon_right1 .speach_balloon_text p { color: <?php echo esc_html( $options['qt_speech_balloon_font_color3'] ); ?>; }
.speech_balloon_right1 .speach_balloon_text::before { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_border_color3'] ); ?> }
.speech_balloon_right1 .speach_balloon_text::after { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color3'] ); ?> }
.speech_balloon_right2 .speach_balloon_text { background-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color4'] ); ?>; border-color: <?php echo esc_html( $options['qt_speech_balloon_border_color4'] ); ?>; color: <?php echo esc_html( $options['qt_speech_balloon_font_color4'] ); ?> }
.speech_balloon_right2 .speach_balloon_text p { color: <?php echo esc_html( $options['qt_speech_balloon_font_color4'] ); ?>; }
.speech_balloon_right2 .speach_balloon_text::before { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_border_color4'] ); ?> }
.speech_balloon_right2 .speach_balloon_text::after { border-left-color: <?php echo esc_html( $options['qt_speech_balloon_bg_color4'] ); ?> }
<?php
     endif;
     // Google map
     $qt_gmap_marker_bg = ($options['qt_gmap_marker_bg_use_main'] != 1) ? $options['qt_gmap_marker_bg'] : $options['main_color'];
?>
.qt_google_map .pb_googlemap_custom-overlay-inner { background:<?php echo esc_attr($qt_gmap_marker_bg); ?>; color:<?php echo esc_attr($options['qt_gmap_marker_color']); ?>; }
.qt_google_map .pb_googlemap_custom-overlay-inner::after { border-color:<?php echo esc_attr($qt_gmap_marker_bg); ?> transparent transparent transparent; }
</style>
<?php 

/* URLやモバイル等でcssが変わるものはここで出力 ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ */ 

?>
<style id="current-page-style" type="text/css">
<?php

     // カスタムCSS --------------------------------------------
     if(is_single() || is_page()) {
       global $post;
       $custom_css = get_post_meta($post->ID, 'custom_css', true);
       if($custom_css) {
         echo $custom_css."\n";
       };
     }

?>
</style>
<?php
     // JavaScriptの設定はここから　■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■

     // トップページ
     if(is_front_page()) {
       
       // swiperの読み込み
       if($options['show_index_slider'] ){
           
           wp_enqueue_style('swiper-style', get_template_directory_uri() . '/js/swiper-bundle.min.css', '', '1.0.0');
           wp_enqueue_script('swiper-script', get_template_directory_uri() . '/js/swiper-bundle.min.js', '', '1.0.0', true);

?>
<script type="text/javascript">
  
document.addEventListener('DOMContentLoaded', function() {
  
  let header_slider;
  let selector = document.getElementById('index_header_slider');
  let options = {
    loop: true,
    speed: 700,
    autoplay: {
      delay: <?php echo absint($options['index_slider_time']); ?>,
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'bullets',
        clickable: 'true'
    },
  }
  header_slider = new Swiper(selector, options);
    
});
</script>
<?php
         }; // END $display_header_content
     }; // END front page

     // カスタムスクリプト--------------------------------------------
     if($options['script_code']) {
       echo $options['script_code']."\n";
     };
     if(is_single() || is_page()) {
       global $post;
       $custom_script = get_post_meta($post->ID, 'custom_script', true);
       if($custom_script) {
         echo $custom_script;
       };
     };// END カスタムスクリプト


     }; // END function tcd_head()
     add_action("wp_head", "tcd_head");
?>