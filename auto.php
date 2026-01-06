<?php
include 'temp/headr.php';
if (isset($_POST['auto'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = 'select * from users join role on users.id_role = role.id_role 
    where login = "'.$login.'"';
    $user = $conect->query($sql)->fetch_assoc();

    if ($user) {
      if (password_verify($password, $user['password'])) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['id_role'] = $user['id_role'];

        if ($user['id_role'] == 1) {
          header('Location: /client/pet.php');
          exit;
        }else{
          header('Location: /admin/otcet_cass.php');
          exit;
        }
      }else{
      echo 'Не верный пароль';
    }
    }else{
      echo 'Не верный логин';
    }
}
?>
<div class="border p-3 m-4  border-warning border-3 rounded-top">
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите логин</label>
    <input required type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите пароль</label>
    <input required type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="auto" class="btn btn-warning">Войти</button>
</form>
</div>
<?php
include 'temp/footer.php';
?>