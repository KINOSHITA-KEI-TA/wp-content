<?php
    get_header();
    $options = get_design_plus_option();

    $page_header_title = get_post_meta($post->ID, 'page_header_title', true);
    $page_header_image = get_post_meta($post->ID, 'page_header_image', true);
    $side_content_layout = get_post_meta($post->ID, 'side_content_layout', true) ?  get_post_meta($post->ID, 'side_content_layout', true) : 'type2';
    $page_content_type = get_post_meta($post->ID, 'page_content_type', true) ?  get_post_meta($post->ID, 'page_content_type', true) : 'type1';
    $wide_content = '';
    if( $side_content_layout == 'type1' && $page_content_type == 'type2'){
      $wide_content = ' wide_content';
    }

?>

<div id="main_contents" class="layout_<?php echo esc_attr($side_content_layout); ?><?php echo esc_attr($wide_content); ?>">
  <div id="main_col" class="lower_page<?php if($page_header_title)echo ' no_title'; ?>">
    <div class="article_top">
      <h1 class="title rich_font"><?php the_title(); ?></h1>
    </div>
    <div class="main_col_inner">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

          if(has_post_thumbnail() && !$page_header_image ) {
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'size4' );
      ?>
      <div id="post_image" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;"></div>
      <?php }; ?>

      <article id="article">

      <?php // post content ------------------------------------------------------------------------------------------------------------------------ ?>
      <div class="post_content clearfix">
        <?php
            the_content();
            if ( ! post_password_required() ) {
              $pagenation_type = get_post_meta($post->ID, 'pagenation_type', true);
              if($pagenation_type == 'type3') {
              $pagenation_type = $options['pagenation_type'];
              };
              if ( $pagenation_type == 'type2' ) {
                if ( $page < $numpages && preg_match( '/href="(.*?)"/', _wp_link_page( $page + 1 ), $matches ) ) :
        ?>
        <div id="p_readmore">
          <a class="button" href="<?php echo esc_url( $matches[1] ); ?>#article"><?php _e( 'Read more', 'tcd-w' ); ?></a>
          <p class="num"><?php echo $page . ' / ' . $numpages; ?></p>
        </div>
        <?php
                endif;
              } else {
                custom_wp_link_pages();
            }
          }
      ?>
    </div>
  </article>

  <?php endwhile; endif; ?>

  </div>
</div><!-- END #main_col -->

<?php
    // widget ------------------------
    if($side_content_layout != 'type1'){
        get_sidebar();
    }
?>

</div><!-- END #main_contents -->
<?php get_footer(); ?>