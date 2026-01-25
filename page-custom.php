<?php
/*
Template Name: Custom Page
*/
get_header();
?>

<!-- Nội dung -->
<main class="about-page">
    <!-- HERO -->
    <?php
    $hero_title = get_field('hero_title');
    $hero_desc  = get_field('hero_description');
    $hero_img   = get_field('hero_background');
    ?>
    <section class="about-hero" style="background-image: url('<?php echo esc_url($hero_img['url'] ?? ''); ?>')">
        <div class="container">
            <h1><?php echo esc_html($hero_title); ?></h1>
            <p><?php echo esc_html($hero_desc); ?></p>
        </div>
    </section>

    <!-- INTRO -->
    <section class="about-intro">
        <div class="container">
            <h2 class="heading-2"><?php the_field('intro_title'); ?></h2>
            <p><?php the_field('intro_content'); ?></p>
        </div>
    </section>

    <!-- VALUES -->
    <?php if (have_rows('company_values')) : ?>
        <section class="about-values">
            <div class="container">
                <h2 class="heading-2">Our Core Values</h2>
                <div class="values-list">
                    <?php while (have_rows('company_values')) : the_row(); ?>
                        <div class="value-item">
                            <h3><?php the_sub_field('title'); ?></h3>
                            <p><?php the_sub_field('description'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <!-- TEAM -->
    <?php if (have_rows('team_members')) : ?>
        <section class="about-team">
            <div class="container">
                <h2>Meet Our Team</h2>
                <div class="team-list">
                    <?php while (have_rows('team_members')) : the_row();
                        $avatar = get_sub_field('avatar');
                    ?>
                        <div class="team-item">
                            <img src="<?php echo esc_url($avatar['url']); ?>" alt="">
                            <h3><?php the_sub_field('name'); ?></h3>
                            <span><?php the_sub_field('position'); ?></span>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

</main>

<?php get_footer(); ?>