<?php

//ヘッダーロゴ　---------------------------------------------------------------------------------------------
function header_logo(){

  $options = get_design_plus_option();

  $pc_image_width = '';
  $pc_image_height = '';

  $logo_image = wp_get_attachment_image_src( $options['header_logo_image'], 'full' );
  if($logo_image) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if($options['header_logo_retina'] == 1) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $logo_image_mobile = wp_get_attachment_image_src( $options['header_logo_image_mobile'], 'full' );
  if($logo_image_mobile) {
    $mobile_image_width = $logo_image_mobile[1];
    $mobile_image_height = $logo_image_mobile[2];
    if($options['header_logo_retina_mobile'] == 1) {
      $mobile_image_width = round($mobile_image_width / 2);
      $mobile_image_height = round($mobile_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
  $url = home_url();

?>
<?php if( !is_front_page() ) { ?>
<p class="logo">
<?php } else { ?>
<h1 class="logo">
<?php }; ?>
 <a href="<?php echo esc_url($url); ?>/" title="<?php echo esc_attr($title); ?>">
  <?php if( ($options['header_logo_type'] == 'type2') && $logo_image ){ ?>
  <img class="pc_logo_image" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
  <?php } else { ?>
  <span class="pc_logo_text" style="font-size:<?php echo esc_html($options['header_logo_font_size']); ?>px;"><?php echo esc_html($title); ?></span>
  <?php }; ?>
  <?php if( ($options['header_logo_type_mobile'] == 'type2') && $logo_image_mobile ){ ?>
  <img class="mobile_logo_image <?php if($logo_image_mobile){ echo 'type1'; }; ?>" src="<?php echo esc_attr($logo_image_mobile[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($mobile_image_width); ?>" height="<?php echo esc_attr($mobile_image_height); ?>" />
  <?php } else { ?>
  <span class="mobile_logo_text" style="font-size:<?php echo esc_html($options['header_logo_font_size_mobile']); ?>px;"><?php echo esc_html($title); ?></span>
  <?php }; ?>
 </a>
<?php if( !is_front_page() ) { ?>
</p>
<?php } else { ?>
</h1>
<?php }; ?>

<?php
}


//フッターロゴ　---------------------------------------------------------------------------------------------
function footer_logo(){

  $options = get_design_plus_option();

  $pc_image_width = '';
  $pc_image_height = '';

  $logo_image = wp_get_attachment_image_src( $options['footer_logo_image'], 'full' );
  if($logo_image) {
    $pc_image_width = $logo_image[1];
    $pc_image_height = $logo_image[2];
    if($options['footer_logo_retina'] == 1) {
      $pc_image_width = round($pc_image_width / 2);
      $pc_image_height = round($pc_image_height / 2);
    };
  };

  $title = get_bloginfo('name');
  $url = home_url();

?>

<h2 class="logo">
 <a href="<?php echo esc_url($url); ?>/" title="<?php echo esc_attr($title); ?>">
  <?php if( ($options['footer_logo_type'] == 'type2') && $logo_image ){ ?>
  <img class="pc_logo_image" src="<?php echo esc_attr($logo_image[0]); ?>?<?php echo esc_attr(time()); ?>" alt="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" width="<?php echo esc_attr($pc_image_width); ?>" height="<?php echo esc_attr($pc_image_height); ?>" />
  <?php } else { ?>
  <span class="pc_logo_text" style="font-size:<?php echo esc_html($options['footer_logo_font_size']); ?>px;"><?php echo esc_html($title); ?></span>
  <?php }; ?>
 </a>
</h2>

<?php
}

?>
