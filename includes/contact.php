<?php
 session_start();
 require_once('./connection.php');
  if(isset($_POST['send'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if($name == "" || $email == "" || $message == ""){
        $_SESSION['error'] = "All feilds are required";
        header('location: ../contact.php');
    }else{
        $sql = "INSERT INTO contact(name, email, subject)VALUES('$name', '$email', '$message')";
        $result = mysqli_query($conn, $sql);
        if($result){
             $_SESSION['success'] = "Contact Message sent successfully";
             header('location: ../contact.php');
        }else{
            $_SESSION['error'] = "Error sending message";
            header('location: ../contact.php');
        }
    }
  }
?>