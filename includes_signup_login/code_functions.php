<?php

    global $conn;

function emptyInputSignup($firstname, $lastname, $username, $gender, $phone, $birthday, $email, $pwd1, $pwd2) {
    if (empty($firstname) || empty($lastname) || empty($username) || empty($gender) || empty($phone) || empty($birthday) || empty($email) || empty($pwd1) || empty($pwd2)){
        $result = true;        
    }
    else {
        $result = false;
    }
    return $result;
}
function userAge($birthday){
    $birthday_date = new datetime($birthday);
    $today = new datetime();
    $age = $today->diff($birthday_date)->y;
    if ($age < 11) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
/*function invalidUsername($username) {
    if (!preg_match("/^[a-zA-Z]*$/", $username)){
        $result = true;        
    }
    else {
        $result = false;
    }
    return $result;
}*/
function invalidEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;        
    }
    else {
        $result = false;
    }
    return $result;
}
function pwdDoesNotMatch($pwd1, $pwd2) {
    if ($pwd1 !== $pwd2){
        $result = true;        
    }
    else {
        $result = false;
    }
    return $result;
}
function pwdLenght($pwd1){
    if(strlen($pwd1) < 8){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdSpecialCharacters($pwd1){
    if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pwd1)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdCapsCharactes($pwd1){
    if (!preg_match('/[A-Z]/', $pwd1)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function pwdNumbers($pwd1){
    if(!preg_match('/\d/', $pwd1)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function usernameTaken($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location:../signup.php?error=stmtfailed1');
        exit();
    }
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else{
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt); 
}
function createAccount($conn, $firstname, $lastname, $username, $email, $birthday, $gender, $phone, $pwd1) {
    $sql = "INSERT INTO users(usersFirstName, usersLastName, usersUsername, usersEmail, usersBirthday, usersGender, usersPhone, usersPwd) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header('location:../signup.php?error=stmtfailed2');
        exit();
    }

        $hashedPwd = password_hash($pwd1, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $lastname, $username, $email, $birthday, $gender, $phone, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);  
        header('location:../signup.php?error=none');
        exit();
}

function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)){
        $result = true;        
    }
    else {
        $result = false;
    }
    return $result;
}

    function loginUser($conn, $username, $pwd) {
        $usernameExists = usernameTaken($conn, $username, $username);

        if($usernameExists == false){
            header('location:../login.php?error=wrongLogin');
            exit();
        }

        $pwdhashed = $usernameExists['usersPwd'];
        $checkPwd = password_verify($pwd, $pwdhashed);

        if($checkPwd == false){
            header('location:../login.php?error=wrongLogin');
            exit();
        }
        elseif ($checkPwd == true){
            session_start();
            $_SESSION["usersId"] = $usernameExists['usersId'];
            $_SESSION["usersUsername"] = $usernameExists['usersUsername'];
            header('location:../users_proprieties/wall.php');
            exit();
        }
    }

    function getPublishedPosts(){
        global $conn;
        $sql = "SELECT* FROM posts WHERE published = true";
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $posts;
    }

    function getNameById(){
        global $conn;
        $sql = "SELECT usersFirstName, usersLastName FROM users WHERE usersId = {$_SESSION['usersId']};";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['usersFirstName'] . ' ' . $row['usersLastName'];
    }
    function getUsernameById(){
        global $conn;
        $sql = "SELECT usersUsername FROM users WHERE usersId = {$_SESSION['usersId']};";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['usersUsername'];
    }
    function getContentById(){
        global $conn;
        $sql = "SELECT usersDescription FROM users WHERE usersId = {$_SESSION['usersId']};";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
            if(empty($row['usersDescription'])){
                echo "Enter a description about yourself";
            }
            else{
                print_r($row['usersDescription']);
            }
            }
        }
<<<<<<< HEAD
        function checkIfUserIsConnected(){ 

            if(!isset($_SESSION['usersId'])){
            header('location:../index.php');
  }
        }
=======
    function changeImageExtentionToPNG(){

    }
>>>>>>> ae462c348e1366d7a8d922629a0ed8202169eb70
       
?>