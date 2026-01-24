<div class="header">
<div class="block_logo">
      <img src="/img/кот.png" alt="logo">
    </div>
    <div class="menu_mobile" id="menu_mobile">
        <img src="/img/aikem mobail.png" width="32px">
    </div>
    <nav class="menu_mobile_main">
      <ul class="menu_list_mobile">
        <li style="text-align: right;">
          <a href="#" class="close">X</a>
        </li>
        <li>
          <a href="/index.php">Главная</a>
        </li>
        <?php if (!isset($_SESSION['id_user'])) {?>
        <li>
          <a href="/index.php#nomer">Наши номера</a>
        </li>
        <li>
          <a href="/index.php#serv">Наши услуги</a>
        </li>
        <li>
          <a href="/index.php#preg">Наши преимущества</a>
        </li>
        <?php }?>
        <?php if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 1) {
          echo '<li>
          <a href="/client/pet.php">Зарегистрировать питомца</a>
        </li>';
        echo '<li>
          <a href="/client/orders.php">Мои заказы</a>
        </li>';
        }
        if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 2) {
          echo '<li>
          <a href="/admin/otcet_cass.php">Кассовый отчет</a>
        </li>';
        echo '<li>
          <a href="/admin/doxod.php">Доход гостиницы</a>
        </li>';
        echo '<li>
          <a href="/admin/list_pet.php">Список выезжающих питомцев</a>
        </li>';
        echo '<li>
          <a href="/admin/information_comnat.php">Сведения о вольерах</a>
        </li>';
        echo '<li>
          <a href="/admin/reviuz.php">Просмотр отзыва</a>
        </li>';
        echo '<li>
          <a href="/admin/corect_volier.php">Корректировка вольеров</a>
        </li>';
        echo '<li>
          <a href="/admin/application.php">Заявки клиентов</a>
        </li>';
        echo '<li>
          <a href="/admin/new_servis.php">Добавить услуги</a>
        </li>';
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['id_user'])) {
        echo '<div>
        <a class="btn btn-outline-dark" href="/logout.php">Выход</a>
      </div>';
      }else{
        echo '<div>
        <a class="btn btn-outline-dark" href="/auto.php">Войти</a>
      </div>';
      }
      ?>
    </nav>
    <nav class="menu  justify-content-between w-100 align-items-center">
      <ul class="menu_list">
        <?php if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 1 || !isset($_SESSION['id_user'])) {
          echo '<li>
          <a href="/index.php">Главная</a>
        </li>';        
        }?>
        <?php if (!isset($_SESSION['id_user'])) {?>
        <li>
          <a href="/index.php#nomer">Наши номера</a>
        </li>
        <li>
          <a href="/index.php#serv">Наши услуги</a>
        </li>
        <li>
          <a href="/index.php#preg">Наши преимущества</a>
        </li>
        <?php }?>
        <?php if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 1) {
          echo '<li>
          <a href="/client/pet.php">Зарегистрировать питомца</a>
        </li>';
        echo '<li>
          <a href="/client/orders.php">Мои заказы</a>
        </li>';
        }
        if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 2) {
          echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Вальеры</a>
          <ul class="dropdown-menu">
            <li><a href="/admin/corect_volier.php">Корректировка</a></li>
            <li><a href="/admin/information_comnat.php">Сведения</a></li>
          </ul>
        </li>';
        echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Отчеты</a>
          <ul class="dropdown-menu">
            <li><a href="/admin/otcet_cass.php">Кассовый отчет</a></li>
            <li><a href="/admin/doxod.php">Доход гостиницы</a></li>
          </ul>
        </li>';
        echo '
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Отчеты</a>
          <ul class="dropdown-menu">
            <li><a href="/admin/application.php">Заявки клиентов</a></li>
            <li><a href="/admin/list_pet.php">Список выезжающих</a></li>
          </ul>
        </li>';
        echo '<li>
          <a href="/admin/reviuz.php">Отзывы</a>
        </li>';
        echo '<li>
          <a href="/admin/new_servis.php">Услуги</a>
        </li>';
        }
        if (isset($_SESSION['id_user']) && $_SESSION['id_role'] == 3) {
        echo '<li>
          <a href="/doctor/inspection_pet.php">Проверка питомца</a>
        </li>';
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['id_user'])) {
        echo '<div>
        <a class="btn btn-outline-dark" href="/logout.php" >Выход</a>
      </div>';
      }else{
        echo '<div>
        <a class="btn btn-outline-dark" href="/auto.php" >Войти</a>
      </div>';
      }
      ?>
    </nav>
  </div>