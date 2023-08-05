<?php
  $email = "ezeali@gmail.com";
  $getFirst = explode('@', $email);
  print_r($getFirst);
  $getIt = $getFirst[0];

  $firstLetter = mb_substr($getIt, 0,1, "UTF-8");
  echo $firstLetter;
?>