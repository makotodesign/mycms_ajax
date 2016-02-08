<?php
header("Content-type: text/html; charset=UTF-8");
require_once(__DIR__.'/lib/functions.php');
require_once(__DIR__.'/../lib/dbh.php');
$title=h($_POST['title']);
$content=h($_POST['content']);
$stmt=$dbh->prepare('INSERT INTO posts(new_date,title,content) VALUES (now(),:title ,:content )');
$stmt->execute(array(
				'title'=>$title,
				'content'=>$content
				));
$show_new=$dbh->query('SELECT * FROM posts ORDER BY new_date DESC LIMIT 1');
$dbh=null;
?>


    <?php foreach($show_new as $post): ?>
    <tr id="tr<?php echo $post['id'];?>">
        <td><?php echo $post['id']; ?></td>
        <td><?php echo $post['new_date']; ?></td>
        <td><?php echo $post['title']; ?></td>
        <td><?php echo $post['content']; ?></td>
        <td>
            <button class="delete" value="<?php echo $post['id']; ?>">削除する</button>
            <a href="edit.php?id=<?php echo $post['id']; ?>">編集する</a>
        </td>
    </tr>    
    <?php endforeach; ?>
<!--    イベントも渡してあげないとajaxで読み込んだ後の処理はdocument.readyの対象にならない-->
<script>
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
</script>