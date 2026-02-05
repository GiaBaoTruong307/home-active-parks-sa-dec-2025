 <?php
    $introTitle   = get_field('company_introduction_about_intro_title');
    $introContent = get_field('company_introduction_about_intro_content');
    $introImage   = get_field('company_introduction_about_intro_image');
    ?>

 <?php if ($introTitle || $introContent || $introImage) { ?>
     <section class="about-intro">
         <div class="container">
             <div class="intro-grid">

                 <?php if ($introTitle || $introContent) { ?>
                     <div class="intro-content">
                         <?php if ($introTitle) { ?>
                             <h2><?php echo esc_html($introTitle); ?></h2>
                         <?php } ?>

                         <?php if ($introContent) { ?>
                             <?php echo wp_kses_post($introContent); ?>
                         <?php } ?>
                     </div>
                 <?php } ?>

                 <?php if ($introImage) { ?>
                     <div class="intro-image">
                         <img src="<?php echo esc_url($introImage['url']); ?>" alt="">
                     </div>
                 <?php } ?>

             </div>
         </div>
     </section>
 <?php } ?>