<?php include("../includes/sidebar.php"); ?>
<link rel="stylesheet" href="../static/css/editAccount.css">

   <div class="editAccount"> 
    
    <h3>Change your profile picture:</h3>
    <form action="../includes_signup_login/editAccountFunctions.php" method = "POST" enctype = "multipart/form-data">
        <input type="file" name = "profile-picture"> <br>
        <button type="submit" name="submit-profile-picture">Select picture</button> 
    </form>
   
    <hr>
    <h3>Change your description:</h3>
    <form action="../includes_signup_login/editAccountFunctions.php" method = "POST">
    <input type="textarea" name = "content" placeholder = "enter some content"> <br>
    <button type = "submit" name = "submit-content">Submit content</button> <br>
    <button type = "submit" name = "delete-content">Delete content</button>
    </form>
    
    </div>

