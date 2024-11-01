<?php
/**
 * The template for displaying search results pages.
 *
 * @package Fameup
 */

get_header(); ?>
<!--==================== Fameup breadcrumb section ====================-->
<?php get_template_part('index','banner'); ?>
<!--==================== main content section ====================-->
    <div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar-1' ) ? '12' :'9' ); ?>">
        <h2><?php /* translators: %s: search term */ printf( esc_html__( 'Search Results for: %s','fameup'), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( have_posts() ) { /* Start the Loop */
            while ( have_posts() ) { the_post(); ?>
            <!-- bs-posts-sec bs-posts-modul-6 -->
            <div class="bs-posts-sec bs-posts-modul-6 bs-blog-post list-blog d-block"> 
            <article class="d-md-flex bs-posts-sec-post">
            <?php fameup_post_image_display_type($post); ?>
                    <div class="bs-sec-top-post p-3 col">
                            <div class="bs-blog-category"> 
                                <?php fameup_post_categories(); ?>
                            </div>
                            <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                            <?php fameup_post_meta(); ?>
                            <div class="bs-content">
                                <p><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
                        </div>
                    </div>
            </article>
            </div>
            <!-- // bs-posts-sec block_6 -->
            <?php } 
                fameup_page_pagination();
            } else { ?> 
    
            <!-- bs-posts-sec bs-posts-modul-6 -->
            <div class="bs-posts-sec bs-posts-modul-6 bs-blog-post list-blog">     
                <div class="bs-posts-sec-inner">                      
                <h2><?php esc_html_e( "Nothing Found", 'fameup' ); ?></h2>
                <div class="">
                <p><?php esc_html_e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'fameup' ); ?>
                </p>
                <?php get_search_form(); ?>
                </div>
                </div>
            <!-- // bs-posts-sec block_6 -->
            </div><!-- .blog_con_mn -->
            <?php } ?> 
        <!--col-md-12-->
        </div>
    </div>
    <aside class="col-md-3">
        <?php get_sidebar();?>
    </aside>
<?php
get_footer();
?>