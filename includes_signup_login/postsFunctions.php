<?php
    require_once("../config.php");
    include("../includes_signup_login/code_functions.php");

    global $conn;

    if(isset($_POST['submit'])){
        if(!empty($_FILES['image']['name'])){
            if(checkImagesExtension($_FILES['image'])){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $file_name = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            $new_file_name = getUsernameById(). '_'. md5_file($file_tmp). '.' .$file_ext;
            $file_dest = "../static/images/".$new_file_name;
            $sql = "SELECT postImage FROM posts WHERE postImage = '$new_file_name'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows> 0){
                header('location:../users_proprieties/addAPost.php?error=fileAlreadyExists');
                exit();
                } 
            else {
                if(move_uploaded_file($file_tmp, $file_dest)){
                    $usersId = $_SESSION['usersId'];
                    $sql = "INSERT INTO posts (usersPostId, title, postImage, content, published, createdAT) VALUES('$usersId', '$title', '$new_file_name','$content','1',NOW());";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        header('location:../users_proprieties/addAPost.php?error=none');
                        exit();
                    }
                    else {
                        header('location:../users_proprieties/addAPost.php?error=somethingWentWrong');
                        exit();
                    }
                } 
            else {
                header('location:../users_proprieties/addAPost.php?error=errorMovingFiles');
                exit();
            }
        }
    } 
    else{
       header('location:../users_proprieties/addAPost.php?error=invalidFileFormat');
       exit();
    }
  }

    elseif(empty($_POST['title']) || empty($_POST['content'])){
            header('location:../users_proprieties/addAPost.php?error=titleAndContentNeeded');
    }
    else{
        $title = $_POST['title'];
        $content = $_POST['content'];
        $usersId = $_SESSION['usersId'];
        $sql =  "INSERT INTO posts (usersPostId, title, content, published, createdAT) VALUES('$usersId', '$title' ,'$content','1',NOW());";
        mysqli_query($conn, $sql);
        header('location:../users_proprieties/addAPost.php?error=none');
        exit();
    }
}