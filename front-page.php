<?php get_header(); ?>

<main class="main-container">
    <!-- HERO -->
    <?php
    $hero_bg       = get_field('hero_bg');
    $hero_title    = get_field('hero_title');
    $hero_btn_link = get_field('hero_btn_link');
    ?>
    <section id="hero" style="background-image: url('<?php echo esc_url($hero_bg['url']); ?>')">
        <div class="container">
            <div class="hero-content">
                <?php if ($hero_title): ?>
                    <h1 class="heading-1"><?php echo esc_html($hero_title); ?></h1>
                <?php endif; ?>

                <?php if ($hero_btn_link): ?>
                    <a class="hero-btn button-font"
                        href="<?php echo esc_url($hero_btn_link['url']); ?>"
                        target="<?php echo esc_attr($hero_btn_link['target']); ?>">
                        <?php echo esc_html($hero_btn_link['title']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- END HERO -->

    <!-- FEATURES -->
    <section class="featured-parks">
        <div class="container">
            <div class="feature-main">
                <div class="header-justify-between">
                    <div class="feature-text">
                        <?php if ($title = get_field('section_title')): ?>
                            <h3 class="heading-3"><?php echo esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if ($desc = get_field('section_desc')): ?>
                            <p class="body-2"><?php echo esc_html($desc); ?></p>
                        <?php endif; ?>
                    </div>

                    <?php if ($btn = get_field('section_button')): ?>
                        <a class="right-btn button-font"
                            href="<?php echo esc_url($btn['url']); ?>"
                            target="<?php echo esc_attr($btn['target']); ?>">
                            <?php echo esc_html($btn['title']); ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right-2.svg" alt="Arrow">
                        </a>
                    <?php endif; ?>
                </div>

                <?php if (have_rows('parks')): ?>
                    <div class="feature-cards">
                        <?php while (have_rows('parks')): the_row(); ?>
                            <article class="card">
                                <div class="card-image">
                                    <?php if ($img = get_sub_field('park_image')): ?>
                                        <img src="<?php echo esc_url($img['url']); ?>"
                                            alt="<?php echo esc_attr($img['alt']); ?>">
                                    <?php endif; ?>
                                </div>

                                <div class="card-content">
                                    <p class="card-location">
                                        <?php if ($address = get_sub_field('park_address')): ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/location.svg" alt="Location" class="location-icon">
                                            <span class="caption-1"><?php echo esc_html($address); ?></span>
                                        <?php endif; ?>
                                    </p>


                                    <?php if ($title = get_sub_field('park_title')): ?>
                                        <h5 class="heading-5"><?php echo esc_html($title); ?></h5>
                                    <?php endif; ?>

                                    <div class="card-description caption-1">
                                        <?php if ($amenities = get_sub_field('park_amenities')): ?>
                                            <span>Amenities: <?php echo esc_html($amenities); ?></span>
                                        <?php endif; ?>

                                        <?php if ($equipment = get_sub_field('park_equipment')): ?>
                                            <span>Equipment: <?php echo esc_html($equipment); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="card-divider"></div>

                                    <?php if ($btn = get_sub_field('park_button')): ?>
                                        <a class="card-btn button-small-font"
                                            href="<?php echo esc_url($btn['url']); ?>">
                                            <?php echo esc_html($btn['title']); ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/arrow-right.svg" alt="Arrow" class="btn-icon">
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- END FEATURES -->

    <!-- BENEFIT -->
    <section class="container">
        <div class="benefit-main">
            <div class="benefit-text">
                <h3 class="heading-3"><?php the_field('benefit_title'); ?></h3>
                <p class="body-2"><?php the_field('section_description'); ?></p>
            </div>

            <?php if (have_rows('benefit_list')): ?>
                <ol class="benefit-list">
                    <?php while (have_rows('benefit_list')): the_row(); ?>
                        <li class="benefit">
                            <?php if ($icon = get_sub_field('benefit_icon')): ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="">
                            <?php endif; ?>

                            <div class="content">
                                <h5 class="heading-5"><?php the_sub_field('step_title'); ?></h5>
                                <p><?php the_sub_field('step_description'); ?></p>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ol>
            <?php endif; ?>
        </div>
    </section>
    <!-- END BENEFIT -->

    <!-- BRAND -->
    <section class="container">
        <div class="partner-inner">
            <h3 class="heading-3"><?php the_field('brand_title'); ?></h3>
            <?php if (have_rows('brand_logo')): ?>
                <ol class="partners">
                    <?php while (have_rows('brand_logo')): the_row(); ?>
                        <li class="partner">
                            <?php if ($logo = get_sub_field('brand_img')): ?>
                                <img class="partner-logo" src="<?php echo esc_url($logo['url']); ?>" alt="">
                            <?php endif; ?>
                        </li>
                    <?php endwhile; ?>
                </ol>
            <?php endif; ?>
        </div>
    </section>
    <!-- END BRAND -->
</main>

<?php get_footer(); ?>