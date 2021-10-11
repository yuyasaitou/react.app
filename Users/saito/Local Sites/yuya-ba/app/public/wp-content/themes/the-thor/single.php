<?php ojiTest();?>

<?php get_header();?>

  <?php if ( get_option('fit_postStyle_headline') == 'viral' ): ?>
  <div class="viral">
    <div class="viral__bg mask<?php if(get_option('fit_postStyle_mask') && get_option('fit_postStyle_mask') != 'off'): ?> mask-<?php echo get_option('fit_postStyle_mask') ?><?php endif; ?>
    <?php
    if(get_option('fit_postStyle_mask') == 'color' || get_option('fit_postStyle_mask') == 'colorgray'){
		$cat = get_the_category();
		if(!empty($cat[0])){
			echo 'cc-bg'.$cat[0]->term_id;
		}
	}
	?>
    ">
    <?php if ( has_post_thumbnail()): ?>
      <?php if ( is_mobile()): ?>
        <?php the_post_thumbnail('icatch768'); ?>
      <?php else: ?>
        <?php the_post_thumbnail('icatch1280'); ?>
      <?php endif; ?>
    <?php elseif ( get_fit_noimg()): ?>
      <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
    <?php else: ?>
      <?php if ( is_mobile()): ?>
        <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
      <?php else: ?>
        <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_1280.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
      <?php endif; ?>
    <?php endif; ?>
    </div>

    <div class="container">
      <div class="viral__container">
        <div class="viral__contents">
          <h1 class="heading heading-primary"><?php the_title(); ?></h1>
          <ul class="dateList">
            <?php if( !empty(get_option('fit_postStyle_time')) ): ?>
              <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
            <?php endif; ?>
            <?php if ( !empty(get_option('fit_postStyle_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postStyle_update')) && empty(get_option('fit_postStyle_time'))) : ?>
              <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
            <?php endif; ?>
              <li class="dateList__item icon-folder"><?php the_category(', ');?></li>
            <?php if(has_tag() == true) : ?>
              <li class="dateList__item icon-tag"><?php the_tags(''); ?></li>
            <?php endif; ?>
            <?php
            $views = get_post_meta(get_the_ID(), 'post_views' , true );
            if( !empty(get_option('fit_postStyle_view'))  ): ?>
              <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
            <?php endif; ?>
            <?php if( !empty(get_option('fit_postStyle_comment')) ): ?>
              <li class="dateList__item icon-bubble2" title="コメント数"><?php comments_number( '0件', '1件', '%件' ); ?></li>
            <?php endif; ?>
          </ul>
        </div>


        <div class="eyecatch<?php if (get_option('fit_postStyle_aspect') && get_option('fit_postStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_postStyle_aspect'); ?><?php endif; ?>">
          <?php
          $cat = get_the_category();
          if ( !get_option('fit_postStyle_category') ){
            if(!empty($cat[0])){
        		  echo '<span class="eyecatch__cat cc-bg'.$cat[0]->term_id.'">';
        		  echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
        		  echo '</span>';
        	  }
          }
          ?>
          <span class="eyecatch__link">
            <?php if ( has_post_thumbnail()): ?>
              <?php the_post_thumbnail('icatch375'); ?>
            <?php elseif ( get_fit_noimg()): ?>
              <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
            <?php else: ?>
              <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
            <?php endif; ?>
          </span>

        </div>
      </div>
    </div>

  </div>
  <?php endif; ?>

  <div class="wider">
    <?php fit_breadcrumb(); ?>
  </div>

  <!--l-wrapper-->
  <div class="l-wrapper">

    <!--l-main-->
    <?php
    //フレーム設定
    $frame = '';
    if (get_option('fit_conMain_frame') && get_option('fit_conMain_frame') != 'off' ){$frame = ' '.get_option('fit_conMain_frame');}

    //ページ横幅のオプション設定
    $width_post = '';
    if (get_option('fit_postLayout_width') && get_option('fit_postLayout_width') != 'off'){$width_post = get_option('fit_postLayout_width');}

    //レイアウト設定
    $layout = '';
    if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ){
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '1' ){$layout = ' l-main-wide'.$width_post;}
      if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' && get_option('fit_postLayout_side') == 'left' ){$layout = ' l-main-right';}
    }
    else{
      if ( get_option('fit_postLayout_column') == '1' ){$layout = ' l-main-wide'.$width_post;}
      if ( get_option('fit_postLayout_column') != '1' && get_option('fit_postLayout_side') == 'left'  ){$layout = ' l-main-right';}
    }
    ?>
    <main class="l-main<?php echo $frame.$layout; ?>">





      <div class="dividerBottom">


      <?php if ( get_option('fit_postStyle_headline') != 'viral' ): ?>
        <h1 class="heading heading-primary"><?php the_title(); ?></h1>

        <ul class="dateList dateList-main">
          <?php if( !empty(get_option('fit_postStyle_time')) ): ?>
            <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
          <?php endif; ?>
          <?php if ( !empty(get_option('fit_postStyle_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postStyle_update')) && empty(get_option('fit_postStyle_time'))) : ?>
            <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
          <?php endif; ?>
            <li class="dateList__item icon-folder"><?php the_category(', ');?></li>
		  <?php if(has_tag() == true) : ?>
            <li class="dateList__item icon-tag"><?php the_tags(''); ?></li>
		  <?php endif; ?>
          <?php
          $views = get_post_meta(get_the_ID(), 'post_views' , true );
          if( !empty(get_option('fit_postStyle_view')) ): ?>
            <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
          <?php endif; ?>
          <?php if( !empty(get_option('fit_postStyle_comment')) ): ?>
            <li class="dateList__item icon-bubble2" title="コメント数"><?php comments_number( '0件', '1件', '%件' ); ?></li>
          <?php endif; ?>
        </ul>

        <?php if ( get_option('fit_postStyle_headline') != 'none' ): ?>
        <div class="eyecatch<?php if (get_option('fit_postStyle_aspect') && get_option('fit_postStyle_aspect') != 'off' ): ?> <?php echo get_option('fit_postStyle_aspect'); ?><?php endif; ?> eyecatch-main">
          <?php
		  $cat = get_the_category();
      if ( !get_option('fit_postStyle_category') ){
        if(!empty($cat[0])){
  			  echo '<span class="eyecatch__cat eyecatch__cat-big cc-bg'.$cat[0]->term_id.'">';
  			  echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
  			  echo '</span>';
  		  }
		  }
		  ?>
          <span class="eyecatch__link">
          <?php if ( has_post_thumbnail()): ?>
            <?php the_post_thumbnail('icatch768'); ?>
          <?php elseif ( get_fit_noimg()): ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
		  <?php else: ?>
            <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
          <?php endif; ?>
          </span>
        </div>
        <?php endif; ?>

      <?php endif; ?>




        <?php if ( is_active_sidebar('post_top')  ) : ?>
        <!--post_top_widget-->
        <div class="dividerBottom">
		  <?php dynamic_sidebar('post_top'); ?>
        </div>
        <!--/post_top_widget-->
		<?php endif; ?>


        <!--postContents-->
        <div class="postContents<?php if (get_option('fit_postStyle_frame') && get_option('fit_postStyle_frame') != 'off' ):?> <?php echo get_option('fit_postStyle_frame')?><?php endif; ?>">
          <?php if (get_option('fit_postShare_top') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
		    <aside class="social-top"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>


		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <section class="content<?php fit_content_class(); ?>">
			<?php the_content(); ?>
          </section>
          <?php
          // ページングの表示
          fit_link_pages();
          ?>
		  <?php endwhile; endif; ?>


          <?php if (get_option('fit_postShare_bottom') == 'on' && get_post_meta(get_the_ID(), 'share_hide', true) != '1') : ?>
		    <aside class="social-bottom"><?php fit_share_btn(); ?></aside>
          <?php endif; ?>
        </div>
        <!--/postContents-->


        <?php if ( is_active_sidebar('post_bottom')  ) : ?>
        <!--post_bottom_widget-->
        <div class="dividerTop">
		  <?php dynamic_sidebar('post_bottom'); ?>
        </div>
        <!--/post_bottom_widget-->
		<?php endif; ?>




        <?php if( get_option('fit_postCta_switch') == 'on' && get_post_meta(get_the_ID(), 'cta_hide', true) != '1' ):?>
        <!-- 記事下CTA -->
        <?php
		$frame = '';
        if(get_option('fit_postCta_style') && get_option('fit_postCta_style') != 'off' ){
			$frame = get_option('fit_postCta_style');
		}?>
        <div class="content postCta <?php echo $frame ?>">

		<?php
		if(get_post_meta(get_the_ID(), 'cta_id', true) ){
			$id = get_post_meta(get_the_ID(), 'cta_id', true);
		}elseif(get_option('fit_postCta_id') ){
			$id = get_option('fit_postCta_id');
		}else{
			$id = '';
		}
		$args = array(
			'p' => $id,
      'posts_per_page' => '1',
      'order' => 'ASC',
			'post_type' => 'cta'
		);
  		$my_query = new WP_Query( $args );
		while ( $my_query->have_posts() ) : $my_query->the_post();
		?>
  			<?php the_content(); ?>
		<?php endwhile; wp_reset_postdata();  ?>

        </div>
        <!-- /記事下CTA -->
        <?php endif; ?>






        <?php if( get_option('fit_postSns_switch') == 'on' && get_post_meta(get_the_ID(), 'follow_hide', true) != '1' ):?>
        <?php $opt = get_option('fit_snsFollow'); ?>
        <div class="snsFollow">
          <!-- facebook -->
          <div class="snsFollow__bg">
            <?php if ( has_post_thumbnail()): ?>
              <?php the_post_thumbnail('icatch375'); ?>
            <?php elseif ( get_fit_noimg()): ?>
              <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
		    <?php else: ?>
              <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
            <?php endif; ?>
          </div>

          <div class="snsFollow__contents">
            <div class="snsFollow__text">
			<?php if(get_option('fit_postSns_title') ):?>
			  <?php echo get_option('fit_postSns_title') ?>
			<?php else: ?>
              最新情報をチェックしよう！
			<?php endif; ?>
            </div>

            <ul class="snsFollow__list">
              <?php if(get_option('fit_snsOgp_FBAppId') && $opt['FBPage']): ?>
              <li class="snsFollow__item">
                <div class="fb-like" data-href="https://www.facebook.com/<?php echo $opt['FBPage']; ?>" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
              </li>
              <?php endif; ?>
              <?php if($opt['twitterId']): ?>
              <li class="snsFollow__item">
                <a href="https://twitter.com/<?php echo $opt['twitterId']; ?>" class="twitter-follow-button" data-size="large" data-show-screen-name="false" data-lang="ja" data-show-count="false">フォローする</a>
              </li>
              <?php endif; ?>
            </ul>

          </div>
        </div>
        <?php endif; ?>






		<?php
        if( get_option('fit_postPrevNext_switch') == 'on' && get_post_meta(get_the_ID(), 'prevNext_hide', true) != '1' ): //前次記事の表示がONの時
	    	$noText = '記事がありません';
			$nextText = 'Next';
			$prevText = 'Prev';
			if(get_option('fit_postPrevNext_text')){
				$noText = get_option('fit_postPrevNext_text');
			}
			if(get_option('fit_postPrevNext_next')){
				$nextText = get_option('fit_postPrevNext_next');
			}
			if(get_option('fit_postPrevNext_prev')){
				$prevText = get_option('fit_postPrevNext_prev');
			}

			if(get_option('fit_postPrevNext_category')){
		    	$prevpost = get_adjacent_post(true, '', true); //同一カテゴリの前の記事
		    	$nextpost = get_adjacent_post(true, '', false); //同一カテゴリの次の記事
	    	}
			else {
		    	$prevpost = get_adjacent_post(false, '', true); //前の記事
		    	$nextpost = get_adjacent_post(false, '', false); //次の記事
	    	}
			if($prevpost || $nextpost):
		?>
		<!-- 前次記事エリア -->
		<ul class="prevNext">
        <?php if ( $prevpost ) {//前の記事がある時
			// prev_thumbnailサイズの画像内容を取得
			$prev_thumbnail_id = get_post_thumbnail_id($prevpost->ID);
			$prev_thumb_img = wp_get_attachment_image_src( $prev_thumbnail_id , 'icatch375' );
			// サムネイル画像出力
			$prev_thumb_src = $prev_thumb_img[0];
			$prev_thumb_width = $prev_thumb_img[1];
			$prev_thumb_height = $prev_thumb_img[2];
		?>
	      <li class="prevNext__item prevNext__item-prev">

            <div class="eyecatch">
              <div class="prevNext__pop"><?php echo $prevText; ?></div>
              <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php echo get_permalink($prevpost->ID); ?>">

                <?php if(has_post_thumbnail($prevpost->ID)) : ?>
		          <img <?php echo fit_correct_src(); ?>="<?php echo $prev_thumb_src; ?>" alt="<?php echo get_the_title($prevpost->ID); ?>" width="<?php echo $prev_thumb_width; ?>" height="<?php echo $prev_thumb_height; ?>" <?php echo fit_dummy_src(); ?>>
		        <?php elseif ( get_fit_noimg()): ?>
				  <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
				<?php else :?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
		        <?php endif; ?>

	            <div class="prevNext__title">
                  <?php if (get_option('fit_postPrevNext_time') == 'on' ) :	?><span class="icon-clock"><?php echo get_the_time(get_option('date_format') , $prevpost->ID ); ?></span><?php endif; ?>
                  <h3 class="heading heading-secondary"><?php echo get_the_title($prevpost->ID); ?></h3>
                </div>
              </a>
            </div>
	      </li>
        <?php }else { //前の記事がない時?>

          <li class="prevNext__item prevNext__item-prev">
            <div class="eyecatch">
              <div class="prevNext__pop"><?php echo $prevText; ?></div>
              <p class="prevNext__text"><?php echo $noText; ?></p>
            </div>
          </li>
        <?php }?>
        <?php if ( $nextpost ) {//次の記事がある時
			// next_thumbnailサイズの画像内容を取得
			$next_thumbnail_id = get_post_thumbnail_id($nextpost->ID);
			$next_thumb_img = wp_get_attachment_image_src( $next_thumbnail_id , 'icatch375' );
			// サムネイル画像出力
			$next_thumb_src = $next_thumb_img[0];
			$next_thumb_width = $next_thumb_img[1];
			$next_thumb_height = $next_thumb_img[2];
		?>
	      <li class="prevNext__item prevNext__item-next">

            <div class="eyecatch">
              <div class="prevNext__pop"><?php echo $nextText; ?></div>
              <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php echo get_permalink($nextpost->ID); ?>">

                <?php if(has_post_thumbnail($nextpost->ID)) : ?>
		          <img <?php echo fit_correct_src(); ?>="<?php echo $next_thumb_src; ?>" alt="<?php echo get_the_title($nextpost->ID); ?>" width="<?php echo $next_thumb_width; ?>" height="<?php echo $next_thumb_height; ?>" <?php echo fit_dummy_src(); ?>>
		        <?php elseif ( get_fit_noimg()): ?>
				  <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
				<?php else :?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" width="600" height="600" <?php echo fit_dummy_src(); ?>>
		        <?php endif; ?>


	            <div class="prevNext__title">
                  <?php if (get_option('fit_postPrevNext_time') == 'on' ) :	?><span class="icon-clock"><?php echo get_the_time(get_option('date_format') , $nextpost->ID ); ?></span><?php endif; ?>
                  <h3 class="heading heading-secondary"><?php echo get_the_title($nextpost->ID); ?></h3>
                </div>
              </a>
            </div>
	      </li>
        <?php }else { //次の記事がない時 ?>
          <li class="prevNext__item prevNext__item-next">
            <div class="eyecatch">
              <div class="prevNext__pop"><?php echo $nextText; ?></div>
              <p class="prevNext__text"><?php echo $noText; ?></p>
            </div>
          </li>
        <?php }?>
	    </ul>
        <!-- /前次記事エリア -->
	    <?php endif; endif; ?>





	    <?php if ( get_option('fit_postProfile_switch') == 'on' && get_post_meta(get_the_ID(), 'profile_hide', true) != '1' ) :	?>
        <!-- プロフィール -->
	    <aside class="profile">
	      <div class="profile__author">
            <?php
			$pText = 'この記事を書いた人';
			$pBtnText = '投稿一覧へ';
            if ( get_option('fit_postProfile_text')) {
				$pText = get_option('fit_postProfile_text');
			}
			if ( get_option('fit_postProfile_btnText')) {
				$pBtnText = get_option('fit_postProfile_btnText');
			}
			?>
            <div class="profile__text"><?php echo $pText; ?></div>
	        <?php
 	        $author = get_the_author_meta('ID');
 	        $avatar = get_avatar($author);
			$imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
			if(preg_match($imgtag, $avatar, $imgurl)){
				$avatar = $imgurl[2];
			}
		    ?>
		    <img <?php echo fit_correct_src(); ?>="<?php echo $avatar; ?>" alt="<?php echo the_author_meta('display_name'); ?>" width="80" height="80" <?php echo fit_dummy_src(); ?>>
	        <h2 class="profile__name"><?php the_author_meta('display_name'); ?></h2>
            <?php if(get_the_author_meta('user_group',$author)): ?><h3 class="profile__group"><?php the_author_meta('user_group',$author); ?></h3><?php endif; ?>
	      </div>

	      <div class="profile__contents">
            <div class="profile__description"><?php if(get_the_author_meta('description')): ?><?php the_author_meta('description'); ?><?php endif; ?></div>
            <ul class="profile__list">
	  	      <?php if(get_the_author_meta('facebook',$author)): ?><li class="profile__item"><a class="profile__link icon-facebook" href="<?php the_author_meta('facebook',$author); ?>"></a></li><?php endif; ?>
		        <?php if(get_the_author_meta('twitter',$author)): ?><li class="profile__item"><a class="profile__link icon-twitter" href="<?php the_author_meta('twitter',$author); ?>"></a></li><?php endif; ?>
		        <?php if(get_the_author_meta('instagram',$author)): ?><li class="profile__item"><a class="profile__link icon-instagram" href="<?php the_author_meta('instagram',$author); ?>"></a></li><?php endif; ?>
		        <?php if(get_the_author_meta('gplus',$author)): ?><li class="profile__item"><a class="profile__link icon-google-plus" href="<?php the_author_meta('gplus',$author); ?>"></a></li><?php endif; ?>
            <?php if(get_the_author_meta('youtube',$author)): ?><li class="profile__item"><a class="profile__link icon-youtube" href="<?php the_author_meta('youtube',$author); ?>"></a></li><?php endif; ?>
            <?php if(get_the_author_meta('linkedin',$author)): ?><li class="profile__item"><a class="profile__link icon-linkedin" href="<?php the_author_meta('linkedin',$author); ?>"></a></li><?php endif; ?>
            <?php if(get_the_author_meta('pinterest',$author)): ?><li class="profile__item"><a class="profile__link icon-pinterest" href="<?php the_author_meta('pinterest',$author); ?>"></a></li><?php endif; ?>
	        </ul>

            <?php if ( get_option('fit_postProfile_btn') == 'on' ) :	?>
              <div class="btn btn-center"><a class="btn__link btn__link-secondary" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo $pBtnText; ?></a></div>
            <?php endif; ?>
	      </div>
	    </aside>
        <!-- /プロフィール -->
	    <?php endif; ?>






	    <?php if (get_option('fit_adPost_doubleLeft') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' ||
		           get_option('fit_adPost_doubleRight') && get_post_meta(get_the_ID(), 'rectangle_hide', true) != '1' ):?>
      <!-- ダブルレクタングル広告 -->
	    <div class="rectangle<?php if(get_option('fit_adPost_styleR')){ echo ' rectangle-no';} ?>">
	      <div class="rectangle__item rectangle__item-left">
            <?php echo get_option('fit_adPost_doubleLeft'); ?>
	      </div>
	      <div class="rectangle__item rectangle__item-right">
            <?php echo get_option('fit_adPost_doubleRight'); ?>
	      </div>
          <span class="rectangle__title"><?php echo get_option('fit_adPost_textR'); ?></span>
	    </div>
      <!-- /ダブルレクタングル広告 -->
      <?php endif; ?>



		<?php if ( get_option('fit_postRelated_switch') == 'on' && get_post_meta(get_the_ID(), 'related_hide', true) != '1' ) : ?>
		<!-- 関連記事 -->
		<?php
		// 総件数
		$max_post_num = 3;
		if(get_option('fit_postRelated_number')){
			$max_post_num = get_option('fit_postRelated_number');
		}

		// 現在の記事にタグが設定されている場合
		if ( has_tag() ) {
			// 1.タグ関連の投稿を取得
			$tags = wp_get_post_tags($post->ID);
			$tag_ids = array();
			foreach($tags as $tag){
				array_push( $tag_ids, $tag -> term_id);
			}
			$tag_args = array(
				'post__not_in' => array($post -> ID),
				'tag__not_in' => $tag_ids,
				'posts_per_page'=> $max_post_num,
				'tag__in' => $tag_ids,
				'orderby' => 'rand',
			);
			$rel_posts = get_posts($tag_args);
			// 総件数よりタグ関連の投稿が少ない場合は、カテゴリ関連の投稿からも取得する
			$rel_count = count($rel_posts);
			if ($max_post_num > $rel_count) {
				$categories = get_the_category($post->ID);
				$category_ID = array();
				foreach($categories as $category){
					array_push( $category_ID, $category -> cat_ID);
				}
				// 取得件数は必要な数のみリクエスト
				$cat_args = array(
					'post__not_in' => array($post -> ID),
					'posts_per_page'=> ($max_post_num - $rel_count),
					'category__in' => $category_ID,
					'orderby' => 'rand',
				);
				$cat_posts = get_posts($cat_args);
				$rel_posts = array_merge($rel_posts, $cat_posts);
			}
		}
		else { // 現在の記事にタグが設定されていない場合
			$categories = get_the_category($post->ID);
			$category_ID = array();
			foreach($categories as $category){
				array_push( $category_ID, $category -> cat_ID);
			}
			// 取得件数は必要な数のみリクエスト
			$cat_args = array(
				'post__not_in' => array($post -> ID),
				'posts_per_page'=> ($max_post_num),
				'category__in' => $category_ID,
				'orderby' => 'rand',
			);
			$cat_posts = get_posts($cat_args);
			$rel_posts = $cat_posts;
		}
		$title = '関連する記事';
		if ( get_option('fit_postRelated_title') ){
			$title = get_option('fit_postRelated_title');
		}

		echo'<aside class="related">';
		echo'<h2 class="heading heading-sub">'.$title.'</h2>';

		// 関連記事が1件以上あれば
		if( count($rel_posts) > 0 ){
			echo'<ul class="related__list">';

			foreach ($rel_posts as $post){
				setup_postdata($post);

				// thumbnailサイズの画像内容を取得
				$thumbnail_id = get_post_thumbnail_id();
				$thumb_img = wp_get_attachment_image_src( $thumbnail_id , 'icatch375' );
				// サムネイル画像出力
				$thumb_src = $thumb_img[0];
				$thumb_width = $thumb_img[1];
				$thumb_height = $thumb_img[2];
				?>

        <li class="related__item">
          <?php if ( get_option('fit_postRelated_aspect') != 'none' ): ?>
            <div class="eyecatch<?php if (get_option('fit_postRelated_aspect') && get_option('fit_postRelated_aspect') != 'off' ): ?> <?php echo get_option('fit_postRelated_aspect'); ?><?php endif; ?>">
              <?php
    				  $cat = get_the_category();
              if ( !get_option('fit_postRelated_category') ){
                if(!empty($cat[0])){
      					  echo '<span class="eyecatch__cat cc-bg'.$cat[0]->term_id.'">';
      					  echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
      					  echo '</span>';
      				  }
              }
    				  ?>
              <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
                <?php if(has_post_thumbnail()) : ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo $thumb_src; ?>" alt="<?php the_title(); ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" <?php echo fit_dummy_src(); ?>>
                <?php elseif ( get_fit_noimg()): ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" width="375" height="375" <?php echo fit_dummy_src(); ?>>
                <?php else :?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" width="375" height="375" <?php echo fit_dummy_src(); ?>>
                <?php endif; ?>
              </a>
            </div>
          <?php endif; ?>

          <div class="archive__contents<?php if( get_option('fit_postRelated_aspect') == 'none' ): ?> archive__contents-noImg<?php endif; ?>">
            <?php if( get_option('fit_postRelated_aspect') == 'none' ): ?>
              <?php
              $cat = get_the_category();
              if(!empty($cat[0])){
                echo '<div class="the__category cc-bg'.$cat[0]->term_id.'">';
                echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
                echo '</div>';
              }?>
            <?php endif; ?>
            <?php if( !empty(get_option('fit_postRelated_time')) || !empty(get_option('fit_postRelated_update'))  ): ?>
              <ul class="dateList">
                <?php if( !empty(get_option('fit_postRelated_time')) ): ?>
                  <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php if ( !empty(get_option('fit_postRelated_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postRelated_update')) && empty(get_option('fit_postRelated_time'))) : ?>
                  <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
                <?php endif; ?>
              </ul>
            <?php endif; ?>

            <h3 class="heading heading-secondary">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
          </div>

        </li>
			<?php
			}
			echo'</ul>';
		}

		// 関連記事がない場合
		else{
			echo'<p class="related__contents related__contents-max">'.$title.'はありませんでした。</p>';
		}

		echo'</aside>';
	  ?>
	  <?php wp_reset_postdata();?>
      <!-- /関連記事 -->
	  <?php endif; ?>


        <!-- コメント -->
          <?php comments_template(); ?>
        <!-- /コメント -->





	    <?php if(!is_user_logged_in() && !is_bot()): ?>
        <!-- PVカウンター -->
          <?php set_post_views(get_the_ID()); ?>
	    <!-- /PVカウンター -->
	    <?php endif; ?>



      </div>

    </main>
    <!--/l-main-->

    <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) && get_post_meta(get_the_ID(), 'column_layout', true) != '0' ):?>
      <?php if ( get_post_meta(get_the_ID(), 'column_layout', true) == '2' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
    <?php else:?>
      <?php if ( get_option('fit_postLayout_column') != '1' ):?>
        <?php get_sidebar(); ?>
      <?php endif; ?>
	<?php endif; ?>


  </div>
  <!--/l-wrapper-->


  <?php
  if ( get_option('fit_postCategory_switch') == 'on' && get_post_meta(get_the_ID(), 'category_hide', true) != '1') :
	  $cat = get_the_category();
  ?>
  <!--l-footerTop-->
  <div class="l-footerTop">
    <div class="wider">

      <div class="categoryBox">
        <div class="container">
          <h2 class="heading heading-main u-bold <?php echo 'cc-ft'.$cat[0]->term_id; ?>"><i class="icon-folder"></i><?php echo $cat[0]->cat_name ?><span><?php if(get_option('fit_postCategory_sub')){echo get_option('fit_postCategory_sub');}else{echo 'の最新記事8件';} ?></span></h2>

          <ul class="categoryBox__list">
		  <?php
		  $number = '8';
		  if(get_option('fit_postCategory_number')){
			  $number = get_option('fit_postCategory_number');
		  }

		  $args = array(
		      'cat'=> $cat[0]->term_id,
			  'ignore_sticky_posts' => '1',
			  'posts_per_page' => $number,
		  );
		  $my_query = new WP_Query( $args );

		  ?>
		  <?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
            <li class="categoryBox__item">

			  <?php if ( get_option('fit_postCategory_aspect') != 'none' ): ?>
              <div class="eyecatch<?php if(get_option('fit_postCategory_aspect') && get_option('fit_postCategory_aspect') != 'off'): ?> <?php echo get_option('fit_postCategory_aspect');?><?php endif; ?>">
                <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail()): ?>
                  <?php the_post_thumbnail('icatch375'); ?>
                <?php elseif ( get_fit_noimg()): ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
				<?php else: ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_375.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                <?php endif; ?>
                </a>
              </div>
              <?php endif; ?>

              <div class="categoryBox__contents">
              <?php if( !empty( get_option('fit_postCategory_time') ) || !empty(get_option('fit_postCategory_update'))): ?>
                <ul class="dateList">
                <?php if( !empty(get_option('fit_postCategory_time') )): ?>
                  <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php if ( !empty(get_option('fit_postCategory_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_postCategory_update')) && empty(get_option('fit_postCategory_time'))) : ?>
                  <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
                <?php endif; ?>
                </ul>
			  <?php endif; ?>

                <h2 class="heading heading-tertiary">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
              </div>
            </li>
		  <?php endwhile; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <?php endif; ?>



  <!-- schema -->
  <script type="application/ld+json">
  <?php
  // ユーザー投稿サムネイルの画像サイズを取得
  if (has_post_thumbnail()){
	  $thumbnail_id = get_post_thumbnail_id();
	  $eyeimg = wp_get_attachment_image_src( $thumbnail_id , 'icatch768' );
  }
  // ユーザー投稿NO IMAGEサイズを取得
  if (get_fit_noimg()){
	  $noimg_date = get_fit_noimg();
	  $noimg_id = fit_get_imageId($noimg_date);
	  $noimg = wp_get_attachment_image_src( $noimg_id, 'icatch768' );
  }
  // ユーザー投稿LOGOサイズを取得
  if (get_fit_logo()){
	  $logo_date = get_fit_logo();
	  $logo_id = fit_get_imageId($logo_date);
	  $logo = wp_get_attachment_image_src( $logo_id, 'full' );
  }
  // ユーザー投稿AMP LOGOサイズを取得
  if (get_fit_amplogo()){
	  $amplogo_date = get_fit_amplogo();
	  $amplogo_id = fit_get_imageId($amplogo_date);
	  $amplogo = wp_get_attachment_image_src( $amplogo_id, 'full' );
  }
  ?>
  {
    "@context": "http://schema.org",
    "@type": "Article ",
    "mainEntityOfPage":{
      "@type": "WebPage",
      "@id": "<?php the_permalink(); ?>"
    },
    "headline": "<?php echo get_the_title(); ?>",
    "description": "<?php echo get_the_excerpt(); ?>",
    "image": {
      "@type": "ImageObject",
      <?php if(has_post_thumbnail()) : ?>"url": "<?php echo $eyeimg[0]; ?>",
      "width": "<?php echo $eyeimg[1]; ?>px",
      "height": "<?php echo $eyeimg[2]; ?>px"
      <?php elseif ( get_fit_noimg()): ?>"url": "<?php echo $noimg[0]; ?>",
      "width": "<?php echo $noimg[1]; ?>px",
      "height": "<?php echo $noimg[2]; ?>px"
      <?php else: ?>"url": "<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif",
      "height": "768px",
      "width": "432px"
      <?php endif; ?>
    },
    "datePublished": "<?php echo get_the_date(DATE_ISO8601); ?>",
    "dateModified": "<?php if ( get_the_date() != get_the_modified_time() ){ the_modified_date(DATE_ISO8601); } else { echo get_the_date(DATE_ISO8601); } ?>",
    "author": {
      "@type": "Person",
      "name": "<?php the_author_meta('display_name'); ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php bloginfo('name'); ?>",
      "logo": {
        "@type": "ImageObject",
        <?php if(get_fit_logo()) : ?>"url": "<?php echo $logo[0]; ?>",
        "width": "<?php echo $logo[1]; ?>px",
        "height": "<?php echo $logo[2]; ?>px"
        <?php elseif ( get_fit_amplogo()): ?>"url": "<?php echo $amplogo[0]; ?>",
        "width": "<?php echo $amplogo[1]; ?>px",
        "height": "<?php echo $amplogo[2]; ?>px"
        <?php else: ?>"url": "<?php echo get_template_directory_uri(); ?>/img/amp_default_logo.png",
        "height": "600px",
        "width": "60px"
        <?php endif; ?>
      }
    }
  }
  </script>
  <!-- /schema -->



<?php get_footer(); ?>
