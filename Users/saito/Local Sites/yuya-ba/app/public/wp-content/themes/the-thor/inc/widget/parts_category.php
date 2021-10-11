<?php
////////////////////////////////////////////////////////
//カテゴリ指定ランキングウィジェットアイテム
////////////////////////////////////////////////////////
class fit_ranking_categorie_class extends WP_Widget {
	function __construct() {
		$widget_option = array('description' => '指定したカテゴリでPV数の多い順に記事を表示');
		parent::__construct( false, $name = '[THE]カテゴリ人気記事', $widget_option );
	}

	// 設定フォームを出力するメソッド
	function form($instance) {
		$time   = !empty($instance['time']) ? 'checked' : '';
		$update = !empty($instance['update']) ? 'checked' : '';
		$layout = !empty($instance['layout']) ? 'checked' : '';
		$view   = !empty($instance['view']) ? 'checked' : '';
		?>
        <p>
		  <p>
		  <label for="<?php echo $this->get_field_id('title'); ?>">タイトル:</label>
		  <input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr( @$instance['title'] ); ?>">
		  </p>

          <p>
          <?php
          $categories = get_categories( array('orderby'=>'ID','order'=>'ASC') );

          echo '<label for="'.$this->get_field_name("categorie").'">カテゴリ:</label>';
          echo '<select class="widefat" id="'.$this->get_field_name("categorie").'" name="'.$this->get_field_name("categorie").'">';
          foreach($categories as $val):
			  $catId = $val -> cat_ID;
			  $selected = '';
			  if( @$instance['categorie'] == $catId ){
				  $selected = 'selected';
			  }
			  echo '<option '.$selected.' value="'.$catId.'">'.$val->name .'</option>';
		  endforeach;
		  echo '</select>';
		  ?>
          </p>

		  <p>
		  <label for="<?php echo $this->get_field_id('number'); ?>">表示する投稿数:</label>
		  <input class="tiny-text" type="number" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo esc_attr( @$instance['number'] ); ?>" step="1" min="1" max="10" size="3">
          </p>

          <p>
          <input class="checkbox" type="checkbox" <?php echo $time; ?> id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>" />
          <label for="<?php echo $this->get_field_id('time'); ?>">投稿日を表示しますか ?</label>
          </p>

          <p>
          <input class="checkbox" type="checkbox" <?php echo $update; ?> id="<?php echo $this->get_field_id('update'); ?>" name="<?php echo $this->get_field_name('update'); ?>" />
          <label for="<?php echo $this->get_field_id('update'); ?>">更新日を表示しますか ?</label>
          </p>

          <p>
          <input class="checkbox" type="checkbox" <?php echo $view; ?> id="<?php echo $this->get_field_id('view'); ?>" name="<?php echo $this->get_field_name('view'); ?>" />
          <label for="<?php echo $this->get_field_id('view'); ?>">閲覧数を表示しますか ?</label>
          </p>

          <p>
          <input class="checkbox" type="checkbox" <?php echo $layout; ?> id="<?php echo $this->get_field_id('layout'); ?>" name="<?php echo $this->get_field_name('layout'); ?>" />
          <label for="<?php echo $this->get_field_id('layout'); ?>">ノーマルレイアウト(左画像)に変更しますか ?</label>
          </p>

          <p>
          <label for="<?php echo $this->get_field_name("aspect"); ?>">画像アスペクト比:</label>
          <select class="widefat" id="<?php echo $this->get_field_name("aspect"); ?>" name="<?php echo $this->get_field_name("aspect"); ?>">
            <option<?php if( @$instance['aspect'] == '' ){ echo ' selected';} ?> value="">16：9(default)</option>
            <option<?php if( @$instance['aspect'] == 'eyecatch-43' ){ echo ' selected';} ?> value="eyecatch-43">4：3</option>
            <option<?php if( @$instance['aspect'] == 'eyecatch-11' ){ echo ' selected';} ?> value="eyecatch-11">1：1</option>
            <option<?php if( @$instance['aspect'] == 'none' ){ echo ' selected';} ?> value="none">0：0(非表示)</option>
          </select>
          </p>

					<p>
						<label for="<?php echo $this->get_field_id('word'); ?>">本文抜粋文字数(本文を表示する場合)：</label>
						<input type="number" max="150" class="widefat" id="<?php echo $this->get_field_id('word'); ?>" name="<?php echo $this->get_field_name('word'); ?>" value="<?php echo esc_attr( @$instance['word'] ); ?>">
					</p>

        </p>
		<?php
	}

