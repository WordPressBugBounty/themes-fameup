<?php
function theme_options_color() {
	$top_bar_header_background_color = get_theme_mod('top_bar_header_background_color','');
	$top_bar_header_color = get_theme_mod('top_bar_header_color','');


	/*=================== Breadeking News Color ===================*/
	$breaking_news_background_color = get_theme_mod('breaking_news_background_color','');
	$breaking_news_color = get_theme_mod('breaking_news_color','');
	$breaking_news_title_bg_color = get_theme_mod('breaking_news_title_bg_color','');
	$breaking_news_title_color = get_theme_mod('breaking_news_title_color','');


	/*=================== Slider Overlay Color ===================*/
	$fameup_slider_overlay_color = get_theme_mod('fameup_slider_overlay_color','#fff');
	$fameup_slider_overlay_text_color = get_theme_mod('fameup_slider_overlay_text_color','');
	$fameup_slider_title_font_size = get_theme_mod('fameup_slider_title_font_size',);

	?>
<style type="text/css">
/*==================== Site title and tagline ====================*/
.site-title a, .site-description{
  color: #<?php echo esc_attr(get_theme_mod('header_textcolor', "000")); ?>;
}
body.dark .site-title a, body.dark .site-description{
  color: <?php echo esc_attr(get_theme_mod('header_textcolor_dark_layout', "#222")); ?>;
}
/*==================== Top Bar color ====================*/
.bs-head-detail{
  background: <?php echo esc_attr($top_bar_header_background_color); ?>;
} 
.bs-head-detail .top-date, .bs-head-detail{
	color: <?php echo esc_attr($top_bar_header_color); ?>; 
} 
/*=================== Breadeking News Color ===================*/
.bs-latest-news .bs-latest-news-slider{
	background: <?php echo esc_attr($breaking_news_background_color); ?>;
} 
.bs-latest-news .bs-latest-news-slider a{
	color: <?php echo esc_attr($breaking_news_color); ?>; 
} 
.bs-latest-news .bn_title h2 {
    background: <?php echo esc_attr($breaking_news_title_bg_color); ?>;
    color:<?php echo esc_attr($breaking_news_title_color); ?>;
}
.bs-latest-news.two .bn_title .title:after {
    border-left-color: <?php echo esc_attr($breaking_news_title_bg_color); ?>;
}
/*=================== Slider Color ===================*/
.bs-blog-thumb .bs-blog-inner.over::after{
	background-color: <?php echo esc_attr($fameup_slider_overlay_color); ?>;
}
.bs-blog-thumb .bs-blog-inner, .bs-blog-thumb .bs-blog-inner h4, .bs-blog-thumb .bs-blog-inner h4 a, .bs-blog-meta, .bs-blog-meta{
	color: <?php echo esc_attr($fameup_slider_overlay_text_color); ?>;
} 
@media (min-width:991px) {
	.swiper-wrapper .bs-blog-thumb .bs-blog-inner h4 a{
		font-size: <?php echo esc_attr($fameup_slider_title_font_size); ?>px ;
	
	}
}
</style>
<?php } ?>