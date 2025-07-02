<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM employee WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: users.php");
?>