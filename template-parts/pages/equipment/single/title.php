<div class="title">
    <?php
    $title = get_the_title();
    $sport = get_the_terms(get_the_ID(), 'sports');

    if ($sport && !is_wp_error($sport)) : ?>
        <div class="sport-list">
            <?php foreach ($sport as $term) : ?>
                <p class="body-2"><?php echo esc_html($term->name); ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($title) : ?>
        <h2 class="heading-2"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>
</div>