<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "voltageweb"; 

$promotionId = $_POST['id'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM promotions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $promotionId);

if ($stmt->execute()) {
    echo "Promotion deleted successfully!";
} else {
    echo "Error deleting promotion: " . $conn->error;
}

$stmt->close();
$conn->close();
?>