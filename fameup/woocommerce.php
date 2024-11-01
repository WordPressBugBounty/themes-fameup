<?php
/**
 * The template for displaying all WooCommerce pages.
 *
 * @package Fameup
 */
get_header(); ?>
<!--==================== Fameup breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>

<div class="col-md-12">
	<?php woocommerce_content(); ?>
</div>
<?php get_footer(); ?>