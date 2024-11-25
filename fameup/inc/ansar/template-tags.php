<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Fameup
 */

if (!function_exists('fameup_post_categories')) :
    function fameup_post_categories($separator = '&nbsp')
    {
        if ( 'post' === get_post_type() ) {
            $categories = wp_get_post_categories(get_the_ID());
            if(!empty($categories)){
                ?>
                <div class="bs-blog-category">
                    <?php
                    foreach($categories as $c){
                        $style = '';
                        $cat = get_category( $c );
                        ?>
                        <a href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>" style="<?php echo esc_attr($style);?>">
                            <?php echo esc_html($cat->cat_name);?>
                        </a>
                     <?php } ?>
                 </div>
                <?php
            }
        }
        
    }
endif;


if (!function_exists('fameup_post_item_tag')) :

    function fameup_post_item_tag($view = 'default')
    {
        global $post;

        if ('post' === get_post_type()) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'fameup'));
            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf('<span class="tags-links">' . esc_html('Tags: %1$s') . '</span>', $tags_list);
            }
        }

        if (is_single()) {
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'fameup'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
        }

    }
endif;

if (!function_exists('fameup_post_thumbnail_image')) :

    function fameup_post_thumbnail_image()
    {

    if(has_post_thumbnail()) { ?>
        <div  class="bs-post-thumb">
        <?php echo '<a class="bs-blog-thumb" href="'.esc_url(get_the_permalink()).'">'; the_post_thumbnail( '', array( 'class'=>'img-fluid' ) ); echo fameup_post_format_type($post); ?>
        </div>
    <?php } 
    }
endif;

if ( ! function_exists( 'fameup_date_content' ) ) :
    function fameup_date_content() { ?>
        <span class="bs-blog-date">
            <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>">
                <?php echo esc_html(get_the_date('M j, Y')); ?>
            </a>
        </span>
    <?php }
endif;

if ( ! function_exists( 'fameup_author_content' ) ) :
    function fameup_author_content() { ?>
        <span class="bs-author">
            <a class="auth" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?>
                <?php the_author(); ?>
            </a> 
        </span>
    <?php }
endif;

if ( ! function_exists( 'fameup_post_comment' ) ) :
    function fameup_post_comment() { ?>
        <span class="comments-link"> 
            <a href="<?php the_permalink(); ?>">
                <?php
                if ( get_comments_number() == 0 ) {
                    esc_html_e(  __('No Comments', 'fameup') );
                } else {
                    echo get_comments_number() . ' ';
                    esc_html_e( get_comments_number() == 1 ? __('Comment', 'fameup') : __('Comments', 'fameup') );
                } ?>
            </a> 
        </span>
    <?php }
endif;

if (!function_exists('fameup_post_meta')) :

    function fameup_post_meta() {
        $global_post_date = get_theme_mod('global_post_date_author_setting','show-date-author');
        $fameup_global_comment_enable = get_theme_mod('fameup_global_comment_enable','true'); ?>
        <div class="bs-blog-meta">
        <?php if($global_post_date =='show-date-author') { 
            fameup_author_content();
            fameup_date_content();
        } 
        elseif($global_post_date =='show-date-only') {
            fameup_date_content();
        } 
        elseif($global_post_date =='show-author-only') {
            fameup_author_content();
        } elseif($global_post_date =='hide-date-author') { }
        if($fameup_global_comment_enable == true) { 
            fameup_post_comment();
        } 
        fameup_edit_link(); ?></div>
        <?php
    }
endif;


if (!function_exists('get_archive_title')) :
        
    function get_archive_title($title) {
        
        if (is_category()) {
            $title = single_cat_title('', false);
        } elseif (is_tag()) {
            $title = single_tag_title('', false);
        } elseif (is_author()) {
            $title = get_the_author();
        } elseif (is_year()) {
            $title = get_the_date('Y');
        } elseif (is_month()) {
            $title = get_the_date('F Y');
        } elseif (is_day()) {
            $title = get_the_date('F j, Y');
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title('', false);
        } elseif (is_single()) {
            $title = '';
        } else {
            $title = get_the_title();
        }
        
        return $title;
    }

endif;
add_filter('get_the_archive_title', 'get_archive_title');

if (!function_exists('fameup_archive_page_title')) :
        
    function fameup_archive_page_title($title) { ?>
        <div class="col-12">
            <div class="bs-card-box page-entry-title">
                <?php if(!empty(get_the_archive_title())){ ?>
                <h1 class="entry-title title mb-0"><?php echo get_the_archive_title();?></h1>
                <?php } get_template_part('index','banner'); ?>
            </div>
        </div>
        <?php
    }
endif;
add_action('fameup_action_archive_page_title', 'fameup_archive_page_title');


if (!function_exists('fameup_post_title_content')) :

    function fameup_post_title_content() { ?>

        <article class="small">
            <div class="bs-blog-category"> <?php fameup_post_categories(); ?> </div>
            <h4 class="entry-title title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <?php fameup_post_meta(); ?>
        <?php the_content(__('Read More','fameup')); ?>
        </article> 
    <?php }
endif;


add_action('admin_head', 'fameup_custom_width_css');

function fameup_custom_width_css() {
  echo '<style>
    .column-remove{display:none;}
  </style>';
}



if ( ! function_exists( 'fameup_posted_content' ) ) :
    function fameup_posted_content() { 
      $fameup_blog_content  = get_theme_mod('fameup_blog_content','excerpt');
      $fameup_blog_content_length  = get_theme_mod('fameup_blog_content_length',30);

      if ( 'excerpt' == $fameup_blog_content ){
      $fameup_excerpt = fameup_the_excerpt( absint( $fameup_blog_content_length ) );
      if ( !empty( $fameup_excerpt ) ) :                   
          echo wp_kses_post( wpautop( $fameup_excerpt ) );
           endif; 
      } else{ 
       the_content( __('Read More','fameup') );
        }
 }
endif;

if ( ! function_exists( 'fameup_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     */
    function fameup_the_excerpt( $length = 0, $post_obj = null ) {

     
        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( get_the_excerpt($post_obj) ) ) {
            $source_content = get_the_excerpt($post_obj);
        } 
        // Check if non-breaking space exists in the text with variations
        if (preg_match('/\s*(&nbsp;|\xA0)\s*/u', $source_content)) {
            // Remove non-breaking space and its variations from the text
            $source_content = preg_replace('/\s*(&nbsp;|\xA0)\s*/u', ' ', $source_content);
            
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }
endif;


if ( ! function_exists( 'fameup_page_pagination' ) ) :
    function fameup_page_pagination() { ?>

        <div class="col-md-12 text-center d-md-flex justify-content-between">
            <?php //Previous / next page navigation
                $prev_text =  (is_rtl()) ? "right" : "left";
                $next_text =  (is_rtl()) ? "left" : "right";
                the_posts_pagination( array(
                    'prev_text'          => '<i class="fa fa-angle-'.$prev_text.'"></i>',
                    'next_text'          => '<i class="fa fa-angle-'.$next_text.'"></i>',
                    ) 
                );
            ?>
            <?php $fameup_pagination_remove = get_theme_mod('fameup_pagination_remove','true');
            if($fameup_pagination_remove == true) { ?>
                <div class="navigation"><p><?php posts_nav_link(); ?></p></div>
            <?php } ?>
        </div>
        <?php
    }
endif;