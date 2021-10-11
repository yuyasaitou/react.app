<?php
////////////////////////////////////////////////////////
//テキストエディタにクイックタグボタン追加
////////////////////////////////////////////////////////
if (get_option( 'fit_bsEditorBtn_switch' ) == 'on1' || get_option( 'fit_bsEditorBtn_switch' ) == 'on2' ) {
	function add_quicktags_to_text_editor() {


	//ユーザーズスタイル(ラベル)
	$label1_title = '角丸レッドラベル';
	$label2_title = 'シンプルボーダーラベル';
	$label3_title = 'ライム左ラウンドラベル';
	$label4_title = 'ブルーボーダーラウンドラベル';
	$label5_title = '丸アイコンオレンジラベル';
	$label6_title = 'ピンクアイコンラベル';
	$label7_title = '四角アイコンラベル';
	$label8_title = '破線ボーダーアイコンラベル';
	$label9_title = 'ビッグ右ラウンドブルーラベル';
	$label10_title = 'ターコイズグラデ右寄せラベル';
	if(get_option('fit_partsUser_label1title')){$label1_title = get_option('fit_partsUser_label1title');}
	if(get_option('fit_partsUser_label2title')){$label2_title = get_option('fit_partsUser_label2title');}
	if(get_option('fit_partsUser_label3title')){$label3_title = get_option('fit_partsUser_label3title');}
	if(get_option('fit_partsUser_label4title')){$label4_title = get_option('fit_partsUser_label4title');}
	if(get_option('fit_partsUser_label5title')){$label5_title = get_option('fit_partsUser_label5title');}
	if(get_option('fit_partsUser_label6title')){$label6_title = get_option('fit_partsUser_label6title');}
	if(get_option('fit_partsUser_label7title')){$label7_title = get_option('fit_partsUser_label7title');}
	if(get_option('fit_partsUser_label8title')){$label8_title = get_option('fit_partsUser_label8title');}
	if(get_option('fit_partsUser_label9title')){$label9_title = get_option('fit_partsUser_label9title');}
	if(get_option('fit_partsUser_label10title')){$label10_title = get_option('fit_partsUser_label10title');}

	$label1_class = 'ep-label bgc-DPred brc-white ftc-white es-radius es-RpaddingSS es-LpaddingSS';
	$label2_class = 'ep-label es-borderSolidS bgc-white brc-VLgray es-RpaddingSS es-LpaddingSS';
	$label3_class = 'ep-label es-LroundL bgc-Blime ftc-white es-RpaddingSS es-LpaddingSS';
	$label4_class = 'ep-label es-round es-borderDashedS brc-Lblue bgc-VPblue es-RpaddingSS es-LpaddingSS';
	$label5_class = 'ep-label icon-pencil2 es-LiconCircle es-LroundL bgc-VPorange ftc-Borange es-RpaddingSS';
	$label6_class = 'ep-label es-LiconBorder icon-notification es-RpaddingSS bgc-VPpink ftc-Bpink';
	$label7_class = 'ep-label es-LiconBox icon-location es-borderSolidS brc-VLgray ftc-Dgray';
	$label8_class = 'ep-label es-BborderDashedM bgc-white es-Licon icon-pushpin es-RpaddingSS es-bold';
	$label9_class = 'ep-label es-LroundR es-TmarginS es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-Fbig es-bold es-LborderSolidM brc-DLsky';
	$label10_class = 'ep-label es-grada2 bgc-DLturquoise ftc-white es-size25 es-right es-RpaddingS es-LborderSolidM brc-DGturquoise';
	if(get_option('fit_partsUser_label1class')){$label1_class = get_option('fit_partsUser_label1class');}
	if(get_option('fit_partsUser_label2class')){$label2_class = get_option('fit_partsUser_label2class');}
	if(get_option('fit_partsUser_label3class')){$label3_class = get_option('fit_partsUser_label3class');}
	if(get_option('fit_partsUser_label4class')){$label4_class = get_option('fit_partsUser_label4class');}
	if(get_option('fit_partsUser_label5class')){$label5_class = get_option('fit_partsUser_label5class');}
	if(get_option('fit_partsUser_label6class')){$label6_class = get_option('fit_partsUser_label6class');}
	if(get_option('fit_partsUser_label7class')){$label7_class = get_option('fit_partsUser_label7class');}
	if(get_option('fit_partsUser_label8class')){$label8_class = get_option('fit_partsUser_label8class');}
	if(get_option('fit_partsUser_label9class')){$label9_class = get_option('fit_partsUser_label9class');}
	if(get_option('fit_partsUser_label10class')){$label10_class = get_option('fit_partsUser_label10class');}


	//ユーザーズスタイル(ボタン)
	$btn1_title = 'オレンジ100％ボタン';
	$btn2_title = 'グリーンシャドウ100％ボタン';
	$btn3_title = 'ブルーボーダーボタン';
	$btn4_title = 'ブルーグラデボタン';
	$btn5_title = 'ピンクアイコンボタン';
	$btn6_title = 'ピンクグラデアイコンボタン';
	$btn7_title = 'グリーン立体アイコンボタン';
	$btn8_title = 'グレーラウンドアイコンボタン';
	$btn9_title = 'サークルアイコンボタン';
	$btn10_title = 'ボックスアイコンボタン';
	if(get_option('fit_partsUser_btn1title')){$btn1_title = get_option('fit_partsUser_btn1title');}
	if(get_option('fit_partsUser_btn2title')){$btn2_title = get_option('fit_partsUser_btn2title');}
	if(get_option('fit_partsUser_btn3title')){$btn3_title = get_option('fit_partsUser_btn3title');}
	if(get_option('fit_partsUser_btn4title')){$btn4_title = get_option('fit_partsUser_btn4title');}
	if(get_option('fit_partsUser_btn5title')){$btn5_title = get_option('fit_partsUser_btn5title');}
	if(get_option('fit_partsUser_btn6title')){$btn6_title = get_option('fit_partsUser_btn6title');}
	if(get_option('fit_partsUser_btn7title')){$btn7_title = get_option('fit_partsUser_btn7title');}
	if(get_option('fit_partsUser_btn8title')){$btn8_title = get_option('fit_partsUser_btn8title');}
	if(get_option('fit_partsUser_btn9title')){$btn9_title = get_option('fit_partsUser_btn9title');}
	if(get_option('fit_partsUser_btn10title')){$btn10_title = get_option('fit_partsUser_btn10title');}

	$btn1_class = 'ep-btn bgc-Vorange es-size100 ftc-white es-TpaddingS es-BpaddingS es-BTarrow es-bold';
	$btn2_class = 'ep-btn bgc-Bgreen ftc-white es-size100 es-TpaddingS es-BpaddingS es-shadowIn es-BTarrow es-bold es-radius';
	$btn3_class = 'ep-btn es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-Fbig es-bold es-borderSolidS bgc-white brc-DLblue ftc-DLblue es-BTarrow';
	$btn4_class = 'ep-btn es-BTrich bgc-DPsky ftc-white es-BTarrow es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM es-grada1';
	$btn5_class = 'ep-btn icon-circle-right es-BTicon bgc-VPmagenta ftc-Lmagenta es-bold es-borderSolidS brc-Lmagenta es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM';
	$btn6_class = 'ep-btn es-grada2 ftc-white es-radius icon-home es-BTicon es-TpaddingS es-BpaddingS es-RpaddingM es-LpaddingM bgc-Bmagenta';
	$btn7_class = 'ep-btn icon-amazon es-BTiconBorder es-BT3d es-radius bgc-DLlime ftc-white es-TpaddingS es-BpaddingS es-shadow';
	$btn8_class = 'ep-btn es-grada2 es-TpaddingS es-BpaddingS es-BTiconBorder icon-folder-open es-Fsmall es-round es-RpaddingM es-LpaddingM ftc-gray';
	$btn9_class = 'ep-btn icon-pencil2 es-BTiconCircle es-round es-BT3d es-RmarginM bgc-VPorange ftc-DLorange es-bold';
	$btn10_class = 'ep-btn es-BTiconBox icon-quill bgc-DGorange ftc-white es-radius';
	if(get_option('fit_partsUser_btn1class')){$btn1_class = get_option('fit_partsUser_btn1class');}
	if(get_option('fit_partsUser_btn2class')){$btn2_class = get_option('fit_partsUser_btn2class');}
	if(get_option('fit_partsUser_btn3class')){$btn3_class = get_option('fit_partsUser_btn3class');}
	if(get_option('fit_partsUser_btn4class')){$btn4_class = get_option('fit_partsUser_btn4class');}
	if(get_option('fit_partsUser_btn5class')){$btn5_class = get_option('fit_partsUser_btn5class');}
	if(get_option('fit_partsUser_btn6class')){$btn6_class = get_option('fit_partsUser_btn6class');}
	if(get_option('fit_partsUser_btn7class')){$btn7_class = get_option('fit_partsUser_btn7class');}
	if(get_option('fit_partsUser_btn8class')){$btn8_class = get_option('fit_partsUser_btn8class');}
	if(get_option('fit_partsUser_btn9class')){$btn9_class = get_option('fit_partsUser_btn9class');}
	if(get_option('fit_partsUser_btn10class')){$btn10_class = get_option('fit_partsUser_btn10class');}



	//ユーザーズスタイル(ボックス)
	$box1_title = 'サブタイトルボーダーボックス';
	$box2_title = 'BIG括弧ボックス';
	$box3_title = '方眼ペーパーボックス';
	$box4_title = 'はてなボックス';
	$box5_title = 'ビックリボックス';
	$box6_title = 'Qボックス';
	$box7_title = 'Aボックス';
	$box8_title = 'シンプルアイコンボックス';
	$box9_title = '背景アイコンボックス';
	$box10_title = '帯アイコンボックス';
	if(get_option('fit_partsUser_box1title')){$box1_title = get_option('fit_partsUser_box1title');}
	if(get_option('fit_partsUser_box2title')){$box2_title = get_option('fit_partsUser_box2title');}
	if(get_option('fit_partsUser_box3title')){$box3_title = get_option('fit_partsUser_box3title');}
	if(get_option('fit_partsUser_box4title')){$box4_title = get_option('fit_partsUser_box4title');}
	if(get_option('fit_partsUser_box5title')){$box5_title = get_option('fit_partsUser_box5title');}
	if(get_option('fit_partsUser_box6title')){$box6_title = get_option('fit_partsUser_box6title');}
	if(get_option('fit_partsUser_box7title')){$box7_title = get_option('fit_partsUser_box7title');}
	if(get_option('fit_partsUser_box8title')){$box8_title = get_option('fit_partsUser_box8title');}
	if(get_option('fit_partsUser_box9title')){$box9_title = get_option('fit_partsUser_box9title');}
	if(get_option('fit_partsUser_box10title')){$box10_title = get_option('fit_partsUser_box10title');}

	$box1_class = 'ep-box es-BsubTradi bgc-white es-borderSolidM es-radius brc-DPred';
	$box2_class = 'ep-box es-Bbrackets bgc-white es-center es-bold es-FbigL';
	$box3_class = 'ep-box es-BpaperRight es-grid bgc-VPsky';
	$box4_class = 'ep-box es-BmarkHatena es-borderSolidS bgc-white brc-DPblue es-radius';
	$box5_class = 'ep-box es-BmarkExcl es-borderSolidS brc-DPred bgc-white es-radius';
	$box6_class = 'ep-box es-BmarkQ bgc-white';
	$box7_class = 'ep-box es-BmarkA bgc-white';
	$box8_class = 'ep-box es-Bicon icon-tag bgc-VPorange';
	$box9_class = 'ep-box es-BiconBg icon-pushpin bgc-VPlime';
	$box10_class = 'ep-box icon-heart es-BiconObi es-borderSolidS';
	if(get_option('fit_partsUser_box1class')){$box1_class = get_option('fit_partsUser_box1class');}
	if(get_option('fit_partsUser_box2class')){$box2_class = get_option('fit_partsUser_box2class');}
	if(get_option('fit_partsUser_box3class')){$box3_class = get_option('fit_partsUser_box3class');}
	if(get_option('fit_partsUser_box4class')){$box4_class = get_option('fit_partsUser_box4class');}
	if(get_option('fit_partsUser_box5class')){$box5_class = get_option('fit_partsUser_box5class');}
	if(get_option('fit_partsUser_box6class')){$box6_class = get_option('fit_partsUser_box6class');}
	if(get_option('fit_partsUser_box7class')){$box7_class = get_option('fit_partsUser_box7class');}
	if(get_option('fit_partsUser_box8class')){$box8_class = get_option('fit_partsUser_box8class');}
	if(get_option('fit_partsUser_box9class')){$box9_class = get_option('fit_partsUser_box9class');}
	if(get_option('fit_partsUser_box10class')){$box10_class = get_option('fit_partsUser_box10class');}


	//ユーザーズスタイル(ボックス内ボックス)
	$inbox1_title = 'ターコイズグラデタイトル';
	$inbox2_title = 'アイコンボーダータイトル';
	$inbox3_title = 'ブルーシャドウタイトル';
	$inbox4_title = 'サブタイトルボーダーボックス';
	$inbox5_title = 'BIG括弧ボックス';
	$inbox6_title = '方眼ペーパーボックス';
	$inbox7_title = 'はてなボックス';
	$inbox8_title = 'ビックリボックス';
	$inbox9_title = 'Qボックス';
	$inbox10_title = 'Aボックス';
	if(get_option('fit_partsUser_inbox1title')){$inbox1_title = get_option('fit_partsUser_inbox1title');}
	if(get_option('fit_partsUser_inbox2title')){$inbox2_title = get_option('fit_partsUser_inbox2title');}
	if(get_option('fit_partsUser_inbox3title')){$inbox3_title = get_option('fit_partsUser_inbox3title');}
	if(get_option('fit_partsUser_inbox4title')){$inbox4_title = get_option('fit_partsUser_inbox4title');}
	if(get_option('fit_partsUser_inbox5title')){$inbox5_title = get_option('fit_partsUser_inbox5title');}
	if(get_option('fit_partsUser_inbox6title')){$inbox6_title = get_option('fit_partsUser_inbox6title');}
	if(get_option('fit_partsUser_inbox7title')){$inbox7_title = get_option('fit_partsUser_inbox7title');}
	if(get_option('fit_partsUser_inbox8title')){$inbox8_title = get_option('fit_partsUser_inbox8title');}
	if(get_option('fit_partsUser_inbox9title')){$inbox9_title = get_option('fit_partsUser_inbox9title');}
	if(get_option('fit_partsUser_inbox10title')){$inbox10_title = get_option('fit_partsUser_inbox10title');}

	$inbox1_class = 'ep-inbox es-Bwhole es-grada1 es-bold bgc-DLturquoise ftc-white es-center es-FbigL';
	$inbox2_class = 'ep-inbox es-Bwhole bgc-white es-borderSolidS brc-VLgray es-bold es-Bicon icon-pencil2 es-FbigL';
	$inbox3_class = 'ep-inbox es-Bwhole bgc-DPsky ftc-white es-FbigL es-center es-bold es-TshadowD es-shadow es-BborderSolidM brc-white';
	$inbox4_class = 'ep-inbox es-BsubTradi bgc-white es-borderSolidM es-radius brc-DPred';
	$inbox5_class = 'ep-inbox es-Bbrackets bgc-white es-center es-bold es-FbigL';
	$inbox6_class = 'ep-inbox es-BpaperRight es-grid bgc-VPsky';
	$inbox7_class = 'ep-inbox es-BmarkHatena es-borderSolidS bgc-white brc-DPblue es-radius';
	$inbox8_class = 'ep-inbox es-BmarkExcl es-borderSolidS brc-DPred bgc-white es-radius';
	$inbox9_class = 'ep-inbox es-BmarkQ bgc-white';
	$inbox10_class = 'ep-inbox es-BmarkA bgc-white';
	if(get_option('fit_partsUser_inbox1class')){$inbox1_class = get_option('fit_partsUser_inbox1class');}
	if(get_option('fit_partsUser_inbox2class')){$inbox2_class = get_option('fit_partsUser_inbox2class');}
	if(get_option('fit_partsUser_inbox3class')){$inbox3_class = get_option('fit_partsUser_inbox3class');}
	if(get_option('fit_partsUser_inbox4class')){$inbox4_class = get_option('fit_partsUser_inbox4class');}
	if(get_option('fit_partsUser_inbox5class')){$inbox5_class = get_option('fit_partsUser_inbox5class');}
	if(get_option('fit_partsUser_inbox6class')){$inbox6_class = get_option('fit_partsUser_inbox6class');}
	if(get_option('fit_partsUser_inbox7class')){$inbox7_class = get_option('fit_partsUser_inbox7class');}
	if(get_option('fit_partsUser_inbox8class')){$inbox8_class = get_option('fit_partsUser_inbox8class');}
	if(get_option('fit_partsUser_inbox9class')){$inbox9_class = get_option('fit_partsUser_inbox9class');}
	if(get_option('fit_partsUser_inbox10class')){$inbox10_class = get_option('fit_partsUser_inbox10class');}


		//スクリプトキューにquicktagsが保存されているかチェック
		if (wp_script_is('quicktags')){?>
		<script>
			QTags.addButton('qt-p','p','<p>','</p>');
			QTags.addButton('qt-h2','h2','<h2>','</h2>');
			QTags.addButton('qt-h3','h3','<h3>','</h3>');
			QTags.addButton('qt-h4','h4','<h4>','</h4>');
			QTags.addButton('qt-h5','h5','<h5>','</h5>');
			QTags.addButton('qt-pre','pre','<pre>','</pre>');
			QTags.addButton('qt-span','span','<span>','</span>');
			QTags.addButton('qt-hr','hr','<hr>');
			QTags.addButton('qt-br','br','<br>');


			<?php if (get_option( 'fit_bsEditorBtn_switch' ) == 'on2' ) :?>
			QTags.addButton('qt-label1','<?php echo $label1_title ?>','<div class="<?php echo $label1_class ?>">','</div>');
			QTags.addButton('qt-label2','<?php echo $label2_title ?>','<div class="<?php echo $label2_class ?>">','</div>');
			QTags.addButton('qt-label3','<?php echo $label3_title ?>','<div class="<?php echo $label3_class ?>">','</div>');
			QTags.addButton('qt-label4','<?php echo $label4_title ?>','<div class="<?php echo $label4_class ?>">','</div>');
			QTags.addButton('qt-label5','<?php echo $label5_title ?>','<div class="<?php echo $label5_class ?>">','</div>');
			QTags.addButton('qt-label6','<?php echo $label6_title ?>','<div class="<?php echo $label6_class ?>">','</div>');
			QTags.addButton('qt-label7','<?php echo $label7_title ?>','<div class="<?php echo $label7_class ?>">','</div>');
			QTags.addButton('qt-label8','<?php echo $label8_title ?>','<div class="<?php echo $label8_class ?>">','</div>');
			QTags.addButton('qt-label9','<?php echo $label9_title ?>','<div class="<?php echo $label9_class ?>">','</div>');
			QTags.addButton('qt-label10','<?php echo $label10_title ?>','<div class="<?php echo $label10_class ?>">','</div>');

			QTags.addButton('qt-btn1','<?php echo $btn1_title ?>','<div class="<?php echo $btn1_class ?>">','</div>');
			QTags.addButton('qt-btn2','<?php echo $btn2_title ?>','<div class="<?php echo $btn2_class ?>">','</div>');
			QTags.addButton('qt-btn3','<?php echo $btn3_title ?>','<div class="<?php echo $btn3_class ?>">','</div>');
			QTags.addButton('qt-btn4','<?php echo $btn4_title ?>','<div class="<?php echo $btn4_class ?>">','</div>');
			QTags.addButton('qt-btn5','<?php echo $btn5_title ?>','<div class="<?php echo $btn5_class ?>">','</div>');
			QTags.addButton('qt-btn6','<?php echo $btn6_title ?>','<div class="<?php echo $btn6_class ?>">','</div>');
			QTags.addButton('qt-btn7','<?php echo $btn7_title ?>','<div class="<?php echo $btn7_class ?>">','</div>');
			QTags.addButton('qt-btn8','<?php echo $btn8_title ?>','<div class="<?php echo $btn8_class ?>">','</div>');
			QTags.addButton('qt-btn9','<?php echo $btn9_title ?>','<div class="<?php echo $btn9_class ?>">','</div>');
			QTags.addButton('qt-btn10','<?php echo $btn10_title ?>','<div class="<?php echo $btn10_class ?>">','</div>');

			QTags.addButton('qt-box1','<?php echo $box1_title ?>','<div class="<?php echo $box1_class ?>">','</div>');
			QTags.addButton('qt-box2','<?php echo $box2_title ?>','<div class="<?php echo $box2_class ?>">','</div>');
			QTags.addButton('qt-box3','<?php echo $box3_title ?>','<div class="<?php echo $box3_class ?>">','</div>');
			QTags.addButton('qt-box4','<?php echo $box4_title ?>','<div class="<?php echo $box4_class ?>">','</div>');
			QTags.addButton('qt-box5','<?php echo $box5_title ?>','<div class="<?php echo $box5_class ?>">','</div>');
			QTags.addButton('qt-box6','<?php echo $box6_title ?>','<div class="<?php echo $box6_class ?>">','</div>');
			QTags.addButton('qt-box7','<?php echo $box7_title ?>','<div class="<?php echo $box7_class ?>">','</div>');
			QTags.addButton('qt-box8','<?php echo $box8_title ?>','<div class="<?php echo $box8_class ?>">','</div>');
			QTags.addButton('qt-box9','<?php echo $box9_title ?>','<div class="<?php echo $box9_class ?>">','</div>');
			QTags.addButton('qt-box10','<?php echo $box10_title ?>','<div class="<?php echo $box10_class ?>">','</div>');

			QTags.addButton('qt-inbox1','<?php echo $inbox1_title ?>','<div class="<?php echo $inbox1_class ?>">','</div>');
			QTags.addButton('qt-inbox2','<?php echo $inbox2_title ?>','<div class="<?php echo $inbox2_class ?>">','</div>');
			QTags.addButton('qt-inbox3','<?php echo $inbox3_title ?>','<div class="<?php echo $inbox3_class ?>">','</div>');
			QTags.addButton('qt-inbox4','<?php echo $inbox4_title ?>','<div class="<?php echo $inbox4_class ?>">','</div>');
			QTags.addButton('qt-inbox5','<?php echo $inbox5_title ?>','<div class="<?php echo $inbox5_class ?>">','</div>');
			QTags.addButton('qt-inbox6','<?php echo $inbox6_title ?>','<div class="<?php echo $inbox6_class ?>">','</div>');
			QTags.addButton('qt-inbox7','<?php echo $inbox7_title ?>','<div class="<?php echo $inbox7_class ?>">','</div>');
			QTags.addButton('qt-inbox8','<?php echo $inbox8_title ?>','<div class="<?php echo $inbox8_class ?>">','</div>');
			QTags.addButton('qt-inbox9','<?php echo $inbox9_title ?>','<div class="<?php echo $inbox9_class ?>">','</div>');
			QTags.addButton('qt-inbox10','<?php echo $inbox10_title ?>','<div class="<?php echo $inbox10_class ?>">','</div>');

			QTags.addButton('qt-outline','目次','[outline]');
			QTags.addButton('qt-adcode','記事内広告','[adcode]');
			QTags.addButton('qt-sitecard','カテゴリ指定記事一覧(新着順)','[archivelist cat=1 num=5]');
			QTags.addButton('qt-sitecard','カテゴリ指定記事一覧(ランダム順)','[randlist cat=1 num=5]');
			QTags.addButton('qt-sitecard','カテゴリ指定記事一覧(ランク順)','[ranklist cat=1 num=5]');
			QTags.addButton('qt-blogcard','ブログカード','[blogcard url=]');
			QTags.addButton('qt-sitecard','サイトカード','[sitecard subtitle=関連記事 url=]');
			QTags.addButton('qt-year','年指定','[date-year number=0]');
			QTags.addButton('qt-month','月指定','[date-month number=0]');
			QTags.addButton('qt-day','日指定','[date-day number=0]');
			QTags.addButton('qt-day','スターリスト','[star-list number=3.5]');


			<?php endif; ?>



		</script>
		<?php
    }
	}
	add_action( 'admin_print_footer_scripts', 'add_quicktags_to_text_editor' );
}
