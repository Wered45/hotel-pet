
<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

$sql = 'select * from Applications
join table_aviary on Applications.id_avi = table_aviary.id_avi';
$appli = $conect->query($sql);
?>
<h3 class="text-center">Заявки клиентов</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№ вольера</th>
      <th scope="col">Кол-во дней</th>
      <th scope="col">Итоговая стоимость</th>
      <th scope="col">Дата заезда</th>
      <th scope="col">Дата выезда</th>
      <th scope="col">Доп услуги</th>
      <th scope="col">Статус</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $appli->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['number_aviary']?></th>
      <?php
      $datetime1 = new DateTime($row['date_start']);
      $datetime2 = new DateTime($row['date_end']);
      $diff = $datetime1->diff($datetime2);
      $diff_days = $diff->days;
      $price = $diff_days * $row['price'];
      ?>
      <th scope="row"><? echo $diff_days;?></th>
      <th scope="row"><? echo $price;?></th>
      <th scope="row"><?=$row['date_start']?></th>
      <th scope="row"><?=$row['date_end']?></th>
      <th scope="row"><?=$row['dop_sav']?></th>
      <th scope="row"><?=$row['status_appli']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>