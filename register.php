<?php

include "config.php";

$message = [];  // Initialize as an array to store messages.

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);  // Encrypt password
    $cpass = md5($_POST['cpassword']);  // Encrypt confirm password
    $user_type = $_POST['user_type'];

    if ($pass !== $cpass) {
        $message[] = "Confirm password does not match.";
    } else {
        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die(mysqli_error($conn));
        if(mysqli_num_rows($select_users) > 0){
            $message[] = 'User already exists!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `users` (name, email, password, user_type) VALUES ('$name', '$email', '$pass', '$user_type' )") or die(mysqli_error($conn));
            if ($insert) {
                $message[] = 'Registered successfully!';
                header('location:index.php');
            } else {
                $message[] = 'Registration failed!';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>REGISTER</title>
        <meta name="description" content="User registration form">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </head>
    <body>

<?php
if(!empty($message)){
    foreach($message as $msg){
        echo '<div class="message"><span>'.$msg.'</span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>';
    }
}
?>

    <div class="form-container">
        <form action="" method="post">  <!-- Removed the action="#" to ensure form posts to itself -->
            <h3>Register Now</h3>
            <input type="text" name="name" placeholder="Enter your name" required class="box">
            <input type="email" name="email" placeholder="Enter your email" required class="box">
            <input type="password" name="password" placeholder="Enter your password" required class="box">
            <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
            
            <select name="user_type" class="box">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit" name="submit" class="btn">Register</button>
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>
    </body>
</html>
