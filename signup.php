<?php require("config.php"); ?>
    <link rel="stylesheet" href="static/css/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <section class = "signup-form-form">
            <h2>PiXstreme</h2>
            <div class="signup-form">
                <h3>Sign up</h3><br>
                <p>Sign in to see videos and photos from friends</p>
                <form action="includes_signup_login/code_signup.php" method = "POST">
                    <input type="text" name="firstname" placeholder="First name." title = "First Name"> <br>
                    <input type="text" name="lastname" placeholder="Last name." title = "Last Name" > <br>
                    <input type="text" name="username" placeholder="Username" title = "Username"> <br>
                    <div>
                        <input type="radio" id = "masc" name="gender" value = "Male">
                        <label for="masc">Male</label>
                        <input type="radio" id = "fem" name="gender" value ="Female">
                        <label for="fem">Female</label>
                    </div> 
                    <br>  
                    <input type="tel" name="phone" placeholder="Phone number" title = "Phone"> <br>
                        <h3>Enter your birthday</h3>
                    <input type="date" name = "birthday"><br>
                    <input type="email" name="email" placeholder="Email" title="Email"> <br>
                    <input type="password" name="pwd1" placeholder="Password"> <br>
                    <input type="password" name="pwd2" placeholder="Repeat password"> <br>
                    <button type="submit" name="submit" >Submit</button>
                </form>
            </div>
            <?php 
        if(isset($_GET['error'])){
            if ($_GET['error'] == "emptyInput"){
                echo "<p id='error'>Fill in all fields</p>";
            }
            elseif($_GET['error'] == "invalidAge"){
                echo "<p id='error'>Your age is too young</p>";
            }
            elseif($_GET['error'] == "invalidUsername"){
                echo "<p id='error'>Choose a proper username!</p>";
            }
            elseif($_GET['error'] == "invalidEmail"){
                echo "<p id='error'>Choose a proper email</p>";
            }
            elseif($_GET['error'] == "pwdDoesNotMatch"){
                echo "<p id='error'>The 2 passwords does not match</p>";
            }
            elseif($_GET['error'] == "pwdLenghtTooShort"){
                echo "<p id='error'>Password needs at least 8 characters</p>";
            }
            elseif($_GET['error'] == "pwdSpecialCharactersNeeded"){
                echo "<p id='error'>Password needs at least one special character</p>";
            }
            elseif($_GET['error'] == "pwdCapsCharactersNeeded"){
                echo "<p id='error'>Password needs at least one capital letter</p>";
            }
            elseif($_GET['error'] == "pwdNumberNeeded"){
                echo "<p id='error'>Password needs at least one number</p>";
            }
            elseif($_GET['error'] == "usernameTaken"){
                echo "<p id='error'>Username already taken</p>";
            }
            elseif($_GET['error'] == "stmtfailed1" || $_GET['error'] == "stmtfailed2"){
                echo "<p id='error'>Something went wrong.Try again</p>";
            }
            elseif($_GET['error'] == "none"){
                header('location:includes_signup_login/signup_confirmation.php');
            }
        }
    ?>
        </section>
<?php include("includes/footer.php");?>