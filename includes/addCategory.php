<?php
  session_start();
  require_once('./connection.php');
  if(isset($_POST['add'])){
     $catName = $_POST['name'];

     if($catName == ""){
        $_SESSION['error'] = "Pls fill out the field";
        header('location: ../addCategory.php');
     }else{
        $sql = "INSERT INTO category(category_name)VALUES('$catName')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION['success'] = "Post category have been added successfully";
            header('location: ../addcategory.php');
        }else{
            $_SESSION['error'] = "Error adding post category";
            header('location: ../addCategory.php');
        }
     }
  }

?>