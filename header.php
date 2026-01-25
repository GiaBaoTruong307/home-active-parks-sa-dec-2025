<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!--  Allow plugins to hook into the body element -->
    <?php wp_body_open(); ?>

    <header>
        <div class="container">
            <div class="header-inside">
                <!-- LOGO -->
                <div class="logo">
                    <?php if (has_custom_logo()) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php the_custom_logo(); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- NAVIGATION MENU -->
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'main-nav',
                    'menu_class' => 'menu',
                ])
                ?>

                <!-- RIGHT ICON -->
                <div class="search-container">
                    <img class="search-icon" src="<?php echo get_template_directory_uri(); ?>/assets/icons/search-icon.svg" alt="Search Icon">
                    <div class="toggleSearchBox">
                        <input type="text" class="search-box" placeholder="Search...">
                        <img class="clear" src="<?php echo get_template_directory_uri(); ?>/assets/icons/clear-icon.svg" alt="Clear Icon">
                    </div>
                </div>
            </div>
        </div>
    </header>