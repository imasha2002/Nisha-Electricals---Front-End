<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "voltageweb"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='card mb-3'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
        echo "<p class='card-text'><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p class='card-text'><strong>Phone Number:</strong> " . $row['phone'] . "</p>";
        echo "<p class='card-text'><strong>Rating:</strong> " . $row['rating'] . "</p>";
        echo "<p class='card-text'><strong>Comments:</strong> " . $row['comments'] . "</p>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "<div class='alert alert-info' role='alert'>No feedbacks available.</div>";
}

$conn->close();
?>
