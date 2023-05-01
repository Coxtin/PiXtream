<?php
require_once('../config.php');
global $conn;


    if(isset($_GET['submit'])){
        $content = $_GET['content'];
        $sql = "UPDATE users SET usersDescription = '$content' WHERE usersId = {$_SESSION['usersId']};";
        if (mysqli_query($conn, $sql)) {
           header('location:usersProfile.php');
        } 
    }

    if(isset($_GET['delete'])){
        $sql = "UPDATE users SET usersDescription = '' WHERE usersId ={$_SESSION['usersId']} ";
if (mysqli_query($conn, $sql)) {
    header('location:usersProfile.php');
        }
    }