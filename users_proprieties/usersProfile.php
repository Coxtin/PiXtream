<?php require_once("../config.php"); ?>
<?php include('../includes/sidebar.php'); ?>
<?php include('../includes_signup_login/code_functions.php'); ?>

<link rel="stylesheet" href="../static/css/usersProfile.css">
<div class="profile">
<div class = "profile-picture">
    <div class = "profile-name">
        <p><h3> <?php echo getNameById(); ?></h3></p>
        <p><h3> <?php echo getUsernameById() ?></h3></p>
    </div>
</div>
</div>

