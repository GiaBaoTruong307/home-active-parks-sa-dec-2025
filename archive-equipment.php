<?php
get_header();
?>

<section class="archive-equipment">
    <div class="container">
        <ul class="equipment-grid">

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();

                    $title = get_the_title();
                    $image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                ?>
                    <li class="equipment-card">
                        <!-- overlay link -->
                        <a href="<?php the_permalink(); ?>"
                            class="equipment-link"
                            aria-label="<?php echo esc_attr($title); ?>"></a>

                        <div class="equipment-image">
                            <?php if ($image) : ?>
                                <img src="<?php echo esc_url($image); ?>"
                                    alt="<?php echo esc_attr($title); ?>">
                            <?php endif; ?>
                        </div>

                        <div class="equipment-content">
                            <h6 class="heading-6"><?php echo esc_html($title); ?></h6>
                            <span class="equipment-cta caption-1">
                                View details →
                            </span>
                        </div>
                    </li>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No equipment found.</p>
            <?php endif; ?>

        </ul>
    </div>
</section>

<?php get_footer(); ?>