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