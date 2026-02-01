<?php
get_header();
?>

<section class="location-archive">
    <div class="container">
        <div class="location-grid">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();

                    $location = get_field('location');
                    $amenities = get_field('amenities');
                    $equipment = get_field('equipment');

                    $iconLocation = get_template_directory_uri() . "/assets/icons/location.svg";
                    $iconArrow = get_template_directory_uri() . "/assets/icons/arrow-right.svg";
                ?>

                    <article class="card">
                        <a class="link" href="<?php the_permalink(); ?>"></a>

                        <div class="card-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                        </div>

                        <div class="card-content">
                            <?php if ($location) : ?>
                                <p class="card-location">
                                    <img src="<?php echo esc_url($iconLocation); ?>" alt="Location">
                                    <span class="caption-1"><?php echo esc_html($location); ?></span>
                                </p>
                            <?php endif; ?>

                            <h5 class="heading-5"><?php the_title(); ?></h5>

                            <div class="card-description caption-1">
                                <?php if ($amenities) : ?>
                                    <span><?php echo esc_html($amenities); ?></span>
                                <?php endif; ?>

                                <?php if ($equipment) : ?>
                                    <span><?php echo esc_html($equipment); ?></span>
                                <?php endif; ?>
                            </div>

                            <div class="card-divider"></div>

                            <a href="<?php the_permalink(); ?>" class="card-btn button-small-font">
                                View details
                                <img src="<?php echo esc_url($iconArrow); ?>" alt="Arrow Right">
                            </a>
                        </div>
                    </article>

                <?php endwhile; ?>
            <?php else : ?>
                <p>No locations found.</p>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>