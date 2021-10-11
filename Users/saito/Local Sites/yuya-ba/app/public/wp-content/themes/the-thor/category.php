<?php get_header(); ?>

<!--現在のurlを取得-->
<!--?php $current_url =  get_pagenum_link(get_query_var('page')); 
echo $current_url;
?-->

echo 'テスト中';
  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_archive = '';
    if (get_option('fit_archiveLayout_width') && get_option('fit_archiveLayout_width') != 'off'){$width_archive = get_option('fit_archiveLayout_width'); }

    //レイアウト設定
    $layout = '';
    if ( get_option('fit_archiveLayout_column') == '1' ){$layout = ' l-main-wide'.$width_archive;}
    if ( get_option('fit_archiveLayout_column') != '1' && get_option('fit_archiveLayout_side') == 'left'  ){$layout = ' l-main-right';}
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">


      <?php if (!is_paged()) : ?>
        <div class="dividerBottom">
          <?php $term_meta = get_option('category_'.$cat); ?>
          <div class="archiveHead<?php if ( get_option('fit_archiveCat_headline') == 'color' || get_option('fit_archiveCat_headline') == 'colorgray' ):?> cc-bg<?php echo $cat ?><?php endif; ?>
            <?php if (get_option('fit_archiveCat_headline') && get_option('fit_archiveCat_headline') != 'off' ):?> mask mask-<?php echo get_option('fit_archiveCat_headline')?><?php endif; ?>">
            <?php if (get_option('fit_archiveCat_headline') && get_option('fit_archiveCat_headline') != 'off' && get_option('fit_archiveCat_img') && !empty($term_meta['img'])):?>
              <?php
    	        $image_id = fit_get_imageId($term_meta['img']);
    	        $image = wp_get_attachment_image_src( $image_id, 'icatch768' );
    	        ?>
              <img class="archiveHead__img" <?php echo fit_correct_src(); ?>="<?php echo $image[0];?>" alt="<?php echo fit_get_headline_title(); ?>" <?php echo fit_dummy_src(); ?>>
            <?php endif; ?>
            <div class="archiveHead__contents">
              <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
              <h1 class="heading heading-primary cc-ft<?php echo $cat; ?>"><?php echo fit_get_headline_title(); ?></h1>
              <?php if(category_description()): ?><p class="phrase phrase-secondary"><?php echo category_description(); ?></p><?php endif; ?>

              <?php
              if ( get_option('fit_archiveCat_child') == 'on' ){
                $args = array(
                  'parent' => $cat //現在のカテゴリーの直近子カテゴリを取得
                );
                $children = get_categories( $args );
                if($children){
                  echo '<ul class="archiveHead__list">';
                  foreach($children as $child){
                    echo '<li class="archiveHead__item cc-bg'.$cat.'"><a class="archiveHead__link" href="'. get_category_link($child->term_id). '">'. $child -> name. '</a></li>';
                  }
                  echo '</ul>';
                }
              }
              ?>
            </div>
          </div>

          <?php if($term_meta['free_input']): ?>
