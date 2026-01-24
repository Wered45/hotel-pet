<?php 
session_start();
include '../conect.php';

$id_appli = $_POST['id_appli'];
$text_review = $_POST['text_review'];
$mark = $_POST['mark'];

$sql = 'insert into reviews (ochenka, reviews, id_appli) values ("'.$mark.'", "'.$text_review.'", "'.$id_appli.'")';

$conect->query($sql);
header('Location: /client/orders.php');
exit;
?>