<<<<<<< HEAD
<?php require_once("../config.php"); ?>
<?php include("../includes_signup_login/code_functions.php");?>
<?php checkIfUserIsConnected(); ?>

<?php include("../includes/sidebar.php") ?>
=======
<?php include("../includes/sidebar.php") ?>
<?php include("../config.php"); ?>
<link rel="stylesheet" href="../static/css/addAPost.css">

<div class = "container">
    <form action="../includes_signup_login/imageProprieties.php" method="POST">
    <input type="file" name = "image" enctype = "multipart/form-data"> <br>
    <input type="submit" name = "submit" value="Upload">
    </form>
</div>
>>>>>>> ae462c348e1366d7a8d922629a0ed8202169eb70
