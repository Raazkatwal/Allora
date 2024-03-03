<?php
    session_start();
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'allora';
    $con = mysqli_connect($server, $username, $password, $dbname);
?>