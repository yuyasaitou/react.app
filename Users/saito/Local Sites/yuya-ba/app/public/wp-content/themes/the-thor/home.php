<?php get_header(); ?>

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


      <div class="dividerBottom">
        <h1 class="heading heading-primary"><?php single_post_title(); ?> </h1>
        <!--controller-->
        <?php fit_archive_controller() ?>
        <!--/controller-->

        <!--archive-->
        <?php if (have_posts()) : $count = 1; ?>
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
			}
			else{
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
	    <?php else : ?>
        <div class="archive">
          <div class="archive__item archive__item-none<?php if (get_option('fit_archiveList_frame') && get_option('fit_archiveList_frame') != 'off' ):?> <?php echo get_option('fit_archiveList_frame')?><?php endif; ?>">
            <p class="phrase phrase-primary">投稿が1件も見つかりませんでした。</p>
          </div>
        </div>
	    <?php endif; ?>
        <!--/archive-->

        <!--pager編集箇所-->
		<!--?php if ( function_exists( 'fit_pagination' ) ) {fit_pagination( $wp_query->max_num_pages );} ?-->
        <!--/pager-->

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
    $the_query = new WP_Query($args);
    if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
    'base' => 'http://kenkatsudemo.mcsg.co.jp/articles' . '%_%',//ここuriを本番環境ドメイン名と一致させる。
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
    $the_query = new WP_Query($args);
    if ($the_query->max_num_pages > 1) {
    echo paginate_links(array(
    'base' => 'http://kenkatsudemo.mcsg.co.jp/articles' . '%_%',
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

    <!--?php?-->

      </div>

    </main>
    <!--/l-main-->


    <?php if ( get_option('fit_archiveLayout_column') != '1' ):?>
      <?php get_sidebar(); ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->



<?php get_footer(); ?>

