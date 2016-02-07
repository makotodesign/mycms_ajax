<?php
session_start();
require_once(__DIR__.'/lib/functions.php');
require_once(__DIR__.'/../lib/dbh.php');
$edit_title=h($_POST['edit_title']);
$edit_content=strip_tags(nl2br($_POST['edit_content']),'<br>');
$stmt=$dbh->prepare('UPDATE posts SET mod_date=now(),title=:title,content=:content WHERE id=:id');
$stmt->execute(array(
				'title'=>$edit_title,
				'content'=>$edit_content,
				'id'=>$_SESSION['id']

				));

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="admin.css">
<title>更新</title>
</head>
<body>
<div class="container">
    <h1 class="maintitle">投稿管理画面</h1>
    <div class="content">
       <h2 class="subtitle">更新しました</h2>
       <button onClick="location.href='index.php';">管理画面トップに戻る</button>
 

        
    </div>

    
            
</div>
</body>
</html>