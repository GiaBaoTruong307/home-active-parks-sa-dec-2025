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