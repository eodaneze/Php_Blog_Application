<?php
 session_start();
 require_once('./connection.php');
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $post_id = $_POST['post_id'];
   

    if($name = "" || $email == "" || $message == ""){
        $_SESSION['error'] = "All fields are required";
        header('location: ../post-details.php');
    }else{
      // mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");
       $sql = "INSERT INTO post_comments(post_id, name, email, comment)VALUES('$post_id', '$name', '$email', '$message')";
       $result = mysqli_query($conn, $sql);
       if($result){
          $_SESSION['success'] = "Comment submitted successfully";
          header('location: ../post-details.php?id='.$post_id);
       }else{
            $_SESSION['error'] = "Error submitting comment";
            header('location: ../post-details.php');
       }
    }
  }

?>