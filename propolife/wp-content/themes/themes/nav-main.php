<div align="center" class="col-md-12">
<?php
global $the_query, $wp_rewrite;
if(is_tax()){$paged = ( get_query_var('page') == 0 ) ? 1 : get_query_var('page');}
else{$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');}
$max_page = $the_query->max_num_pages;
$big = $the_query->max_num_pages;
$pages = paginate_links( array(
'base' => str_replace( $max_page, '%#%', esc_url( get_pagenum_link( $max_page ) ) ),
'format' => '?paged=%#%',
'current'=>$paged,
'total'=> $the_query->max_num_pages,
'prev_next' => false,
'type'=>'array',
'prev_next'=> true,
'prev_text'=> __('«'),
'next_text'=> __('»'),
) );
if( is_array( $pages ) ) {
$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
echo '<ul class="pagination">';
foreach ($pages as $page ) {?>
<li class="<?php if(strpos($page,'current')){echo 'active';} ?>"><?php echo $page; ?></li>
<?php }
echo '</ul>';
}
?>    
</div>