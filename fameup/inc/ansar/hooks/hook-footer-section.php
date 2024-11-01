<?php
if (!function_exists('fameup_footer_social_section')) :
/**
 *  Footer
 *
 * @since Fameup Social Icon
 *
 */
function fameup_footer_social_section() { 

$footer_social_icon_enable = get_theme_mod('footer_social_icon_enable','1');
  if($footer_social_icon_enable == 1) {
    $fameup_footer_fb_link = get_theme_mod('fameup_footer_fb_link');
    $fameup_footer_fb_target = esc_attr(get_theme_mod('fameup_footer_fb_target','true'));
    $fameup_footer_twt_link = get_theme_mod('fameup_footer_twt_link');
    $fameup_footer_twt_target = esc_attr(get_theme_mod('fameup_footer_twt_target','true'));
    $fameup_footer_lnkd_link = get_theme_mod('fameup_footer_lnkd_link');
    $fameup_footer_lnkd_target = esc_attr(get_theme_mod('fameup_footer_lnkd_target','true'));
    $fameup_footer_insta_link = get_theme_mod('fameup_footer_insta_link');
    $fameup_footer_insta_target = esc_attr(get_theme_mod('fameup_footer_insta_target','true'));
    $fameup_footer_youtube_link = get_theme_mod('fameup_footer_youtube_link');
    $fameup_footer_youtube_target = esc_attr(get_theme_mod('fameup_footer_youtube_target','true'));
    $fameup_footer_pinterest_link = get_theme_mod('fameup_footer_pinterest_link');
    $fameup_footer_pinterest_target = esc_attr(get_theme_mod('fameup_footer_pinterest_target','true'));
    $fameup_footer_telegram_link = get_theme_mod('fameup_footer_tele_link');
    $fameup_footer_telegram_target = esc_attr(get_theme_mod('fameup_footer_tele_target','true'));
    ?>
    <ul class="bs-social">
      <?php if($fameup_footer_fb_link !=''){ ?>
      <li> <a href="<?php echo esc_url($fameup_footer_fb_link); ?>" <?php if($fameup_footer_fb_target) { ?> target="_blank" <?php } ?>><i class="fab fa-facebook"></i>
      </a></li>
      <?php }
      if($fameup_footer_twt_link !=''){ ?>
      <li><a <?php if($fameup_footer_twt_target) { ?>target="_blank" <?php } ?>href="<?php echo esc_url($fameup_footer_twt_link);?>"><i class="fa-brands fa-x-twitter"></i></a>
      </li>
      <?php }
      if($fameup_footer_lnkd_link !=''){ ?>
      <li><a <?php if($fameup_footer_lnkd_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($fameup_footer_lnkd_link); ?>">
      <i class="fab fa-linkedin"></i></a></li>
      <?php }
      if($fameup_footer_insta_link !=''){ ?>
      <li><a <?php if($fameup_footer_insta_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($fameup_footer_insta_link); ?>"><i class="fab fa-instagram"></i>
      </a></li>
      <?php }
      if($fameup_footer_youtube_link !=''){ ?>
      <li><a <?php if($fameup_footer_youtube_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($fameup_footer_youtube_link); ?>">
      <i class="fab fa-youtube"></i></a></li>
      <?php }
      if($fameup_footer_pinterest_link !=''){ ?>
      <li><a <?php if($fameup_footer_pinterest_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($fameup_footer_pinterest_link); ?>">
      <i class="fab fa-pinterest-p"></i></a></li>
      <?php }
      if($fameup_footer_telegram_link !=''){ ?>
      <li><a <?php if($fameup_footer_telegram_target) { ?>target="_blank" <?php } ?> href="<?php echo esc_url($fameup_footer_telegram_link); ?>">
      <i class="fab fa-telegram"></i></a></li>
      <?php } ?>
    </ul> 
  <?php }
}
endif;
add_action('fameup_action_footer_social_section', 'fameup_footer_social_section', 2);

if (!function_exists('fameup_footer_logo_section')) :
  /**
   *  Footer
   *
   * @since Fameup Logo
   *
   */
  function fameup_footer_logo_section() { ?>
   <div class="footer-logo text-center">
      <?php the_custom_logo(); ?>
      <div class="site-branding-text">
        <p class="site-title-footer"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
        <p class="site-description-footer"><?php bloginfo('description'); ?></p>
      </div>
    </div>
  <?php }
endif;
add_action('fameup_action_footer_logo_section', 'fameup_footer_logo_section', 2);


if (!function_exists('fameup_footer_copyright_section')) :
  /**
   *  Footer
   *
   * @since Fameup Copyright
   *
   */
  function fameup_footer_copyright_section() { ?>
    <p>
      <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fameup' ) ); ?>">
        <?php printf( esc_html__( 'Proudly powered by %s', 'fameup' ), 'WordPress' ); ?>
      </a>
      <span class="sep"> | </span>
      <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'fameup' ), 'Fameup', '<a href="' . esc_url( __( 'https://themeansar.com/', 'fameup' ) ) . '" rel="designer">Themeansar</a>' ); ?>
    </p>
  <?php }
endif;
add_action('fameup_action_footer_copyright_section', 'fameup_footer_copyright_section', 2);

if (!function_exists('fameup_footer_widgets_area')) :
  /**
   *  Footer
   *
   * @since Fameup Widgets Area
   *
   */
  function fameup_footer_widgets_area() { 
    if ( is_active_sidebar( 'footer_widget_area' ) ) { ?>
    <div class="bs-footer-widget-area">
      <div class="container">
        <div class="row">
          <?php  dynamic_sidebar( 'footer_widget_area' ); ?>
        </div>
        <!--/row-->
      </div>
      <!--/container-->
    </div>
    <?php }
  }
endif;
add_action('fameup_action_footer_widgets_area', 'fameup_footer_widgets_area', 2);

if (!function_exists('fameup_footer_default')) :
  /**
   *  Footer
   *
   * @since Fameup Widgets Area
   *
   */
  function fameup_footer_default() { ?>
    <div class="bs-footer-widget-area">
      <div class="container">
        <div class="row">
            <!--col-md-3-->  
            <?php do_action('fameup_action_footer_logo_section'); ?>
          <div class="col-md-12 text-center">
            <?php do_action('fameup_action_footer_social_section'); ?>   
          </div>
        <!--/col-md-3-->
          </div>
          <!--/row-->
      </div>
      <!--/container-->
    </div>
    <!--End bs-footer-widget-area-->
    <div class="bs-footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                  <?php do_action('fameup_action_footer_copyright_section'); ?>
                </div>
            </div>
        </div>
    </div> 
  <?php 
  }
endif;
add_action('fameup_action_footer_default', 'fameup_footer_default', 2);

if (!function_exists('fameup_footer_insta')) :
  /**
   *  Footer
   *
   * @since Fameup Footer insta
   *
   */
  function fameup_footer_insta() { ?>
    <div class="bs-footer-copyright">
      <div class="container">
        <div class="row d-flex-space">
          <div class="col-md-4 footer-inner"> 
            <div class="copyright ">
              <?php do_action('fameup_action_footer_copyright_section'); ?>
            </div>  
          </div>
          <div class="col-md-4">
            <?php do_action('fameup_action_footer_logo_section'); ?>
          </div>
          <div class="col-md-4 text-end">
            <?php do_action('fameup_action_footer_social_section'); ?>   
          </div>
        </div>
      </div>
    </div>
  <?php 
  }
endif;
add_action('fameup_action_footer_insta', 'fameup_footer_insta', 2);

if (!function_exists('fameup_footer_layout')) :
  /**
   *  Footer
   *
   * @since Fameup Footer insta
   *
   */
  function fameup_footer_layout() { 
    $fameup_footer_layout = get_theme_mod('fameup_footer_layout','footer-default');
    
    if($fameup_footer_layout == 'footer-default'){ 
      do_action('fameup_action_footer_default'); 
    } elseif( $fameup_footer_layout == 'footer-insta') {  
      do_action('fameup_action_footer_insta'); 
    }
  }
endif;
add_action('fameup_action_footer_layout', 'fameup_footer_layout', 2);