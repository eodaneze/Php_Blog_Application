<?php
 session_start();
  require_once('./includes/connection.php');
 if(isset($_SESSION['adminId'])){
    $id = $_SESSION['adminId'];
    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $pic = $row['pic'];
 }


?>

<div>
     <img src="./includes/admindp/<?=$pic?>" alt="">
     <h1><?=$name?></h1>
</div>

<?php
 require_once('./alertify.php')

?>