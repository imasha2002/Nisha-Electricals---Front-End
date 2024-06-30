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

$promotions = "";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $promotions .= "<div class='promotion'>";
        $promotions .= "<h3>" . $row['title'] . "</h3>";
        $promotions .= "<p>" . $row['description'] . "</p>";
        $promotions .= "</div>";
    }
} else {
    $promotions .= "<p>No current promotions.</p>";
}

$conn->close();

echo $promotions;
?>