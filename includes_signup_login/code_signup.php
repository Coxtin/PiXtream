<?php
    if(isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $birthday = $_POST['birthday'];
        $email = $_POST['email'];
        $pwd1 = $_POST['pwd1'];
        $pwd2 = $_POST['pwd2'];

    require_once ('../config.php');
    require_once ('code_functions.php');

    if(emptyInputSignup($firstname, $lastname, $username, $gender, $phone, $birthday, $email, $pwd1, $pwd2) !== false){
        header('location:../signup.php?error=emptyInput');
        exit();
    }

    if(userAge($birthday) !== false){
        header('location:../signup.php?error=invalidAge');
        exit();
    }

    /*if(invalidUsername($username) !== false){
        header('location:../signup.php?error=invalidUsername');
        exit();
    }*/

    if(invalidEmail($email) !== false){
        header('location:../signup.php?error=invalidEmail');
        exit();
    }

    if(pwdDoesNotMatch($pwd1, $pwd2) !== false){
        header('location:../signup.php?error=pwdDoesNotMatch');
        exit();
    }

    if(pwdLenght($pwd1) !== false){
        header('location:../signup.php?error=pwdLenghtTooShort');
        exit();
    }

    if(pwdSpecialCharacters($pwd1) !== false){
        header('location:../signup.php?error=pwdSpecialCharatersNeeded');
        exit();
    }

    if(pwdCapsCharactes($pwd1) !== false){
        header('location:../signup.php?error=pwdCapsCharactersNeeded');
        exit();
    }

    if(pwdNumbers($pwd1) !== false){
        header('location:../signup.php?error=pwdNumbersNeeded');
        exit();
    }

    if(usernameTaken($conn, $username, $email) !== false){
        header('location:../signup.php?error=usernameTaken');
        exit();
    }

    createAccount($conn, $firstname, $lastname, $username, $email, $birthday, $gender, $phone, $pwd1);
    }
    else{
        header("location: ../signup.php");
        exit();
    }
