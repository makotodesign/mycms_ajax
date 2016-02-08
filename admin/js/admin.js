$(function(){
    //ajax作戦

    //削除ロジック
    var delbtn=$('.allpost').find('.delete'); 
    delbtn.click(function(event){      
        var delid=$(event.target).attr('value'); 
        var res=confirm('ID番号'+delid+'番の記事を削除します。よろしいですか？');//確認窓
        if(res){
            $.ajax({
                type:'POST',
                url:'./delete.php',
                data:{
                    delid:delid
                }        
            });
            var delid='#tr'+delid;
            $(delid).fadeOut(500);
        }
        if(!res){
            return false;
        }
    }); 
    
    //投稿ロジック
    $("input[type='submit']").click(function(){
       
        var title = $("input[name='title']").val();
        var content =$("textarea[name='content']").val();
        $.ajax({
            type:'POST',
            url:'./post.php',
            data:{
                title:title,
                content:content    
            },    
            success:function(){
               
                $('#prev_table').load('prev_table.php'); 
            
            }    
        
        });
        $('.container').after('<p id="msg">投稿完了しました</p>');
        $('#msg').hide().fadeIn(500,function(){
            $(this).delay(1000).fadeOut(300);
        });
        return false;
    });
    



});