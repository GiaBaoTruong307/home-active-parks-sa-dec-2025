<div class="related-locations">
    <h4 class="heading-4">Parks where this equipment exists</h4>
    <div class="feature-cards">
        <?php
        $relatedLocations = get_field('related_locations');

        if ($relatedLocations && is_array($relatedLocations)) {
            foreach ($relatedLocations as $location) {
                get_template_part('template-parts/components/location-card', null, array(
                    'post_id' => $location->ID
                ));
            }
        }
        ?>
    </div>
</div>