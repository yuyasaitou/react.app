<?php
////////////////////////////////////////////////////////
//content_width
////////////////////////////////////////////////////////
if (!isset($content_width)) $content_width = 1140;

////////////////////////////////////////////////////////
//srcset none
////////////////////////////////////////////////////////
add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );

//////////////////////////////////////////////////
//インクルード
//////////////////////////////////////////////////
require_once locate_template('inc/_t-check.php');             // ファイルチェックファイル
require_once locate_template('inc/customizer.php');           // カスタマイザー設定用ファイル
require_once locate_template('inc/custom_post_taxonomy.php'); // カスタム投稿タイプ・タクソノミー用ファイル
require_once locate_template('inc/custom_field.php');         // カスタムフィールド用ファイル
require_once locate_template('inc/editor.php');               // ビジュアル・テキストエディター用ファイル
require_once locate_template('inc/list.php');                 // 管理画面の各種一覧画面用ファイル
require_once locate_template('inc/admin.php');                // その他管理画面用ファイル
require_once locate_template('inc/widget.php');               // ウィジェット関連パーツ用ファイル
require_once locate_template('inc/shortcode.php');            // ショートコードパーツ用ファイル
require_once locate_template('inc/front.php');                // フロント表示パーツ用ファイル
require_once locate_template('inc/seo.php');                  // SEOパーツ用ファイル
require_once locate_template('inc/amp.php');                  // AMP用ファイル
require_once locate_template('inc/pwa.php');                  // PWA用ファイル
require_once locate_template('inc/parts.php');                // その他パーツ用ファイル

function rem_cat_function($link) {
    return str_replace("/category/", "/", $link);
    }
    add_filter('user_trailingslashit', 'rem_cat_function');

function rem_cat_flush_rules() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
    }

    add_action('init', 'rem_cat_flush_rules');

    function rem_cat_rewrite($wp_rewrite) {
    $new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
    $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
    }
    add_filter('generate_rewrite_rules', 'rem_cat_rewrite');

function my_disable_redirect_canonical( $redirect_url ) {

    if ( is_archive() ){
        $subject = $redirect_url;
        $pattern = '/\/page\//'; // URLに「/page/」があるかチェック
        preg_match($pattern, $subject, $matches);
        if ($matches){
        //リクエストURLに「/page/」があれば、リダイレクトしない。
        $redirect_url = false;
        return $redirect_url;
        }
    }
}

add_filter('redirect_canonical','my_disable_redirect_canonical');

//カスタマイザー自作pickUpHeadの下に入れたい。

function theme_customize_expansion( $wp_customize ) { 
  
  $wp_customize->add_section(
        'my_section',
        array(
            'title'    => 'タグボックスurl左',
            'priority' => 1,
        )
  );
 
  for ($i = 1;$i<10;++$i){
    $wp_customize->add_setting(
      'my_url'.(string)$i, // 設定ID
      array(
        'default' => '',
        'priority' => 1,
      )
    );

    $wp_customize->add_control(
      'my_url'.(string)$i,
      array(
        'section'     => 'my_section',  // 紐づけるセクションIDを指定
        'settings'    => 'my_url'.(string)$i,  // 紐づける設定IDを指定
        'label'       => '左：内容'.(string)$i,
        'description' => '[認知症の種類を学ぶ（左）]参照先のリンクを入力してください。',
        'type'        => 'text'
      )
    );

    $wp_customize->add_setting(
    'my_setting'.(string)$i, // 設定ID
    array(
      'default' => '',
      'priority' => 1,
    )
    );

    $wp_customize->add_control(
    'my_setting'.(string)$i,
    array(
      'section'     => 'my_section',  // 紐づけるセクションIDを指定
      'settings'    => 'my_setting'.(string)$i,  // 紐づける設定IDを指定
      'description' => '[認知症の種類を学ぶ（左）]見出しをつける',
      'type'        => 'text'
    )
    );
  }

  $wp_customize->add_section(
    'my_sectionR',
    array(
        'title'    => 'タグボックスurl右',
        'priority' => 1,
    )
  );

  for ($j = 1;$j<10;++$j){
    $wp_customize->add_setting(
      'my_urlR'.(string)$j, // 設定ID
      array(
        'default' => '',
        'priority' => 1,
      )
    );
    $wp_customize->add_control(
      'my_urlR'.(string)$j,
      array(
        'section'     => 'my_sectionR',  // 紐づけるセクションIDを指定
        'settings'    => 'my_urlR'.(string)$j,  // 紐づける設定IDを指定
        'label'       => '右：内容'.(string)$j,
        'description' => '[認知症について学ぶ（右）]参照先のリンクを入力してください。',
        'type'        => 'text'
      )
    );

    $wp_customize->add_setting(
    'my_settingR'.(string)$j, // 設定ID
    array(
      'default' => '',
      'priority' => 1,
    )
    );
    $wp_customize->add_control(
    'my_settingR'.(string)$j,
    array(
      'section'     => 'my_sectionR',  // 紐づけるセクションIDを指定
      'settings'    => 'my_settingR'.(string)$j,  // 紐づける設定IDを指定
      'description' => '[認知症について学ぶ（左）]見出しをつける',
      'type'        => 'text'
    )
    );
  }
}
add_action( 'customize_register', 'theme_customize_expansion');






