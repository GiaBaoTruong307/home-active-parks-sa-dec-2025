 <section id="equipment" class="brand-main">
     <div class="container">
         <div class="brand-inner">
             <div class="header-justify-between">
                 <?php
                    $title = get_field('brand_section_title');
                    $button = get_field('brand_section_button');
                    $icon = get_template_directory_uri() . "/assets/icons/arrow-right-2.svg";

                    if ($title || $button) { ?>
                     <div class="feature-text">
                         <h3 class="heading-3"><?php echo esc_html($title); ?></h3>
                     </div>

                     <a style="margin-top: 0px" class="right-btn button-small-font" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?>
                         <img src="<?php echo esc_url($icon); ?>" alt="Arrow Right">
                     </a>
                 <?php  }
                    ?>
             </div>
             <ul class="brands">
                 <?php
                    $equipment_list = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'equipment',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ));

                    if ($equipment_list->have_posts()) {
                        while ($equipment_list->have_posts()) {
                            $equipment_list->the_post();
                            $equipment_title = get_the_title();

                            $cover_id = get_field('equipment_cover');
                            $equipment_image = $cover_id
                                ? wp_get_attachment_image_url($cover_id, 'full')
                                : get_the_post_thumbnail_url(null, 'full');
                    ?>

                         <li class="brand">
                             <a href="<?php the_permalink(); ?>" class="brand-link"></a>

                             <div class="brand-image">
                                 <img src="<?php echo esc_url($equipment_image); ?>" alt="<?php echo esc_attr($equipment_title); ?>">
                             </div>

                             <div class="content">
                                 <h6 class="heading-6"><?php echo esc_html($equipment_title); ?></h6>
                                 <a style="text-decoration: none" class="caption-1" href="<?php the_permalink(); ?>">View Details</a>
                             </div>
                         </li>
                 <?php }
                    }
                    wp_reset_postdata();  ?>
             </ul>
         </div>
     </div>
 </section>