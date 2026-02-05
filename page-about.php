<?php
/* Template Name: About Us */
get_header();
?>

<div class="page-about">
    <!-- HERO -->
    <?php get_template_part('template-parts/pages/about/hero'); ?>

    <!-- INTRO -->
    <?php get_template_part('template-parts/pages/about/intro'); ?>

    <!-- VISION & MISSION -->
    <?php get_template_part('template-parts/pages/about/vision-mission'); ?>

    <!-- CORE VALUES -->
    <?php get_template_part('template-parts/pages/about/core-value'); ?>

    <!-- TEAM -->
    <?php get_template_part('template-parts/pages/about/team'); ?>
</div>

<?php get_footer(); ?>