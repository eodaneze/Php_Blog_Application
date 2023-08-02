<?php
session_start();
require_once('./connection.php');
  if(isset($_POST['register'])){
     $name = $_POST['name']; 
     $email = $_POST['email']; 
     $password = $_POST['password']; 
   

     

     $sql2 = "SELECT * FROM admin WHERE email = '$email'";
     $result2 = mysqli_query($conn, $sql2);
     
     if($name == "" || $email == "" ||  $password == ""){
         $_SESSION['error'] = "All Fields are required"; 
         header('location: ../adminRegister.php');
         exit();
     }
     elseif(mysqli_num_rows($result2) > 0){
        $_SESSION['error'] = "Email already exist"; 
         header('location: ../adminRegister.php');
         exit();
     }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['error'] = "Invalid email format"; 
        header('location: ../adminRegister.php');
        exit();
     }else{
         if($_FILES['file']['name'] != ''){
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $fileext = explode('.', $filename);
            $fileactualext = strtolower(end($fileext));

            $allow = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($fileactualext, $allow)){
                if($filesize < 8000000){
                    $pic = uniqid('',true).'.'.$fileactualext;
                    $filedestination = 'admindp/'.$pic;

                    if(move_uploaded_file($filetmp, $filedestination)){
                         $sql = "INSERT INTO admin(name, email, password, pic)VALUES('$name', '$email',  '$password', '$pic')";
                          $result = mysqli_query($conn, $sql);
                          if($result){
                            $_SESSION['success'] = "Your Registration was successful!!"; 
                            header('location: ../adminLogin.php');
                            exit();
                           }else{
                                $_SESSION['error'] = "Error creating admin";
                               header('location: ../adminRegister.php');
                                 exit();
                           }
                    }else{
                        $_SESSION['error'] = "Error uploading picture"; 
                        header('location: ../adminRegister.php');
                        exit();
                    }
                }else{
                    $_SESSION['error'] = "unsupported file format"; 
                    header('location: ../adminRegister.php');
                     exit();
                }
            }else{
                $_SESSION['error'] = "Please upload a picture"; 
                header('location: ../adminRegister.php?error='.$error);
                exit();
            }
         }
     }
}

?>




