$(function(){
    //上へ戻るボタンを作って隠しておく
    $('.container').before('<p id="gotop">gotop</p>');

    //ナビゲーションスクーロル固定のための必要な値を取得しておく
    var header_height=$('#global_header').innerHeight();
    var nav_height=$('#nav').innerHeight();
    //スクロールきっかけの世界
    $(window).scroll(function(){
        //メインナビゲーションがスクロールで隠れそうになったら固定作戦
        //どれだけスクロールしたかを取得
        var s_top=$('body,html').scrollTop();

        if(s_top>header_height+nav_height){
            $('#nav').css({top:s_top-header_height-nav_height});
        }else{
            $('#nav').css({top:0});
        }
        //ある程度スクロールしたら「上へ戻る」ボタン出現作戦
        if(s_top>800){
            $('#gotop').fadeIn(300);

        }else{
            $('#gotop').fadeOut(300);
        }
    });//End scrollきっかけの世界
    //gotopをクリックした世界
    $('#gotop').click(function(){
        $('body,html').animate({scrollTop:'0px'},1000,'swing');

    });//END gotop click

    //ajax作戦


    var newslist=$('#newslist').find('li'); 
    newslist.click(function(event){
        $('.container').after('<div id="modal_back" class="wrapall"><div id="modal_box" class="mbox"><p class="align-right"><span id="close">&times;</span></p><div id="mcontent"></div></div></div>');    
        var id=$(event.target).attr('id');
        Ajax_handle('./detail.php',id,'#mcontent');
        
        $('#modal_back').fadeIn(500);

        $('#close').click(function(){
            $('#modal_back').fadeOut(500);
        });      
    }); 

    function Ajax_handle(file,id_no,showbox){
        $.ajax({
            type:'POST',
            url:file,
            data:{
                prev_id:id_no
            },
            success:function(data){
                $(showbox).html(data);
            }

        });


    } //Ajax_handle End   







});//End Jquery