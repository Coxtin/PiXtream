<?php require_once("../config.php"); ?>
<?php include('../includes/sidebar.php'); ?>
<?php include('../includes_signup_login/code_functions.php'); ?>
<?php checkIfUserIsConnected(); ?>

<link rel="stylesheet" href="../static/css/usersProfile.css">
<div class="profile">
<div class = "profile-picture">
    <div class = "profile-name">
        <p id = "name"><h3> Name: <?php echo getNameById(); ?></h3></p>
        <p id = "username"><h3> Username: <?php echo getUsernameById() ?></h3></p>
    </div>
    <form action="content.php" method = "GET">
    <input type="textarea" name = "content" placeholder = "enter some content">
    <button type = "submit" name = "submit">Submit content</button>
    <button type = "submit" name = "delete">Delete content</button>
    </form>
    <div class = "content">
        <p><?php echo getContentById(); ?></p>
    </div>
</div>




</div>

