<?php
require_once(__DIR__.'/lib/functions.php');
require_once(__DIR__.'/../lib/dbh.php');
$id=h($_GET['id']);
$stmt=$dbh->prepare('DELETE FROM posts WHERE id=?');
$stmt->execute(array($id));

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
       <h2 class="subtitle">削除しました</h2>
       <button onClick="location.href='index.php';">管理画面トップに戻る</button>
 

        
    </div>

    
            
</div>
</body>
</html>