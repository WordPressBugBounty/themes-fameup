<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package Fameup
 */
?>
</div>
</main>
<?php 
do_action('fameup_action_footer_missed_section');
?><!--==================== FOOTER AREA ====================-->
    <?php $fameup_footer_widget_background = get_theme_mod('fameup_footer_widget_background');
    $fameup_footer_overlay_color = get_theme_mod('fameup_footer_overlay_color'); 
    $style = !empty($fameup_footer_widget_background) ? "background-image:url('".esc_url($fameup_footer_widget_background)."');" : ""; ?>
    <footer class="footer back-img" style="<?php echo $style; ?>">
        <div class="overlay" style="background-color: <?php echo esc_html($fameup_footer_overlay_color);?>;">
            <!--Start bs-footer-widget-area-->
            <?php do_action('fameup_action_footer_widgets_area');
            do_action('fameup_action_footer_layout'); ?>
        </div>
        <!--/overlay-->
    </footer>
    <!--/footer-->
<!--/wrapper-->
<!--Scroll To Top-->
<?php fameup_scrolltoup(); ?>
<!-- /Scroll To Top -->
<?php wp_footer(); ?>
</body>
</html>