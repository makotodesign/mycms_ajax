<?php
session_start();
require_once(__DIR__.'/lib/functions.php');
$title=h($_POST['title']);
$content=strip_tags(nl2br($_POST['content']),'<br>');
$_SESSION['post']['title']=$title;
$_SESSION['post']['content']=$content;

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link type="text/css" rel="stylesheet" href="admin.css">
<title>確認</title>
</head>
<body>
<div class="container">
    <h1 class="maintitle">投稿管理画面</h1>
    <div class="content">
       <h2 class="subtitle">投稿内容確認</h2>
       <h3>投稿タイトル</h3>
       <p><?php echo $title; ?></p>
       <h3>本文</h3>
       <p><?php echo $content; ?></p>
       <button onClick="history.back();">戻る</button>
       <button onClick="location.href='post.php'">投稿</botton>

        
    </div>

    
            
</div>
</body>
</html>