<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $dbname = " blog";
   $conn = mysqli_connect($host, $username, $password, $dbname);

   if(!$conn){
        echo "Database connection failed";
   }
?>