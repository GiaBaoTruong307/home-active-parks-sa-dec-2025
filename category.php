<?php get_header(); ?>

<?php
$category = get_queried_object();
?>

<main class="category-page">

    <!-- HERO -->
    <section class="category-hero">
        <div class="container">
            <span class="label">Category</span>
            <h1 class="title"><?php echo esc_html($category->name); ?></h1>

            <?php if ($category->description) : ?>
                <p class="description">
                    <?php echo esc_html($category->description); ?>
                </p>
            <?php endif; ?>
        </div>
    </section>

    <!-- POST LIST -->
    <section class="category-posts">
        <div class="container">

            <?php if (have_posts()) : ?>
                <div class="blog-grid">

                    <?php while (have_posts()) : the_post(); ?>
                        <article class="blog-card">

                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            <?php endif; ?>

                            <h2 class="title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <p class="excerpt">
                                <?php the_excerpt(); ?>
                            </p>

                        </article>
                    <?php endwhile; ?>

                </div>

                <?php the_posts_pagination(); ?>

            <?php else : ?>
                <p>No posts in this category.</p>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>