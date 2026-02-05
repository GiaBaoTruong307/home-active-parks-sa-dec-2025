<div id="equipment" class="brand-main-location-cpt">
    <div class="brand-inner">
        <h4 class="heading-4">Equipment List</h4>
        <ul class="brands">
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
                ),
            ));

            if ($equipments->have_posts()) :
                while ($equipments->have_posts()) : $equipments->the_post();

                    $equipment_id    = get_the_ID();
                    $equipment_title = get_the_title();
                    $equipment_link  = get_permalink();
                    $equipment_image = get_the_post_thumbnail_url($equipment_id, 'full');
            ?>
                    <li class="brand">
                        <a href="<?php echo esc_url($equipment_link); ?>" class="brand-link"></a>

                        <?php if ($equipment_image) : ?>
                            <div class="brand-image">
                                <img
                                    src="<?php echo esc_url($equipment_image); ?>"
                                    alt="<?php echo esc_attr($equipment_title); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="content">
                            <h6 class="heading-6"><?php echo esc_html($equipment_title); ?></h6>
                            <a style="text-decoration: none" class="caption-1" href="<?php echo esc_url($equipment_link); ?>">
                                View Details
                            </a>
                        </div>
                    </li>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
    </div>
</div>