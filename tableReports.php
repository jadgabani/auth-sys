<?php include 'navbar.php'; ?>
<h1>Table Reports</h1>

<?php include 'db.php'; ?>
<h2>Employee Table Report</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th><th>First</th><th>Last</th><th>Email</th><th>Gender</th>
    </tr>
<?php
$result = $conn->query("SELECT ID, FirstName, LastName, Email, Gender FROM employee");
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['ID']}</td>
        <td>{$row['FirstName']}</td>
        <td>{$row['LastName']}</td>
        <td>{$row['Email']}</td>
        <td>{$row['Gender']}</td>
    </tr>";
}
?>
</table>
