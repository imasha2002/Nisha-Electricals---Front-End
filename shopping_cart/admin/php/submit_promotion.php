<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "voltageweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO promotions (title, description) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $description);

$title = $_POST['title'];
$description = $_POST['description'];

if ($stmt->execute()) {
    echo "Promotion added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>