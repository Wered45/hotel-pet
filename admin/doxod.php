<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['date'])) {
 $date_start = $_POST['date_start'];
 $date_end = $_POST['date_end'];

 $sql = 'select *  from type_aviary 
 join table_aviary on type_aviary.id_type_aviary = table_aviary.id_type_aviary
 join Applications on Applications.id_avi = table_aviary.id_avi
 where Applications.date_start >= "'.$date_start.'" and Applications.date_end <= "'.$date_end.'"';
}else{
$sql = 'select *  from type_aviary 
 join table_aviary on type_aviary.id_type_aviary = table_aviary.id_type_aviary
 join Applications on Applications.id_avi = table_aviary.id_avi
';
}
$doxod = $conect->query($sql);
?>
<h3 class="text-center">Доход гостиницы</h3>

<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Выбрать дату начала</label>
    <input type="date" name="date_start" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Выбрать дату конца</label>
    <input type="date" name="date_end" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="date" class="btn btn-dark">Найти</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Тип вольеры</th>
      <th scope="col">Цена за сутки</th>
      <th scope="col">Кол-во вольер</th>
      <th scope="col">Количество дней занятости</th>
      <th scope="col">Среднее значение занятости</th>
      <th scope="col">Сумма</th>
      
    </tr>
  </thead>
  <tbody>
    <?php $summ = 0; while($row = $doxod->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['name_aviary']?></th>
      <th scope="row"><?=$row['price']?></th>
      <th scope="row">1</th>
      <th scope="row">
      <?php
      $datetime1 = new DateTime($row['date_start']);
      $datetime2 = new DateTime($row['date_end']);
      $diff = $datetime1->diff($datetime2);
      $diff_days = $diff->days;
      echo $diff_days;
      $summ += ($diff_days * $row['price']);
      ?>
      </th>
      <th><?//($diff_days * $row['price'])/$diff_days?></th>
      <th scope="row"><?= ($diff_days*$row['price']) ?></th>
    </tr>
    <?php }?>
    <tr>
      <th>Итого:</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th><?php echo $summ;?></th>
    </tr>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>