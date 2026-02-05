<?php get_header(); ?>

<div class="main-container">
    <!-- HERO SECTION -->
    <?php get_template_part('template-parts/pages/homepage/hero-section'); ?>

    <!-- FEATURE SERVICE SECTION -->
    <?php get_template_part('template-parts/pages/homepage/feature-service'); ?>

    <!-- MAP -->
    <section id="location" style="background: url('<?php echo get_template_directory_uri(); ?>/assets/images/map.png') lightgray 50% / cover no-repeat; width: 100%; height: 40vh;">
    </section>

    <!-- BENEFIT-->
    <?php get_template_part('template-parts/pages/homepage/benefit'); ?>

    <!-- BRAND -->
    <?php get_template_part('template-parts/pages/homepage/brand'); ?>

    <!-- PARTNERS-->
    <?php get_template_part('template-parts/pages/homepage/partner'); ?>
</div>

<?php get_footer(); ?>