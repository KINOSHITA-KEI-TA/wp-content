<?php
    global $post;
    $options = get_design_plus_option();

    $sidebar = '';

    if ( is_single() ) {
      $sidebar = 'single_widget';
    } elseif ( is_archive() ) {
      $sidebar = 'archive_widget';
    } else {
      $sidebar = 'front_widget';
    }

    if ( is_mobile() ) {
      $sidebar .= '_mobile';
    }

    if ( is_active_sidebar( $sidebar ) || is_active_sidebar( 'common_widget' )) {
?>
<div id="side_col">
  <div class="side_col_inner">
  <?php if ( is_active_sidebar( $sidebar ) ) { dynamic_sidebar( $sidebar ); } elseif(is_active_sidebar( 'common_widget' )) { dynamic_sidebar( 'common_widget' ); }; ?>
  </div>
</div>
<?php } ?>