<?php
session_start();
include 'conect.php';
$tip_ser = $_POST['tip_ser'];
if($tip_ser == ''){
$sql_ser = 'select * from servises';    
}else{
$sql_ser = 'select * from servises where tip_ser = "'.$tip_ser.'"';
}
$servises = $conect->query($sql_ser);

$res = '';
  while($row = $servises->fetch_assoc()){
      
      
      $res .= '<div class="catalog_block" style="width: 300px;">
          <h3>'.$row['name_serv'].'</h3>
          <img src="'.$row['img'].'" width="300px" alt="kart">
          <p>'.$row['opic'].'</p>
          <b>Тип: '.$row['tip_ser'].'</b>
          <p>
            <b>Цена</b> '.$row['price_serv'].' руб. 
          </p>
          ';
          ?>
          <?php if(isset($_SESSION['id_user'])){
            if($_SESSION['id_role'] == 1){ 
               $res .=  '<button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brModal" onclick="brModal('.$row['id_serv'].', \''.$row['name_serv'].'\')">Забронировать</button>';
            }
          }
          $res .= '</div>';
          ?> 
        
      <?php }?>
<?php 
echo $res;
?>
    