<?php
require_once('../config.php');
include("code_functions.php");

global $conn;

    if(isset($_POST['submit-profile-picture'])){
        if(!empty($_FILES['profile-picture']['name'])){
            if(checkImagesExtension($_FILES['profile-picture'])){
                $file_name = $_FILES['profile-picture']['name'];
                $file_tmp = $_FILES['profile-picture']['tmp_name'];
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $new_file_name = $_SESSION['usersId']. '.' .$file_ext;
                $file_dest = "../static/images/profile-pictures/".$new_file_name;
                move_uploaded_file($file_tmp, $file_dest); 
                header('location:../users_proprieties/usersProfile.php?error=none'); 
            }
            else{
                header('location:../users_proprieties/editAccount.php?error=InvalidFileFormat');
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