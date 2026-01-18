<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    print_r($_SESSION);
    exit;
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

$sql = 'select * from reviews
join Applications on reviews.id_appli = Applications.id_appli
join pet on Applications.id_pet = pet.id_pet
join users on Applications.id_user = users.id_user
join table_aviary on Applications.id_avi = table_aviary.id_avi
join table_servises_applic on table_servises_applic.id_appli  = Applications.id_appli 
join servises on servises.id_serv  = table_servises_applic.id_serv 
';
$reviuz = $conect->query($sql);
?>
<h3 class="text-center">Просмотр отзыва</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Ф.И.О. клиента</th>
      <th scope="col">Имя питомца</th>
      <th scope="col">Название услуги</th>
      <th scope="col">№ вольера</th>
      <th scope="col">Дата заезда</th>
      <th scope="col">Дата выезда</th>
      <th scope="col">Оченка услуги</th>
      <th scope="col">Отзыв услуги</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $reviuz->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['fio']?></th>
      <th scope="row"><?=$row['nickname']?></th>
      <th scope="row"><?=$row['name_serv']?></th>
      <th scope="row"><?=$row['number_aviary']?></th>
      <th scope="row"><?=$row['date_start']?></th>
      <th scope="row"><?=$row['date_end']?></th>
      <th scope="row"><?=$row['ochenka']?></th>
      <th scope="row"><?=$row['reviews']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>