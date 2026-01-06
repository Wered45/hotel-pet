<?php 
session_start();
include '../conect.php';

$id_serv = $_POST['id_serv'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
$type_price = $_POST['type_price'];
$id_avi = $_POST['id_avi'];
$id_pet = $_POST['id_pet'];
$id_user = $_SESSION['id_user'];

$sql = 'select * from servises where id_serv = '.$id_serv;
$serv = $conect->query($sql)->fetch_array();
$price_serv = $serv['price_serv'];

$datetime1 = new DateTime($date_start);
$datetime2 = new DateTime($date_end);
$diff = $datetime1->diff($datetime2);
$diff_days = $diff->days;
$total_price = $price_serv * $diff_days;
$sql = 'insert into Applications (date_start, date_end, type_price, id_avi, id_pet, id_user, status_appli,summ) values ("'.$date_start.'", "'.$date_end.'", "'.$type_price.'", "'.$id_avi.'", "'.$id_pet.'", "'.$id_user.'", "Забронировано", '.$total_price.')';
$conect->query($sql);
$id_app = $conect->insert_id;
$sql = 'insert into table_servises_applic (col_serv, price, id_serv , id_appli) values (1, '.$total_price.', '.$id_serv.', '.$id_app.')';
$conect->query($sql);
header('Location: /client/orders.php');
exit;
?>