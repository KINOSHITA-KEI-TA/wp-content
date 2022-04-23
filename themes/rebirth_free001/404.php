<?php
     get_header();
     $options = get_design_plus_option();
?>

<div id="main_contents" class="layout_<?php echo esc_attr($options['archive_blog_sidebar']); ?>">

 <div id="main_col" class="archive_page">

  <h1 class="page_404_title title rich_font_<?php echo esc_attr($title_font_type); ?> article_top"><?php _e("404 NOT FOUND","tcd-w"); ?></h1>

  <p class="page_404_desc"><?php _e("The page you are looking for are not found.","tcd-w"); ?></p>

 </div><!-- END #main_col -->

 <?php get_sidebar(); ?>

</div><!-- END #main_contents -->

<?php get_footer(); ?>
