<?php

$servername = 'localhost';
$username = 'root';
$password = 'root';
$conn;

function connectDatabase()
{
    global $conn, $servername, $username, $password;
    try {
        if (empty($conn)) {
            $conn = new PDO("mysql:host=$servername;dbname=blog", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    } catch (PDOException $e) {
        echo 'Connection failed: '.$e->getMessage();
    }
}

function disconnectDatabase()
{
    global $conn;
    if (!empty($conn)) {
        $conn = null;
    }
}
