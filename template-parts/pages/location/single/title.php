 <div class="title">
     <?php
        $location = get_field('location');
        $title = get_the_title();
        $iconLocation = get_template_directory_uri() . '/assets/icons/location.svg';

        if ($location || $title) { ?>
         <div class="location">
             <img src="<?php echo esc_url($iconLocation); ?>" alt="Location">
             <p class="body-2"><?php echo esc_html($location); ?></p>
         </div>
         <h2 class="heading-2"><?php the_title(); ?> </h2>
     <?php }
        ?>
 </div>