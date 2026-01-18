<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}

$sql_serv = 'select * from servises';
$servises = $conect->query($sql_serv);

if (isset($_POST['servises'])) {
    $name_serv = $_POST['name_serv'];
    $opic = $_POST['opic'];
    $price_serv = $_POST['price_serv'];
    $img = $_POST['img'];

    $sql = 'insert into servises (name_serv, opic, price_serv, img) values ("'.$name_serv.'", "'.$opic.'", "'.$price_serv.'", "'.$img.'")';
    $conect->query($sql);
    header('Location: /admin/new_servis.php');
    exit;
}

if (isset($_POST['delet'])) {
  $id_serv = $_POST['id_serv'];

  $sql_delet = 'delete from servises where id_serv = "'.$id_serv.'"';
  $conect->query($sql_delet);
  header('Location: new_servis.php');
  exit;
}
?>
<h3 class="text-center">Добавить услуги</h3>
<div class="border p-3 m-4  border-warning border-3 rounded-top">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите название услуги</label>
    <input type="text" name="name_serv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите описание услуги</label>
    <input type="text" name="opic" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите цену услуги</label>
    <input type="text" name="price_serv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите картинку услуги</label>
    <input type="text" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="servises" class="btn btn-warning">Добавить</button>
</form>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Название услуги</th>
      <th scope="col">Описание услуги</th>
      <th scope="col">Цена за сутки услуги</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $servises->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['name_serv']?></th>
      <th scope="row"><?=$row['opic']?></th>
      <th scope="row"><?=$row['price_serv']?></th>
      <th scope="row"><form method="post">
      <input type="hidden" name="id_serv" value="<?=$row['id_serv']?>">
      <button type="submit" name="delet" class="btn btn-danger">Удалить</button>
    </form></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>