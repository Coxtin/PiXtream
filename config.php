<?php
    session_start();
    $conn = mysqli_connect("localhost","root","mysql","fake_insta");
    if(!$conn){
        die("Eroare la conectare" .mysqli_connect_error());
    }

    define('ROOT_PATH' , realpath(__FILE__));
    define('BASE_URL', 'http://localhost/atestat_costin');
?>