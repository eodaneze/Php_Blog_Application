<?php
session_start();
require_once('./connection.php');
 if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM posts WHERE post_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['success'] = "Blog have been deleted successfully";
        header('location: ../viewBlog.php');
    }else{
        $_SESSION['error'] = "Error deleleting blog";
        header('location: ../viewBlog.php');
    }
 }

?>