<?php get_header(); ?>

<!-- FEATURE IMAGE -->
<section>
    <?php
    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    ?>

    <div style="background: url('<?php if ($thumbnail_url) echo esc_url($thumbnail_url); ?>') lightgray 50% / cover no-repeat;" class="feature-image"></div>
</section>

<!-- DETAILS -->
<section class="details-container">
    <!-- TITLE -->
    <?php get_template_part('template-parts/pages/location/single/title'); ?>

    <!-- DESC & OVERVIEW -->
    <?php get_template_part('template-parts/pages/location/single/desc-overview'); ?>

    <!-- AMENITIES -->
    <?php get_template_part('template-parts/pages/location/single/amenity'); ?>

    <!-- GALLERY IMAGES -->
    <?php get_template_part('template-parts/pages/location/single/gallery'); ?>

    <!-- EQUIPMENT LIST -->
    <?php get_template_part('template-parts/pages/location/single/equipment-list'); ?>
</section

    <?php get_footer(); ?>