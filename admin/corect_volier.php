<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

$sql_volier = 'select * from table_aviary';
$volier = $conect->query($sql_volier);

if (isset($_POST['update'])) {

  $id_avi = $_POST['id_avi'];
  $number_aviary = $_POST['number_aviary'];
  $price = $_POST['price'];
  $status = $_POST['status'];

  $sql_update = 'update table_aviary set number_aviary="'.$number_aviary.'", price="'.$price.'", status="'.$status.'" where id_avi = "'.$id_avi.'"';

  $conect->query($sql_update);
  header('Location: /admin/corect_volier.php');
  exit;
}
?>
<h3 class="text-center">Корректировка вольеров</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Номер вольера</th>
      <th scope="col">Цена за сутки вольера</th>
      <th scope="col">Статус вольера</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $volier->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['number_aviary']?></th>
      <th scope="row"><?=$row['price']?></th>
      <th scope="row"><?=$row['status']?></th>
      <th scope="row"><button type="button" class="btn btn-dark" data-bs-toggle="modal" onclick="edit(<?=$row['number_aviary']?>,<?=$row['price']?>,'<?=$row['status']?>', <?= $row['id_avi'] ?>)" data-bs-target="#editModal">Отредоктировать</button></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>