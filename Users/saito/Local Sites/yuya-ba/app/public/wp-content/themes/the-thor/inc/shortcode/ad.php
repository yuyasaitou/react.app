<?php
////////////////////////////////////////////////////////
//ショートコードで記事中に広告を挿入
////////////////////////////////////////////////////////
function fit_shortcode_adcode() {
	if(get_option('fit_adPost_style')){
		$style = ' adPost-no';
	}else{
		$style = '';
	}
	if (isset($_GET["type"]) && $_GET['type'] == 'AMP' && is_single() && get_option('fit_ampFunction_switch') == 'on' && get_post_meta(get_the_ID(), 'amp_hide', true) != '1') {
		return '<div class="adPost'.$style.'">'.get_option('fit_ampAd_tag').'<span class="adPost__title">'.get_option('fit_adPost_text').'</span></div>';
	}else{
		return '<div class="adPost'.$style.'">'.get_option('fit_adPost_tag').'<span class="adPost__title">'.get_option('fit_adPost_text').'</span></div>';
	}
}
add_shortcode('adcode', 'fit_shortcode_adcode');


// 投稿内の最初のHタグの手前に広告ショートコードを表示
if(get_option('fit_adPost_hFirst')){
	function fit_ad_first_headline($the_content) {

		$ad = fit_shortcode_adcode();
		if(is_singular('post')) {  //投稿ページの場合
			$tag = '/<h[1-6].*>/';
			if(preg_match_all($tag, $the_content, $tags)) {  //本文中にタグが含まれていれば取得
				if($tags[0][0]) {  //1番目のタグの直前に$adを挿入
					$the_content = str_replace($tags[0][0], $ad.$tags[0][0], $the_content);
				}
			}
		}
		return $the_content;
	}
	add_filter('the_content','fit_ad_first_headline');
}
