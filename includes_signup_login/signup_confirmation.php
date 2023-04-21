<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te-ai inregistrat cu succes</title>
</head>
<body>
        <div class = "countdown">
        <h2>You signed up</h2>
        <br>
        <p>You will be redirected to the login page <span id="countdown">5 seconds</span></p>
        </div>
        <?php
            $redirect_url = '../pagina_login.php';
            $countdown_time = 5;
            echo '<script>setTimeout(function(){ window.location.href = "' . $redirect_url . '"; }, ' . ($countdown_time * 1000) . ');</script>';
	    ?>
</body>
</html>