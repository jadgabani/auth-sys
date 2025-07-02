<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO employee (FirstName,LastName, Email, Gender, Username, Password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $gender, $username, $password);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.php'>Login now</a>";
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
    <label>Gender:</label><input type="text" name="text" required><br>
    <label>Username:</label><input type="text" name="username" required><br>
    <label>Password:</label><input type="password" name="password" required><br>
    <button type="submit">Submit</button>
</form>