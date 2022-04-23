<?php $options = get_design_plus_option(); ?>

  <footer id="footer">
    <div id="footer_inner">
    <?php
            // footer widget --------------------------------------------
        if ( is_mobile() && is_active_sidebar('footer_widget_mobile') ) {
    ?>
      <div id="footer_widget">
        <div id="footer_widget_inner" class="clearfix">
        <?php dynamic_sidebar('footer_widget_mobile'); ?>
        </div>
      </div>
    <?php } elseif(is_active_sidebar('footer_widget')) { ?>
      <div id="footer_widget">
        <div id="footer_widget_inner" class="clearfix">
        <?php dynamic_sidebar('footer_widget'); ?>
        </div>
      </div>
    <?php } // END footer widget ?>

      <div id="footer_info">
        <div class="footer_info_inner">
          <div id="footer_logo_area">
            <?php footer_logo(); ?>
          </div>
          <?php

              // footer menu --------------------------------------------

              if (has_nav_menu('footer-menu-left') || has_nav_menu('footer-menu-right')) { 
          ?>
          <div id="footer_menu" class="clearfix">
            <?php if (has_nav_menu('footer-menu-left')) { ?>
            <div class="footer_menu_wrap">
            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu-left' , 'container' => '' , 'depth' => '1') ); ?>
            </div>
            <?php };
          
                if (has_nav_menu('footer-menu-right')) { 
            ?>
            <div class="footer_menu_wrap">
            <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'footer-menu-right' , 'container' => '' , 'depth' => '1') ); ?>
            </div>
            <?php }; ?>
          </div>
          <?php }; 

          // footer sns ------------------------------------
          if($options['show_footer_sns']) {
            $facebook = $options['header_facebook_url'];
            $twitter = $options['header_twitter_url'];
            $insta = $options['header_instagram_url'];
            $tiktok = $options['header_tiktok_url'];
            // $contact = $options['header_contact_url'];
            // $show_rss = $options['header_show_rss'];
          ?>
          <ul id="footer_sns" class="footer_sns <?php echo esc_attr($options['footer_sns_color_type']); ?> clearfix">
            <?php if($facebook) { ?><li class="facebook"><a href="<?php echo esc_url($facebook); ?>" rel="nofollow" target="_blank" title="Facebook"><span>Facebook</span></a></li><?php }; ?>
            <?php if($twitter) { ?><li class="twitter"><a href="<?php echo esc_url($twitter); ?>" rel="nofollow" target="_blank" title="Twitter"><span>Twitter</span></a></li><?php }; ?>
            <?php if($insta) { ?><li class="insta"><a href="<?php echo esc_url($insta); ?>" rel="nofollow" target="_blank" title="Instagram"><span>Instagram</span></a></li><?php }; ?>
            <?php if($tiktok) { ?><li class="tiktok"><a href="<?php echo esc_url($tiktok); ?>" rel="nofollow" target="_blank" title="TicTok"><span>TickTok</span></a></li><?php }; ?>
            <!-- <?php //if($contact) { ?><li class="contact"><a href="<?php //echo esc_url($contact); ?>" rel="nofollow" target="_blank" title="Contact"><span>Contact</span></a></li><?php //}; ?> -->
            <!-- <?php //if($show_rss) { ?><li class="rss"><a href="<?php //esc_url(bloginfo('rss2_url')); ?>" rel="nofollow" target="_blank" title="RSS"><span>RSS</span></a></li><?php //}; ?> -->
          </ul>
          <?php }; ?>
        </div>
      </div>
    </div><!-- END #footer_inner -->

    <div id="footer_bottom">
      <div id="footer_bottom_inner">

      <?php // copyright -------------------------------------------- ?>
        <p id="copyright">&copy; <?php bloginfo( 'name' ); ?></p>

      </div><!-- END #footer_bottom_inner -->
    </div><!-- END #footer_bottom -->

  </footer>

  <div id="return_top">
    <a href="#body"><span>TOP</span></a>
  </div>

</div><!-- #container -->

<?php // drawer menu -------------------------------------------- 
    if (has_nav_menu('global-menu')) { ?>
<div id="drawer_menu">
  <nav>
    <?php wp_nav_menu( array( 'menu_id' => 'mobile_menu', 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
  </nav>
</div>
<?php }; ?>

<?php
    // share button ----------------------------------------------------------------------
    if ( is_single() && ( $options['single_blog_show_sns_top'] || $options['single_blog_show_sns_btm'] ) ) :
      if ( 'type5' == $options['sns_type_top'] || 'type5' == $options['sns_type_btm'] ) :
        if ( $options['show_twitter_top'] || $options['show_twitter_btm'] ) :
?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<?php
        endif;
        if ( $options['show_fblike_top'] || $options['show_fbshare_top'] || $options['show_fblike_btm'] || $options['show_fbshare_btm'] ) :
?>
<!-- facebook share button code -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php
        endif;
        if ( $options['show_hatena_top'] || $options['show_hatena_btm'] ) :
?>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
<?php
        endif;
        if ( $options['show_pocket_top'] || $options['show_pocket_btm'] ) :
?>
<script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var j=d.createElement("script");j.id=i;j.src="https://widgets.getpocket.com/v1/j/btn.js?v=1";var w=d.getElementById(i);d.body.appendChild(j);}}(document,"pocket-btn-js");</script>
<?php
        endif;
        if ( $options['show_pinterest_top'] || $options['show_pinterest_btm'] ) :
?>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<?php
        endif;
      endif;
    endif;
?>

<?php wp_footer(); ?>
</body>
</html>