///////////////////////////////////////
// カスタムボックスの追加
///////////////////////////////////////
add_action('admin_menu', 'add_redirect_custom_box');
if ( !function_exists( 'add_redirect_custom_box' ) ):
function add_redirect_custom_box(){

  //リダイレクト
  add_meta_box( 'singular_redirect_settings', 'リダイレクト', 'redirect_custom_box_view', 'post', 'side' );
  add_meta_box( 'singular_redirect_settings', 'リダイレクト', 'redirect_custom_box_view', 'page', 'side' );
}
endif;

///////////////////////////////////////
// リダイレクト
///////////////////////////////////////
if ( !function_exists( 'redirect_custom_box_view' ) ):
function redirect_custom_box_view(){
  $redirect_url = get_post_meta(get_the_ID(),'redirect_url', true);

  echo '<label for="redirect_url">リダイレクトURL</label>';
  echo '<input type="text" name="redirect_url" size="20" value="'.esc_attr(stripslashes_deep(strip_tags($redirect_url))).'" placeholder="https://" style="width: 100%;">';
  echo '<p class="howto">このページに訪れるユーザーを設定したURLに301リダイレクトします。</p>';
}
endif;

add_action('save_post', 'redirect_custom_box_save_data');
if ( !function_exists( 'redirect_custom_box_save_data' ) ):
function redirect_custom_box_save_data(){
  $id = get_the_ID();
  //リダイレクトURL
  if ( isset( $_POST['redirect_url'] ) ){
    $redirect_url = $_POST['redirect_url'];
    $redirect_url_key = 'redirect_url';
    add_post_meta($id, $redirect_url_key, $redirect_url, true);
    update_post_meta($id, $redirect_url_key, $redirect_url);
  }
}
endif;

//リダイレクトURLの取得
if ( !function_exists( 'get_singular_redirect_url' ) ):
function get_singular_redirect_url(){
  return trim(get_post_meta(get_the_ID(), 'redirect_url', true));
}
endif;

//リダイレクト処理
if ( !function_exists( 'redirect_to_url' ) ):
function redirect_to_url($url){
  header( "HTTP/1.1 301 Moved Permanently" );
  header( "location: " . $url  );
  exit;
}
endif;

//URLの正規表現
define('URL_REG_STR', '(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)');
define('URL_REG', '/'.URL_REG_STR.'/');

//リダイレクト
add_action( 'wp','wp_singular_page_redirect', 0 );
if ( !function_exists( 'wp_singular_page_redirect' ) ):
function wp_singular_page_redirect() {
  //リダイレクト
  if (is_singular() && $redirect_url = get_singular_redirect_url()) {
    //URL形式にマッチする場合
    if (preg_match(URL_REG, $redirect_url)) {
      redirect_to_url($redirect_url);
    }
  }
}
endif;

function scriptLoader($script, $handle, $src) {
	if (is_admin()) {
		return $script;
	}
	$script = sprintf('<script src="%s" type="text/javascript" defer="defer"></script>' . "\n", $src);
	return $script;
}
add_filter('script_loader_tag', 'scriptLoader', 10, 5);


//パラメータがスラッグと一致しない場合に404エラーを発生させる
function ojiTest() {
    $url =  get_pagenum_link(get_query_var('page')); //表示中のページ
    $cate = get_the_category();
    $tagName = $cate[0]->slug; //スラッグを取得

    //親カテゴリがある場合には親を参照する
    if ($cate[0]->category_parent) {
        $tagName = get_category($cate[0]->category_parent);
        $tagName = $tagName->slug;
    }

    $erased = substr($url, 0, strrpos($url, '/'));
    $para = substr($erased, strrpos($erased, '/') + 1, strlen($erased) - strrpos($erased, '/'));

    if ((int) $para) {
        $urlNeo = str_replace($para.'/', '', $url);
        $erased = substr($urlNeo, 0, strrpos($urlNeo, '/'));
        $para = substr($erased, strrpos($erased, '/') + 1, strlen($erased) - strrpos($erased, '/'));
        #echo 'このページのパラメータは'.$para.'です。<br>';
    }

    if ($para == $tagName) {
        #echo 'このページのパラメータは'.$para.'です。<br>';
        #echo 'このページのパラメータはスラッグである「'.$tagName.'」と一致しています。';
        return null;
    } else {
        #echo 'このページのパラメータは'.$para.'です。<br>';
        #echo 'このページのパラメータはスラッグである「'.$tagName.'」一致していません。';
        //wp_redirect('https://kenkatsudemo.mcsg.co.jp/articles/'.$tagName.'/');
        header('HTTP/1.0 404 Not Found');
        wp_redirect('/404.php', 301);
        //include(TEMPLATEPATH.'/404.php');
        //exit;
        return null;
    }
    return null;
}
add_action('tes_tag', 'adjustParamater404');

