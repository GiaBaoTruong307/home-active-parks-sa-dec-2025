<?php get_header(); ?>

<main>
    <!-- FEATURE IMAGE -->
    <section>
        <?php
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>

        <div style="background: url('<?php if ($thumbnail_url) echo esc_url($thumbnail_url); ?>') lightgray 50% / cover no-repeat;" class="equipment-image"></div>
    </section>

    <!-- DETAILS -->
    <section class="equipments-container">
        <!-- TITLE -->
        <div class="title">
            <?php
            $title = get_the_title();
            $sport = get_the_terms(get_the_ID(), 'sports');

            if ($sport && !is_wp_error($sport)) : ?>
                <div class="sport-list">
                    <?php foreach ($sport as $term) : ?>
                        <p class="body-2"><?php echo esc_html($term->name); ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($title) : ?>
                <h2 class="heading-2"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
        </div>

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
        <div class="instructions">
            <div class="left">
                <h4 class="heading-4">Instructions - <?php the_title(); ?></h4>
                <ol class="instruction-list">
                    <?php
                    $instructions = get_field('instructions');
                    if ($instructions) {
                        while (have_rows('instructions')) {
                            the_row();
                            $step = get_sub_field('step_content'); ?>
                            <li class="instruction-item body-2"><?php echo esc_html($step); ?></li>
                    <?php }
                    } ?>
                </ol>
            </div>

            <div class="right">
                <?php
                $safety_notes = get_field('safety_notes');
                ?>
                <h4 class="heading-4">Safety Notes</h4>
                <p class="body-2"><?php if ($safety_notes) echo esc_html($safety_notes); ?></p>
            </div>
        </div>


        <!-- RELATED LOCATIONS -->
        <div class="related-locations">
            <h4 class="heading-4">Parks where this equipment exists</h4>
            <div class="feature-cards">
                <?php
                $relatedLocations = get_field('related_locations');

                if ($relatedLocations && is_array($relatedLocations)) {
                    foreach ($relatedLocations as $location) {
                        get_template_part('template-parts/components/location-card', null, array(
                            'post_id' => $location->ID
                        ));
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>