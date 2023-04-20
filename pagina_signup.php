<?php require("config.php"); ?>
    <link rel="stylesheet" href="static/sign_up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
        <section class = "signup-form-form">
            <h2>Sign up</h2>
            <div class="signup-form">
                <p>Sign in to see videos and photos from friends</p>
                <form action="includes_signup_login/code_signup.php" method = "POST">
                    <input type="text" name="firstname" placeholder="Introduceti numele dvs." title = "Nume"> <br>
                    <input type="text" name="lastname" placeholder="Introduceti prenumele dvs." title = "Prenume" > <br>
                    <input type="text" name="username" placeholder="Introduceti un username" title = "Username"> <br>
                    <div>
                        <input type="radio" id = "masc" name="gender" value = "Masculin">
                        <label for="masc">Masculin</label>
                        <input type="radio" id = "fem" name="gender" value ="Feminin">
                        <label for="fem">Feminin</label>
                    </div> 
                    <br>  
                    <input type="tel" name="phone" placeholder="Introduceti un nr. de telefon" title = "Telefon"> <br>
                    <input type="date" name = "birthday" title ="Introduceti-va ziua de nastere"> <br>
                    <input type="email" name="email" placeholder="Introduceti un email" title="Email"> <br>
                    <input type="password" name="pwd1" placeholder="Introduceti o parola"> <br>
                    <input type="password" name="pwd2" placeholder="Reintroduceti parola"> <br>
                    <button type="submit" name="submit" >Trimite</button>
                </form>
            </div>
            <?php 
        if(isset($_GET['error'])){
            if ($_GET['error'] == "emptyInput"){
                echo "<p>Fill in all fields</p>";
            }
            elseif($_GET['error'] == "invalidAge"){
                echo "<p>Your age is too young</p>";
            }
            elseif($_GET['error'] == "invalidUsername"){
                echo "<p>Choose a proper username!</p>";
            }
            elseif($_GET['error'] == "invalidEmail"){
                echo "<p>Choose a proper email</p>";
            }
            elseif($_GET['error'] == "pwdDoesNotMatch"){
                echo "<p>The 2 passwords does not match</p>";
            }
            elseif($_GET['error'] == "pwdLenghtTooShort"){
                echo "<p>Password needs at least 8 characters</p>";
            }
            elseif($_GET['error'] == "pwdSpecialCharactersNeeded"){
                echo "<p>Password needs at least one special character</p>";
            }
            elseif($_GET['error'] == "pwdCapsCharactersNeeded"){
                echo "<p>Password needs at least one capital letter</p>";
            }
            elseif($_GET['error'] == "pwdNumberNeeded"){
                echo "<p>Password needs at least one number</p>";
            }
            elseif($_GET['error'] == "usernameTaken"){
                echo "<p>Username already taken</p>";
            }
            elseif($_GET['error'] == "stmtfailed1" || $_GET['error'] == "stmtfailed2"){
                echo "<p>Something went wrong.Try again</p>";
            }
            elseif($_GET['error'] == "none"){
                echo "You signed up!";
            }
        }
    ?>
        </section>
<?php include("includes/footer.php");?>