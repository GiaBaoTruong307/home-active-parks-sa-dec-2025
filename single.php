<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <main class="blog-detail">

            <!-- HERO -->
            <section class="blog-detail-hero"
                style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>')">
                <div class="container">
                    <div class="meta">
                        <span class="date"><?php echo get_the_date(); ?></span>
                        <span class="category"><?php the_category(', '); ?></span>
                    </div>

                    <h1 class="title"><?php the_title(); ?></h1>
                </div>
            </section>

            <!-- CONTENT -->
            <section class="blog-detail-content">
                <div class="container">

                    <article class="content">
                        <?php the_content(); ?>
                    </article>

                </div>
            </section>

        </main>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>