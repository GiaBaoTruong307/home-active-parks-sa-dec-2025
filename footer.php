<footer class="footer-main">
    <div class="container">
        <div class="footer-inner">
            <!-- LEFT -->
            <div class="footer-left">
                <?php if ($logo = get_field('footer_logo', 'option')): ?>
                    <img class="logo-footer" src="<?= esc_url($logo['url']); ?>" alt="">
                <?php endif; ?>

                <div class="info">
                    <h6 class="heading-6"><?php the_field('company_name', 'option'); ?></h6>
                    <p><?php the_field('company_phone', 'option'); ?></p>
                    <p><?php the_field('company_address', 'option'); ?></p>
                </div>

            </div>

            <!-- RIGHT -->
            <div class="footer-right">
                <div class="top">
                    <div class="connect">
                        <h4 class="heading-4"><?php the_field('subscribe_title', 'option'); ?></h4>
                        <p><?php the_field('subscribe_desc', 'option'); ?></p>
                    </div>

                    <form class="subscribe-btn">
                        <input
                            class="email-input"
                            type="email"
                            placeholder="<?php the_field('subscribe_placeholder', 'option'); ?>">
                        <button class="submit-btn">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/icons/ArrowUpRight.svg" alt="Submit">
                        </button>
                    </form>
                </div>

                <!-- MENU -->
                <div class="bottom">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer-menu',
                        'container' => false
                    ]);
                    ?>
                </div>
            </div>
        </div>

        <!-- COPY RIGHT -->
        <div class="copy-right">
            <p class="caption-1"><?php the_field('copyright_text', 'option'); ?></p>

            <?php if (have_rows('policy_links', 'option')): ?>
                <ul>
                    <?php while (have_rows('policy_links', 'option')): the_row(); ?>
                        <?php $link = get_sub_field('policy_url'); ?>
                        <li>
                            <a class="caption-1" href="<?= esc_url($link['url']); ?>">
                                <?php the_sub_field('policy_text'); ?>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>