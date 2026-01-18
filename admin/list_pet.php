<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

$sql = 'select * from Applications
join users on Applications.id_user = users.id_user
join table_aviary on Applications.id_avi = table_aviary.id_avi';
$appl = $conect->query($sql);
?>
<h3 class="text-center">Список выезжающих питомцев</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№ док</th>
      <th scope="col">Ф.И.О. постояльца</th>
      <th scope="col">Телефон</th>
      <th scope="col">Сумма оплата</th>
      <th scope="col">№ вольеры</th>
      <th scope="col">Дата сдачи</th>
      <th scope="col">Дата выезда</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $appl->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['id_appli']?></th>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['phone']?></th>
      <th scope="row"><?=$row['summ']?></th>
      <th scope="row"><?=$row['number_aviary']?></th>
      <th scope="row"><?=$row['date_start']?></th>
      <th scope="row"><?=$row['date_end']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>