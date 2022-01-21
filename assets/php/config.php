<?php

$nameDB = 'teste-php';
$host = 'localhost';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:dbname=$nameDB;host=$host", $username, $password);

?>