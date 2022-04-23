<?php $options = get_design_plus_option(); ?>
<!DOCTYPE html>
<html class="pc" <?php language_attributes(); ?>>
<?php if($options['use_ogp']) { ?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php }; ?>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>

<div id="container">

  <header id="header">
  <?php
       // global menu ----------------------------------------------------------------
      if (has_nav_menu('global-menu')) {
  ?>
  <a id="menu_button" href="#"><span></span><span></span><span></span></a>
  <nav id="global_menu">
  <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
  </nav>
  <?php }; ?>
  
    <div id="header_top">
      <div id="header_logo">
      <?php header_logo(); ?>
      </div>

    <?php
        // header banner ------------------------------------------------------------------------------------------------------------------------
        if(!wp_is_mobile()) {
          if( $options['header_ad_code'] || $options['header_ad_image'] ) {
    ?>
      <div id="header_banner" class="header_banner">
      <?php

          if ($options['header_ad_code']) {
            echo $options['header_ad_code'];
          } else {
            $banner_image = wp_get_attachment_image_src( $options['header_ad_image'], 'full' );
      ?>
        <a href="<?php echo esc_url( $options['header_ad_url'] ); ?>" target="_blank" class="header_banner_link">
          <img class="header_banner_image" src="<?php echo esc_attr($banner_image[0]); ?>" alt="" title="" />
        </a>
      <?php }; ?>
      </div><!-- END #header_banner -->
    <?php
          };
        };
    ?>
    </div><!-- END #header_top -->
  </header><!-- END #header -->

  <?php
      //  Header slider -------------------------------------------------------------------------
      if(is_front_page() && $options['show_index_slider']) {

        // Post slider -----------------------------------------------------------------
        if($options['index_slider_type'] == 'type1'){
  ?>
  <div id="header_post_slider" class="index_slider">
  <?php

      $post_num = $options['index_slider_post_num'];
      $post_type = $options['index_slider_post_type'];
      $post_order = $options['index_slider_post_order'];
      $show_date = $options['index_slider_show_date'];
      $show_category = $options['index_slider_show_category'];

      if($post_type == 'recent_post') {
        if($post_order == 'random') {
          $args = array( 'post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => 'rand' );
        } else {
          $args = array( 'post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1 );
        }
      } else {
        $args = array( 'post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'meta_key' => $post_type, 'meta_value' => 'on' );
      }

      $post_list = new wp_query($args);
      if($post_list->have_posts()):
  ?>
    <div class="post_list header_slider">
      <div class="swiper-container" id="index_header_slider"> 
        <div class="swiper-wrapper">
    <?php
        // loop start
        while( $post_list->have_posts() ) : $post_list->the_post();
          if(has_post_thumbnail()) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size5' );            
          } elseif($options['no_image1']) {
            $image = wp_get_attachment_image_src( $options['no_image1'], 'full' );
          } else {
            $image = array();
            $image[0] = esc_url(get_bloginfo('template_url')) . "/img/common/no_image2.gif";
          }
          $category = wp_get_post_terms( $post->ID, 'category' , array( 'orderby' => 'term_order' ));
          if ( $category && ! is_wp_error($category) ) {
            foreach ( $category as $cat ) :
              $cat_name = $cat->name;
              $cat_id = $cat->term_id;
              $cat_url = get_term_link($cat_id,'category');
              break;
            endforeach;
          };
    ?>
      <div class="item swiper-slide">
        <a class="link" href="<?php the_permalink(); ?>">
          <div class="image_wrap">
            <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
          </div>
          <div class="content">
            <div class="content_inner">
              <h4 class="title rich_font"><span><?php the_title_attribute(); ?></span></h4>
              <p class="meta">
                <?php if($show_date) { ?>
                <span class="date<?php if( $show_category ) echo " mr5" ?>"><time class="entry-date updated"><?php the_time('Y.m.d'); ?></time></span>
                <?php }; ?>
                <?php if ( $category && $show_category && ! is_wp_error($category) ) { ?>
                <span class="category cat_id<?php echo esc_attr($cat_id); ?>" data-href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></span>
                <?php }; ?>
              </p>
            </div>
          </div>
          <div class="overlay"></div>
        </a>
      </div><!-- END .swiper-slide -->
    <?php endwhile; wp_reset_query(); // END loop ?>
      </div><!-- END .swiper-wrapper -->
      <div class="swiper-pagination"></div> 
    </div><!-- END .swiper-container -->
  </div><!-- END .post_list -->
    <?php endif; ?>
  </div><!-- END #header_post_slider -->
  <?php

          // Image slider -----------------------------------------------------------------
          } else {
            
  ?>
  <div id="header_slider" class="index_slider">
    <div class="header_slider">
     <div class="swiper-container" id="index_header_slider">  
      
      <div class="swiper-wrapper">
    <?php
        for ( $i = 1; $i <= 3; $i++ ):
          $image_url = $options['index_slider_image_url'.$i];
          $image_id = $options['index_slider_image'.$i];
            if(!empty($image_id)) {
              $image = wp_get_attachment_image_src($image_id, 'full');
    ?>
    <?php if(!empty($image_url)) { $tag = 'a'; }else{ $tag = 'div'; } ?>
      <<?php echo $tag; ?> class="swiper-slide item image_item item<?php echo $i; ?>" <?php if(!empty($image_url)){ ?>href="<?php echo $image_url ?>"<?php } ?>>
        <div class=" image_wrap">
          <div class="bg_image image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
        </div>
        <div class="content">
          <div class="content_inner">
            <?php if(!empty($options['index_slider_catch'.$i])){ ?>
            <h3 class="title rich_font"><?php echo wp_kses_post(nl2br($options['index_slider_catch'.$i])); ?></h3>
            <?php }; ?>
          </div>
        </div>
        <div class="overlay"></div>
      </<?php echo $tag; ?>><!-- END .item -->
    <?php
            };// END if image
        endfor; // END item loop
    ?>
    </div><!-- END swiper-wrapper -->
    <div class="swiper-pagination"></div>
  </div><!-- END swiper-container -->
 </div><!-- END .header_slider -->
</div><!-- END #header_slider -->
  <?php
        }; // END $slider_type
      }; // END front page
  ?>
