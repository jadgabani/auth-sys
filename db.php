<?php

$user = 'root';
$pass = 'FalseTrue';
$host = 'localhost';
$dbname = 'employees';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>