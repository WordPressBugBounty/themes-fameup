<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Fameup
 */
get_header(); ?>
<!--==================== Fameup breadcrumb section ====================-->
<?php do_action('fameup_action_archive_page_title');
    $fameup_content_layout = esc_attr(get_theme_mod('fameup_content_layout','align-content-right'));
    if($fameup_content_layout == "align-content-left" || $fameup_content_layout == "grid-left-sidebar") { ?>
        <aside class="col-lg-3 col-md-4 sidebar-left">
            <?php get_sidebar(); ?>
        </aside>
    <?php }
    if($fameup_content_layout == "align-content-right" || $fameup_content_layout == "align-content-left"){ ?>
        <div id="bs-skip" class="col-lg-9 col-md-8 content-right">
            <?php get_template_part('content',''); ?>
        </div>
    <?php } elseif($fameup_content_layout == "full-width-content") { ?>
        <div class="col-md-12">
            <?php get_template_part('content',''); ?>
        </div>
    <?php } if($fameup_content_layout == "grid-left-sidebar" || $fameup_content_layout == "grid-right-sidebar"){ ?>
        <div id="bs-skip" class="col-lg-9 col-md-8 content-right">
            <?php get_template_part('content','grid'); ?>
        </div>
    <?php } elseif($fameup_content_layout == "grid-fullwidth") { ?>
        <div class="col-md-12">
            <?php get_template_part('content','grid'); ?>
        </div>
    <?php } if($fameup_content_layout == "align-content-right" || $fameup_content_layout == "grid-right-sidebar") { ?>
        <aside class="col-lg-3 col-md-4 sidebar-right">
            <?php get_sidebar();?>
        </aside>
    <?php }
get_footer();