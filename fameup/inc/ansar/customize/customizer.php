<?php
/**
 * Fameup Theme Customizer
 *
 * @package Fameup
 */

if (!function_exists('fameup_get_option')):
/**
 * Get theme option.
 *
 * @since 1.0.0
 *
 * @param string $key Option key.
 * @return mixed Option value.
 */
function fameup_get_option($key) {

	if (empty($key)) {
		return;
	}

	$value = '';

	$default       = fameup_get_default_theme_options();
	$default_value = null;

	if (is_array($default) && isset($default[$key])) {
		$default_value = $default[$key];
	}

	if (null !== $default_value) {
		$value = get_theme_mod($key, $default_value);
	} else {
		$value = get_theme_mod($key);
	}

	return $value;
}
endif;

// Load customize default values.
require get_template_directory().'/inc/ansar/customize/customizer-callback.php';

// Load customize default values.
require get_template_directory().'/inc/ansar/customize/customizer-default.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fameup_customize_register($wp_customize) {

	// Load customize controls.
	require get_template_directory().'/inc/ansar/customize/customizer-control.php';

    // Load customize sanitize.
	require get_template_directory().'/inc/ansar/customize/customizer-sanitize.php';

    $wp_customize->get_setting( 'custom_logo')->sanitize_callback  	= 'esc_url_raw';
    $wp_customize->get_setting( 'custom_logo')->transport  			= 'postMessage';
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';
    $wp_customize->get_control( 'header_textcolor')->label = __( 'Site Title/Tagline Color', 'fameup' );
    $wp_customize->get_control( 'header_textcolor')->section = 'title_tagline';   
    $wp_customize->get_control( 'header_textcolor')->priority = 40;   
    $wp_customize->get_control( 'header_textcolor')->default = '#000';
    $wp_customize->get_setting('background_color')->transport = 'refresh';


	if (isset($wp_customize->selective_refresh)) {

		// site logo
		$wp_customize->selective_refresh->add_partial('custom_logo', array(
			'selector'        => '.site-logo', 
			'render_callback' => 'custom_logo_selective_refresh'
		));
		
		// site title
		$wp_customize->selective_refresh->add_partial('blogname', array(
            'selector'        => '.site-title a, .site-title-footer a',
            'render_callback' => 'fameup_customize_partial_blogname',
        ));

		// site tagline
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector'        => '.site-description, .site-description-footer',
            'render_callback' => 'fameup_customize_partial_blogdescription',
        ));

        $wp_customize->selective_refresh->add_partial('header_date_enable', array(
            'selector'        => '.top-date',
            'render_callback' => 'fameup_customize_partial_header_date_enable',
        ));
        $wp_customize->selective_refresh->add_partial('header_social_icon_enable', array(
            'selector'        => '.bs-head-detail .bs-social',
            'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
        ));
		$wp_customize->selective_refresh->add_partial('fameup_header_fb_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_fb_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_twt_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_twt_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_lnkd_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_lnkd_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_insta_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_insta_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_youtube_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_youtube_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_pintrest_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_pintrest_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_tele_link', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));
		$wp_customize->selective_refresh->add_partial('fameup_header_tele_target', array(
			'selector'        => '.bs-head-detail .bs-social',
			'render_callback' => 'fameup_customize_partial_header_social_icon_enable',
		));

        $wp_customize->selective_refresh->add_partial('footer_social_icon_enable', array(
            'selector'        => '.bs-footer-widget-area .col-md-12.text-center, .bs-footer-copyright .col-md-4.text-end',
			'render_callback' => 'fameup_customize_partial_fiiter_social_icon',
        ));
        $wp_customize->selective_refresh->add_partial('breaking_news_title', array(
            'selector'        => '.bs-latest-news.two .bn_title .title',
            'render_callback' => 'fameup_customize_partial_breaking_news_title',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_related_post_title', array(
            'selector'        => '.related-title',
            'render_callback' => 'fameup_customize_partial_fameup_related_post_title',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_scrollup_enable', array(
            'selector'        => '.scroll-main .bs_upscr',
        ));
        $wp_customize->selective_refresh->add_partial('show_main_news_section', array(
            'selector'        => '.swiper-wrapper .bs-blog-thumb .bs-blog-inner h4 a',
        ));
        $wp_customize->selective_refresh->add_partial('you_missed_title', array(
            'selector'        => '.missed .bg',
            'render_callback' => 'fameup_customize_partial_you_missed_title',
        ));
        $wp_customize->selective_refresh->add_partial('sidebar_menu', array(
            'selector'        => '.navbar-wp [data-bs-toggle=offcanvas]',
            'render_callback' => 'fameup_customize_partial_sidebar_menu',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_subsc_title', array(
            'selector'        => '.btn-subscribe',
            'render_callback' => 'fameup_customize_partial_fameup_subsc_title',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_menu_search', array(
            'selector'        => '.bs-default .desk-header .msearch',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_lite_dark_switcher', array(
            'selector'        => 'header .desk-header',
        ));
        $wp_customize->selective_refresh->add_partial('header_data_enable', array(
            'selector'        => '.col-md-7 > .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'fameup_customize_partial_date_n_time',
        ));
        $wp_customize->selective_refresh->add_partial('header_time_enable', array(
            'selector'        => '.col-md-7 > .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'fameup_customize_partial_date_n_time',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_date_time_show_type', array(
            'selector'        => '.col-md-7 > .d-flex.flex-wrap.align-items-center',
            'render_callback' => 'fameup_customize_partial_date_n_time',
        ));
        $wp_customize->selective_refresh->add_partial('fameup_content_layout', array(
            'selector'        => '.col-lg-9.col-md-8.content-right, .col-md-12.content-full', 
        ));
	}

    $default = fameup_get_default_theme_options();

	/*theme option panel info*/

	require get_template_directory().'/inc/ansar/customize/theme-options.php';

	/*theme general layout panel*/
	require get_template_directory().'/inc/ansar/customize/theme-layout.php';

	/*theme general layout panel*/
	require get_template_directory().'/inc/ansar/customize/frontpage-featured.php';

}
add_action('customize_register', 'fameup_customize_register');

