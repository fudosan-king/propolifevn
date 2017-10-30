<?php 
function sortable_admin_header()
{ 
    // Get admin screen id
    $screen = get_current_screen();
    // WooCommerce product admin page
    if ('edit-product' == $screen->id && 'edit' == $screen->base) {
        ?>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <?php
        add_action('admin_footer', 'sortable_footer_script');
    }
}

function sortable_footer_script()
{ ?>
    <script>
        $('a.editinline').click(function(){
            inlineEditPost.edit(this);
            return false;
        });
        $('#the-list').sortable({
            update: function(event, ui) {
                var id_order_array = $('#the-list').sortable('toArray');
                id_order_array.forEach(convert_element_to_id);
                var data = {
                    'action': 'wc_update_menu_order',
                    'post_array': id_order_array
                };
                $.post(ajaxurl, data, function(response) {
			        console.log("update: " + response);
		        });
            }
        });
        function convert_element_to_id(item, index, arr) {
            arr[index] = item.replace(/\D/g,'');
        }
    </script>
<?php
}
add_action('wp_ajax_wc_update_menu_order', 'wc_update_menu_order');
function wc_update_menu_order()
{
    global $wpdb; // this is how you get access to the database

    $list = $_POST['post_array']; //ordered list of post ID
    $counter = 0;

    foreach ($list as $post_id) {
        $wpdb->update($wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $post_id) );
        $counter++;
    }

    echo json_encode($list);

    wp_die(); // this is required to terminate immediately and return a proper response

} 

add_action('admin_head', 'sortable_admin_header');

?>
