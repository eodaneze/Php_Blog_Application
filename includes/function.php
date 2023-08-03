<?php
 function time_ago($timestamp) {
    $current_time = time();
    $timestamp = strtotime($timestamp); // Convert the input timestamp to Unix timestamp
  
    $time_diff = $current_time - $timestamp;
  
    // Define time intervals in seconds
    $minute = 60;
    $hour = 60 * $minute;
    $day = 24 * $hour;
    $week = 7 * $day;
    $month = 30 * $day;
    $year = 365 * $day;
  
    if ($time_diff < $minute) {
        $time_ago = $time_diff . " seconds ago";
    } elseif ($time_diff < $hour) {
        $time_ago = floor($time_diff / $minute) . " minutes ago";
    } elseif ($time_diff < $day) {
        $time_ago = floor($time_diff / $hour) . " hours ago";
    } elseif ($time_diff < $week) {
        $time_ago = floor($time_diff / $day) . " days ago";
    } elseif ($time_diff < $month) {
        $time_ago = floor($time_diff / $week) . " weeks ago";
    } elseif ($time_diff < $year) {
        $time_ago = floor($time_diff / $month) . " months ago";
    } else {
        $time_ago = floor($time_diff / $year) . " years ago";
    }
  
    return $time_ago;
  }

?>