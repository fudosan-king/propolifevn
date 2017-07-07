<?php


if (!function_exists('namita_admin_menu')){
    function namita_admin_menu(){
        add_menu_page(
            __('Namita Manager', 'namitavietnam'),
            __('Namita', 'namitavietnam'),
            'manage_options',
            'namita_admin',
            function(){
                echo 'Namita Admin Page';
            }
            , ASSETS_DIR.'/images/icon/ico_wp.png'
            , 3
        );

        // remove_menu_page('update-core.php');

    }
}

add_action('admin_menu', 'namita_admin_menu');

?>
