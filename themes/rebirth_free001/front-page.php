<?php
    $options = get_design_plus_option();
    get_header();

    $show_left_post_list = $options['show_index_left_post_list'];
    $show_right_post_list = $options['show_index_right_post_list'];
    $show_bottom_post_list = $options['show_index_bottom_post_list'];

    
?>


<div id="main_contents" class="layout_<?php echo esc_attr($options['index_sidebar']); ?>">
  <div id="main_col" class="no_title">
    <div class="main_col_inner" <?php if(!$options['show_index_slider']){ echo "style='border:solid 1px #ddd;'"; } ?>>
      <div id="index_post_list">
      <?php

        if(is_mobile()){ // Number of articles
          $post_num = 3; // sp
        } else {
          $post_num = 5; // pc
        }
        
        for($i = 1; $i <= 3; $i++): // index_post_list_wrap

        if($i == 1) { 
          if($show_left_post_list) {
          $args = array( 'post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, );
          $post_title = wp_kses_post(nl2br($options['index_left_post_list_headline']));
          } else { continue; }

        } elseif($i == 2) {

          if($show_right_post_list) {
          $args = array( 'post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'meta_key' => 'recommend_post', 'meta_value' => 'on' );
          $post_title = wp_kses_post(nl2br($options['index_right_post_list_headline']));
          } else { continue; }

        } elseif($i == 3) {

          if($show_bottom_post_list) {
          $args = array( 'post_type' => 'post', 'posts_per_page' => 5, 'ignore_sticky_posts' => 1, 'meta_key' => 'recommend_post2', 'meta_value' => 'on' );
          $post_title = wp_kses_post(nl2br($options['index_bottom_post_list_headline']));
          } else { continue; }

        }

      ?>
        <div class="index_post_list_wrap<?php if( $i == 3 && $show_left_post_list && $show_right_post_list ) echo ' bottom'; ?>">
          <div class="post_list_title">
            <h3 class="design_headline1 rich_font"><?php echo $post_title; ?></h3>
          </div>
          <?php

            $query = new WP_Query( $args );
            if ( $query->have_posts() ):
          
          ?>
          <div class="post_list">
          <?php
          
            $count = 0;
            while( $query->have_posts() ) : $query->the_post(); $count++; // loop start
            if(has_post_thumbnail()) {
              if($count <= 1) { 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size3' ); 
              } else { 
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size1' ); }
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
            <article class="<?php if($count <= 1) echo 'large_' ?>item">
              <a class="link animate_background clearfix" href="<?php the_permalink(); ?>">
                <div class="image_outer">
                <div class="image_wrap">
                  <div class="image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
                </div>
                </div>
                <div class="title_area">
                  <p class="meta">
                  <?php if($options['index_post_list_show_date']) { ?>
                  <span class="date"><time class="entry-date updated"><?php the_time('Y.m.d'); ?></time></span><?php }; ?>
                  <?php if ( $category && $options['index_post_list_show_category'] && ! is_wp_error($category) ) { ?>
                  <span class="category cat_id<?php echo esc_attr($cat_id); ?>" data-href="<?php echo esc_url($cat_url); ?>"><?php echo esc_html($cat_name); ?></span>
                  <?php }; ?>
                  </p> 
                  <h4 class="title rich_font"><span><?php the_title_attribute(); ?></span></h4>
                  <?php if($count <= 1){ ?><p class="desc"><span><?php echo trim_excerpt(100); ?></span></p><?php }; ?>
                </div>
              </a>
            </article>
          <?php endwhile; wp_reset_postdata(); // END loop ?>
          </div><!-- END .post_list -->
          <?php 
            else: // if no post            
          ?>
          <div class="no_post">
            <p><?php _e("There is no registered post.","tcd-w"); ?></p>
          </div>
          <?php endif; ?>
        </div><!-- END .index_post_list_wrap -->
        <?php endfor; ?>
      </div><!-- END #index_post_list -->
    </div>
  </div><!-- END #main_col -->
  <?php
      // widget ------------------------
      get_sidebar();
  ?>
</div><!-- END #main_contents -->
<?php get_footer(); ?>