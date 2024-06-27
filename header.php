<!--header-->
<header class="header">
        <div class="header_body">
            <a href="index.php" class="logo">Voltage Electronics</a>
            <nav class="navbar">
                <a href="view_product.php">View Products</a>
                <a href="index.php">Add Products</a>
                <a href="shop_products.php">Products</a>
                <a href="feedback.html">Feedback</a>
                <a href="promotions.html">Promotions</a>
                <a href="admin/index.html">Add promotion</a>
                <a href="admin/feedbacks.html">View Feedback</a>
            </nav>

            <!--select query-->
            <?php
            $select_product=mysqli_query($conn,"Select * from `cart`")or die('query failed');
            $row_count=mysqli_num_rows($select_product);
          
            ?>

            <!--shopping cart-->
            <a href="cart.php" class="cart"><i class="fa-solid fa-cart-shopping"></i></a>
            <!-- <div id="menu-btn" class="fas fa-bars"></div> -->         

        </div>
    </header>