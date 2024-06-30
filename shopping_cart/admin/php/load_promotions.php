<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "voltageweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, title, description FROM promotions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='promotion'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<button class='btn btn-danger delete-promotion' data-id='" . $row['id'] . "'>Delete</button>";
        echo "</div>";
    }
} else {
    echo "No promotions available.";
}

$conn->close();
?>