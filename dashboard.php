<?php include 'db.php'; ?>
<?php include 'import.php'; ?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT FirstName FROM employee WHERE id = ?");
$stmt->bind_param("i", $user_id); 
$stmt->execute();
$stmt->bind_result($firstname);
$stmt->fetch();  
$stmt->close();
?>
<?php include 'navbar.php'; ?>
<h2>Welcome to the Dashboard</h2>
<p>You are now logged in. <?php echo $firstname ?></p>


<h3>Import csv file</h3>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".csv" required>
    <button type="submit" name="import">Import CSV</button>
</form>

