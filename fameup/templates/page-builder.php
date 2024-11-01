<?php
/**
 * Template Name: Page Builder Template
 *
 * Displays the Page Builder Template provided via the theme.
 * Suitable for page builder plugins
 *
 */
get_header(); ?>
<main id="content">
	<div id="content" class="pagebuilder-content clearfix">
		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile;
		fameup_edit_link();
		?>

	</div><!-- #content -->
</main><!-- #primary -->
<?php get_footer(); ?>
