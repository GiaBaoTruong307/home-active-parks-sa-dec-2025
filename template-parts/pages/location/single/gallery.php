<?php
$gallery = get_field('gallery');
$max_visible = 5;

if ($gallery && is_array($gallery)):
?>
    <div class="gallery-inner">
        <h4 class="heading-4">Gallery Images</h4>

        <div class="gallery js-gallery js-gallery-scroll">
            <?php foreach ($gallery as $index => $image): ?>
                <?php
                $url    = $image['url'];
                $alt    = $image['alt'];
                $width  = $image['width'];
                $height = $image['height'];
                ?>
                <?php if ($index === 0): ?>
                    <!-- LARGE IMAGE -->
                    <a href="<?= esc_url($url); ?>"
                        class="gallery-item gallery-item--large js-open-lightbox"
                        data-index="<?= $index; ?>"
                        data-pswp-width="<?= esc_attr($width); ?>"
                        data-pswp-height="<?= esc_attr($height); ?>">
                        <img src="<?= esc_url($url); ?>" alt="<?= esc_attr($alt); ?>">
                        <span class="gallery-view-all button-small-f">
                            <img src="<?= get_template_directory_uri(); ?>/assets/icons/Image.svg" alt="" class="gallery-view-all-icon">
                            View All Photo
                        </span>
                    </a>
                <?php else: ?>
                    <!-- OTHER IMAGES -->
                    <a href="<?= esc_url($url); ?>"
                        class="gallery-item gallery-item--vertical"
                        data-index="<?= $index; ?>"
                        data-pswp-width="<?= esc_attr($width); ?>"
                        data-pswp-height="<?= esc_attr($height); ?>">
                        <img src="<?= esc_url($url); ?>" alt="<?= esc_attr($alt); ?>">
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- MOBILE DOTS -->
        <ul class="gallery-dots js-gallery-dots"></ul>
    </div>
<?php endif; ?>