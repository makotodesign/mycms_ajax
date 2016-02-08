
$(function(){
  
    //ajax作戦

    //削除ロジック
    var delbtn=$('.delete'); 
    delbtn.on('click',function(event){      
        var delid=$(event.target).attr('value'); 

            $.ajax({
                type:'POST',
                url:'./delete.php',
                data:{
                    delid:delid
                }        
            });
            var delid='#tr'+delid;
            $(delid).fadeOut(500,function(){
                $(this).remove();
            })
 
       
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
            success:function(data){
               
                $('#prev_table').find('tbody').prepend(data); 
            
            }    
        
        });
        $('.container').after('<p id="msg">投稿完了しました</p>');
        $('#msg').hide().fadeIn(500,function(){
            $(this).delay(1000).fadeOut(300);
        });
        return false;
    });
    



});