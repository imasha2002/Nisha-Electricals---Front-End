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

    <div class="search text-center">
            <h3>Search </h3>
            <form method="GET" action="">
            <select name="search_by" class="form-select d-inline w-auto">
                <option value="id" <?php echo isset($_GET['search_by']) && $_GET['search_by'] == 'id' ? 'selected' : ''; ?>>ID</option>
                <option value="first_name" <?php echo isset($_GET['search_by']) && $_GET['search_by'] == 'first_name' ? 'selected' : ''; ?>>First Name</option>
                <option value="last_name" <?php echo isset($_GET['search_by']) && $_GET['search_by'] == 'last_name' ? 'selected' : ''; ?>>Last Name</option>
                <option value="email" <?php echo isset($_GET['search_by']) && $_GET['search_by'] == 'email' ? 'selected' : ''; ?>>Email</option>
                <option value="gender" <?php echo isset($_GET['search_by']) && $_GET['search_by'] == 'gender' ? 'selected' : ''; ?>>Gender</option>
                <option value="adding_product" <?php echo isset($_GET['search_by']) && $_GET['search_by'] == 'adding_product' ? 'selected' : ''; ?>>Product</option>
            </select>
            <input type="text" name="search" placeholder="Search..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit"><i class="fas fa-search "></i></button>
            <br><br>
            </form>


        </div>


   <div class="container">
    <?php
    if(isset($_GET['msg'])){
        $msg = $_GET['msg'];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        '.$msg.'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
    <a href="report_generation1.php" class="btn btn-dark mb-3">Report Generate</a>
    <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>
    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Product</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
                include "db_conn.php";

                $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
                $search_by = isset($_GET['search_by']) ? mysqli_real_escape_string($conn, $_GET['search_by']) : 'id';

                $sql = "SELECT * FROM `supplier`";
                if ($search) {
                    if ($search_by == 'id' || $search_by == 'gender') {
                        // Use exact match for id and gender
                        $sql .= " WHERE `$search_by` = '$search'";
                    } else {
                        $sql .= " WHERE `$search_by` LIKE '%$search%'";
                    }
                }

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                            <th>' . $row['id'] . '</th>
                            <td>' . $row['first_name'] . '</td>
                            <td>' . $row['last_name'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td>' . $row['gender'] . '</td>
                            <td>' . $row['adding_product'] . '</td>
                            <td>
                                <a href="edit.php?id=' . $row['id'] . '" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                                <a href="deletesup.php?id=' . $row['id'] . '" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                            </td>
                        </tr>';
                    }
                } else {
                    // Display specific message for 'id' search
                    if ($search_by == 'id') {
                        echo '<tr><td colspan="7">Wrong ID number, please try again.</td></tr>';
                    } else {
                        echo '<tr><td colspan="7">There is no record like that.</td></tr>';
                    }
                }
                ?>
  </tbody>
</table>
   </div>
      
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>