<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

$sql = 'select * from table_aviary
join type_aviary on table_aviary.id_type_aviary = type_aviary.id_type_aviary
join Applications on Applications.id_avi = table_aviary.id_avi
join pet on Applications.id_pet = pet.id_pet';
$tabl_avia = $conect->query($sql);
?>
<h3 class="text-center">Сведения о вольерах</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">№ вольера</th>
      <th scope="col">Тип вольера</th>
      <th scope="col">Стоимость вольеры руб\сутки</th>
      <th scope="col">Статус</th>
      <th scope="col">Дата занятности</th>
      <th scope="col">Питомец</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $tabl_avia->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['number_aviary']?></th>
      <th scope="row"><?=$row['name_aviary']?></th>
      <th scope="row"><?=$row['price']?></th>
      <th scope="row"><?=$row['status']?></th>
      <th scope="row"><?=$row['date_end']?></th>
      <th scope="row"><?=$row['nickname']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>