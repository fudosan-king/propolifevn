<?php
// FUNCTION CUSTOM WP PAGINATION
function custom_wp_pagination($pages = '', $range = 2) 
{  
    $showitems = ($range * 2) + 1;  
    global $paged;
    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query; 
        $pages = $wp_query->max_num_pages;
 
        if(!$pages)
        $pages = 1; 
    }   
 
    if(1 != $pages)
    {
        echo '<nav aria-label="Page navigation example">';
        echo '<ul class="pagination justify-content-center">';
        $prevposts = get_previous_posts_link('Previous');
        if($prevposts) { 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" tabindex="-1" aria-disabled="true"> Previous</a></li>';
        } else { 
            echo '<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a></li>'; 
        }
 
        if($paged > 1 && $showitems < $pages) 
            echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';
 
        for ($i=1; $i <= $pages; $i++)
    {
    if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
        echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
    }
 
    if ($paged < $pages && $showitems < $pages) 
        echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';  

    $next = get_next_posts_link('Next');
    if($next) {
        echo'<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" tabindex="-1" aria-disabled="true"> Next</a></li>';
    } else {
        echo'<li class="page-item disabled"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" tabindex="-1" aria-disabled="true"> Next</a></li>';
    }
 
        echo '</ul>';
        echo '</nav>';
    }
}

// FUNCTION GET TOP LINK
function custom_top_link($pagename) {
    $default_top_link = get_permalink();
    if (is_page($pagename)){
        if($pagename) {
            $top_link = str_replace("/".$pagename."/", "", $default_top_link);
        } else {
            $top_link = "";
        }
    } else {
        $top_link = substr($default_top_link, 0, 31);
    }
    echo $top_link;
}
?>