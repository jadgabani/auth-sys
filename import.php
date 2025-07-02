<?php
include 'db.php';

if (isset($_POST['import'])) {
    $file = $_FILES['file']['tmp_name'];
    if (($handle = fopen($file, 'r')) !== FALSE) {
        fgetcsv($handle); 
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
            $id = $data[0];
            $first = $data[1];
            $last = $data[2];
            $email = $data[3];
            $gender = $data[4];
            $password = password_hash($data[5], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (ID, FirstName, LastName, Email, Gender, Password) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE FirstName=VALUES(FirstName), LastName=VALUES(LastName), Email=VALUES(Email), Gender=VALUES(Gender), Password=VALUES(Password)");
            $stmt->bind_param("isssss", $id, $first, $last, $email, $gender, $password);
            $stmt->execute();
        }
        fclose($handle);
        echo "Import successful.";
    }
}
?>