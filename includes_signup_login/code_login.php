<?php 

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    require_once('../config.php');
    require_once('code_functions.php');

    if(emptyInputLogin($username, $pwd) !== false){
        header('location:../login.php?error=emptyInput');
        exit();
    } 

    loginUser($conn, $username, $pwd);
}
else{
    header('location:../login.php');
    exit();
}