	// 設定を表示するメソッド

	function widget($args, $instance) {
		extract($args);
		echo $before_widget;
		$title = NULL;
		if(!empty($instance['title'])) {
			$title = apply_filters('widget_title', $instance['title'] );
		}

		if ($title) {
			echo $before_title . $title . $after_title;
		}
		$number = !empty($instance['number']) ? $instance['number'] : 5;

		$categorie = NULL;
		if(!empty($instance['categorie'])) {
			$categorie = $instance['categorie'] ;
		}


		$index = 'post_views';
		$args = array(
			'meta_key'=> $index,
			'orderby' => 'meta_value_num',
			'order' => 'DESC',
			'ignore_sticky_posts' => '1',
			'cat' => $categorie,
			'posts_per_page' => $number
		);
		$my_query = new WP_Query( $args );?>


        <?php
		$cat = get_category($categorie);
		echo '<div class="widgetCatTitle cc-bg'.$categorie.'">';
		echo '<span class="widgetCatTitle__inner cc-bg'.$categorie.'">'.$cat->cat_name.'カテゴリ</span>';
		echo '</div>';
		?>

        <ol class="widgetArchive widgetArchive-rank">
		<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
          <li class="widgetArchive__item widgetArchive__item-rank<?php if( !empty( $instance['layout'] )): ?> widgetArchive__item-normal<?php endif; ?>">

            <?php if( @$instance['aspect'] != 'none' ): ?>
            <div class="eyecatch <?php echo esc_attr( @$instance['aspect'] ); ?>">
              <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail()): ?>
                  <?php
				  $size = 'icatch768';
				  if(get_option('fit_bsEyecatch_widgetSize')){
					  $size = get_option('fit_bsEyecatch_widgetSize');
				  }
				  the_post_thumbnail($size); ?>
                <?php elseif ( get_fit_noimg()): ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_fit_noimg(); ?>" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
				<?php else: ?>
                  <img <?php echo fit_correct_src(); ?>="<?php echo get_template_directory_uri(); ?>/img/img_no_768.gif" alt="NO IMAGE" <?php echo fit_dummy_src(); ?>>
                <?php endif; ?>
              </a>
            </div>
            <?php endif; ?>
            <div class="widgetArchive__contents<?php if( @$instance['aspect'] == 'none' ): ?> widgetArchive__contents-none<?php endif; ?>">

              <?php if( !empty($instance['time']) || !empty($instance['update']) || !empty($instance['view']) ): ?>
              <ul class="dateList">
                <?php if( !empty($instance['time']) ): ?>
                  <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php if ( !empty($instance['update']) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty($instance['update']) && empty($instance['time'])) : ?>
                  <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')) ?></li>
                <?php endif; ?>
                <?php

				$views = get_post_meta(get_the_ID(), 'post_views' , true );
                if( !empty($instance['view']) ): ?>
                  <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
                <?php endif; ?>
              </ul>
			  <?php endif; ?>
              <h3 class="heading heading-tertiary">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h3>
							<?php if( !empty( $instance['word'] )): ?>
								<p class="phrase phrase-tertiary">
									<?php echo mb_substr(get_the_excerpt(), 0, $instance['word']) . '[…]'; ?>
								</p>
							<?php endif; ?>
            </div>

          </li>
		<?php endwhile; wp_reset_postdata(); ?>
        </ol>
		<?php
        echo $after_widget;
	}

	// 設定を保存するメソッド
	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

}
add_action( 'widgets_init', function(){register_widget('fit_ranking_categorie_class' );});
