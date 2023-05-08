<?php

    require_once("../config.php");
    include("code_functions.php");

    if(isset($_POST['like'])){
        $userId = $_SESSION['usersId'];
        $sql = "SELECT postId FROM posts WHERE postId"
        echo $userId;
        echo $postId;
    }