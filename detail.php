<?php
header("Content-type: text/plain; charset=UTF-8");

if(isset($_POST['prev_id'])) : 
    require_once(__DIR__.'/admin/lib/functions.php');
    require_once(__DIR__.'/lib/dbh.php');
    $id=h($_POST['prev_id']);
    $stmt=$dbh->prepare('SELECT title,content FROM posts WHERE id=?');
    $stmt->execute(array($id));
    $dbh=null;
 foreach($stmt as $row):?>
      <h1><?php echo $row['title'];?></h1>
      <p><?php echo $row['content'];?></p>    
    
    <?php endforeach; ?>
    
<?php    
else :
    echo 'データ取得エラー';
endif;
