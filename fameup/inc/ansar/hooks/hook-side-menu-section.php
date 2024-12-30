<?php
if (!function_exists('fameup_side_menu_section')) :
/**
 *  Header
 *
 * @since Fameup
 *
 */
function fameup_side_menu_section()
{
  $menu_bar_side =  (is_rtl()) ? "end" : "start";
?>
<div class="sidenav offcanvas offcanvas-<?php echo $menu_bar_side ?>" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel"> </h5>
    <span class="btn_close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fas fa-times"></i></span>
  </div>
  <div class="offcanvas-body">
    <?php if( is_active_sidebar('menu-sidebar-content')){
      get_template_part('sidebar','fameupmenu');
    } else { ?>
      <div class="bs-card-box empty-sidebar">
        <div class="bs-widget-title one">
          <h2 class='title'><?php esc_html_e( 'Menu Sidebar Widget Area', 'fameup' ); ?></h3>
        </div>
        <p class='empty-sidebar-widget-text'>
          <?php esc_html_e( 'This is an example widget to show how the Menu Sidebar Widget Area looks by default. You can add custom widgets from the', 'fameup' ); ?>
          <a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>' title='<?php esc_attr_e('widgets','fameup'); ?>'>
            <?php esc_html_e( 'widgets', 'fameup' ); ?>
          </a>
          <?php esc_html_e( 'in the admin.', 'fameup' ); ?>
        </p>
      </div>
    <?php } ?>
  </div>
</div>
<?php 
} endif;
add_action('fameup_action_side_menu_section', 'fameup_side_menu_section', 5);