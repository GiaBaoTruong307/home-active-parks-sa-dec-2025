<?php
if (!defined('ABSPATH')) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;

class Feature_Service_Widget extends Widget_Base
{
    public function get_name()
    {
        return 'feature_service_widget';
    }

    public function get_title()
    {
        return 'Feature Service Section';
    }

    public function get_icon()
    {
        return 'eicon-posts-grid';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_script_depends()
    {
        return ['feature-service-widget-js'];
    }

    protected function register_controls()
    {
        // SECTION HEADER
        $this->start_controls_section(
            'section_header',
            [
                'label' => 'Section Header',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => 'Section Title',
                'type'  => Controls_Manager::TEXT,
                'default' => 'Featured Locations',
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => 'Section Description',
                'type'  => Controls_Manager::TEXTAREA,
                'default' => 'Explore our outdoor fitness parks.',
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => 'Button Text',
                'type'  => Controls_Manager::TEXT,
                'default' => 'View All Locations',
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => 'Button URL',
                'type'  => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->end_controls_section();

        // LOCATION SETTINGS
        $this->start_controls_section(
            'location_settings',
            [
                'label' => 'Location Settings',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'posts_per_page',
            [
                'label' => 'Number of Locations',
                'type'  => Controls_Manager::NUMBER,
                'default' => -1,
                'min' => -1,
                'max' => 100,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => 'Order By',
                'type'  => Controls_Manager::SELECT,
                'default' => 'date',
                'options' => [
                    'date' => 'Date',
                    'title' => 'Title',
                    'rand' => 'Random',
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => 'Order',
                'type'  => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => 'Ascending',
                    'DESC' => 'Descending',
                ],
            ]
        );

        $this->end_controls_section();

        // SLIDER SETTINGS
        $this->start_controls_section(
            'slider_settings',
            [
                'label' => 'Slider Settings',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'enable_slider',
            [
                'label' => 'Enable Slider',
                'type'  => Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_responsive_control(
            'slides_to_show_responsive',
            [
                'label' => 'Slides to Show',
                'type'  => Controls_Manager::NUMBER,
                'desktop_default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
                'min' => 1,
                'max' => 6,
                'condition' => [
                    'enable_slider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'slides_to_scroll_responsive',
            [
                'label' => 'Slides to Scroll',
                'type'  => Controls_Manager::NUMBER,
                'desktop_default' => 3,
                'tablet_default' => 1,
                'mobile_default' => 1,
                'min' => 1,
                'max' => 6,
                'condition' => [
                    'enable_slider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'show_dots_responsive',
            [
                'label' => 'Show Dots',
                'type'  => Controls_Manager::SWITCHER,
                'desktop_default' => 'yes',
                'tablet_default' => 'yes',
                'mobile_default' => 'yes',
                'return_value' => 'yes',
                'condition' => [
                    'enable_slider' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'infinite_loop',
            [
                'label' => 'Infinite Loop',
                'type'  => Controls_Manager::SWITCHER,
                'label_on' => 'Yes',
                'label_off' => 'No',
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'enable_slider' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // SECTION STYLE
        $this->start_controls_section(
            'section_style',
            [
                'label' => 'Section Style',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'selector' => '{{WRAPPER}} .feature-main',
            ]
        );

        $this->add_responsive_control(
            'section_padding',
            [
                'label' => 'Padding',
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-main' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // TITLE STYLE
        $this->start_controls_section(
            'title_style',
            [
                'label' => 'Title Style',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => 'Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feature-text h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .feature-text h3',
            ]
        );

        $this->end_controls_section();

        // CARD STYLE
        $this->start_controls_section(
            'card_style',
            [
                'label' => 'Card Style',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'card_background',
                'selector' => '{{WRAPPER}} .card',
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => 'Padding',
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => 'Border Radius',
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .card',
            ]
        );

        $this->add_responsive_control(
            'card_gap',
            [
                'label' => 'Gap Between Cards',
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .feature-cards:not(.slick-initialized)' => 'gap: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .feature-cards.slick-initialized .slick-slide' => 'margin: 0 calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->end_controls_section();

        // CARD IMAGE STYLE
        $this->start_controls_section(
            'card_image_style',
            [
                'label' => 'Card Image',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'image_height',
            [
                'label' => 'Image Height',
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 500,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .card-image img' => 'height: {{SIZE}}{{UNIT}}; object-fit: cover;',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => 'Border Radius',
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .card-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // CARD TITLE STYLE
        $this->start_controls_section(
            'card_title_style',
            [
                'label' => 'Card Title',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_title_color',
            [
                'label' => 'Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card h5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_title_typography',
                'selector' => '{{WRAPPER}} .card h5',
            ]
        );

        $this->add_responsive_control(
            'card_title_spacing',
            [
                'label' => 'Spacing',
                'type'  => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .card h5' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // CARD TEXT STYLE
        $this->start_controls_section(
            'card_text_style',
            [
                'label' => 'Card Text',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_location_heading',
            [
                'label' => 'Location',
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'card_location_color',
            [
                'label' => 'Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-location' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_location_typography',
                'selector' => '{{WRAPPER}} .card-location',
            ]
        );

        $this->add_control(
            'card_desc_heading',
            [
                'label' => 'Description',
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'card_description_color',
            [
                'label' => 'Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_description_typography',
                'selector' => '{{WRAPPER}} .card-description',
            ]
        );

        $this->end_controls_section();

        // CARD BUTTON STYLE
        $this->start_controls_section(
            'card_button_style',
            [
                'label' => 'Card Button',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'card_button_typography',
                'selector' => '{{WRAPPER}} .card-btn',
            ]
        );

        $this->start_controls_tabs('card_button_tabs');

        $this->start_controls_tab(
            'card_button_normal',
            [
                'label' => 'Normal',
            ]
        );

        $this->add_control(
            'card_button_text_color',
            [
                'label' => 'Text Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'card_button_background',
                'selector' => '{{WRAPPER}} .card-btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'card_button_hover',
            [
                'label' => 'Hover',
            ]
        );

        $this->add_control(
            'card_button_hover_text_color',
            [
                'label' => 'Text Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .card-btn:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'card_button_hover_background',
                'selector' => '{{WRAPPER}} .card-btn:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'card_button_padding',
            [
                'label' => 'Padding',
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .card-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_button_border_radius',
            [
                'label' => 'Border Radius',
                'type'  => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .card-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $button_url = $settings['button_url']['url'];
        $icon = get_template_directory_uri() . "/assets/icons/arrow-right-2.svg";

        // Query locations
        $locationPosts = new WP_Query([
            'posts_per_page' => $settings['posts_per_page'],
            'post_type' => 'location',
            'orderby' => $settings['orderby'],
            'order' => $settings['order'],
        ]);

        $card_count = $locationPosts->post_count;
?>
        <section>
            <div class="container">
                <div class="feature-main">
                    <div class="header-justify-between">
                        <?php if ($settings['section_title'] || $settings['section_description'] || $settings['button_text']) : ?>
                            <div class="feature-text">
                                <h3 class="heading-3"><?php echo esc_html($settings['section_title']); ?></h3>
                                <p class="body-2"><?php echo esc_html($settings['section_description']); ?></p>
                            </div>

                            <?php if ($settings['button_text']) : ?>
                                <a class="right-btn button-small-font" href="<?php echo esc_url($button_url); ?>">
                                    <?php echo esc_html($settings['button_text']); ?>
                                    <img src="<?php echo esc_url($icon); ?>" alt="Arrow Right">
                                </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <?php if ($locationPosts->have_posts()) : ?>
                        <div class="feature-cards <?php echo $settings['enable_slider'] === 'yes' ? 'feature-slider' : ''; ?>"
                            <?php if ($settings['enable_slider'] === 'yes') : ?>
                            data-slides-to-show="<?php echo esc_attr($settings['slides_to_show_responsive'] ?? 3); ?>"
                            data-slides-to-show-tablet="<?php echo esc_attr($settings['slides_to_show_responsive_tablet'] ?? 2); ?>"
                            data-slides-to-show-mobile="<?php echo esc_attr($settings['slides_to_show_responsive_mobile'] ?? 1); ?>"

                            data-slides-to-scroll="<?php echo esc_attr($settings['slides_to_scroll_responsive'] ?? 3); ?>"
                            data-slides-to-scroll-tablet="<?php echo esc_attr($settings['slides_to_scroll_responsive_tablet'] ?? 1); ?>"
                            data-slides-to-scroll-mobile="<?php echo esc_attr($settings['slides_to_scroll_responsive_mobile'] ?? 1); ?>"

                            data-dots="<?php echo esc_attr($settings['show_dots_responsive'] ?? 'yes'); ?>"
                            data-dots-tablet="<?php echo esc_attr($settings['show_dots_responsive_tablet'] ?? 'yes'); ?>"
                            data-dots-mobile="<?php echo esc_attr($settings['show_dots_responsive_mobile'] ?? 'yes'); ?>"

                            data-infinite="<?php echo esc_attr($settings['infinite_loop']); ?>"
                            data-card-count="<?php echo esc_attr($card_count); ?>"
                            <?php endif; ?>>
                            <?php
                            while ($locationPosts->have_posts()) {
                                $locationPosts->the_post();
                                get_template_part('template-parts/components/location-card', null, [
                                    'post_id' => get_the_ID()
                                ]);
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
<?php
    }
}
