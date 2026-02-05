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