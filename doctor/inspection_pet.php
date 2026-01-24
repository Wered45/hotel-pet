<?php 
include '../temp/headr.php';

$sql_app = 'select * from Applications
inner join pet on Applications.id_pet = pet.id_pet';
$appl = $conect->query($sql_app);

if (isset($_POST['inspe'])) {
  $id_appli = $_POST['id_appli'];
  $date = $_POST['date'];
  $condition = $_POST['condition'];
  $weight = $_POST['weight'];
  $vet_passport = $_POST['vet_passport'];
  $appetite = $_POST['appetite'];
  $comit = $_POST['comit'];

  $sql_ins = 'insert into inspection_pet(id_appli, `date`, `condition`, weight, vet_passport, appetite, comit) values ("'.$id_appli.'", "'.$date.'", "'.$condition.'", "'.$weight.'", "'.$vet_passport.'", "'.$appetite.'", "'.$comit.'")';

  $conect->query($sql_ins);
  header('Location: inspection_pet.php');
  exit;
}

$sql_insp = 'select * from inspection_pet
inner join Applications on inspection_pet.id_appli =  Applications.id_appli
inner join pet on Applications.id_pet = pet.id_pet';
$inspection = $conect->query($sql_insp);
?>
<h3 class="text-center">Проверка животного</h3>

<form method="post">
    <select class="form-select" name="id_appli" aria-label="Default select example">
        <?php while($row = $appl->fetch_assoc()){?>
        <option value="<?=$row['id_appli']?>">Айди бронирование: <?=$row['id_appli']?> Кличка: <?=$row['nickname']?></option>
        <?php }?>
    </select>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите дату</label>
    <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <select class="form-select" name="condition" aria-label="Default select example">
    <option selected>Состояние животного</option>
    <option value="Отличное">Отличное</option>
    <option value="Хорошее">Хорошее</option>
    <option value="Нормальное">Нормальное</option>
    <option value="Есть проблемы">Есть проблемы</option>
  </select>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите вес</label>
    <input type="number" name="weight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <select class="form-select" name="vet_passport" aria-label="Default select example">
    <option selected>Паспорт</option>
    <option value="Есть">Есть</option>
    <option value="Нет">Нет</option>
  </select>
  <select class="form-select mt-3" name="appetite" aria-label="Default select example">
    <option selected>Аппетит животного</option>
    <option value="Хороший">Хороший</option>
    <option value="Нормальный">Нормальный</option>
    <option value="Слабый">Слабый</option>
  </select>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Оставить коментарий</label>
    <input type="text" name="comit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="inspe" class="btn btn-dark">Добавить</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Имя питомца</th>
      <th scope="col">Дата осмотра</th>
      <th scope="col">Состояние животного</th>
      <th scope="col">Вес</th>
      <th scope="col">Паспорт</th>
      <th scope="col">Аппетит</th>
      <th scope="col">Коментарий</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $inspection->fetch_assoc()){?>
    <tr>
      <th scope="row"><?=$row['nickname']?></th>
      <th scope="row"><?=$row['date']?></th>
      <th scope="row"><?=$row['condition']?></th>
      <th scope="row"><?=$row['weight']?></th>
      <th scope="row"><?=$row['vet_passport']?></th>
      <th scope="row"><?=$row['appetite']?></th>
      <th scope="row"><?=$row['comit']?></th>
    </tr>
    <?php }?>
  </tbody>
</table>
<?php
include '../temp/footer.php';
?>