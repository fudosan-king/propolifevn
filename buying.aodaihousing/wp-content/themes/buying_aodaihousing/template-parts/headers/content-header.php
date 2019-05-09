<div class="top_nav">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-12">
        <?php 
          /*WORKING HOUR AND NUMBER PHONE CONTACT*/
          $number_phone = get_field('number_phone', 'option');
          $working_hour = get_field('working_hour', 'option');
        ?>
        <p class="top_info"><a href="tel:+84-28-3827-5068"><i class="fal fa-phone-volume fa-lg"></i> <?php echo $number_phone ?></a> <span class="time"><?php echo $working_hour ?></span></p>
      </div>
    </div>
  </div>
</div>

<div class="navbar navbar-expand-sm bsnav">
  <div class="container">
      <?php
        $pagename = get_query_var('pagename'); 
        $logoCompanyURL = wp_get_attachment_image_url( get_field('site_logo', 36)['ID'], $size = 'origin', $icon = false );
      ?>
      <a class="navbar-brand" href="<?php custom_top_link($pagename); ?>"><img src="<?php echo $logoCompanyURL; ?>" alt="" width="284"></a>
      <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse justify-content-sm-end">
        <ul class="navbar-nav navbar-mobile mr-0">
          <?php 
            $menuLocations = get_nav_menu_locations();
            $menuID = $menuLocations['header'];
            $topNav = wp_get_nav_menu_items($menuID);
            if (count($topNav)>0){
                $active = is_front_page() ? 'active' : "";
              foreach ($topNav as $nav){
                    /* Action here */
                    $active = $nav->object_id == $post->ID ? 'active' : "";
                    if($nav->ID == 147)
                      echo ' <li class="nav-item nav-item-line '.$active.'"><a class="nav-link link_pro" href="javascrip:void(0);" target="'.$nav->target.'">'.$nav->title.'</a></li>';
                    else
                      echo ' <li class="nav-item nav-item-line '.$active.'"><a class="nav-link" href="'.$nav->url.'" target="'.$nav->target.'">'.$nav->title.'</a></li>';
                }
            }
          ?>
        </ul>
      </div>

  </div>
  
</div>