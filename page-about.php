<?php
/* Template Name: About Us */
get_header();
?>

<main class="page-about">

    <!-- HERO -->
    <?php
    $heroImage = get_field('hero_about_hero_image');
    $heroTitle = get_field('hero_about_hero_title');
    $heroDesc  = get_field('hero_about_hero_desc');
    ?>

    <?php if ($heroImage || $heroTitle || $heroDesc) { ?>
        <section class="about-hero"
            <?php if ($heroImage) { ?>
            style="background-image: url('<?php echo esc_url($heroImage['url']); ?>')"
            <?php } ?>>
            <div class="container">
                <?php if ($heroTitle) { ?>
                    <h1><?php echo esc_html($heroTitle); ?></h1>
                <?php } ?>

                <?php if ($heroDesc) { ?>
                    <p><?php echo esc_html($heroDesc); ?></p>
                <?php } ?>
            </div>
        </section>
    <?php } ?>

    <!-- INTRO -->
    <?php
    $introTitle   = get_field('company_introduction_about_intro_title');
    $introContent = get_field('company_introduction_about_intro_content');
    $introImage   = get_field('company_introduction_about_intro_image');
    ?>

    <?php if ($introTitle || $introContent || $introImage) { ?>
        <section class="about-intro">
            <div class="container">
                <div class="intro-grid">

                    <?php if ($introTitle || $introContent) { ?>
                        <div class="intro-content">
                            <?php if ($introTitle) { ?>
                                <h2><?php echo esc_html($introTitle); ?></h2>
                            <?php } ?>

                            <?php if ($introContent) { ?>
                                <?php echo wp_kses_post($introContent); ?>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <?php if ($introImage) { ?>
                        <div class="intro-image">
                            <img src="<?php echo esc_url($introImage['url']); ?>" alt="">
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
    <?php } ?>

    <!-- VISION & MISSION -->
    <?php
    $aboutVM = have_rows('vision_&_mission_about_vm');
    ?>

    <?php if ($aboutVM) { ?>
        <section class="about-vm">
            <div class="container">
                <div class="vm-grid">

                    <?php while (have_rows('vision_&_mission_about_vm')) {
                        the_row();
                        $icon    = get_sub_field('icon');
                        $title   = get_sub_field('title');
                        $content = get_sub_field('content');
                    ?>
                        <div class="vm-item">
                            <?php if ($icon) { ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="">
                            <?php } ?>

                            <?php if ($title) { ?>
                                <h3><?php echo esc_html($title); ?></h3>
                            <?php } ?>

                            <?php if ($content) { ?>
                                <p><?php echo esc_html($content); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </section>
    <?php } ?>

    <!-- CORE VALUES -->
    <?php
    $aboutValues = have_rows('core_values_about_values');
    ?>

    <?php if ($aboutValues) { ?>
        <section class="about-values">
            <div class="container">
                <h2>Core Values</h2>

                <div class="values-grid">
                    <?php while (have_rows('core_values_about_values')) {
                        the_row();
                        $valueTitle = get_sub_field('value_title');
                        $valueDesc  = get_sub_field('value_description');
                    ?>
                        <div class="value-item">
                            <?php if ($valueTitle) { ?>
                                <h4><?php echo esc_html($valueTitle); ?></h4>
                            <?php } ?>

                            <?php if ($valueDesc) { ?>
                                <p><?php echo esc_html($valueDesc); ?></p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section>
    <?php } ?>

    <!-- TEAM -->
    <?php
    $aboutTeam = have_rows('team_about_team');
    ?>

    <?php if ($aboutTeam) { ?>
        <section class="about-team">
            <div class="container">
                <h2>Our Team</h2>

                <div class="team-grid">
                    <?php while (have_rows('team_about_team')) {
                        the_row();
                        $avatar   = get_sub_field('avatar');
                        $name     = get_sub_field('name');
                        $position = get_sub_field('position');
                    ?>
                        <div class="team-item">
                            <?php if ($avatar) { ?>
                                <img src="<?php echo esc_url($avatar['url']); ?>" alt="">
                            <?php } ?>

                            <?php if ($name) { ?>
                                <h4><?php echo esc_html($name); ?></h4>
                            <?php } ?>

                            <?php if ($position) { ?>
                                <span><?php echo esc_html($position); ?></span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section>
    <?php } ?>

</main>

<?php get_footer(); ?>