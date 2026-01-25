<?php get_header(); ?>

<?php
$blog_page_id = get_option('page_for_posts');

$blog_title       = get_field('blog_title', $blog_page_id);
$blog_description = get_field('blog_description', $blog_page_id);
$hero_image       = get_field('blog_hero_image', $blog_page_id);

$hero_bg = '';
if ($hero_image) {
    $hero_bg = is_array($hero_image) ? $hero_image['url'] : $hero_image;
}
?>

<main class="blog-page">

    <!-- HERO -->
    <section class="blog-hero"
        style="background-image: url('<?php echo esc_url($hero_bg); ?>')">
        <div class="container">
            <h1><?php echo esc_html($blog_title ?: get_the_title($blog_page_id)); ?></h1>

            <?php if ($blog_description) : ?>
                <p><?php echo esc_html($blog_description); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <!-- CATEGORY FILTER -->
    <section class="blog-categories">
        <div class="container">
            <ul class="category-list">
                <li>
                    <a href="<?php echo esc_url(get_permalink($blog_page_id)); ?>"
                        class="<?php if (!is_category()) echo 'active'; ?>">
                        All
                    </a>
                </li>

                <?php
                $categories = get_categories([
                    'hide_empty' => true
                ]);

                foreach ($categories as $cat) :
                ?>
                    <li>
                        <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
                            <?php echo esc_html($cat->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- BLOG LIST -->
    <section class="blog-list">
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
                <p>No posts found.</p>
            <?php endif; ?>

        </div>
    </section>

</main>

<?php get_footer(); ?>