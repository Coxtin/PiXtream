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
    <div class = "content">
        <p><?php echo getContentById(); ?></p>
    </div>
</div>
</div>

