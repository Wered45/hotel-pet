<?php
include 'temp/headr.php';

$sql = 'select * from servises';
$servises = $conect->query($sql);

$sql_rewius = 'select * from reviews order by id_reviews desc limit 3';
$rewuis = $conect->query($sql_rewius);
?>
  <div class="main">
    <div class="brone">
      <div class="brone_block">
        <div class="brone_tekst">
          <p class="text-center">Уютная и чистая гостиница  для вашего любимца</p>
        </div>
      </div>
    </div>
<section id="nomer">
<div class="catalog ">
      <div class="catalog_tekst">
        <p>Наши номера</p>
      </div>

     <div class="mb-3">
        <label for="exampleInputEmail1"  class="form-label">Введите тип животного</label>
        <select class="form-select" name="tip_ser" id='filter_main' aria-label="Default select example">
          <option value="">Все</option>
          <option value="Кошек">Кошек</option>
          <option value="Собак">Собак</option>
        </select>
      </div>

      <div class="catalog_block_row">
      <?php while($row = $servises->fetch_assoc()){?>
      <div class="catalog_block" style="width: 300px;">
          <h3><?=$row['name_serv']?></h3>
          <img src="<?=$row['img']?>" width="300px" alt="kart">
          <p><?=$row['opic']?></p>
          <b>Тип: <?=$row['tip_ser']?></b>
          <p>
            <b>Цена</b> <?=$row['price_serv']?> руб. 
          </p>
          <?php if(isset($_SESSION['id_user'])){
            if($_SESSION['id_role'] == 1){ 
               echo '
            <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brModal" onclick="brModal('.$row['id_serv'].', \''.$row['name_serv'].'\')">Забронировать</button>
          ';
            }
          }?> 
        </div>
      <?php }?>
</div>
</section>
<section id="serv">
    <div class="servis mt-4 p-4">
      <div class="servis_tekst">
        <h2>Наши услуги</h2>
      </div>
      <div class="servis_row">
          <div>
            <img src="img/u1.png" alt="log">
            <p>Видеонаблюдение<p>
          </div>
          <div>
            <img src="img/u2.png" alt="log">
            <p>Трансфер в черте города<p>
          </div>
          <div>
            <img src="img/u3.png" alt="log">
            <p>Груминг<p>
          </div>
          <div>
            <img src="img/u4.png" alt="log">
            <p>Фото/видео отчет<p>
          </div>
          <div>
            <img src="img/u5.png" alt="log">
            <p>Ветеринарное сопровождение<p>
          </div>
          <div>
            <img src="img/u6.png" alt="log">
            <p>Корм и аксессуары<p>
          </div>
      </div>
    </div>
</section>
<section id="preg">
    <div class="premiy ">
      <div class="premiy_tekst">
        <p>Наши преимущества</p>
      </div>
      <div class="premiy_block_row">
        <div class="premiy_block">
          <h3>Мы принимаем любых питомцев</h3>
          <img src="img/p1.png" alt="kart">
          <p>Мы заботимся о комфорте и безапосности наших постояльцев. Также в отель принимаются собаки, грызуны и другие животные.</p>
        </div>
        <div class="premiy_block">
          <h3>У нас безопасно и чисто</h3>
          <img src="img/p2.png" alt="kart">
          <p>В номерах нашего отеля всегда чисто и уютно. Номера выполнены из закаленного стекла, что позволяет убрать следы пребывания предыдущего животного полностью</p>
        </div>
        <div class="premiy_block">
          <h3>У нас индивидуальный подход к животным</h3>
          <img src="img/p4.png" alt="kart">
          <p>В отеле максимально приблежаем уход за животным к вашему дамашнему уходу. Сотрудники отеля решат любой вопрос, исходя из интересов Вашего любимца.</p>
        </div>
      </div>
    </div>
</section>
    <div class="nac mt-4 p-4 mb-4">
      <div class="nac_tekst">
        <h3>О нас</h3>
        <p>В нашей гостинице для животных все устроено так, чтобы Вашему питомцу было спокойно и комфортно. Просторные светлые номера позволяют животным чуствовать себя уютно, постояльцам отеля никогда не бывает у нас страшно или скучно. Наши котоняни уделяют общению с животными особое внимание. Мы гарантируем, что в течение дня Ваш любимец не будет знать отказа в ласке и ни в чем не будет нуждаться.</p>
        <img src="img/19_big.jpg" alt="kart">
      </div>
    </div>
    <div class="parts mt-4">
      <div class="part">
        <h3>Наши партнеры</h3>
        <img src="img/vita_0.png" alt="">
        <img src="img/partner4.jpg" alt="">
        <img src="img/partner3.jpg" alt="">
      </div>
    </div>
  </div>
<div class="nac mt-4 p-4 mb-4">
<h3 class="text-center">Коментарии от наших постояльцев</h3>
<div class="d-flex gap-4 justify-content-center mt-4">
  <?php while($row = $rewuis->fetch_assoc()){?>
  <div class="card " style="width: 18rem;">
    <div class="card-body">
      <p class="card-text"><?=$row['reviews']?></p>
      <p class="card-text">Оценка:<?=$row['ochenka']?></p>
    </div>
  </div>
  <? }?>
</div>
</div>
<?php
include 'temp/footer.php';
?>