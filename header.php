<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="container">
        <div class="header-inside">
            <!-- LOGO -->
            <div class="header-logo">
                <?php the_custom_logo(); ?>
            </div>

            <!-- NAVIGATION MENU -->
            <?php get_template_part('template-parts/header/menu-header-desktop'); ?>

            <!-- ICONS -->
            <?php
            $searchIcon = get_theme_file_uri('/assets/icons/search-icon.svg');
            $menuIcon = get_theme_file_uri('/assets/icons/menu.svg');
            ?>
            <div class="search-container">
                <img src="<?php echo $searchIcon; ?>" class="search-icon" alt="Search Icon Header">
                <div class="toggleSearchBox">
                    <input type="text" class="search-box" placeholder="Search...">
                </div>
            </div>
            <div class="menu-container">
                <img src="<?php echo $menuIcon; ?>" class="menu-icon" alt="Menu Icon Header">
                <div class="toggleMenuMobile">
                    <?php get_template_part('template-parts/header/menu-header-mobile'); ?>
                </div>
            </div>
        </div>
    </header>