<?php

?>

<header>
    <nav role="navigation" class="navbar navbar-default navbar-fixed-top navbar_sub">
      <div class="container">
          <div class="navbar-header">
              <button type="button" data-target="#navbar-collapse-x" data-toggle="collapse" class="navbar-toggle x collapsed">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a href="/" class="navbar-brand">

              <?php

                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                if ( has_custom_logo() ) {
                        echo '<img src="'. esc_url( $logo[0] ) .'">';
                } else {
                        echo '<h1>'. get_bloginfo( 'name' ) .'</h1>';
                }

               ?>

              </a>
          </div>
          <div id="navbar-collapse-x" class="collapse navbar-collapse">
                <?php
                    $menu_name = 'header';

                    if ( ($locations = get_nav_menu_locations() ) && isset( $locations[$menu_name] ) ){
                        $menu = wp_get_nav_menu_object($locations[$menu_name] );

                        $menu_items = wp_get_nav_menu_items($menu->term_id );

                        $menu_list = '<ul class="nav navbar-nav">';

                        foreach( (array) $menu_items as $item){
                            $menu_list .= '<li data-toggle="collapse" data-target="#navbar-collapse.in"><a href="'. $item->url .'">'.$item->title.'</a></li>';
                        }

                        $menu_list .= '</ul>';
                    }else {
                        $menu_list = '<ul class="nav navbar-nav"><li>Menu "' . $menu_name . '" not defined.</li></ul>';
                    }
                    // $menu_list now ready to output
                    echo $menu_list;
                ?>

              <?php
                qtranxf_generateLanguageSelectCode(array('type' => 'image'), 'nav navbar-right nav_lang');
              ?>
          </div>
      </div>
    </nav>
</header>
