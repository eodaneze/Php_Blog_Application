<?php
  session_start();
    require_once('./connection.php');
  if(isset($_POST['login'])){
     $email = $_POST['email']; 
     $password = $_POST['password']; 
     $conpassword = $_POST['conpassword']; 
     
     if($email == "" || $password == "" || $conpassword == ""){
         $_SESSION['error'] = "All fields are reqyuired";
         header('location: ../adminLogin.php');
         exit();
     }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid email format";
        header('location: ../adminLogin.php');
        exit();
     }elseif($password !== $conpassword){
         $_SESSION['error'] = "Password mismatch";
         header('location: ../adminLogin.php');
         exit();
     }else{
        // $new_password = md5($password);
       $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
       $result = mysqli_query($conn, $sql);

       if(mysqli_num_rows($result) > 0){
         $row = mysqli_fetch_assoc($result);
         $name = $row['name'];
         session_start();
         $_SESSION['adminId'] = $row['id'];

         if(isset($_SESSION['adminId'])){
            $_SESSION['success'] = "Welcome $name";
           header('location: ../adminPanel.php');
           exit();
         }else{
            //  $error = urlencode("Email or password is incorrect"); 
            $_SESSION['error'] = "email or password is incorrect";
            header('location: ../adminLogin.php');
            exit();
         }
       }else{
         $_SESSION['error'] = "admin not found";
         header('location: ../adminLogin.php');
         exit();
       }
   }
}

 ?>