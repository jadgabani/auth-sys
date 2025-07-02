<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<h2>Welcome to the Dashboard</h2>
<p>You are now logged in.</p>
<a href="logout.php">Logout</a>
