<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){

    if($_SESSION['id_role'] != 1){
        header('Location: index.php');
        exit;
    }
}

$sql_order = 'select * from Applications 
join table_servises_applic on table_servises_applic.id_appli  = Applications.id_appli 
join servises on servises.id_serv  = table_servises_applic.id_serv 
join table_aviary on table_aviary.id_avi  = Applications.id_avi 
where Applications.id_user = '.$_SESSION['id_user'].'
';

if (isset($_POST['delet'])) {
  $id_appli = $_POST['id_appli'];
  $sql_delet = 'delete from table_servises_applic where id_appli = "'.$id_appli.'"';
  $conect->query($sql_delet);

  $sql_delet = 'delete from Applications where id_appli = "'.$id_appli.'"';
  $conect->query($sql_delet);
  header('LOcation: orders.php');
  exit;
}
$orders = $conect->query($sql_order);

if (isset($_POST['delet_reviews'])) {
  $id_reviews = $_POST['id_review'];
  $sql_delete = 'delete from reviews where id_reviews = "'.$id_reviews.'"';
  $conect->query($sql_delete);
  header('Location: orders.php');
  exit;
}
?>
<h3 class="text-center">Мои заказы</h3>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Название услуги</th>
      <th scope="col">Номер вольер</th>
      <th scope="col">Дата заселения</th>
      <th scope="col">Дата выезда</th>
      <th scope="col">Сумма</th>
      <th scope="col">Статус</th>
      <th scope="col">Оставить отзыв</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $orders->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['name_serv']?></th>
      <th scope="row"><?=$row['number_aviary']?></th>
      <th scope="row"><?=$row['date_start']?></th>
      <th scope="row"><?=$row['date_end']?></th>
      <th scope="row"><?=$row['summ']?></th>
      <th scope="row"><?=$row['status_appli']?></th>
      <th scope="row">
        <?php
          $sql = 'select * from reviews where id_appli = '.$row['id_appli'];
          $r = $conect->query($sql)->fetch_assoc();
          if($r){
            echo 'Вы уже оставили отзыв!<br />'.$r['reviews'].' с оценкой '.$r['ochenka'];
          ?>
            <form  method="post">
              <input type="hidden" name="id_review" value="<?= $r['id_reviews'] ?>">
              <button class="btn btn-danger" name="delet_reviews">Отменить</button>
            </form>
          <?php 
          }else{
            ?>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal" onclick="order(<?=$row['id_appli']?>)">Оставить отзыв</button>

            <?php 
          }
        ?>
      </th>
      <th scope="row"><form method="post">
      <input type="hidden" name="id_appli" value="<?=$row['id_appli']?>">
      <button type="submit" name="delet" class="btn btn-danger">Отменить</button>
      </form></th>
      </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>