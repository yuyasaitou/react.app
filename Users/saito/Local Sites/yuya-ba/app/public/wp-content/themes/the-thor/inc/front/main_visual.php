<?php
////////////////////////////////////////////////////////
//TOPページ用キービジュアル
////////////////////////////////////////////////////////
function fit_main_visual() {
?>
  <div class="<?php if(get_option('fit_homeMainimg_width') == 'value3'): ?>keyBig divider<?php elseif(get_option('fit_homeMainimg_width') == 'value2'): ?>container divider<?php else:?>wider<?php endif; ?>">
	  <?php if(get_option('fit_homeMainimg_mode') == '' || get_option('fit_homeMainimg_mode') == 'still'): ?>
      <?php
      if ( get_fit_stillimg()):
        $date = get_option('fit_homeMainimg_still');
        $mask = get_option('fit_homeMainimg_stillMask');
        $img_date = get_fit_stillimg();
        $img_id = fit_get_imageId($img_date);
        $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
        $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
        $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
      ?>
      <!--still-->
      <div class="still">
        <div class="still__box">
          <div class="still__bg mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            <?php if(is_mobile()):?>
              <img class="still__img" <?php echo fit_correct_src(); ?>="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>" <?php echo fit_dummy_src(); ?>>
            <?php else : ?>
              <img class="still__img" <?php echo fit_correct_src(); ?>="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>" <?php echo fit_dummy_src(); ?>>
            <?php endif; ?>
          </div>
          <div class="still__content">
            <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
            <?php if($date['subtitle']): ?>
            <p class="phrase phrase-slider">
              <?php echo $date['subtitle'] ?>
            </p>
            <?php endif; ?>
            <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
            <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <!--still-->
      <?php endif; ?>
    <?php endif; ?>


    <?php if(get_option('fit_homeMainimg_mode') == 'movie'): ?>
      <?php
      if ( get_fit_movieimg()):
	  	  $date = get_option('fit_homeMainimg_movie');
        $mask = get_option('fit_homeMainimg_movieMask');
        $YouTube = get_option('fit_homeMainimg_movieYouTube');
      ?>
      <!--still-movie-->
      <div class="still still-movie">
        <div class="still__box mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
          <div class="still__content">
            <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
            <?php if($date['subtitle']): ?>
            <p class="phrase phrase-slider">
              <?php echo $date['subtitle'] ?>
            </p>
            <?php endif; ?>
            <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
            <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div id="bgVideo" data-property="{videoURL: 'https://www.youtube.com/watch?v=<?php echo $YouTube ?>',mute: true,containment: '.still__box',showControls: false}"></div>
      <!--still-movie-->
      <?php endif; ?>
      <?php endif; ?>


      <?php if(get_option('fit_homeMainimg_mode') == 'slider'): ?>
      <!--slider-->
      <div class="swiper-container swiper-slider">
        <div class="swiper-wrapper">

          <?php
          if ( get_fit_slideimg1() && get_fit_slideimg1Sp()):
	  	      $date = get_option('fit_homeMainimg_slide1');
            $mask = get_option('fit_homeMainimg_slide1Mask');
            $img_date = get_fit_slideimg1();
            $img_dateSp = get_fit_slideimg1Sp();
            $img_id = fit_get_imageId($img_date);
            $img_idSp = fit_get_imageId($img_dateSp);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_idSp, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide1 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            
              <img class="swiper-bg ViewSp" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            
              <img class="swiper-bg ViewPc" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            
            <div class="swiper-content">
              <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
              <?php if($date['subtitle']): ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg2() && get_fit_slideimg2Sp()):
	  	      $date = get_option('fit_homeMainimg_slide2');
            $mask = get_option('fit_homeMainimg_slide2Mask');
            $img_date = get_fit_slideimg2();
            $img_dateSp = get_fit_slideimg2Sp();
            $img_id = fit_get_imageId($img_date);
            $img_idSp = fit_get_imageId($img_dateSp);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_idSp, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide2 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            
              <img class="swiper-bg ViewSp" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            
              <img class="swiper-bg ViewPc" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            
            <div class="swiper-content">
              <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
              <?php if($date['subtitle']): ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg3() &&get_fit_slideimg3Sp()):
	  	      $date = get_option('fit_homeMainimg_slide3');
            $mask = get_option('fit_homeMainimg_slide3Mask');
            $img_date = get_fit_slideimg3();
            $img_dateSp = get_fit_slideimg3Sp();
            $img_id = fit_get_imageId($img_date);
            $img_idSp = fit_get_imageId($img_dateSp);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_idSp, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide3 mask<?php if($mask && $mask != ' off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            
              <img class="swiper-bg ViewSp" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            
              <img class="swiper-bg ViewPc" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            
            <div class="swiper-content">
              <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
              <?php if($date['subtitle']): ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg4() &&get_fit_slideimg4Sp()):
	  	      $date = get_option('fit_homeMainimg_slide4');
            $mask = get_option('fit_homeMainimg_slide4Mask');
            $img_date = get_fit_slideimg4();
            $img_dateSp = get_fit_slideimg4Sp();
            $img_id = fit_get_imageId($img_date);
            $img_idSp = fit_get_imageId($img_dateSp);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_idSp, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide4 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            
              <img class="swiper-bg ViewSp" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            
              <img class="swiper-bg ViewPc" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            
            <div class="swiper-content">
              <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
              <?php if($date['subtitle']): ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php
          if ( get_fit_slideimg5() &&get_fit_slideimg5Sp()):
	  	      $date = get_option('fit_homeMainimg_slide5');
            $mask = get_option('fit_homeMainimg_slide5Mask');
            $img_date = get_fit_slideimg5();
            $img_dateSp = get_fit_slideimg5Sp();
            $img_id = fit_get_imageId($img_date);
            $img_idSp = fit_get_imageId($img_dateSp);
            $img_alt = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
            $imgSp = wp_get_attachment_image_src( $img_id, 'icatch768' );
            $imgPc = wp_get_attachment_image_src( $img_id, 'icatch1280' );
          ?>
          <div class="swiper-slide swiper-slide5 mask<?php if($mask && $mask != 'off'): ?> mask-<?php echo $mask ?><?php endif; ?>">
            
              <img class="swiper-bg ViewSp" src="<?php echo $imgSp[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgSp[1]; ?>" height="<?php echo $imgSp[2]; ?>">
            
              <img class="swiper-bg ViewPc" src="<?php echo $imgPc[0]; ?>" alt="<?php echo $img_alt; ?>" width="<?php echo $imgPc[1]; ?>" height="<?php echo $imgPc[2]; ?>">
            
            <div class="swiper-content">
              <?php if($date['title']): ?><h2 class="heading heading-slider"><?php echo $date['title'] ?></h2><?php endif; ?>
              <?php if($date['subtitle']): ?>
              <p class="phrase phrase-slider">
                <?php echo $date['subtitle'] ?>
              </p>
              <?php endif; ?>
              <?php if(!empty($date['btn']) && !empty($date['url'])): ?>
              <div class="btn"><a class="btn__link btn__link-primary" href="<?php echo $date['url'] ?>"><?php echo $date['btn'] ?></a></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>

        </div>

        <!-- if pagination -->
        <div class="swiper-pagination"></div>

        <!-- if navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

      </div>
      <!--/slider-->
      <?php endif; ?>
      <?php if(get_option('fit_homePickup_switch') == 'on'): ?>
      <!--pickupHead-->
      <div class="pickupHead">
        <div class="container<?php if(get_option('fit_homeMainimg_width') == 'value2' ): ?> pickupHead__inner<?php endif; ?>">
          <p class="pickupHead__text">
            <?php if(get_option('fit_homePickup_text')) : ?>
            <?php echo get_option('fit_homePickup_text') ?>
            <?php endif; ?>
          </p>
          <?php if(get_option('fit_homePickup_btn') && get_option('fit_homePickup_url')): ?>
            <div class="btn"><a class="btn__link btn__link-pickupHead" href="<?php echo get_option('fit_homePickup_url') ?>"><?php echo get_option('fit_homePickup_btn') ?></a></div>
          <?php endif; ?>
        </div>
      </div>
      <!--/pickupHead-->
      <!-- pickUpHeadBottom-->
        
        <div id="pickUpHeadBottom">
          <!--上部-->
          <div class="widgetHead">
            <p><i class="fas fa-book-open"></i></p>
            <p>認知症の基礎知識</p>
            <p><img src="/wp-content/uploads/2021/08/line01.png"></p>
          </div>
          <!--/上部-->
          <!--タブボックス-->
          <div class="tabContainer00 notranslate">
    
            <input id="tab001" type="radio" name="tabItem00" checked>
            <label class="tabItem00 tablabelL" for="tab001">認知症の種類を学ぶ</label>
            <input id="tab002" type="radio" name="tabItem00" >
            <label class="tabItem00 tablabelR" for="tab002">認知症について学ぶ</label>
            <!--tabContent001-->
            <div class="tabContent" id="tab001Content">
              <div class="tabFlex">
                <p>
                  <a href=<?php echo get_theme_mod('my_url1') ?> ><span>・</span><?php echo get_theme_mod('my_setting1') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url2') ?> ><span>・</span><?php echo get_theme_mod('my_setting2') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url3') ?> ><span>・</span><?php echo get_theme_mod('my_setting3') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url4') ?> ><span>・</span><?php echo get_theme_mod('my_setting4') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url5') ?> ><span>・</span><?php echo get_theme_mod('my_setting5') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url6') ?> ><span>・</span><?php echo get_theme_mod('my_setting6') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url7') ?> ><span>・</span><?php echo get_theme_mod('my_setting7') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url8') ?> ><span>・</span><?php echo get_theme_mod('my_setting8') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_url9') ?> ><span>・</span><?php echo get_theme_mod('my_setting9') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                        
              </div>
            </div>
            <!--/tabContent001-->
            <!--tabContent002-->
            <div class="tabContent" id="tab002Content">
            <div class="tabFlex">
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR1') ?> ><span>・</span><?php echo get_theme_mod('my_settingR1') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR2') ?> ><span>・</span><?php echo get_theme_mod('my_settingR2') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR3') ?> ><span>・</span><?php echo get_theme_mod('my_settingR3') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR4') ?> ><span>・</span><?php echo get_theme_mod('my_settingR4') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR5') ?> ><span>・</span><?php echo get_theme_mod('my_settingR5') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR6') ?> ><span>・</span><?php echo get_theme_mod('my_settingR6') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR7') ?> ><span>・</span><?php echo get_theme_mod('my_settingR7') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR8') ?> ><span>・</span><?php echo get_theme_mod('my_settingR8') ?></a><i class="fas fa-chevron-right"></i>
                </p>
                <p>
                  <a href=<?php echo get_theme_mod('my_urlR9') ?> ><span>・</span><?php echo get_theme_mod('my_settingR9') ?></a><i class="fas fa-chevron-right"></i>
                </p>       
              </div>
            </div>
            <!--tabContent002-->
          </div>
          <!--/タブボックス-->
        </div>
        <!-- /pickUpHeadBottom-->
      <?php endif; ?>
    </div>

<?php

}
