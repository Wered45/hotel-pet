<?php
include '../temp/headr.php';
if(!isset($_SESSION['id_user'])){
    print_r($_SESSION);
    exit;
    if($_SESSION['id_role'] != 2){
        header('Location: index.php');
        exit;
    }
}
?>
<h3>Админ</h3>
<?php
include '../temp/footer.php';
?>