<?php
////////////////////////////////////////////////////////
//フロント画面からアクセス数を保存
////////////////////////////////////////////////////////

//アクセス数をカスタムタクソノミーのキーに保存
function set_post_views($postID) {
	$count_key = 'post_views';
	$count = get_post_meta($postID, $count_key, true);

	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count = $count + 1;
		update_post_meta($postID, $count_key, $count);
	}
}
