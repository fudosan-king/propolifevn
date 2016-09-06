<div align="center">
<?php
global $the_query, $wp_rewrite;
$paged = (get_query_var('page'))?get_query_var('page'):1;
$max_page = $the_query->max_num_pages;
$big = $the_query->max_num_pages; // need an unlikely integer
$pages = paginate_links( array(
'base' => str_replace( $max_page, '%#%', esc_url( get_pagenum_link( $max_page ) ) ),
'format' => '?paged=%#%',
'current' => $paged,
'total' => $the_query->max_num_pages,
'prev_next' => false,
'type'  => 'array',
'prev_next'   => TRUE,
'prev_text'    => __('«'),
'next_text'    => __('»'),
) );
if( is_array( $pages ) ) {
$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
echo '<ul class="pagination">';
foreach ( $pages as $page ) {
echo "<li>$page</li>";
}
echo '</ul>';
}
?>
</div>