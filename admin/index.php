<?php
require_once(__DIR__.'/../lib/dbh.php');
$stmt=$dbh->query('SELECT * FROM posts ORDER BY new_date DESC');


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理画面</title>
<link type="text/css" rel="stylesheet" href="admin.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/admin.js"></script>
</head>
<body>
<div class="container">
    <h1 class="maintitle">投稿管理画面</h1>
    <div class="content">
       <h2 class="subtitle">新規投稿</h2>
        <form class="input">
           <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" class="input_title" required placeholder="ここにタイトルを入力してください"><br>
            </p>
            <p>
            <label for="title">内容</label><br>
                <textarea name="content" class="input_textarea" required placeholder="ここに本文を入力してください"></textarea><br>
            </p>
            <p>
            <input type="submit" value="投稿">
            </p>      
        </form>
        
    </div>
    <div class="content">
        <h2 class="subtitle">投稿一覧から編集</h2>
        <div id="prev_table">
            <table class="allpost">
               <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="10%">更新時間</th>
                    <th width="20%">タイトル</th>
                    <th width="55%">本文</th>
                    <th width="10%">編集内容</th>                
                </tr>
                </thead>
                <tbody>
                <?php foreach($stmt as $post): ?>
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
                </tbody>
            </table>
        </div>
    </div>

            
</div>
</body>
</html>