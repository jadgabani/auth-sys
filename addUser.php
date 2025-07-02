<?php include("db.php"); ?>
<?php include("navbar.php"); ?> 
<h1>Add User</h1>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: users.php");
    exit();
}?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO employee (FirstName,LastName, Email, Gender, Password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $lastname, $email, $gender, $password);

    if ($stmt->execute()) {
        echo "Added successfully!";
        header("Location: users.php");
    } else {
        echo "Error: " . $conn->error;
    }
    $stmt->close();
}
?>

<form method="post">
    <label>First name:</label><input type="text" name="firstname" required><br>
    <label>Last name:</label><input type="text" name="lastname" required><br>
    <label>Email:</label><input type="email" name="email" required><br>
    <label>Gender:</label><input type="text" name="gender" required><br>
    <label>Password:</label><input type="password" name="password" required><br>
    <button type="submit">Submit</button>
</form>