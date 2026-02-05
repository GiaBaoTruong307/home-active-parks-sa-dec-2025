<div class="desc-overview">
    <div class="content">
        <div class="top">
            <?php
            $overview = get_field('overview');
            ?>
            <h4 class="heading-4">Overview Summary</h4>
            <p class="body-2"><?php if ($overview) echo esc_html($overview); ?></p>
        </div>

        <div class="bottom">
            <?php
            $description = get_the_content();
            ?>
            <h4 class="heading-4">Full Description</h4>
            <div class="body-2">
                <?php if ($description) echo $description ?>
            </div>
        </div>
    </div>

    <div class="details">
        <h4 class="heading-4">quick facts</h4>
        <div class="content">
            <?php
            $region = get_field('region_council');
            $coordinates = get_field('coordinate');

            if ($region || $coordinates) { ?>
                <div class="region">
                    <p>Region / Council:</p>
                    <a class="button-font" href="<?php echo esc_url($region['url']); ?>"><?php echo esc_html($region['title']); ?></a>
                </div>

                <div class="coordinate">
                    <p>Coordinates:</p>
                    <a class="button-font" href="<?php echo esc_url($coordinates['url']); ?>"><?php echo esc_html($coordinates['title']); ?> </a>
                </div>
            <?php } ?>

            <div class="amen-equip">
                <div class="amenities-count">
                    <?php
                    $amenities = get_the_terms(get_the_ID(), 'amenities');

                    if ($amenities && is_array($amenities)) :
                        $count = count($amenities);
                        $label = ($count >= 2) ? 'Availables' : 'Available';
                    ?>
                        <p>Amenities:</p>
                        <p class="button-font">
                            <?php echo esc_html("$count $label"); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="equipment">
                    <?php
                    $location_id = get_the_ID();

                    $equipments = new WP_Query(array(
                        'post_type'      => 'equipment',
                        'posts_per_page' => -1,
                        'meta_query'     => array(
                            array(
                                'key'     => 'related_locations',
                                'value'   => '"' . $location_id . '"',
                                'compare' => 'LIKE',
                            )
                        )
                    ));

                    if ($equipments->have_posts()) :
                        $count = $equipments->found_posts;
                        $label = ($count >= 2) ? 'Types' : 'Type';
                    ?>
                        <p>Equipment:</p>
                        <p class="button-font">
                            <?php echo esc_html("$count $label"); ?>
                        </p>
                    <?php endif;
                    wp_reset_postdata(); ?>
                </div>

            </div>
        </div>
    </div>
</div>