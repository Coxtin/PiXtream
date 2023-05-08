<?php require_once("../config.php"); ?>
<?php include("../includes_signup_login/code_functions.php");?>
<?php checkIfUserIsConnected(); ?>

<?php include("../includes/sidebar.php") ?>
<link rel="stylesheet" href="../static/css/addAPost.css">

<div class = "container">
    <form action="../includes_signup_login/postsFunctions.php" method="POST" enctype = "multipart/form-data">
    <input type="text" name = "title" placeholder = "Enter a title"><br>
    <input type="textarea" name = "content" placeholder = "Enter some content">
    <input type="file" name = "image"> <br>
    <input type="submit" name = "submit" value="Upload">
    </form>

    <?php 
        if(isset($_GET['error'])){
            if($_GET['error'] == "fileAlreadyExists"){
                echo '<p id = "error">File already exists!</p>';
            }
            elseif($_GET['error'] == "invalidFileFormat"){
                echo '<p id = "error">Invalid image format. Please upload a JPG, PNG, or GIF file</p>';
            }
            elseif($_GET['error'] == "somethingWentWrong"){
                echo '<p id = "error">Connection failed!</p>';
                exit();
            }
            elseif($_GET['error'] == "errorMovingFiles"){
                echo '<p id = "error">Something went wrong uploading the files!</p>';
                exit();
            }
            elseif($_GET['error'] == "titleAndContentNeeded"){
                echo '<p id = "error">You need to have a title and content for your post!</p>';
                exit();
            }
            elseif($_GET['error'] == "none"){
                echo '<p id = "succes">Post Created!</p>';
                exit();
            }
        }
    
    ?>

</div>
