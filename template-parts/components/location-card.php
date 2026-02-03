<?php
$post_id = isset($args['post_id']) ? $args['post_id'] : get_the_ID();

$location = get_field('location', $post_id);
$title = get_the_title($post_id);
$permalink = get_permalink($post_id);
$thumbnail = get_the_post_thumbnail_url($post_id);
$iconLocation = get_template_directory_uri() . "/assets/icons/location.svg";
$iconArrow = get_template_directory_uri() . "/assets/icons/arrow-right.svg";

// Taxonomy amenities
$amenities = get_the_terms($post_id, 'amenities');
$amenities_list = [];
if ($amenities && !is_wp_error($amenities)) {
    foreach ($amenities as $amenity) {
        $amenities_list[] = $amenity->name;
    }
}
$amenities_list_formatted = array_map('ucfirst', array_map('strtolower', $amenities_list));
$amenities_text = !empty($amenities_list_formatted) ? implode(', ', $amenities_list_formatted) : 'None';

// ACF relationship field for equipment
$equipments = get_field('related_equipment', $post_id);
$equipment_list = [];
if ($equipments && is_array($equipments)) {
    foreach ($equipments as $equipment) {
        $equipment_list[] = get_the_title($equipment->ID);
    }
}
$equipment_list_formatted = array_map('ucfirst', array_map('strtolower', $equipment_list));
$equipment_text = !empty($equipment_list_formatted) ? implode(', ', $equipment_list_formatted) : 'None';
?>

<article class="card">
    <a class="link" href="<?php echo esc_url($permalink); ?>"></a>

    <div class="card-image">
        <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($title); ?>">
    </div>

    <div class="card-content">
        <p class="card-location">
            <img src="<?php echo esc_url($iconLocation); ?>" alt="Location">
            <span class="caption-1"><?php echo esc_html($location); ?></span>
        </p>

        <h5 class="heading-5"><?php echo esc_html($title); ?></h5>

        <div class="card-description caption-1">
            <span>Amenities: <?php echo esc_html($amenities_text); ?></span>
            <span>Equipment: <?php echo esc_html($equipment_text); ?></span>
        </div>

        <div class="card-divider"></div>

        <a href="<?php echo esc_url($permalink); ?>" class="card-btn button-small-font">
            View Details
            <img src="<?php echo esc_url($iconArrow); ?>" alt="Arrow Right">
        </a>
    </div>
</article>