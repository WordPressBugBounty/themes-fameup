<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Fameup
 */
get_header(); 
?>
<!--==================== Fameup breadcrumb section ====================-->
<?php do_action('fameup_action_archive_page_title'); ?>
<!--==================== main content section ====================-->
	<!-- Blog Area -->
	<?php if( class_exists('woocommerce') && (is_account_page() || is_cart() || is_checkout())) { ?>
		<div class="col-md-12">
			<div class="bs-card-box padding-20">
			<?php if (have_posts()) {  while (have_posts()) : the_post(); the_content(); endwhile; } 
	} else {  $fameup_page_layout = get_theme_mod('fameup_page_layout','page-align-content-right');

			if($fameup_page_layout == "page-align-content-left") { ?>
				<aside class="col-md-3">
					<?php get_sidebar();?>
				</aside>
			<?php }  ?>

			<div class="<?php echo esc_attr($fameup_page_layout == "page-full-width-content" ? 'col-md-12' : 'col-md-9') ?>">
				<div class="bs-card-box padding-20">
					<?php if( have_posts()) :  the_post(); ?>
					<?php the_post_thumbnail( '', array( 'class'=>'attachment-full size-full' ) );
					 	the_content(); ?>
					<?php endif; 
						while ( have_posts() ) : the_post();
							// Include the page
							the_content();
							comments_template( '', true ); // show comments
						endwhile;
						fameup_edit_link();
					?>	
				</div>
			</div>

			<!--Sidebar Area-->
			<?php if($fameup_page_layout == "page-align-content-right") { ?>
				<!--sidebar-->
					<!--col-md-4-->
						<aside class="col-md-3">
							<?php get_sidebar();?>
						</aside>
					<!--/col-md-4-->
				<!--/sidebar-->
      		<?php } ?>
			<!--Sidebar Area-->
	<?php } ?>
</div>
<?php
get_footer();