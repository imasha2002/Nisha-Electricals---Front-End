<?php
include "db_conn.php";
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $adding_product = $_POST['adding_product'];

    $sql = "INSERT INTO `supplier`(`id`, `first_name`, `last_name`, `email`, `gender`, `adding_product`) VALUES (NULL,'$first_name','$last_name','$email','$gender','$adding_product')";

    $result = mysqli_query($conn,$sql);

    if($result){

        
    $userMail = $email;
    $sub = "Succsessfully Registered";
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Project Ready for Purchase</title>
        <style>
            
            body {
                font-family: Arial, sans-serif;
                background-color: #f5f5f5;
                margin: 0;
                padding: 0;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 10px;
                box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            }
            .header {
                text-align: center;
                padding: 20px 0;
            }
            .content {
                padding: 20px 0;
                text-align: left;
            }
            .project-info {
                font-size: 20px;
                font-weight: bold;
                color: #007bff;
                margin-top: 10px;
            }
            .footer {
                text-align: center;
                padding: 20px 0;
                color: #777777;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>VOLTAGE</h1>
            </div>
            <div class="content">
                <p>Hello '.$first_name.',</p>
                <p>You have successfully added as supplyer</p>
                <p>Thank You For Choose us.</p>
            </div>
            <div class="footer">
                <p>Contact us via WhatsApp for further details.</p>
            </div>
        </div>
    </body>
    </html>';

   
    
        include ('./functions/emailsend.php');

       

    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!--FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Add new Supplier</title>

</head>
<body>
    
    <nav class = "navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #CAF4FF;">
         Supplier Management System    
    </nav>

    <div class="container">
    <div class="text-center mb-4">
        <h3>Add Supplier</h3>
        <p class="text-muted">Complete the form below to add a new supplier</p>
    </div>    
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw;min-width:300px;">
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" placeholder="Albert">
            </div>
            <div class="col">
                <label class="form-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" placeholder="Einstein">
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group mb-3">
                <label>Gender:</label>&nbsp;
                <input type="radio" class="form-check-input" name="gender"
                id="male" value="male">
                <label for="male" class="form-input-label">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender"
                id="female" value="female">
                <label for="female" class="form-input-label">Female</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Product:</label>
                <input type="text" class="form-control" name="adding_product" placeholder="bulbs">
            </div>
            <div>
                <button type="submit" class="btn btn-success" name="submit">Save</button>
                <a href="index1.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
        </div>
    </div>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>