function bafael() {
    ob_start();
    wp_footer();
    $texts = ob_get_contents();
    ob_end_clean();

    
    $typo = '"@type": "ListItem","position": ';

    for ($num = 10; $num > 1; $num--) {
        $texts = str_replace($typo.strval($num), $typo.strval($num + 1), $texts);
    }

    $keypara = '{"@type": "ListItem","position": 3,';
    $start = strstr($texts, $keypara);
    $inNum = strpos($texts, $start);
    $intexts = '{"@type": "ListItem","position": 2,"item":{"@id": "https://kenkatsudemo.mcsg.co.jp/articles","name": "記事一覧"}},';
    $result = substr_replace($texts, $intexts, $inNum, 0);
    echo $result;
    return null;    
}

/* カラーパレットの色追加 */
function aktk_add_my_editor_color_palette() {
    $palette = get_theme_support( 'editor-color-palette' );
    if ( ! empty( $palette ) ) {
        $palette = array_merge( $palette[0], array(
            array(
                'name'  => 'Color1',
                'slug'  => 'color1',
                'color' => '#ff6464',
            ),
            array(
                'name'  => 'Color2',
                'slug'  => 'color2',
                'color' => '#cf2d2d',
            ),
        ) );
        add_theme_support( 'editor-color-palette', $palette );
    }
}

add_action( 'after_setup_theme', 
		   'aktk_add_my_editor_color_palette', 11 );

/*カラーパレットの色追加*/
function my_mce4_options( $init ) {
    $default_colors = '
        "000000", "Black",
        "993300", "Burnt orange",
        "333300", "Dark olive",
        "003300", "Dark green",
        "003366", "Dark azure",
        "000080", "Navy Blue",
        "333399", "Indigo",
        "333333", "Very dark gray",
        "800000", "Maroon",
        "FF6600", "Orange",
        "808000", "Olive",
        "008000", "Green",
        "008080", "Teal",
        "0000FF", "Blue",
        "666699", "Grayish blue",
        "808080", "Gray",
        "FF0000", "Red",
        "FF9900", "Amber",
        "99CC00", "Yellow green",
        "339966", "Sea green",
        "33CCCC", "Turquoise",
        "3366FF", "Royal blue",
        "800080", "Purple",
        "999999", "Medium gray",
        "FF00FF", "Magenta",
        "FFCC00", "Gold",
        "FFFF00", "Yellow",
        "00FF00", "Lime",
        "00FFFF", "Aqua",
        "00CCFF", "Sky blue",
        "993366", "Brown",
        "C0C0C0", "Silver",
        "FF99CC", "Pink",
        "FFCC99", "Peach",
        "FFFF99", "Light yellow",
        "CCFFCC", "Pale green",
        "CCFFFF", "Pale cyan",
        "99CCFF", "Light sky blue",
        "CC99FF", "Plum",
        "FFFFFF", "White"
        ';
    $custom_colors = '
        "ff6464", "Color1",
        "cf2d2d", "Color2",
        ';
    $init['textcolor_map'] = '['.$default_colors.','.$custom_colors.']';
    $init['textcolor_rows'] = 6;
    return $init;
}

add_filter( 'tiny_mce_before_init', 'my_mce4_options' );

function identifyCat($healthPopu, $dementiaPopu) {
    /*/articles/を除いた初めのディレクトリ名を参照して、カテゴリを取得*/
    $underRoot = $_SERVER["REQUEST_URI"];
    $tmpCat = str_replace('/articles/', '', $underRoot);
    //カテゴリトップの場合：health-care, dementia
    //postページの場合:category/post_id

    if (strstr($tmpCat, '/')) {
        //'/'以下を削除してカテゴリを取得する
        $tmpCat = str_replace(strstr($tmpCat, '/'), '', $tmpCat);
    }

    echo $tmpCat.'<br>';

    if ($tmpCat == 'health-care') {
        return $healthPopu;
    } elseif ($tmpCat == 'dementia') {
        return $dementiaPopu;
    } else {
        return array(1846, 1487, 2685, 2693, 2703);//これはhealthと同じなので暫定
    }
}

function popularPost($popuPosList) {
    echo '<div class="popularPostList"><ul>';

    foreach ($popuPosList as $post_id) {
        $title = get_post($post_id)->post_title;
        $postLink = get_permalink($post_id);
        $src = get_the_post_thumbnail_url($post_id, 'medium');
        echo '<li><img src="'.$src.'"><a href="'.$postLink.'">'.$title.'</a></li>';
    }

    echo '</ul></div>';
    return null;
}

//caronicalのデフォルト削除
$remove = remove_action('wp_head', 'rel_canonical');