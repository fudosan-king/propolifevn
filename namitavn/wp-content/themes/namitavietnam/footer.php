

        <footer>
          <div class="container">
            <div class="row">
              <div class="col-xs-12">

                <?php
                    if (has_nav_menu('footer')){
                           /**
                            * Displays a navigation menu
                            * @param array $args Arguments
                            */
                            $args = array(
                                'theme_location' => 'footer',
                                'menu' => '',
                                'container' => false,
                                'menu_class' => 'list_menu_footer',
                                'menu_id' => '',
                            );

                            wp_nav_menu( $args );
                    }

                    $secFooter = get_post_by_slug('footer-copyright');

                    $imgSrc = null;
                    if (has_post_thumbnail($secFooter->ID )){
                        $img = wp_get_attachment_image_src(get_post_thumbnail_id($secFooter->ID ), 'full' );
                        $imgSrc = $img[0];
                    }
                ?>

                <p><img src="<?php echo $imgSrc; ?>" alt="" class="img-responsive"></p>
                <p class="copyright"><?php echo $secFooter->post_content; ?></p>
              </div>
            </div>
          </div>
        </footer>
    </div>

    <?php wp_footer(); ?>
    
</body>

</html>


