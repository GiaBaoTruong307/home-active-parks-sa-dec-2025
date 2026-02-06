<?php get_header(); ?>

<div class="search">
    <div class="container">
        <h1>Search results for: "<?php echo get_search_query(); ?>"</h1>

        <?php if (have_posts()) : ?>
            <ul class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <?php if (get_post_type() !== 'post') : ?>
                            <span class="post-type"><?php echo get_post_type(); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>No results found for "<?php echo get_search_query(); ?>". Please try another search.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>