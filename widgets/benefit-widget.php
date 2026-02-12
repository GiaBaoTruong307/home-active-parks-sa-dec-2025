<?php
if (! defined('ABSPATH')) exit;

use Elementor\Widget_Base; // class My_Widget extends Widget_Base {.. instead of class My_Widget extends \Elementor\Widget_Base {..} (to create a new widget)
use Elementor\Controls_Manager; // to add controls like text, textarea, select, etc.
use Elementor\Repeater; // to create repeater fields 
use Elementor\Group_Control_Typography; // to add typography controls for style tab
use Elementor\Group_Control_Background; // to add background controls for style tab 

class Benefit_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'benefit_widget'; // Unique widget name
    }

    public function get_title()
    {
        return 'Benefit Section'; // Widget title in Elementor editor
    }

    public function get_icon()
    {
        return 'eicon-icon-box'; // Icon for the widget in Elementor editor
    }

    public function get_categories()
    {
        return ['general']; // Category in which the widget will be listed  
    }

    protected function register_controls()
    {

        //  CONTENT TAB

        // SECTION CONTENT
        $this->start_controls_section(
            'section_content',
            [
                'label' => 'Section Content',
                'tab'   => Controls_Manager::TAB_CONTENT, // Content Tab
            ]
        );

        $this->add_control(
            'benefit_title',
            [
                'label' => 'Section Title',
                'type'  => Controls_Manager::TEXT, // Text control for the section title
                'default' => 'How It Works On Parks',
            ]
        );

        $this->add_control(
            'benefit_description',
            [
                'label' => 'Section Description',
                'type'  => Controls_Manager::TEXTAREA, // Textarea control for the section description
                'default' => 'Explore simple steps to start training at any outdoor fitness park.',
            ]
        );

        $this->end_controls_section();


        // BENEFIT LIST
        $this->start_controls_section(
            'section_benefits',
            [
                'label' => 'Benefit List',
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'icon',
            [
                'label' => 'Icon',
                'type'  => Controls_Manager::MEDIA, // Media control for uploading an icon
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => 'Title',
                'type'  => Controls_Manager::TEXT,
                'default' => 'Benefit Title',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => 'Description',
                'type'  => Controls_Manager::TEXTAREA,
                'default' => 'Benefit description...',
            ]
        );

        $this->add_control(
            'benefit_list',
            [
                'label' => 'Benefits',
                'type'  => Controls_Manager::REPEATER, // Repeater control to add multiple benefit items
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => 'Find A Park',
                        'description' => 'Discover outdoor fitness parks near you.',
                    ],
                    [
                        'title' => 'Check Available Equipment',
                        'description' => 'See what equipment is installed.',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();


        //  STYLE TAB
        $this->start_controls_section(
            'section_style',
            [
                'label' => 'Section Style',
                'tab'   => Controls_Manager::TAB_STYLE, // Style Tab
            ]
        );

        // Background
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'section_background',
                'selector' => '{{WRAPPER}} .benefit-main',
            ]
        );

        // Padding
        $this->add_responsive_control(
            'section_padding',
            [
                'label' => 'Padding',
                'type'  => Controls_Manager::DIMENSIONS, // Dimensions control for padding
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .benefit-main' =>
                    'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // TITLE STYLE
        $this->start_controls_section(
            'title_style',
            [
                'label' => 'Section Title',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => 'Color',
                'type'  => Controls_Manager::COLOR, // Color control for the title  
                'selectors' => [
                    '{{WRAPPER}} .benefit-text h3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .benefit-text h3',
            ]
        );

        $this->end_controls_section();


        //  ITEM STYLE
        $this->start_controls_section(
            'item_style',
            [
                'label' => 'Items',
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        // Item Title
        $this->add_control(
            'item_title_color',
            [
                'label' => 'Item Title Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .benefit .heading-5' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), // Typography control for item title
            [
                'name' => 'item_title_typography',
                'selector' => '{{WRAPPER}} .benefit .heading-5',
            ]
        );

        // Item Description
        $this->add_control(
            'item_desc_color',
            [
                'label' => 'Item Description Color',
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .benefit p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), // Typography control for item description
            [
                'name' => 'item_desc_typography',
                'selector' => '{{WRAPPER}} .benefit p',
            ]
        );

        // Icon Size
        $this->add_responsive_control(
            'icon_size',
            [
                'label' => 'Icon Size',
                'type'  => Controls_Manager::SLIDER, // Slider control for icon size 
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .benefit img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Gap
        $this->add_responsive_control(
            'item_gap',
            [
                'label' => 'Item Gap',
                'type'  => Controls_Manager::SLIDER, // Slider control for item gap
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .benefit-list' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
?>
        <section class="container">
            <div class="benefit-main">
                <?php if ($settings['benefit_title'] || $settings['benefit_description']) : ?>
                    <div class="benefit-text">
                        <h3 class="heading-3">
                            <?php echo esc_html($settings['benefit_title']); ?>
                        </h3>
                        <p class="body-2">
                            <?php echo esc_html($settings['benefit_description']); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (!empty($settings['benefit_list'])) : ?>
                    <ol class="benefit-list">
                        <?php foreach ($settings['benefit_list'] as $item) : ?>
                            <li class="benefit">
                                <?php if (!empty($item['icon']['url'])) : ?>
                                    <img src="<?php echo esc_url($item['icon']['url']); ?>"
                                        alt="<?php echo esc_attr($item['title']); ?>">
                                <?php endif; ?>

                                <div class="content">
                                    <h5 class="heading-5">
                                        <?php echo esc_html($item['title']); ?>
                                    </h5>
                                    <p>
                                        <?php echo esc_html($item['description']); ?>
                                    </p>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ol>
                <?php endif; ?>
            </div>
        </section>
<?php
    }
}
