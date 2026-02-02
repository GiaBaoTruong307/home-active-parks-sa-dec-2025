<?php get_header(); ?>

<main>
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
        <div class="title">
            <?php
            $location = get_field('location');
            $title = get_the_title();
            $iconLocation = get_template_directory_uri() . '/assets/icons/location.svg';

            if ($location || $title) { ?>
                <div class="location">
                    <img src="<?php echo esc_url($iconLocation); ?>" alt="Location">
                    <p class="body-2"><?php echo esc_html($location); ?></p>
                </div>
                <h2 class="heading-2"><?php the_title(); ?> </h2>
            <?php }
            ?>
        </div>

        <!-- DESC & OVERVIEW -->
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
                            $amenities_count = 0;

                            if ($amenities && is_array($amenities)) {
                                $amenities_count = count($amenities); ?>
                                <p>Amenities: </p>
                                <p class="button-font"><?php echo esc_html($amenities_count); ?> Available</p>
                            <?php } ?>
                        </div>

                        <div class="equipment">
                            <?php
                            $equipments = get_field('related_equipment');
                            $equipment_count = 0;

                            if ($equipments && is_array($equipments)) {
                                $equipment_count = count($equipments); ?>
                                <p>Equipment:</p>
                                <p class="button-font"><?php echo esc_html($equipment_count); ?> Types</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AMENITIES -->
        <div class="amenities">
            <h4 class="heading-4">Amenities</h4>

            <?php
            $amenities = get_the_terms(get_the_ID(), 'amenities');

            if ($amenities) :
            ?>
                <ul class="amenities-list">
                    <?php foreach ($amenities as $amenity) :
                        $icon = get_field('icon', 'amenities_' . $amenity->term_id);
                    ?>
                        <li class="amenity-item">
                            <?php if ($icon) : ?>
                                <img
                                    src="<?php echo esc_url($icon['url']); ?>"
                                    alt="<?php echo esc_attr($amenity->name); ?>"
                                    class="amenity-icon">
                            <?php endif; ?>

                            <span class="body-2"><?php echo esc_html($amenity->name); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <!-- GALLERY IMAGES -->
        <?php if (have_rows('gallery_flexible')): ?>
            <div class="gallery-inner">
                <h4 class="heading-4">Gallery Images</h4>

                <div class="gallery">
                    <?php while (have_rows('gallery_flexible')): the_row();
                        $image = get_sub_field('image');
                        if (!$image) continue;

                        $url    = $image['url'];
                        $width  = $image['width'];
                        $height = $image['height'];
                        $alt    = $image['alt'];
                    ?>
                        <?php if (get_row_layout() === 'large_image'): ?>
                            <a href="<?= esc_url($url); ?>"
                                class="gallery-item gallery-item--large">
                                <img src="<?= esc_url($url); ?>" alt="<?= esc_attr($alt); ?>">
                            </a>

                        <?php elseif (get_row_layout() === 'vertical_image'): ?>
                            <a href="<?= esc_url($url); ?>"
                                class="gallery-item gallery-item--vertical">
                                <img src="<?= esc_url($url); ?>" alt="<?= esc_attr($alt); ?>">
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>


        <!-- EQUIPMENT LIST -->
        <div id="equipment" class="brand-main-1">
            <div class="brand-inner">
                <h4 class="heading-4">Equipment List</h4>
                <ul class="brands">
                    <?php
                    $equipments = get_field('related_equipment');

                    if ($equipments && is_array($equipments)) :
                        foreach ($equipments as $equipment) :
                            $equipment_id    = $equipment->ID;
                            $equipment_title = get_the_title($equipment_id);
                            $equipment_link  = get_permalink($equipment_id);
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
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>