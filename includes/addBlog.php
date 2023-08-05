<?php 
session_start();
require_once("./connection.php");
 if(isset($_POST['add'])){
    $author = isset($_POST['author']) ? trim($_POST['author']) : "";
    $title = isset($_POST['title']) ? trim($_POST['title']) : "";
    $cat = isset($_POST['cat']) ? trim($_POST['cat']) : "";
    $tags = isset($_POST['tags']) ? trim($_POST['tags']) : "";
    $details = isset($_POST['details']) ? trim($_POST['details']) : "";

    $content = mysqli_real_escape_string($conn, $details);

    
    
    
     
     if($title == "" || $cat == "" || $tags == "" || $details == ""){
        // echo "all fields are required";
        // die();
        $_SESSION['error'] = "All Fields are required"; 
         header('location:../addBlog.php');
         exit();
     }else{
        $author = trimData($author);
        $title = trimData($title);
        $cat = trimData($cat);
        $tags = trimData($tags);
        $details = trimData($details);
     }

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
                $filedestination = 'blogImg/'.$pic;

                if(move_uploaded_file($filetmp, $filedestination)){
                    $md = date('Y-m-d H:i:s');
                   
                    $sql = "INSERT INTO  posts(author, title, category, tags, blog_image, details)VALUES('$author', '$title', '$cat', '$tags','$pic', '$content ')";

                    $result = mysqli_query($conn, $sql);
                    if($result){
                        $_SESSION['success'] = "New Post have ben added successfully";
                        header("location: ../addBlog.php");
                        return false;
                    }else{
                        $_SESSION['error'] = "error creating post";
						header("location: ../addBlog.php");
						return false;
                    }
                }else{
                    $_SESSION['error'] = "error uploading post image";
                    header("location: ../addBlog.php");
                    return false;
                }
        }else{
            $_SESSION['error'] = "File is too large";
            header("location: ../addBlog.php");
			return false;
        }
     }else{
        $_SESSION['error'] = "Unsupported file format";
        header("location: ../addBlog.php");
        return false;
     }
 }else{
    $_SESSION['error'] = "Please Upload an image";
    header("location: ../addBlog.php");
    return false;
 }
 }else{
    $_SESSION['error'] = "Please login first";
    header("location: ../index.php");
    return false;
 }
 
 function trimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripcslashes($data);

    return $data;
}

?>