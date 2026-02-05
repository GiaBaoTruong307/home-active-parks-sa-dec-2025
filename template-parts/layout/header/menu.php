<nav class="header-navigation">
    <ul>
        <?php
        if (!have_rows('page_links', 'option')) return;

        // Get current context once
        global $wp;
        $current_url = untrailingslashit(home_url($wp->request));
        $is_front = is_front_page();
        $archive_url = is_singular() ? untrailingslashit(get_post_type_archive_link(get_post_type())) : false;

        while (have_rows('page_links', 'option')) {
            the_row();
            $link = get_sub_field('link');

            if (empty($link['url'])) continue;

            $link_url = untrailingslashit($link['url']);
            $is_current = (
                $current_url === $link_url ||
                ($is_front && ($link_url === untrailingslashit(home_url()))) ||
                ($archive_url && $archive_url === $link_url)
            );
        ?>
            <li>
                <a href="<?php echo esc_url($link['url']); ?>"
                    <?php if (!empty($link['target'])) echo 'target="' . esc_attr($link['target']) . '"'; ?>
                    <?php if ($is_current) echo 'class="active"'; ?>>
                    <?php echo esc_html($link['title'] ?: ''); ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>