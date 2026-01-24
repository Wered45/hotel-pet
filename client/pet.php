<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){

    if($_SESSION['id_role'] != 1){
        header('Location: /index.php');
        exit;
    }
}


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
<h3 class="text-center p-4">Размешение питомца</h3>

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
<?php
include '../temp/footer.php';
?>