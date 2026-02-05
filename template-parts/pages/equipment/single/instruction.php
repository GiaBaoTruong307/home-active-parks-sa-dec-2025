<div class="instructions">
    <div class="left">
        <h4 class="heading-4">Instructions - <?php the_title(); ?></h4>
        <ol class="instruction-list">
            <?php
            $instructions = get_field('instructions');
            if ($instructions) {
                while (have_rows('instructions')) {
                    the_row();
                    $step = get_sub_field('step_content'); ?>
                    <li class="instruction-item body-2"><?php echo esc_html($step); ?></li>
            <?php }
            } ?>
        </ol>
    </div>

    <div class="right">
        <?php
        $safety_notes = get_field('safety_notes');
        ?>
        <h4 class="heading-4">Safety Notes</h4>
        <p class="body-2"><?php if ($safety_notes) echo esc_html($safety_notes); ?></p>
    </div>
</div>