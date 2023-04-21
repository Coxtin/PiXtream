<?php include("includes/header.php"); ?> 
<section class = "login-form">
    <h2>Log in</h2>
    <div class = "login-form-form">
        <form action="includes_signup_login/code_login.php" method = "POST">
            <input type="text" name = "username" placeholder = "Email/Username"> <br>
            <input type="password" name = "pwd" placeholder = "Password"> <br>
            <button type = "submit" name = "submit">Log in</button>
        </form>    
    </div>
    <?php
         if(isset($_GET['error'])){
            if ($_GET['error'] == "emptyInput"){
                echo "<p>Fill in all fields</p>";
            }
            elseif($_GET['error'] == "wrongLogin"){
                echo "<p>Incorrect login information</p>";
            }
        }
    ?>
</section>

<?php include("includes/footer.php"); ?>