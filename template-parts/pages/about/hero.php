 <?php
    $heroImage = get_field('hero_about_hero_image');
    $heroTitle = get_field('hero_about_hero_title');
    $heroDesc  = get_field('hero_about_hero_desc');
    ?>

 <?php if ($heroImage || $heroTitle || $heroDesc) { ?>
     <section class="about-hero"
         <?php if ($heroImage) { ?>
         style="background-image: url('<?php echo esc_url($heroImage['url']); ?>')"
         <?php } ?>>
         <div class="container">
             <?php if ($heroTitle) { ?>
                 <h1><?php echo esc_html($heroTitle); ?></h1>
             <?php } ?>

             <?php if ($heroDesc) { ?>
                 <p><?php echo esc_html($heroDesc); ?></p>
             <?php } ?>
         </div>
     </section>
 <?php } ?>