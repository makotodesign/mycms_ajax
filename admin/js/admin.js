$(function(){
    //ajax作戦


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
        alert('aaaa');
        }
    }); 



});