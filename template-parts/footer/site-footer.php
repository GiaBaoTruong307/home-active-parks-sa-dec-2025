<footer>
    <div class="container">
        <div class="content">
            <div class="content-left">
                <?php
                $logo = get_field('footer_info_logo', 'option');
                $title = get_field('footer_info_title', 'option');
                $phone = get_field('footer_info_phone', 'option');
                $location = get_field('footer_info_location', 'option');
                ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo">
                    <img src="<?php echo esc_url($logo['url']) ?>" alt="<?php echo esc_attr($logo['alt']) ?>">
                </a>
                <div class="info">
                    <h6 class="heading-6"><?php echo esc_html($title); ?></h6>
                    <p><?php echo esc_html($phone); ?></p>
                    <p><?php echo esc_html($location); ?></p>
                </div>
            </div>

            <div class="content-right">
                <div class="top">
                    <div class="info">
                        <?php
                        $title = get_field('footer_form_title', 'option');
                        $description = get_field('footer_form_description', 'option');
                        $text_input = get_field('footer_form_text_input', 'option');
                        ?>
                        <h4 class="heading-4"><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($description); ?></p>
                    </div>

                    <form>
                        <input type="email" placeholder="<?php echo esc_attr($text_input); ?>">
                        <button type="submit" class="btn-subscribe">
                            <?php
                            $arrow_icon = get_template_directory_uri() . '/assets/icons/ArrowUpRight.svg';
                            ?>
                            <img src="<?php echo esc_url($arrow_icon); ?>" alt="Arrow Icon">
                        </button>
                    </form>
                </div>

                <nav class="footer-navigation">
                    <ul>
                        <?php get_template_part('template-parts/footer/menu'); ?>
                    </ul>
                </nav>


            </div>
        </div>

        <div class="copy-right">
            <div class="left">
                <?php
                $description = get_field('footer_copyright_description', 'option');
                ?>
                <p class="caption-1"><?php echo esc_html($description); ?></p>
            </div>


            <ul class="footer-links">
                <?php get_template_part('template-parts/footer/copyright-links'); ?>
            </ul>
        </div>
    </div>
</footer>