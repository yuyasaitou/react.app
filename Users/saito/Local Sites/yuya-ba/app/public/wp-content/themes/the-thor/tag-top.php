<?php
$tag = get_the_tags();
$tag = $tag[0];
$tag_id = $tag->term_id;
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 1,
  'tag_id' => $tag_id,
  'meta_key'   => 'tag_top',
  'meta_value' => 'true',
  'post_status' => array('publish'),
  'order'=> 'asc',
  'orderby'=> 'post_date'
);
$query = new WP_Query($args);

?>

<?php 
if($query->have_posts()):
      while($query->have_posts()):$query->the_post(); ?>
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

          <section class="content<?php fit_content_class(); ?>">
			<?php the_content(); ?>
          </section>

<?php 
    endwhile;
else:
    ;
endif;
wp_reset_postdata();

?>

