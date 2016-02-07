<?php
session_start();
require_once(__DIR__.'/../lib/dbh.php');
require_once(__DIR__.'/lib/functions.php');
$edit_id=h($_GET['id']);
$_SESSION['id']=$edit_id;
$stmt=$dbh->prepare('SELECT title,content FROM posts WHERE id=?');
$stmt->execute(array($edit_id));


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="admin.css">
<title>投稿更新</title>
</head>
<body>
<div class="container">
    <h1 class="maintitle">投稿管理画面</h1>
    <div class="content">
       <h2 class="subtitle">投稿更新</h2>
        <form action="editpost.php" method="post" class="input">
        	<?php foreach($stmt as $result):?>	
	           <p>
	            <label for="title">タイトル</label><br>
	            <input type="text" name="edit_title" class="input_title" value="<?php echo $result['title'];?>"><br>
	            </p>
	            <p>
	            <label for="title">内容</label><br>
	                <textarea name="edit_content" class="input_textarea" ><?php echo str_replace('<br />','',$result['content']);?></textarea><br>
	            </p>
	            <p>
	            <button onClick="history.back();">戻る</button>
	            <button type="submit">更新</button>
	            
	            </p>
	        <?php endforeach; ?>          
        </form>
        
    </div>
    

            
</div>
</body>
</html>