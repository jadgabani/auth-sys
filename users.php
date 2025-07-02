<?php include 'db.php'; ?>
<?php include 'navbar.php'; ?>
<h1>Users</h1>
<h3>Add new user</h3>
<a href="addUser.php">Add User</a>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM employee";
$result = $conn->query($sql);
if($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        // $users[] = $row;
        echo "<tr>
        <td>{$row['ID']}</td>
        <td>{$row['FirstName']}</td>
        <td>{$row['LastName']}</td>
        <td>{$row['Email']}</td>
        <td>{$row['Gender']}</td>
        <td>
            <a href='edit.php?id={$row['ID']}'>Edit</a> |
            <a href='delete.php?id={$row['ID']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
        </td>
    </tr><br>";

    }
} else {
    echo "<p>No users found.</p>";
} ?>
