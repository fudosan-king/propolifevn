<?php 

function get_post_by_slug($slug){
    $posts = get_posts(array(
            'name' => $slug,
            'posts_per_page' => 1,
            'post_type' => 'nmt-section',
            'post_status' => 'publish'
    ));

    if(! $posts ) {
        throw new Exception("NoSuchPostBySpecifiedID");
    }

    return $posts[0];
}

?>