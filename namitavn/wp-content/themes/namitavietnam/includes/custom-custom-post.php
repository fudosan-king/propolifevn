<?php


/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/

function prefix_register_section() {

    $labels = array(
        'name'                => __( 'Sections Site', 'namitavietnam' ),
        'singular_name'       => __( 'Section', 'namitavietnam' ),
        'add_new'             => __( 'Add New Section', 'namitavietnam', 'namitavietnam' ),
        'add_new_item'        => __( 'Add New Section', 'namitavietnam' ),
        'edit_item'           => __( 'Edit Section', 'namitavietnam' ),
        'new_item'            => __( 'New Section', 'namitavietnam' ),
        'view_item'           => __( 'View Section', 'namitavietnam' ),
        'search_items'        => __( 'Search Sections Site', 'namitavietnam' ),
        // 'all_items'           => __( 'All Sections Site', 'namitavietnam' ),
        'not_found'           => __( 'No Sections Site found', 'namitavietnam' ),
        'not_found_in_trash'  => __( 'No Sections Site found in Trash', 'namitavietnam' ),
        'parent_item_colon'   => __( 'Parent Section:', 'namitavietnam' ),
        'menu_name'           => __( 'Sections Site', 'namitavietnam' ),

    );

    $args = array(
        'labels'                   => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array('nmt-sectionpart'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'menu_icon'           => null,
        'show_in_nav_menus'   => true,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'rewrite'             => array( 'slug' => 'section' )

    );

    register_post_type( 'nmt-section', $args );
}

add_action( 'init', 'prefix_register_section' );


/**
* Registers a new post type
* @uses $wp_post_types Inserts new post type object into the list
*
* @param string  Post type key, must not exceed 20 characters
* @param array|string  See optional args description above.
* @return object|WP_Error the registered post type object, or an error object
*/
function prefix_register_product() {

    $labels = array(
        'name'                => __( 'Products', 'namitavietnam' ),
        'singular_name'       => __( 'Product', 'namitavietnam' ),
        'add_new'             => __( 'Add New Product', 'namitavietnam', 'namitavietnam' ),
        'add_new_item'        => __( 'Add New Product', 'namitavietnam' ),
        'edit_item'           => __( 'Edit Product', 'namitavietnam' ),
        'new_item'            => __( 'New Product', 'namitavietnam' ),
        'view_item'           => __( 'View Product', 'namitavietnam' ),
        'search_items'        => __( 'Search Products', 'namitavietnam' ),
        'all_items'           => __( 'All Products', 'namitavietnam' ),
        'not_found'           => __( 'No Products found', 'namitavietnam' ),
        'not_found_in_trash'  => __( 'No Products found in Trash', 'namitavietnam' ),
        'parent_item_colon'   => __( 'Parent Product:', 'namitavietnam' ),
        'menu_name'           => __( 'Products', 'namitavietnam' ),

    );

    $args = array(
        'labels'                   => $labels,
        'hierarchical'        => false,
        'description'         => 'description',
        'taxonomies'          => array('nmt-category', 'nmt-displaytype', 'nmt-product-ven'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => 'namita_admin',
        'menu_position'       => 1,
        'menu_icon'           => null,
        'show_in_nav_menus'   => true,
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
        'rewrite'             => array( 'slug' => 'product' )

    );

    register_post_type( 'nmt-product', $args );
}

add_action( 'init', 'prefix_register_product' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function my_taxonomies_namita_product_ven() {

    $labels = array(
        'name'                    => __( 'Vendors', 'namitavietnam' ),
        'singular_name'            => __( 'Vendor', 'namitavietnam' ),
        'search_items'            => __( 'Search Vendors', 'namitavietnam' ),
        'popular_items'            => __( 'Popular Vendors', 'namitavietnam' ),
        'all_items'                => __( 'All Vendors', 'namitavietnam' ),
        'parent_item'            => __( 'Parent Vendor', 'namitavietnam' ),
        'parent_item_colon'        => __( 'Parent Vendor', 'namitavietnam' ),
        'edit_item'                => __( 'Edit Vendor', 'namitavietnam' ),
        'update_item'            => __( 'Update Vendor', 'namitavietnam' ),
        'add_new_item'            => __( 'Add New Vendor', 'namitavietnam' ),
        'new_item_name'            => __( 'New Vendor Name', 'namitavietnam' ),
        'add_or_remove_items'    => __( 'Add or remove Vendors', 'namitavietnam' ),
        'choose_from_most_used'    => __( 'Choose from most used namitavietnam', 'namitavietnam' ),
        'menu_name'                => __( 'Vendor', 'namitavietnam' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => true,
    );

    register_taxonomy( 'nmt-product-ven', array( 'nmt-product' ), $args );
}

add_action( 'init', 'my_taxonomies_namita_product_ven' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function my_taxonomies_namita_product_cat() {

    $labels = array(
        'name'                    => __( 'Categories', 'namitavietnam' ),
        'singular_name'            => __( 'Category', 'namitavietnam' ),
        'search_items'            => __( 'Search Categories', 'namitavietnam' ),
        'popular_items'            => __( 'Popular Categories', 'namitavietnam' ),
        'all_items'                => __( 'All Categories', 'namitavietnam' ),
        'parent_item'            => __( 'Parent Category', 'namitavietnam' ),
        'parent_item_colon'        => __( 'Parent Category', 'namitavietnam' ),
        'edit_item'                => __( 'Edit Category', 'namitavietnam' ),
        'update_item'            => __( 'Update Category', 'namitavietnam' ),
        'add_new_item'            => __( 'Add New Category', 'namitavietnam' ),
        'new_item_name'            => __( 'New Category Name', 'namitavietnam' ),
        'add_or_remove_items'    => __( 'Add or remove Categories', 'namitavietnam' ),
        'choose_from_most_used'    => __( 'Choose from most used namitavietnam', 'namitavietnam' ),
        'menu_name'                => __( 'Categories', 'namitavietnam' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => true, //Notes : Set true

        'show_ui'           => true,
        'show_in_menu'      => 'namita_admin',

    );

    register_taxonomy( 'nmt-category', array( 'nmt-product' ), $args );
}

add_action( 'init', 'my_taxonomies_namita_product_cat' );



/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function my_taxonomies_namita_display_cat() {

    $labels = array(
        'name'                    => __( 'Display Type', 'namitavietnam' ),
        'singular_name'            => __( 'Display Type', 'namitavietnam' ),
        'search_items'            => __( 'Search Display Type', 'namitavietnam' ),
        'popular_items'            => __( 'Popular Display Type', 'namitavietnam' ),
        'all_items'                => __( 'All Display Type', 'namitavietnam' ),
        'parent_item'            => __( 'Parent Display Type', 'namitavietnam' ),
        'parent_item_colon'        => __( 'Parent Display Type', 'namitavietnam' ),
        'edit_item'                => __( 'Edit Display Type', 'namitavietnam' ),
        'update_item'            => __( 'Update Display Type', 'namitavietnam' ),
        'add_new_item'            => __( 'Add New Display Type', 'namitavietnam' ),
        'new_item_name'            => __( 'New Display Type Name', 'namitavietnam' ),
        'add_or_remove_items'    => __( 'Add or remove Display Type', 'namitavietnam' ),
        'choose_from_most_used'    => __( 'Choose from most used namitavietnam', 'namitavietnam' ),
        'menu_name'                => __( 'Display Type', 'namitavietnam' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => true,
    );

    register_taxonomy( 'nmt-displaytype', array( 'nmt-product' ), $args );
}

add_action( 'init', 'my_taxonomies_namita_display_cat' );

/**
 * Create a taxonomy
 *
 * @uses  Inserts new taxonomy object into the list
 * @uses  Adds query vars
 *
 * @param string  Name of taxonomy object
 * @param array|string  Name of the object type for the taxonomy object.
 * @param array|string  Taxonomy arguments
 * @return null|WP_Error WP_Error if errors, otherwise null.
 */
function my_taxonomies_namita_section_part() {

    $labels = array(
        'name'                    => __( 'Section Site Parts', 'namitavietnam' ),
        'singular_name'            => __( 'Section Site Part', 'namitavietnam' ),
        'search_items'            => __( 'Search Section Site Parts', 'namitavietnam' ),
        'popular_items'            => __( 'Popular Section Site Parts', 'namitavietnam' ),
        'all_items'                => __( 'All Section Site Parts', 'namitavietnam' ),
        'parent_item'            => __( 'Parent Section Site Part', 'namitavietnam' ),
        'parent_item_colon'        => __( 'Parent Section Site Part', 'namitavietnam' ),
        'edit_item'                => __( 'Edit Section Site Part', 'namitavietnam' ),
        'update_item'            => __( 'Update Section Site Part', 'namitavietnam' ),
        'add_new_item'            => __( 'Add New Section Site Part', 'namitavietnam' ),
        'new_item_name'            => __( 'New Section Site Part Name', 'namitavietnam' ),
        'add_or_remove_items'    => __( 'Add or remove Section Site Parts', 'namitavietnam' ),
        'choose_from_most_used'    => __( 'Choose from most used namitavietnam', 'namitavietnam' ),
        'menu_name'                => __( 'Section Site Parts', 'namitavietnam' ),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => false,
        'hierarchical'      => true, //Notes : Set true

        'show_ui'           => true,
        'show_in_menu'      => 'namita_admin',

    );

    register_taxonomy( 'nmt-sectionpart', array( 'nmt-section' ), $args );
}

add_action( 'init', 'my_taxonomies_namita_section_part' );

?>
