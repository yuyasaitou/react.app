<?php
$category_top = get_post_meta( get_the_ID(), 'category_top', 'true');
$tag_top = get_post_meta( get_the_ID(), 'tag_top', 'true');
?>

<?php if( $category_top != true && $tag_top != true ) :?>


<article class="archive__item<?php if (get_option('fit_archiveList_frame') && get_option('fit_archiveList_frame') != 'off' ):?> <?php echo get_option('fit_archiveList_frame')?><?php endif; ?>">

            <?php if ( get_option('fit_archiveList_aspect') != 'none' ): ?>
            <div class="eyecatch<?php if (get_option('fit_archiveList_aspect') && get_option('fit_archiveList_aspect') != 'off' ): ?> <?php echo get_option('fit_archiveList_aspect'); ?><?php endif; ?>">

              <?php if(is_sticky() && get_option('fit_archiveList_ribbonPickup') == 'on'):?>
                <div class="the__ribbon"><i class="<?php if( get_option('fit_archiveList_pickupIcon') ):?><?php echo get_option('fit_archiveList_pickupIcon'); ?><?php else: ?>icon-star-full<?php endif; ?>"></i></div>
              <?php elseif(!is_sticky() && get_option('fit_archiveList_ribbonNew') == 'on'):?>
			    <?php fit_new_mark();?>
			  <?php endif;?>
			  <?php
			  $cat = get_the_category();
        if(!get_option('fit_archiveList_category')){
          if(!is_category() && !empty($cat[0])){
  				  echo '<span class="eyecatch__cat cc-bg'.$cat[0]->term_id.'">';
  				  echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
  				  echo '</span>';
  			  }
        }
			  ?>
              <a class="eyecatch__link<?php if (get_option('fit_bsEyecatch_hover') && get_option('fit_bsEyecatch_hover') != 'off' ) : ?> eyecatch__link-<?php echo get_option('fit_bsEyecatch_hover');	?><?php endif; ?>" href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail()): ?>
                  <?php
				  $size = 'icatch768';
				  if(get_option('fit_bsEyecatch_archiveSize')){
					  $size = get_option('fit_bsEyecatch_archiveSize');
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

            <div class="archive__contents<?php if( get_option('fit_archiveList_aspect') == 'none' ): ?> archive__contents-noImg<?php endif; ?>">

			  <?php if( get_option('fit_archiveList_aspect') == 'none' ): ?>
			    <?php
			    $cat = get_the_category();
				if(!is_category() && !empty($cat[0])){
					echo '<div class="the__category cc-bg'.$cat[0]->term_id.'">';
					echo '<a href="' . get_category_link( $cat[0]->term_id ) . '">' . $cat[0]->cat_name . '</a>';
					echo '</div>';
				}
			    ?>
                <?php if(is_sticky() && get_option('fit_archiveList_ribbonPickup') == 'on'):?>
                  <div class="the__ribbon the__ribbon-right"><i class="<?php if( get_option('fit_archiveList_pickupIcon') ):?><?php echo get_option('fit_archiveList_pickupIcon'); ?><?php else: ?>icon-star-full<?php endif; ?>"></i></div>
                <?php elseif(!is_sticky() && get_option('fit_archiveList_ribbonNew') == 'on'):?>
			      <?php fit_new_mark();?>
			    <?php endif;?>
              <?php endif; ?>

              <?php if( !empty(get_option('fit_archiveList_time')) || !empty(get_option('fit_archiveList_update')) || !empty(get_option('fit_archiveList_view')) ): ?>
              <ul class="dateList">
                <?php if( !empty(get_option('fit_archiveList_time')) ): ?>
                  <li class="dateList__item icon-clock"><?php the_time(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php if ( !empty(get_option('fit_archiveList_update')) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) || !empty(get_option('fit_archiveList_update')) && empty(get_option('fit_archiveList_time'))) : ?>
                  <li class="dateList__item icon-update"><?php the_modified_date(get_option('date_format')); ?></li>
                <?php endif; ?>
                <?php
                $views = get_post_meta(get_the_ID(), 'post_views' , true );
                if( !empty(get_option('fit_archiveList_view')) && get_query_var('sort') == 'popular' ): ?>
                  <li class="dateList__item icon-eye"><?php echo $views; ?><?php if(get_option('fit_bsRank_unit')) : ?><?php echo get_option('fit_bsRank_unit'); ?><?php else: ?>view<?php endif; ?></li>
                <?php endif; ?>
                <?php if( !empty(get_option('fit_archiveList_comment')) ): ?>
                  <li class="dateList__item icon-bubble2" title="コメント数"><?php comments_number( '0件', '1件', '%件' ); ?></li>
                <?php endif; ?>
              </ul>
              <?php endif; ?>

              <h2 class="heading heading-secondary">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </h2>
              <p class="phrase phrase-secondary">
              <?php echo get_the_excerpt(); ?>
              </p>

              <?php
              $text = '続きを読む';
			  if ( get_option('fit_archiveList_btnText')){
				  $text = get_option('fit_archiveList_btnText');
			  }
			  if ( get_option('fit_archiveList_btn') == 'on' ): ?>
              <div class="btn btn-right">
                <a class="btn__link btn__link-normal" href="<?php the_permalink(); ?>"><?php echo $text; ?></a>
              </div>
              <?php endif; ?>
            </div>
          </article>


<?php endif; ?>
