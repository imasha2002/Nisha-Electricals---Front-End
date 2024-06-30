<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "sliit_dayan_electric"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data
$feedback_query = $conn->query("SELECT * FROM feedback");
$feedback_count = $feedback_query->num_rows;

// Generate report
$report_content = "Feedback Report\n\n";
$report_content .= "Total Feedbacks: $feedback_count\n\n";
$report_content .= "Name | Email | Phone Number | Rating | Comments\n";
$report_content .= str_repeat("-", 50) . "\n"; // Adding a separator line for better readability

while ($feedback = $feedback_query->fetch_assoc()) {
    $report_content .= $feedback['name'] . " | " . $feedback['email'] . " | " . $feedback['phone'] . " | " . $feedback['rating'] . " | " . $feedback['comments'] . "\n";
}

// Close the database connection
$conn->close();

// Download the report as a text file
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="feedback_report.txt"');
echo $report_content;
exit;
?>
