<?php get_header(); ?>

<main class="main-container">
    <!-- HERO SECTION -->
    <section>
        <?php
        $hero_image = get_field('hero_section_image');
        $hero_title = get_field('hero_section_title');
        $hero_btn = get_field('hero_section_button');

        if ($hero_image || $hero_title || $hero_btn || $hero_btn['url'] || $hero_btn['title']) { ?>
            <div style="background: url('<?php echo esc_url($hero_image['url']); ?>') lightgray 50% / cover no-repeat;" class="hero-image">
                <div class="container">
                    <div class="content">
                        <h1 class="heading-1"><?php echo esc_html($hero_title); ?></h1>
                        <a class="hero-btn button-font" href="<?php echo esc_url($hero_btn['url']); ?>">
                            <?php echo esc_html($hero_btn['title']); ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>

    <!-- FEATURE SERVICE SECTION -->
    <section>
        <div class="container">
            <div class="feature-main">
                <div class="header-justify-between">
                    <?php
                    $title = get_field('feature_section_title');
                    $description = get_field('feature_section_description');
                    $button = get_field('feature_section_button');
                    $icon = get_template_directory_uri() . "/assets/icons/arrow-right-2.svg";

                    if ($title || $description || $button) { ?>
                        <div class="feature-text">
                            <h3 class="heading-3"><?php echo esc_html($title); ?></h3>
                            <p class="body-2"><?php echo esc_html($description); ?></p>
                        </div>

                        <a class="right-btn button-small-font" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?>
                            <img src="<?php echo esc_url($icon); ?>" alt="Arrow Right">
                        </a>
                    <?php } ?>
                </div>

                <div class="feature-cards">
                    <?php
                    $locationPosts = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'location',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ));

                    if ($locationPosts->have_posts()) {
                        while ($locationPosts->have_posts()) {
                            $locationPosts->the_post();

                            get_template_part('template-parts/components/location-card', null, array(
                                'post_id' => get_the_ID()
                            ));
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- MAP -->
    <section id="location" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/map.png') lightgray 50% / cover no-repeat; width: 100%; height: 40vh;">
    </section>

    <!-- BENEFIT-->
    <section class="container">
        <div class="benefit-main">
            <?php
            $benefit_title = get_field('benefit_section_title');
            $benefit_description = get_field('benefit_section_description');

            if ($benefit_title || $benefit_description) { ?>
                <div class="benefit-text">
                    <h3 class="heading-3">
                        <?php echo esc_html($benefit_title); ?>
                    </h3>
                    <p class="body-2">
                        <?php echo esc_html($benefit_description); ?>
                    </p>
                </div>
            <?php } ?>

            <ol class="benefit-list">
                <?php
                if (have_rows('benefit_section_benefit_list')) {
                    while (have_rows('benefit_section_benefit_list')) {
                        the_row();
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description'); ?>
                        <li class="benefit">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                            <div class="content">
                                <h5 class="heading-5"><?php echo esc_html($title); ?></h5>
                                <p><?php echo esc_html($description); ?></p>
                            </div>
                        </li>
                <?php  }
                } ?>
            </ol>
        </div>
    </section>

    <!-- BRAND -->
    <section id="equipment" class="brand-main">
        <div class="container">
            <div class="brand-inner">
                <div class="header-justify-between">
                    <?php
                    $title = get_field('brand_section_title');
                    $button = get_field('brand_section_button');
                    $icon = get_template_directory_uri() . "/assets/icons/arrow-right-2.svg";

                    if ($title || $button) { ?>
                        <div class="feature-text">
                            <h3 class="heading-3"><?php echo esc_html($title); ?></h3>
                        </div>

                        <a style="margin-top: 0px" class="right-btn button-small-font" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?>
                            <img src="<?php echo esc_url($icon); ?>" alt="Arrow Right">
                        </a>
                    <?php  }
                    ?>
                </div>
                <ul class="brands">
                    <?php
                    $equipment_list = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'equipment',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ));

                    if ($equipment_list->have_posts()) {
                        while ($equipment_list->have_posts()) {
                            $equipment_list->the_post();
                            $equipment_image = get_the_post_thumbnail_url();
                            $equipment_title = get_the_title(); ?>

                            <li class="brand">
                                <a href="<?php the_permalink(); ?>" class="brand-link"></a>

                                <div class="brand-image">
                                    <img src="<?php echo esc_url($equipment_image); ?>" alt="<?php echo esc_attr($equipment_title); ?>">
                                </div>

                                <div class="content">
                                    <h6 class="heading-6"><?php echo esc_html($equipment_title); ?></h6>
                                    <a style="text-decoration: none" class="caption-1" href="<?php the_permalink(); ?>">View Details</a>
                                </div>
                            </li>
                    <?php }
                    }
                    wp_reset_postdata();  ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- PARTNERS-->
    <section class="container">
        <div class="partner-inner">
            <?php
            $title = get_field('partners_section_title');
            ?>

            <h3 class="heading-3"><?php if ($title) echo esc_html($title); ?></h3>
            <ul class="partners">
                <?php
                if (have_rows('partners_section_partners_logo')) {
                    while (have_rows('partners_section_partners_logo')) {
                        the_row();
                        $logo = get_sub_field('logo'); ?>
                        <?php
                        if ($logo) { ?>
                            <li class="partner">
                                <img class="partner-logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?> ">
                            </li>
                        <?php  } ?>
                <?php }
                } ?>
            </ul>
        </div>
    </section>
</main>

<?php get_footer(); ?>