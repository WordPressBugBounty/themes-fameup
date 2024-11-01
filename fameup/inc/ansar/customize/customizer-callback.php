<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Fameup
 */

 
 
/*select page for slider*/
if (!function_exists('fameup_main_banner_section_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function fameup_main_banner_section_status($control)
    {

        if (true == $control->manager->get_setting('show_main_news_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select page for slider*/
if (!function_exists('fameup_main_ads_section_status')) :

    /**
     * Check if ticker section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function fameup_main_ads_section_status($control)
    {

        if (true == $control->manager->get_setting('show_featured_links_section')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;

/*select subscribe button*/
if (!function_exists('fameup_subsc_btn_status')) :

    /**
     * Check if slider section page/post is active.
     *
     * @since 1.0.0
     *
     * @param WP_Customize_Control $control WP_Customize_Control instance.
     *
     * @return bool Whether the control is active to the current preview.
     */
    function fameup_subsc_btn_status($control)
    {

        if (true == $control->manager->get_setting('fameup_menu_subscriber')->value()) {
            return true;
        } else {
            return false;
        }

    }

endif;