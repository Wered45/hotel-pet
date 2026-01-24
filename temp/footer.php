<div>
<div class="footer">
    <div class="footer_logo">
      <img src="/img/кот подвал.png" alt="">
      <ul>
        <li>
          <a href="#"><img src="/img/fb1.png" alt=""></a>
        </li>
        <li>
          <a href="#"><img src="/img/whatapp.png" alt=""></a>
        </li>
        <li>
          <a href="#"><img src="/img/vk.png" alt=""></a>
        </li>
      </ul>
    </div>    
    <nav class="podval">
      <ul class="podval_tekst">
        <li>
          <a href="#">Контакты</a>
        </li>
        <li>
          <a href="#">
            г. Краснодар, <br> ул. 1й Сормовский проезд,124<br> +7 (938) 413 8000 <br>+7 (861) 290 29 15</a>
        </li>
        <li>
          <a href="#">goodkot@gmail.com</a>
        </li>
      </ul>
    </nav>
</div> 
<div class="modal" id="brModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Бронь: <span id="name_span"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/client/br.php"  method="post">
          
          <input type="hidden" name="id_serv" id="id_serv">
          <label>Дата и время начала:</label>
          <input type="datetime-local" name="date_start" class="form-control" id="">
          <label>Дата и время выезда: </label>
          <input type="datetime-local" name="date_end" class="form-control" id="">
          <label>Тип оплаты:</label>
          <select name="type_price" class="form-control">
            <option value="наличка" class="form-control">наличка</option>
            <option value="картой" class="form-control">картой</option>
          </select>
          <?php       
          if(!isset($_SESSION['id_user'])){
            $id_user = 0;
          }else{
            $id_user = $_SESSION['id_user'];
          }
            $sql_1 = 'select * from table_aviary';
            $sql_2 = 'select * from pet where id_user = '. $id_user;
            $q_1 = $conect->query($sql_1);
            $q_2 = $conect->query($sql_2);
          ?>
          <label>Вальеры:</label>
          <select name="id_avi" class="form-control">
            <?php while($row = $q_1->fetch_assoc()): ?>
              <option value="<?= $row['id_avi'] ?>" class="form-control"><?= $row['number_aviary'] ?></option>
            <? endwhile; ?>
          </select>
          <label>Питомцы:</label>
          <select name="id_pet" class="form-control">
            <?php while($row = $q_2->fetch_assoc()): ?>
              <option value="<?= $row['id_pet'] ?>" class="form-control"><?= $row['nickname'] ?></option>
            <? endwhile; ?>
          </select>
           <label>Доп услуга:</label>
          <input type="text" name="dop_usluga" class="form-control">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <button type="submit" name="br" class="btn btn-primary">Забронировать</button>
        </form>  

      </div>
    
    </div>
  </div>
</div>

<div class="modal" id="reviewModal" tabindex="-2">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Отзыв</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/client/form_review.php"  method="post">
          
          <input type="hidden" name="id_appli" id="id_order">
          <label>Текст отзыва:</label>
          <textarea name="text_review" class='form-control'></textarea>
          
          <label>Оценка:</label>
          <select name="mark" class="form-control">
            <option value="5" class="form-control">5</option>
            <option value="4" class="form-control">4</option>
            <option value="3" class="form-control">3</option>
            <option value="2" class="form-control">2</option>
            <option value="1" class="form-control">1</option>
          </select>
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
          <button type="submit" name="br" class="btn btn-primary">Оставить отзыв</button>
        </form>  

      </div>
    
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить вольер</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form method="post" >
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Новый номер вольера</label>
          <input type="text" name="number_aviary" class="form-control" id="number" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Новая цена</label>
          <input type="text" name="price" class="form-control" id="price" aria-describedby="emailHelp">
        </div>
        <select class="form-select" name="status" aria-label="Default select example">
          <option selected>Новый статус</option>
          <option value="Свободен">Свободен</option>
          <option value="Занят">Занят</option>
          <option value="На уборке">На уборке</option>
          <option value="На ремонте">На ремонте</option>
        </select>
        <input type="hidden" name="id_avi" id="id_avi">
        <button type="submit" name="update" class="btn btn-primary">Изменить</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>
  <script src="/js/jquery-1.11.3.min.js"></script>
  <script src="/js/fm.revealator.jquery.min.js"></script>
<script src="/js/app.js"></script>    
<script src="/js/bootstrap.bundle.min.js"></script>

</body>
</html>