<?php
$links = array();
if (have_rows('footer_form_page_links', 'option')) :
    while (have_rows('footer_form_page_links', 'option')) : the_row();
        $link = get_sub_field('link');
        $links[] = $link;
    endwhile;
endif;

foreach ($links as $link) :
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
    <li>
        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php echo esc_html($link_title); ?>
        </a>
    </li>
<?php endforeach; ?>