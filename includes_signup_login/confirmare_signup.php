<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Te-ai inregistrat cu succes</title>
</head>
<body>
        <div class = "inregistrarecountdown">
        <h2>Te-ai inregistrat cu succes</h2>
        <br>
        <p>Vei fi redirectionat catre pagina de login in <span id="countdown">5 secunde</span></p>
        </div>
        <?php
            $redirect_url = 'pagina_login.php';
            $countdown_time = 5;
            echo '<script>setTimeout(function(){ window.location.href = "' . $redirect_url . '"; }, ' . ($countdown_time * 1000) . ');</script>';
	    ?>
</body>
</html>