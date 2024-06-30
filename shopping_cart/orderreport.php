<?php
include 'connect.php';

// Fetch checkout orders per day
$query = "SELECT DATE(order_date) AS order_day, COUNT(*) AS total_orders FROM customer_order GROUP BY DATE(order_date)";
$result = mysqli_query($conn, $query);

$report_content = "Checkout Orders Report\n\n";
$report_content .= "Date | Total Orders\n";
while ($row = mysqli_fetch_assoc($result)) {
    $report_content .= $row['order_day'] . " | " . $row['total_orders'] . "\n";
}

// Download the report as a text file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="checkout_orders_report.txt"');
echo $report_content;
exit;
?>
