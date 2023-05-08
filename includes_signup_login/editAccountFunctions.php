<?php
require_once('../config.php');
include("code_functions.php");

global $conn;

    if(isset($_POST['submit-profile-picture'])){
        if(!empty($_FILES['profile-picture']['name'])){
            if(checkImagesExtension($_FILES['profile-picture'])){
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new_file_name = getUsernameById(). '_'. md5_file($file_tmp). '.' .$file_ext;
                $file_dest = "../static/images/".$new_file_name;
            }
            else{
                echo "wrong format"; 
            }
        }
        else{
            header('location:../users_proprieties/editAccount.php?error=SelectAPictureFirst');
        }
    }

    if(isset($_POST['submit-content'])){
        $content = $_POST['content'];
        $sql = "UPDATE users SET usersDescription = '$content' WHERE usersId = {$_SESSION['usersId']};";
        if (mysqli_query($conn, $sql)) {
           header('location:../users_proprieties/usersProfile.php');
        } 
    }

    if(isset($_POST['delete-content'])){
        $sql = "UPDATE users SET usersDescription = '' WHERE usersId ={$_SESSION['usersId']} ";
        if (mysqli_query($conn, $sql)) {
            header('location:../users_proprieties/usersProfile.php');
        }
    }