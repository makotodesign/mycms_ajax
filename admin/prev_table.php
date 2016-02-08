<?php
header("Content-type: text/html; charset=UTF-8");
require_once(__DIR__.'/../lib/dbh.php');
$stmt=$dbh->query('SELECT * FROM posts ORDER BY new_date DESC');
   
?>
<table class="allpost">
    <tr>
        <th width="5%">ID</th>
        <th width="10%">更新時間</th>
        <th width="20%">タイトル</th>
        <th width="55%">本文</th>
        <th width="10%">編集内容</th>                
    </tr>
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

</table>