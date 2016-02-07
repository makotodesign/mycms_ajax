<?php
header('Content-type: text/plain; charset=UTF-8');
require_once(__DIR__.'/lib/functions.php');
require_once(__DIR__.'/../lib/dbh.php');
$id=h($_POST['delid']);
$stmt=$dbh->prepare('DELETE FROM posts WHERE id=?');
$stmt->execute(array($id));


