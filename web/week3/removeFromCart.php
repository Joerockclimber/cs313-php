<?php 
    session_start();
    $index = $_GET['index'];
    $_SESSION['quantity'][$index] = 0;
    $_SESSION['new'][0] = 1;
?>