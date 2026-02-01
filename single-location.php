<?php get_header(); ?>

<main style="height: 1500px;">
    <!-- FEATURE IMAGE -->
    <section>
        <?php
        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>

        <div style="background: url('<?php echo esc_url($thumbnail_url); ?>') lightgray 50% / cover no-repeat;" class="feature-image"></div>
    </section>

    <!-- DETAILS -->
    <section class="details-container">
        <div class="title">
            <h2 class="heading-2"><?php the_title(); ?></h2>
        </div>
    </section>

</main>


<?php get_footer(); ?>