<!-- =========================
     Page Breadcrumb   
============================== -->
<?php get_header(); ?> 
<!-- =========================
     Page Content Section      
============================== -->

    <?php $fameup_single_page_layout = get_theme_mod('fameup_single_page_layout','single-align-content-right');
    if($fameup_single_page_layout == "single-align-content-left") { ?>
      <aside class="col-lg-3 col-md-4">
        <?php get_sidebar();?>
      </aside>
    <?php }
		if($fameup_single_page_layout == "single-align-content-right" || $fameup_single_page_layout == "single-align-content-left") { ?>
      <div class="col-lg-9 col-md-8"> 
    <?php } elseif($fameup_single_page_layout == "single-full-width-content") { ?>
      <div class="col-md-12">
      <?php } ?> 
      <?php if(have_posts()) {
        while(have_posts()) { the_post(); ?>
        <div class="bs-blog-post"> 
          <div class="bs-header">
            <?php $fameup_single_post_category = esc_attr(get_theme_mod('fameup_single_post_category','true'));
                  if($fameup_single_post_category == true) { ?>
                  <?php fameup_post_categories(); ?>
                <?php } ?>
                <h1 class="title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => esc_html_e('Permalink to: ','fameup'),'after'  => '') ); ?>">
                  <?php the_title(); ?></a>
                </h1>

                <div class="bs-info-author-block"> 
                  <?php $fameup_single_post_admin_details = esc_attr(get_theme_mod('fameup_single_post_admin_details','true'));
                  if($fameup_single_post_admin_details == true){ ?>
                  <a class="bs-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"> <?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?> </a>
                <?php } ?>
                <div class="flex-grow-1">
                  <?php $fameup_single_post_admin_details = esc_attr(get_theme_mod('fameup_single_post_admin_details','true'));
                  if($fameup_single_post_admin_details == true) { ?>
                  <h4 class="media-heading"><span><?php esc_html_e('By','fameup'); ?></span><a class="ms-1" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                    <?php } ?>
                    <?php $fameup_single_post_date = esc_attr(get_theme_mod('fameup_single_post_date','true'));
                    if($fameup_single_post_date == true) { ?>
                  <span class="bs-blog-date"> <?php echo get_the_date('M'); ?> <?php echo get_the_date('j,'); ?> <?php echo get_the_date('Y'); ?></span>
                    <?php } 
                    $tags = get_the_tags();
                    $fameup_single_post_tag = esc_attr(get_theme_mod('fameup_single_post_tag','true'));
                    if($fameup_single_post_tag == true) {
                    $tag_list = get_the_tag_list();
                    if($tag_list) { ?> 
                    <span class="fameup-tags ms-2 fas fa-tags">
                    <?php $keys = array_keys($tags);
                       foreach ($tags as $key => $tag) {
                          $tag_link = get_tag_link($tag->term_id);
                          if ($key === end($keys)) {
                            echo '<a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>';
                          } else {
                            echo ' <a href="'.esc_url($tag_link).'">#'.esc_html($tag->name).'</a>, ';
                          }
                        }  ?>
                    </span>
                  <?php } } ?>
                </div>
              </div>
            </div>
              <?php
              $single_show_featured_image = esc_attr(get_theme_mod('single_show_featured_image','true'));
              if($single_show_featured_image == true) {
                if(has_post_thumbnail()){
                  echo '<a class="bs-blog-thumb" href="'.esc_url(get_the_permalink()).'">';
                  the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
                  echo '</a>';
                    
                  $thumbnail_id = get_post_thumbnail_id();
                  $caption = get_post($thumbnail_id)->post_excerpt;

                  if (!empty($caption)) {
                    echo '<span class="featured-image-caption">' . esc_html($caption) . '</span>';
                  }
                } 
              } ?>
              <article class="small single">
                <?php the_content(); ?>
                <?php fameup_edit_link(); ?>
                <?php  fameup_social_share_post($post); ?>
                <div class="clearfix mb-3"></div>
                <?php
                $prev =  (is_rtl()) ? "right" : "left";
                $next =  (is_rtl()) ? "left" : "right";
            the_post_navigation(array(
                'prev_text' => '<div class="fa fa-angle-double-'.$prev.'"></div><span></span> %title',
                'next_text' => '%title <div class="fa fa-angle-double-'.$next.'"></div><span></span>',
                'in_same_term' => true,
            ));
            ?>
            <?php wp_link_pages(array(
                'before' => '<div class="single-nav-links">',
                'after' => '</div>',
            ));
            ?>
              </article>
            </div>
       <?php } ?>
        <?php $fameup_enable_single_post_admin_details = esc_attr(get_theme_mod('fameup_enable_single_post_admin_details','true'));
            if($fameup_enable_single_post_admin_details == true) { ?>
            <div class="media bs-info-author-block py-4 px-3 mb-4">
              <a class="bs-author-pic" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php echo get_avatar( get_the_author_meta( 'ID') , 150); ?></a>
                <div class="media-body">
                  <h4 class="media-heading"><?php esc_html_e('By','fameup'); ?> <a href ="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php the_author(); ?></a></h4>
                  <p><?php the_author_meta( 'description' ); ?></p>
                </div>
            </div>
        <?php } ?>
      <?php $fameup_enable_related_post = esc_attr(get_theme_mod('fameup_enable_related_post','true'));
        if($fameup_enable_related_post == true) { ?>
        <div class="py-4 px-3 mb-4 bs-card-box">
          <!--Start bs-realated-slider -->
          <div class="bs-sec-title mb-3">
          <?php $fameup_related_post_title = get_theme_mod('fameup_related_post_title', esc_html__('Related Post','fameup'))?>
          <h4 class="related-title"><?php echo esc_html($fameup_related_post_title);?></h4>
          </div>
          <!-- // bs-sec-title -->
          <div class="row">
            <!-- featured_post -->
            <?php global $post;
            $categories = get_the_category($post->ID);
            $number_of_related_posts = 3;
            if ($categories) {
              $cat_ids = array();
              foreach ($categories as $category) $cat_ids[] = $category->term_id;
                $args = array(
                  'category__in' => $cat_ids,
                  'post__not_in' => array($post->ID),
                  'posts_per_page' => $number_of_related_posts, // Number of related posts to display.
                  'ignore_sticky_posts' => 1
                ); $related_posts = new wp_query($args);
                              while ($related_posts->have_posts()) {
                              $related_posts->the_post();
                              global $post;
                              $url = fameup_get_freatured_image_url($post->ID, 'fameup-featured');
                              ?>
                        <!-- blog -->
                          <div class="col-md-4">
                          <div class="media bs-blog-post pb-0 mb-4 mb-md-0">
                      <div class="bs-post-area back-img" <?php if(has_post_thumbnail()) { ?>
                            style="background-image: url('<?php echo esc_url($url); ?>');" <?php } ?>>
                        <a href="<?php the_permalink(); ?>" class="link-div"></a>
                      </div>
                      <div class="media-body">
                        <h3> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ','after'  => '') ); ?>">
                          <?php the_title(); ?></a></h3>
                       <?php $fameup_enable_single_post_date = get_theme_mod("fameup_enable_single_post_date", "true");
                       if($fameup_enable_single_post_date == true) { ?>
                        <span class="bs-blog-date"> <a href="<?php echo esc_url(get_month_link(get_post_time('Y'),get_post_time('m'))); ?>"> <?php echo esc_html(get_the_date('M j, Y')); ?></a></span>
                      <?php } ?>
                      </div>
                    </div>
                  </div>
                 <!-- blog -->
                 <?php }
                } wp_reset_postdata(); ?>
          </div>
        </div>
        <!--End bs-realated-slider -->
        <?php } } $fameup_enable_single_post_comments = esc_attr(get_theme_mod('fameup_enable_single_post_comments',true));
        if($fameup_enable_single_post_comments == true) {
          if (comments_open() || get_comments_number()) :
            comments_template();
        endif; } ?>
      </div>
  <?php if($fameup_single_page_layout == "single-align-content-right") { ?>
  <!--sidebar-->
  <!--col-md-3-->
    <aside class="col-lg-3 col-md-4">
      <?php get_sidebar();?>
  </aside>
  <!--/col-md-3-->
  <?php } ?>
</div>
<?php get_footer();