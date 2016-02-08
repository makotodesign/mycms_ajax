<?php
header("Content-type: text/plain; charset=UTF-8");
require_once(__DIR__.'/lib/functions.php');
require_once(__DIR__.'/../lib/dbh.php');
$title=h($_POST['title']);
$content=h($_POST['content']);
$stmt=$dbh->prepare('INSERT INTO posts(new_date,title,content) VALUES (now(),:title ,:content )');
$stmt->execute(array(
				'title'=>$title,
				'content'=>$content
				));
$dbh=null;