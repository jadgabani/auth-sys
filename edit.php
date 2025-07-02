<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}?><?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $stmt = $conn->prepare("UPDATE employee SET FirstName=?, LastName=?, Email=?, Gender=? WHERE ID=?");
    $stmt->bind_param("ssssi", $first, $last, $email, $gender, $id);
    $stmt->execute();
    header("Location: users.php");
}

$result = $conn->query("SELECT * FROM employee WHERE ID = $id");
$row = $result->fetch_assoc();
?>

<h2>Edit User</h2>
<form method="post">
    First Name: <input name="first" value="<?= $row['FirstName'] ?>" required><br><br>
    Last Name: <input name="last" value="<?= $row['LastName'] ?>" required><br><br>
    Email: <input type="email" name="email" value="<?= $row['Email'] ?>" required><br><br>
    Gender: <input name="gender" value="<?= $row['Gender'] ?>" required><br><br>
<br><br>
    <button type="submit">Update</button>
</form>