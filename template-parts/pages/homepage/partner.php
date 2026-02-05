  <section class="container">
      <div class="partner-inner">
          <?php
            $title = get_field('partners_section_title');
            ?>

          <h3 class="heading-3"><?php if ($title) echo esc_html($title); ?></h3>
          <ul class="partners">
              <?php
                if (have_rows('partners_section_partners_logo')) {
                    while (have_rows('partners_section_partners_logo')) {
                        the_row();
                        $logo = get_sub_field('logo'); ?>
                      <?php
                        if ($logo) { ?>
                          <li class="partner">
                              <img class="partner-logo" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?> ">
                          </li>
                      <?php  } ?>
              <?php }
                } ?>
          </ul>
      </div>
  </section>