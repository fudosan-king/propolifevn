<div class="top_nav">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-12">
        <?php 
          /*WORKING HOUR AND NUMBER PHONE CONTACT*/
          $working_hour = get_field('contact_company_info')['work_house'];
        ?>
        <div class="top_info">
          <a class="top_call" href="tel:+84-28-3827-5068"><i class="fal fa-phone-volume fa-lg"></i>+84 (0)28 3827 5068</a> 
          <div class="time">
            <p>受付時間 : <?php echo $working_hour ?></p>
            <p>担当正木 : <a href="tel:+84-91-6670-027">+84 (0)91 667 0027</a></p> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="navbar navbar-expand-sm bsnav" id="crollMenu">
  <div class="container">
      <?php
        $pagename = get_query_var('pagename'); 
        $logoCompanyURL = wp_get_attachment_image_url( 36, $size = 'origin', $icon = false );
        //$logoCompanyURL = get_field('content_top_page')['site_logo']['url'];
      ?>
      <a class="navbar-brand" href="<?php custom_top_link($pagename); ?>"><img src="<?php echo $logoCompanyURL; ?>" alt="" width="284"></a>
      <button class="navbar-toggler toggler-spring"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse justify-content-sm-end">
        <ul class="navbar-nav navbar-mobile mr-0">
          <?php 
            $homeUrl = home_url();
            $menuLocations = get_nav_menu_locations();
            $menuID = $menuLocations['header'];
            $topNav = wp_get_nav_menu_items($menuID);
            if (count($topNav)>0){
                $active = is_front_page() ? 'active' : "";
              foreach ($topNav as $nav){
                    /* Action here */
                    $active = $nav->object_id == $post->ID ? 'active' : "";
                    if($nav->ID == 147)
                      if(wp_is_mobile())
                        echo ' <li style="width:331px;height:46px;padding:8px 0px 10px 0px;" id="section_pro" class="nav-item nav-item-line navbar-toggler '.$active.'"><a class="nav-link link_pro" href="'.$homeUrl.'#section_projects" target="'.$nav->target.'">'.$nav->title.'</a></li>';
                      else
                        echo ' <li class="nav-item nav-item-line '.$active.'"><a class="nav-link link_pro" href="'.$homeUrl.'#section_projects" target="'.$nav->target.'">'.$nav->title.'</a></li>';
                    else
                      echo ' <li class="nav-item nav-item-line '.$active.'"><a class="nav-link" href="'.$nav->url.'" target="'.$nav->target.'">'.$nav->title.'</a></li>';
                }
            }
          ?>
        </ul>
      </div>
  </div>
</div>