<!--ここ編集しているよ-->
          <!--?php  var_dump($term_meta['free_input']); ?-->
            <!--archiveContents-->
            <div class="archiveContents<?php if (get_option('fit_archiveCat_frame') && get_option('fit_archiveCat_frame') != 'off' ):?> <?php echo get_option('fit_archiveCat_frame')?><?php endif; ?>">

              <section class="content<?php fit_content_class(); ?>">
                <?php echo apply_filters('the_content', $term_meta['free_input']);?>
              </section>
            </div>
            <!--/archiveContents-->
          <?php endif; ?>
        </div>
      <?php else : ?>
        <div class="dividerBottom">
          <div class="archiveHead">
            <div class="archiveHead__contents">
              <span class="archiveHead__subtitle"><?php echo fit_get_headline_subtitle(); ?></span>
              <h1 class="heading heading-primary cc-ft<?php echo $cat; ?>"><?php echo fit_get_headline_title(); ?></h1>
            </div>
          </div>
        </div>
      <?php endif; ?>
		
      <?php if ( !is_paged() ) : ?>
        <?php get_template_part('category-top');?>
      <?php else : ?>
      <?php endif; ?>

      <div class="dividerBottom">
        <!--controller-->
        <?php fit_archive_controller() ?>
        <!--/controller-->


      <?php if (have_posts()) : $count = 1; ?>
        <!--archive-->
        <div class="archive">
          <?php while (have_posts()) : the_post();  ?>
            <?php get_template_part('loop');?>

            <?php
            if(get_option('fit_adInfeed_first')){
              if(!is_paged()){
                $number1 = '1';
                if(get_option('fit_adInfeed_number')){$number1 = get_option('fit_adInfeed_number');}
                if($count == $number1){ echo fit_infeed(); }

                $number2 = '';
                if(get_option('fit_adInfeed_number2')){$number2 = get_option('fit_adInfeed_number2');}
                if($count == $number2){ echo fit_infeed();}
              }
            }else{
              $number1 = '1';
      				if(get_option('fit_adInfeed_number')){$number1 = get_option('fit_adInfeed_number');}
      				if($count == $number1){ echo fit_infeed(); }

      				$number2 = '';
      				if(get_option('fit_adInfeed_number2')){$number2 = get_option('fit_adInfeed_number2');}
      				if($count == $number2){ echo fit_infeed();}
            }
            $count = $count + 1;
      			?>

      		<?php endwhile; ?>

          </div>
          <!--/archive-->
        <?php else : ?>
          <!--archive-->
          <div class="archive">
            <div class="archive__item archive__item-none<?php if (get_option('fit_archiveList_frame') && get_option('fit_archiveList_frame') != 'off' ):?> <?php echo get_option('fit_archiveList_frame')?><?php endif; ?>">
              <p class="phrase phrase-primary">投稿が1件も見つかりませんでした。</p>
            </div>
          </div>
          <!--/archive-->
  	    <?php endif; ?>


        <!--pager-->
        <!--?php if ( function_exists( 'fit_pagination' ) ) {fit_pagination( $wp_query->max_num_pages );} ?-->
        <!--/pager-->
        <!--pagerneo-->
        <!--追加場所---------------->
    <div id="pageNavi">
    <?php $url = $_SERVER['REQUEST_URI']; ?>
    <?php if(strstr($url,'articles')): ?>


    <?php 
    $paged = (int) get_query_var('paged');
    $query_varA = get_the_category();
    $category = $query_varA[0];
    $args = array(
        'cat'=> $category->cat_ID,
        'posts_per_page' => 20,//ページ/表示する投稿数
        'paged' => $paged,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
    );
    $categoryName = $query_varA[0]->slug;
    $the_query = new WP_Query($args);
    if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
    'base' => 'http://kenkatsudemo.mcsg.co.jp/articles/'.$categoryName . '%_%',//ここuriを本番環境ドメイン名と一致させる。
    'format' => '?paged=%#%',
    'current' => max(1, $paged),
    'total' => $the_query->max_num_pages
    ));
    }
    /*var_dump(get_pagenum_link(1));//ここの値で後ろが勝手についてくる。*/
    ?>

    <?php wp_reset_postdata(); ?>

       
    <?php else: ?>

    <?php
    $paged = (int) get_query_var('paged');
    $query_varA = get_the_category();
    $category = $query_varA[0];
    $args = array(
        'cat'=> $category->cat_ID,
        'posts_per_page' => 20,
        'paged' => $paged,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish'
    );
    $categoryName = $query_varA[0]->slug;
    $the_query = new WP_Query($args);
    if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
    'base' => 'http://kenkatsudemo.mcsg.co.jp/articles/'.$categoryName . '%_%',
    'format' => '&paged=%#%',
    'current' => max(1, $paged),
    'total' => $the_query->max_num_pages
    ));
    }
    ?>

    <?php wp_reset_postdata(); ?>

    <?php endif; ?>
    </div>



    <!--追加場所---------------->
        <!--/pagerneo-->
      </div>

    </main>
    <!--/l-main-->

    <?php if ( get_option('fit_archiveLayout_column') != '1' ):?>
      <?php get_sidebar(); ?>
    <?php endif; ?>

  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>
