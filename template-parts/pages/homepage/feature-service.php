 <section>
     <div class="container">
         <div class="feature-main">
             <div class="header-justify-between">
                 <?php
                    $title = get_field('feature_section_title');
                    $description = get_field('feature_section_description');
                    $button = get_field('feature_section_button');
                    $icon = get_template_directory_uri() . "/assets/icons/arrow-right-2.svg";

                    if ($title || $description || $button) { ?>
                     <div class="feature-text">
                         <h3 class="heading-3"><?php echo esc_html($title); ?></h3>
                         <p class="body-2"><?php echo esc_html($description); ?></p>
                     </div>

                     <a class="right-btn button-small-font" href="<?php echo esc_url($button['url']); ?>"><?php echo esc_html($button['title']); ?>
                         <img src="<?php echo esc_url($icon); ?>" alt="Arrow Right">
                     </a>
                 <?php } ?>
             </div>

             <div class="feature-cards">
                 <?php
                    $locationPosts = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'location',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    ));

                    if ($locationPosts->have_posts()) {
                        while ($locationPosts->have_posts()) {
                            $locationPosts->the_post();

                            get_template_part('template-parts/components/location-card', null, array(
                                'post_id' => get_the_ID()
                            ));
                        }
                        wp_reset_postdata();
                    }
                    ?>
             </div>
         </div>
     </div>
 </section>