<?php get_header(); ?>

<main class="page-default">

    <?php
    // Lấy ACF fields
    $privacy_title   = get_field('privacy_title');
    $privacy_updated = get_field('privacy_updated');
    $privacy_content = get_field('privacy_content');
    ?>

    <?php if ($privacy_content) : ?>

        <!-- PRIVACY PAGE -->
        <section class="privacy-page">
            <div class="container">

                <!-- Title -->
                <h1>
                    <?php echo esc_html($privacy_title ? $privacy_title : get_the_title()); ?>
                </h1>

                <!-- Last updated -->
                <?php if ($privacy_updated) : ?>
                    <p class="updated">
                        Last updated:
                        <?php echo esc_html($privacy_updated); ?>
                    </p>
                <?php endif; ?>

                <!-- Content -->
                <div class="privacy-content">
                    <?php
                    echo apply_filters('the_content', $privacy_content);
                    ?>
                </div>

            </div>
        </section>

    <?php else : ?>

        <!-- DEFAULT PAGE -->
        <?php while (have_posts()) : the_post(); ?>
            <section class="page-content">
                <div class="container">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                </div>
            </section>
        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>