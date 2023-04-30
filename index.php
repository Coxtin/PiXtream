<?php require("config.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes_signup_login/code_functions.php"); ?>
<link rel="stylesheet" href="static/css/index.css">

    <?php 
     if(isset($_SESSION['userUsername'])){
        header('location:users_proprieties/wall.php');
    }
    ?>
    <div class="title-container">
    <h1 class = "title">PiXtreme</h1>
    <br>
    <a href="login.php"> Logheaza-te </a>
    <br>
    <a href="signup.php"> Inregistreaza-te </a>
    </div>
    



    