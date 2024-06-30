<!DOCTYPE html>
<html lang="en">
<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" href="feedback.css"> 
    <link rel="stylesheet" href="css/style.css"> 
    <script src="feedback.js"></script> 
</head>
<body>
<?php include('header.php') ?>
    <h2>Feedback Form</h2>
    <form id="feedback-form" action="php/submit_feedback.php" method="post" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
        <div class="error" id="name-error"></div>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <div class="error" id="email-error"></div>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" placeholder="Enter your phone number" required>
        <div class="error" id="phone-error"></div>

        <label for="rating">Rating (1-5):</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>

        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" placeholder="Write your comments here" required></textarea>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

