( function( $ ) {
	// 公開ボタンを押すとリロード【有効無効】
    wp.customize( 'fit_pwaFunction_switch', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );


  // 公開ボタンを押すとリロード【バージョン】
    wp.customize( 'fit_pwaFunction_version', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
              $('iframe')[0].contentDocument.location.reload(true);
            });
        });
    } );




	// 公開ボタンを押すとリロード【ホーム画面のアイコン下に表示される名前】
    wp.customize( 'fit_pwaFunction_text', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード【アイコン72】
    wp.customize( 'fit_pwaIcon_img72', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード【アイコン192】
    wp.customize( 'fit_pwaIcon_img192', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

	// 公開ボタンを押すとリロード【アイコン512】
    wp.customize( 'fit_pwaIcon_img512', function( value ) {
        value.bind( function( newval ) {
            $('input#save').click(function(){
				$('iframe')[0].contentDocument.location.reload(true);
			});
        } );
    } );

} )( jQuery );
