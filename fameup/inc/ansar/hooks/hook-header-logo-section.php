<?php
if (!function_exists('fameup_header_logo_section')) :
/**
 *  Header
 *
 * @since Fameup
 *
 */
function fameup_header_logo_section() { ?>
  <!-- Main Menu Area-->
  <?php $background_image = get_theme_support( 'custom-header', 'default-image' );
    $fameup_header_overlay_color = get_theme_mod('fameup_header_overlay_color','rgba(255,255,255,0.73)');
    $remove_header_image_overlay = get_theme_mod('remove_header_image_overlay',false); 
    if( has_header_image() ) { $background_image = get_header_image(); } ?>
    <div class="bs-header-main" style='background-image: url("<?php echo esc_url( $background_image ); ?>" );'>
      <div class="inner" <?php if($remove_header_image_overlay == false) { ?> style="background-color:<?php echo esc_attr($fameup_header_overlay_color);?>;" <?php } ?>>
        <div class="container">
          <div class="row">
            <div class="navbar-header">
              <!-- Display the Custom Logo -->
              <div class="site-logo">
                <?php if(get_theme_mod('custom_logo') !== ""){ the_custom_logo(); } ?>
              </div>
              <div class="site-branding-text <?php echo esc_attr( display_header_text() ? '' : 'd-none'); ?>">
                <?php if (is_front_page() || is_home()) { ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                <?php } else { ?>
                  <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                <?php } ?>
                  <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
              </div>
            </div>
            <?php do_action('fameup_action_banner_advertisement'); ?>
          </div>
        </div>
      </div>
    </div>
  <!-- /Main Menu Area-->
<?php 
}
endif;
add_action('fameup_action_header_logo_section', 'fameup_header_logo_section', 4);