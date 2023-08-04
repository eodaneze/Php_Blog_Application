<?php
session_start();
require_once('./connection.php');
if(isset($_POST['update'])){
    $title = isset($_POST['title']) ? trim($_POST['title']) : "";
    $category = isset($_POST['category']) ? trim($_POST['category']) : "";
    $tags = isset($_POST['tags']) ? trim($_POST['tags']) : "";
    $details = isset($_POST['details']) ? trim($_POST['details']) : "";
     $photo =  $_POST['photo'];
     $post_id =  $_POST['post_id'];
     
     if($title == "" || $category == "" || $tags == "" || $details == ""){
        $_SESSION['error'] = "All Fields are required";
        header('location:../editBlog.php?id='.$post_id);
        
 
    }else{
        if($_FILES['file']['name'] != ''){
            $filename = $_FILES['file']['name'];
            $filetmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
            $filetype = $_FILES['file']['type'];
            $fileext = explode('.', $filename);
            $fileactualexe = strtolower(end($fileext));
            
            $allow = array('jpg', 'jpeg', 'png', 'gif');
            if(in_array($fileactualexe, $allow)){
                if($filesize < 8000000){
                   $pic = uniqid('', true).'.'.$fileactualexe;
                   $filedestination = 'blogImg/'.$pic;
                   if(move_uploaded_file($filetmp, $filedestination)){
                      $sql = "UPDATE `posts` SET `title`='$title',`category`='$category',`tags`='$tags',`blog_image`='$pic',`details`='$details' WHERE `post_id` = '$post_id'";
                         $result = mysqli_query($conn, $sql);
                         if($result){
                             unlink('blogImg/'.$photo);
                             $_SESSION['success'] = "Blog have been updated succesfully";
                            header('location:../editBlog.php?id='.$post_id);
                            exit();
                            }else{
                                $_SESSION['error'] = "Error updating blog";
                            header('location:../editBlog.php?id='.$post_id);
                                exit();
                            }
                   }else{
                    $_SESSION['error'] = "Failed to upload blog image";
                    header('location:../editBlog.php?id='.$post_id);
                    exit();
                   }
                   
                }else{
                    $_SESSION['error'] = "blog image is too large";
                    header('location:../editBlog.php?id='.$post_id);
                   exit();
                }
                
            }else{
                $_SESSION['error'] = "Unsupported file format";
                header('location:../editBlog.php?id='.$post_id);
             exit();
            }
        }else{
            $sql = "UPDATE `posts` SET `title`='$title',`category`='$category',`tags`='$tags',`details`='$details' WHERE `post_id` = '$post_id'";
             $result = mysqli_query($conn, $sql);
             if($result){
                $_SESSION['success'] = "Blog updated successfully";
                header('location:../editBlog.php?id='.$post_id);
                exit(); 
             }else{
                 
                $_SESSION['error'] = "error updating blog";
                header('location:../editBlog.php?id='.$post_id);
                 exit(); 
             }
        }
    }
}

?>