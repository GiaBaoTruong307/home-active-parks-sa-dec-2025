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
             <nav class="header-navigation">
                 <ul>
                     <?php get_template_part('template-parts/header/menu'); ?>
                 </ul>
             </nav>

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
 <nav class="toggleMenuMobile">
     <ul>
         <?php get_template_part('template-parts/header/menu'); ?>
     </ul>
 </nav>