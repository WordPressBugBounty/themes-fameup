<?php
if (!class_exists('Fameup_Posts_Slider')) :
    /**
     * Adds Fameup_Posts_Slider widget.
     */
    class Fameup_Posts_Slider extends Fameup_Widget_Base
    {
        /**
         * Sets up a new widget instance.
         *
         * @since 1.0.0
         */
        function __construct()
        {
            $this->text_fields = array('fameup-posts-slider-title', 'fameup-excerpt-length', 'fameup-posts-slider-number');
            $this->select_fields = array('fameup-select-category','fameup-select-column', 'fameup-show-excerpt');

            $widget_ops = array(
                'classname' => 'fameup_posts_slider_widget',
                'description' => __('Displays posts slider from selected category.', 'fameup'),
                'customize_selective_refresh' => true,
            );

            parent::__construct('fameup_posts_slider', __('AR: Posts Slider', 'fameup'), $widget_ops);
        }

        /**
         * Front-end display of widget.
         *
         * @see WP_Widget::widget()
         *
         * @param array $args Widget arguments.
         * @param array $instance Saved values from database.
         */

        public function widget($args, $instance)
        {
            $instance = parent::fameup_sanitize_data($instance, $instance);


            /** This filter is documented in wp-includes/default-widgets.php */
            $title = apply_filters('widget_title', $instance['fameup-posts-slider-title'], $instance, $this->id_base);
            $category = isset($instance['fameup-select-category']) ? $instance['fameup-select-category'] : 0;
            $column = isset($instance['fameup-select-column']) ? $instance['fameup-select-column'] : 0;

            $number_of_posts = 25;

            // open the widget container
            echo $args['before_widget'];
            ?>
            <div class="bs-slider-widget">
            <?php if (!empty($title)): ?>
            <div class="bs-widget-title">
            <!-- bs-sec-title -->
                    <h4 class="title"><?php echo esc_html($title); ?></h4>
            </div>
            <!-- // bs-sec-title -->
            <?php endif; ?>
            <?php

            $all_posts = fameup_get_posts($number_of_posts, $category);
            $column = isset($instance['fameup-select-column']) ? $instance['fameup-select-column'] : 0;
            ?>

            <div class="col-md-<?php echo esc_attr($column); ?>">
            <div class="homemain bs swiper-container">
              <div class="swiper-wrapper">
                <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            global $post;
                            $url = fameup_get_freatured_image_url($post->ID, 'fameup-slider-full');
                            ?>
                        <div class="swiper-slide">
                    
                            <div class="bs-blog-thumb lg back-img" style="background-image: url('<?php echo esc_url($url); ?>');">
                                <div class="bs-blog-inner three over">
                                    <?php fameup_post_categories(); ?>
                                    <h4 class="title lg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <?php fameup_post_meta(); ?>
                                </div>
                            </div>
                    </div>
                
                        <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        </div>   
            <?php
            // close the widget container
            echo $args['after_widget'];
        }

        /**
         * Back-end widget form.
         *
         * @see WP_Widget::form()
         *
         * @param array $instance Previously saved values from database.
         */
        public function form($instance)
        {
            $this->form_instance = $instance;
            $options = array(
                'true' => __('Yes', 'fameup'),
                'false' => __('No', 'fameup')

            );
            $categories = fameup_get_terms();
            
            if (isset($categories) && !empty($categories)) {
                // generate the text input for the title of the widget. Note that the first parameter matches text_fields array entry
                echo esc_attr(parent::fameup_generate_text_input('fameup-posts-slider-title', esc_html_e('Title', 'fameup'), 'Posts Slider'));

                echo esc_attr(parent::fameup_generate_select_options('fameup-select-category', esc_html_e('Select category', 'fameup'), $categories));

                ?>
                <div class="column-remove">
                <?php
                $column = fameup_get_column();
                ?>
                </div>
                <?php echo parent::fameup_generate_select_options('fameup-select-column', esc_html_e('Select column', 'fameup'), esc_attr($column));
            }
            
            
        }
    }
endif;