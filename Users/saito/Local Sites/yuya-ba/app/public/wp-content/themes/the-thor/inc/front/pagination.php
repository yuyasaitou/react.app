<?php
////////////////////////////////////////////////////////
//オリジナルページネーションを作成
//////////////////////////////////////////////////


function paginatite_link_original($num) {
    $new_url = get_pagenum_link($num);
	 $new_url = str_replace('/page/', '?paged=', get_pagenum_link($num) );
    return $new_url;
}

function fit_pagination( $pages = '', $range = 2 ) {
	$showitems = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) $paged = 1;
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( !$pages ) $pages = 1;
	}
	if ( 1 != $pages ) {
		echo '<ul class="pager">';
		if ( $paged > 1 ) echo '<li class="pager__item pager__item-prev"><a href="'.paginatite_link_original($paged - 1).'">Prev</a></li>';
		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( !( $i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems ) {
				echo ( $paged == $i ) ? '<li class="pager__item pager__item-current">'.$i.'</li>':'<li class="pager__item"><a href="'.paginatite_link_original( $i ).'">'.$i.'</a></li>';
			}
		}
		if ( $paged < $pages ) echo '<li class="pager__item pager__item-next"><a href="'. paginatite_link_original( $paged + 1 ) . '">Next</a></li>';
		echo '</ul>';
	}
}


