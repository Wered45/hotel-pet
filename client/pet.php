<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){

    if($_SESSION['id_role'] != 1){
        header('Location: /index.php');
        exit;
    }
}

$sql_pet = 'select * from pet where id_user = "'.$_SESSION['id_user'].'"';
$pet = $conect->query($sql_pet);
if (isset($_POST['pet'])) {
  $nickname = $_POST['nickname'];
  $breed = $_POST['breed'];
  $size = $_POST['size'];
  $weight = $_POST['weight'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $special_features = $_POST['special_features'];
  $vid_pet = $_POST['vid_pet'];

  $sql_pet = 'insert into pet (nickname, breed, size, weight, gender, age, special_features, vid_pet, id_user) values ("'.$nickname.'", "'.$breed.'", "'.$size.'", "'.$weight.'", "'.$gender.'", "'.$age.'", "'.$special_features.'", "'.$vid_pet.'", "'.$_SESSION['id_user'].'")';
  $conect->query($sql_pet);
  header('Location: /index.php');
  exit;
}

if (isset($_POST['delet'])) {
  $id_pet = $_POST['id_pet'];

  $sql_delet = 'delete from pet where id_pet = "'.$id_pet.'"';
  $conect->query($sql_delet);
  header('Location: /client/pet.php');
  exit;
}
?>
<h3 class="text-center">Зарегистрировать питомца</h3>

<div class="border p-3 m-4  border-warning border-3 rounded-top">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Вид питомца</label>
    <input required type="text" name="vid_pet" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Кличка питомца</label>
    <input required type="text" name="nickname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Порода питомца</label>
    <input required type="text" name="breed" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Размер питомца</label>
    <input required type="text" name="size" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Вес питомца</label>
    <input required type="text" name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Пол питомца</label>
    <input required type="text" name="gender" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Возраст питомца</label>
    <input required type="text" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Особые характеристики питомца</label>
    <input required type="text" name="special_features" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="pet" class="btn btn-warning">Зарегистрировать</button>
</form>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Кличка питомца</th>
      <th scope="col">Порода</th>
      <th scope="col">Размер</th>
      <th scope="col">Вес</th>
      <th scope="col">Пол</th>
      <th scope="col">Возраст</th>
      <th scope="col">Особые зарактеристики</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $pet->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['nickname']?></th>
      <th scope="row"><?=$row['breed']?></th>
      <th scope="row"><?=$row['size']?></th>
      <th scope="row"><?=$row['weight']?></th>
      <th scope="row"><?=$row['gender']?></th>
      <th scope="row"><?=$row['age']?></th>
      <th scope="row"><?=$row['special_features']?></th>
      <th scope="row"><form method="post">
        <input type="hidden" name="id_pet" value="<?=$row['id_pet']?>">
      <button type="submit" name="delet" class="btn btn-danger">Удалить</button>
    </form></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>