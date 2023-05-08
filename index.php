<?php require("config.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes_signup_login/code_functions.php"); ?>
<link rel="stylesheet" href="static/css/index.css">

    <?php 
     if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['usersId'])){
        header('location:users_proprieties/wall.php');
    }
    ?>
    <div class="title-container">
    <h1 class = "title">PiXtreme</h1>
    <br>
    <a href="login.php"> Log in </a>
    <br>
    <a href="signup.php"> Sign in </a>
    </div>
    



    