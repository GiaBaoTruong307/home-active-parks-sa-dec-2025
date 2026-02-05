 <section class="container">
     <div class="benefit-main">
         <?php
            $benefit_title = get_field('benefit_section_title');
            $benefit_description = get_field('benefit_section_description');

            if ($benefit_title || $benefit_description) { ?>
             <div class="benefit-text">
                 <h3 class="heading-3">
                     <?php echo esc_html($benefit_title); ?>
                 </h3>
                 <p class="body-2">
                     <?php echo esc_html($benefit_description); ?>
                 </p>
             </div>
         <?php } ?>

         <ol class="benefit-list">
             <?php
                if (have_rows('benefit_section_benefit_list')) {
                    while (have_rows('benefit_section_benefit_list')) {
                        the_row();
                        $icon = get_sub_field('icon');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description'); ?>
                     <li class="benefit">
                         <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                         <div class="content">
                             <h5 class="heading-5"><?php echo esc_html($title); ?></h5>
                             <p><?php echo esc_html($description); ?></p>
                         </div>
                     </li>
             <?php  }
                } ?>
         </ol>
     </div>
 </section>