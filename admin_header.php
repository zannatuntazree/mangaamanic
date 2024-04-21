<?php
// Ensure session is started at the top of the script


// Checking if the admin_name and admin_email session variables are set
$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Not logged in';
$admin_email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : 'No email';
?>
<link rel="stylesheet" href="css/admin_style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<header class="header">

   <div class="flex">

      <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

      <nav class="navbar">
         <a href="admin_page.php">home</a>
         <a href="admin_products.php">products</a>
         <a href="admin_orders.php">orders</a>
         <a href="admin_users.php">users</a>
         <a href="admin_contacts.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>username : <span><?php echo $admin_name; ?></span></p>
         <p>email : <span><?php echo $admin_email; ?></span></p>
         <a href="logout.php" class="delete-btn">logout</a>
      
      </div>

   </div>

</header>
