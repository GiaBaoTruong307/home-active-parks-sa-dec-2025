 <header>
     <div class="container">
         <div class="header-inside">
             <!-- LOGO -->
             <div class="header-logo">
                 <?php
                    $logo = get_field('logo', 'option');
                    if ($logo) { ?>
                     <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo esc_attr($logo['alt']); ?>"></a>
                 <?php } ?>
             </div>

             <!-- NAVIGATION MENU -->
             <?php get_template_part('template-parts/layout/header/menu'); ?>

             <!-- ICONS -->
             <?php
                $searchIcon = get_field('icon_search', 'option');
                $menuIcon = get_field('icon_menu', 'option');

                if ($searchIcon || $menuIcon) { ?>
                 <div class="search-container">
                     <img src="<?php echo esc_url($searchIcon['url']); ?>" class="search-icon" alt="Search Icon Header">
                     <div class="toggleSearchBox">
                         <input type="text" class="search-box" placeholder="Search...">
                     </div>
                 </div>
                 <img src="<?php echo esc_url($menuIcon['url']); ?>" class="menu-icon" alt="Menu Icon Header">
             <?php } ?>
         </div>
     </div>
 </header>
 <!-- MENU OVERLAY -->
 <div class="menu-overlay"></div>
 <!-- MENU MOBILE -->
 <div class="toggleMenuMobile">
     <div class="menu-header">
         <p>Active Parks</p>
         <button class="close-menu-btn">
             <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/clear-icon.svg" alt="Close Menu">
         </button>
     </div>
     <?php get_template_part('template-parts/layout/header/menu'); ?>
 </div>