<?php get_header(); ?>

<!-- FEATURE IMAGE -->
<section>
    <?php
    $thumb_id = get_field('equipment_thumbnail');
    if ($thumb_id) $thumbnail_url = wp_get_attachment_image_url($thumb_id, 'full')
    ?>

    <div style="background: url('<?php if ($thumbnail_url) echo esc_url($thumbnail_url); ?>') lightgray 50% / cover no-repeat;" class="equipment-image"></div>
</section>

<!-- DETAILS -->
<section class="equipments-container">
    <!-- TITLE -->
    <?php get_template_part('template-parts/pages/equipment/single/title'); ?>

    <!-- VIDEO -->
    <div class="video">
        <?php
        $video_url = get_field('video_url');
        if ($video_url) { ?>
            <h4 class="heading-4">Instructional Video</h4>
            <div class="video-wrapper">
                <?php echo $video_url; ?>
            </div>
        <?php } ?>
    </div>

    <!-- INSTRUCTIONS -->
    <?php get_template_part('template-parts/pages/equipment/single/instruction'); ?>


    <!-- RELATED LOCATIONS -->
    <?php get_template_part('template-parts/pages/equipment/single/related-location'); ?>
</section>

<?php get_footer(); ?>