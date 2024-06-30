<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "voltageweb";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO feedback (name, email, phone, rating, comments) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssis", $name, $email, $phone, $rating, $comments);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];

if ($stmt->execute()) {
    echo "Feedback submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
