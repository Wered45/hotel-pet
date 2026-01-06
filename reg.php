<?php
include 'temp/headr.php';
if (isset($_POST['reg'])) {
    $fio = $_POST['fio'];
    $phone = $_POST['phone'];
    $login = $_POST['login'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if (preg_match('/^8\([0-9]{3}\)[0-9]{3}-[0-9]{2}-[0-9]{2}$/', $phone)) {
      $sql_login = 'select * from users where login = "'.$login.'"';
      $login_user = $conect->query($sql_login)->fetch_assoc(); 
      if (!$login_user) {
        if (strlen($login >= 6)) {
          if (strlen($password1 >= 6)) {
            if ($password1 == $password2) {
              $sql = 'insert into users (fio, phone, login, password, id_role) values ("'.$fio.'", "'.$phone.'", "'.$login.'", "'.password_hash($password1, PASSWORD_DEFAULT).'", 1)';

              $conect->query($sql);
              header('Location: auto.php');
              exit;
            }else{
              echo 'Пароли не совподает!';
            }
          }else{
            echo 'Пароль слишком маленький!';
          }
        }else{
          echo 'Логин слишком маленький!';
        } 
      }else{
        echo 'Логин уже занет!';
      }
    }else{
      echo 'Телефон не правильно заполнен!';
    }
    
}
?>
<div class="border p-3 m-4  border-warning border-3 rounded-top">
<form method="post">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите Ф.И.О.</label>
    <input required type="text" name="fio" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите телефон</label>
    <input required type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите логин</label>
    <input required type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Введите пароль</label>
    <input required type="password" name="password1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Повторить пароль</label>
    <input required type="password" name="password2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" name="reg" class="btn btn-warning">Зарегистрироваться</button>
  <br>
  <a href="auto.php">Аккаунт есть</a>
</form>
</div>
<?php
include 'temp/footer.php';
?>