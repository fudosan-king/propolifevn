<?php

if (!function_exists('namita_admin_sub_menu')){
    function namita_admin_sub_menu(){


        add_submenu_page(
            'namita_admin',
            __('Namita Add New Product Page', 'namitavietnam'),
            __('Add New Product', 'namitavietnam'),
            'manage_options',
            'post-new.php?post_type=nmt-product',
            null );

        add_submenu_page(
            'namita_admin',
            __('Namita Vendor Page', 'namitavietnam'),
            __('Vendors', 'namitavietnam'),
            'manage_options',
            'edit-tags.php?taxonomy=nmt-product-ven&post_type=nmt-product',
            null
        );

        add_submenu_page(
            'namita_admin',
            __('Namita Category Page', 'namitavietnam'),
            __('Categories', 'namitavietnam'),
            'manage_options',
            'edit-tags.php?taxonomy=nmt-category&post_type=nmt-product',
            null
        );

        add_submenu_page(
            'namita_admin',
            __('Namita Display Type Page', 'namitavietnam'),
            __('Display Type', 'namitavietnam'),
            'manage_options',
            'edit-tags.php?taxonomy=nmt-displaytype&post_type=nmt-product',
            null
        );

        add_submenu_page(
            'namita_admin',
            __('Namita All Products Page', 'namitavietnam'),
            __('Sections Site', 'namitavietnam'),
            'manage_options',
            'edit.php?post_type=nmt-section',
            null
        );

        add_submenu_page(
            'namita_admin',
            __('Namita Section Site Part Page', 'namitavietnam'),
            __('Section Site Parts', 'namitavietnam'),
            'manage_options',
            'edit-tags.php?taxonomy=nmt-sectionpart&post_type=nmt-section',
            null
        );


    }

    add_action('admin_menu', 'namita_admin_sub_menu' );
}

if ( ! function_exists( 'mbe_set_current_menu' ) ) {

    function mbe_set_current_menu( $parent_file ) {
        global $submenu_file, $current_screen, $pagenow;

        # Set the submenu as active/current while anywhere in your Custom Post Type (nwcm_news)
        if ( $pagenow == 'post.php' ) {
            $submenu_file = 'edit.php?post_type=' . $current_screen->post_type;
        }

        if ( $pagenow == 'edit-tags.php' ) {
            $submenu_file = 'edit-tags.php?taxonomy='.$current_screen->taxonomy.'&post_type=' . $current_screen->post_type;
        }

        $parent_file = 'namita_admin';

        return $parent_file;

    }

    add_filter( 'parent_file', 'mbe_set_current_menu' );

}

?>
