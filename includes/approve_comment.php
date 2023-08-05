<?php
session_start();
 require_once('./connection.php');
if(isset($_POST['approve'])){
   $post_id = $_POST['post_id'];
   $sql = "SELECT * FROM post_comments WHERE post_id = '$post_id'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($result);
   $name = $row['name'];
   $email = $row['email'];
   $comment = $row['comment'];
   $comment_id = $row['comment_id'];
   $post_id = $row['post_id'];

   $insertSql = "INSERT INTO approved_comments(post_id,comment_id, name, email, comment)VALUES('$post_id','$comment_id', '$name', '$email', '$comment')";
   $result = mysqli_query($conn, $insertSql);
   if($result){
      $_SESSION['success'] = "Comment have been approved successfully";
      header('location: ../viewComments.php');
   }else{
        $_SESSION['error'] = "Error approving comment";
        header('location: ../viewComments.php');
   }
}else{
    $_SESSION['error'] = "An error occured";
    header('location: ../viewComments.php');
}

?>