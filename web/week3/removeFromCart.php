<?php 
    session_start();
    $index = $_GET['index'];
    $_SESSION['quantity'][$index] = 0;
    $_POST['places'][$index] = 0;
?>