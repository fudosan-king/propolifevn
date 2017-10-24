<?php
function custom_pre_get_posts_query($q)
{
    $request = array();
    $request['post_type'] = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : '';
    $request['product_cat'] = isset($_REQUEST['product_cat']) ? $_REQUEST['product_cat'] : '';
    if ($request['post_type'] == 'product') {
        $query = $q->query;
        if (!array_key_exists('product_cat', $query) || $query->product_cat === "") {
            $tax_query = (array)$q->get('tax_query');
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => array('lunch-box'), // Don't display products of lunch-box category on the shop page.
                'operator' => 'NOT IN'
            );
            $q->set('tax_query', $tax_query);
            return;
        }
        return;
    }
    return;
}
//add_action('woocommerce_product_query', 'custom_pre_get_posts_query');
add_action('pre_get_posts', 'custom_pre_get_posts_query');
?>