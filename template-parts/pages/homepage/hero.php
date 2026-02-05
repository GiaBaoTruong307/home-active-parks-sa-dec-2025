   <section>
       <?php
        $hero_image = get_field('hero_section_image');
        $hero_title = get_field('hero_section_title');
        $hero_btn = get_field('hero_section_button');

        if ($hero_image || $hero_title || $hero_btn || $hero_btn['url'] || $hero_btn['title']) { ?>
           <div style="background: url('<?php echo esc_url($hero_image['url']); ?>') lightgray 50% / cover no-repeat;" class="hero-image">
               <div class="container">
                   <div class="content">
                       <h1 class="heading-1"><?php echo esc_html($hero_title); ?></h1>
                       <a class="hero-btn button-font" href="<?php echo esc_url($hero_btn['url']); ?>">
                           <?php echo esc_html($hero_btn['title']); ?>
                       </a>
                   </div>
               </div>
           </div>
       <?php } ?>
   </section>