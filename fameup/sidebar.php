<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Fameup
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
$sidebar_sticky = get_theme_mod('sidebar_settings_enable', true);
?>

	<div id="sidebar-right" class="bs-sidebar <?php if($sidebar_sticky == true) { ?> sidebar-sticky <?php } ?>">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
