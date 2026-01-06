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
          <a href="/reg.php">Зарегистрироваться</a>
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
          <a href="/admin/otcet_cass.php">Доход гостиницы</a>
        </li>';
        echo '<li>
          <a href="/admin/otcet_cass.php">Список выезжающих питомцев</a>
        </li>';
        echo '<li>
          <a href="/admin/otcet_cass.php">Кассовый отчет</a>
        </li>';
        echo '<li>
          <a href="/admin/otcet_cass.php">Кассовый отчет</a>
        </li>';
        echo '<li>
          <a href="/admin/otcet_cass.php">Кассовый отчет</a>
        </li>';
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['id_user'])) {
        echo '<div>
        <a class="btn btn-outline-dark" href="/logout.php" type="submit">Выход</a>
      </div>';
      }else{
        echo '<div>
        <a class="btn btn-outline-dark" href="/auto.php" type="submit">Войти</a>
      </div>';
      }
      ?>
    </nav>
    <nav class="menu d-flex justify-content-between w-100 align-items-center">
      <ul class="menu_list">
        <li>
          <a href="/index.php">Главная</a>
        </li>
        <?php if (!isset($_SESSION['id_user'])) {?>
        <li>
          <a href="/reg.php">Зарегистрироваться</a>
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
        }
        ?>
      </ul>
      <?php
      if (isset($_SESSION['id_user'])) {
        echo '<div>
        <a class="btn btn-outline-dark" href="/logout.php" type="submit">Выход</a>
      </div>';
      }else{
        echo '<div>
        <a class="btn btn-outline-dark" href="/auto.php" type="submit">Войти</a>
      </div>';
      }
      ?>
    </nav>
  </div>