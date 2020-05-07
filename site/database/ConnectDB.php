<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'root';

$conn = mysqli_connect($serverName, $userName, $password);
if (!$conn) {
    die('Connection failed: '.mysqli_connect_error());
}