function custom_logo_selective_refresh() {
    if( get_theme_mod( 'custom_logo' ) === "" ) return;
    echo '<div class="site-logo">'.the_custom_logo().'</div>';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fameup_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fameup_customize_partial_blogdescription() {
	bloginfo('description');
}

function fameup_customize_partial_header_date_enable() {
    return get_theme_mod( 'header_date_enable' );
}

function fameup_customize_partial_date_n_time() {
    return fameup_date_display_type();
}

function fameup_customize_partial_header_social_icon_enable() {
    if( get_theme_mod( 'header_social_icon_enable' ) == false ) return; 
    return do_action('fameup_action_header_social_section');
}

function fameup_customize_partial_fiiter_social_icon() {
    return do_action('fameup_action_footer_social_section');
}

function fameup_customize_partial_footer_social_icon_enable() {
    return get_theme_mod( 'fameup_footer_social_icons' ); 
}

function fameup_customize_partial_sidebar_menu() {
    return get_theme_mod( 'sidebar_menu' ); 
}

function fameup_customize_partial_fameup_subsc_title() {
    return get_theme_mod( 'fameup_subsc_title' ); 
}

function fameup_customize_partial_you_missed_title() {
    return get_theme_mod( 'you_missed_title' ); 
}

function fameup_customize_partial_breaking_news_title() {
    return get_theme_mod( 'breaking_news_title' ); 
}

function fameup_customize_partial_fameup_related_post_title() {
    return get_theme_mod( 'fameup_related_post_title' ); 
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fameup_customize_preview_js() {
	wp_enqueue_script('fameup-customizer', get_template_directory_uri().'/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'fameup_customize_preview_js');

/************************* Related Post Callback function *********************************/

    function fameup_rt_post_callback ( $control ) 
    {
        if( true == $control->manager->get_setting ('fameup_enable_related_post')->value()){
            return true;
        }
        else {
            return false;
        }       
    }

/************************* Theme Customizer with Sanitize function *********************************/
function fameup_theme_option( $wp_customize )
{
    function fameup_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    /*--- Site title Font size **/
    $wp_customize->add_setting('fameup_title_font_size',
        array(
            'default'           => 100,
            'capability'        => 'edit_theme_options',
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('fameup_title_font_size',
        array(
            'label'    => esc_html__('Site Title Size', 'fameup'),
            'section'  => 'title_tagline',
            'type'     => 'number',
            'priority' => 50,
        )
    );

    $wp_customize->add_setting('header_textcolor_dark_layout',
        array(
            'default' => '#222',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );

    $wp_customize->add_control('header_textcolor_dark_layout',
        array(
            'label' => esc_html__('Site Title/Tagline Color (Dark Mode)', 'fameup'),
            'section' => 'title_tagline',
            'type' => 'color',
            'priority' => 41,
        )
    );

}
add_action('customize_register','fameup_theme_option');