 <div class="amenities">
     <h4 class="heading-4">Amenities</h4>

     <?php
        $amenities = get_the_terms(get_the_ID(), 'amenities');

        if ($amenities) :
        ?>
         <ul class="amenities-list">
             <?php foreach ($amenities as $amenity) :
                    $icon = get_field('icon', 'amenities_' . $amenity->term_id);
                ?>
                 <li class="amenity-item">
                     <?php if ($icon) : ?>
                         <img
                             src="<?php echo esc_url($icon['url']); ?>"
                             alt="<?php echo esc_attr($amenity->name); ?>"
                             class="amenity-icon">
                     <?php endif; ?>

                     <span class="body-2"><?php echo esc_html($amenity->name); ?></span>
                 </li>
             <?php endforeach; ?>
         </ul>
     <?php endif; ?>
 </div>