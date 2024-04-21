<?php
include 'config.php'; // Include your database configuration file


// Check if user_id is set in the session
if (!isset($_SESSION['user_id'])) {
    header('location:login.php'); // Redirect to login page if user_id is not set
    exit;
}
$user_id = $_SESSION['user_id']; // Assign user_id from session

// Now use the $conn and $user_id in your queries
$select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
$cart_rows_number = mysqli_num_rows($select_cart_number);
?>



<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <p><a href="login.php">login</a> | <a href="register.php">register</a></p>
        </div>
    </div>

    <div class="header-2">
        <div class="flex">
            <a href="index.php" class="logo">MANGAa Manic.</a>
            <nav class="navbar">
                <a href="index.php">home</a>
                <a href="about.php">about</a>
                <a href="shop.php">shop</a>
                <a href="contact.php">contact</a>
                <!-- <a href="orders.php">orders</a> -->
            </nav>
            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="search_page.php" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span></a>
            </div>
            <div class="user-box">
                <p>username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <a href="logout.php" class="delete-btn">logout</a>
                <div><a href="login.php">login</a> | <a href="register.php">register</a></div>
            </div>





        </div>
    </div>
</header>
