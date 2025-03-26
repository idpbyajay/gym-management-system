<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <div class="box">
            
            <div class="form-box">
                <form method="post">
                    <h1>Admin Login</h1>
                    <div class="input_box">
                        <input type="text" name="user_name" placeholder="user name/email" required>
                        <i class='bx bxs-user'></i>
                    </div>
                    <div class="input_box">
                        <input type="password" name="password" placeholder="Password" required>
                        <i class='bx bxs-lock-alt'></i>
                    </div>
                    <div class="remember-forget">
                        <!-- <label ><input type="checkbox">Remember me</label> -->
                        <a href="#">Forget password?</a>
                    </div>
                    <button type="submit" name="submit" class="btn">Login</button>
                    <div class="register">
                        <p>Don't have an account?<a href="admin sign up.html">Sign up</a></p>
                    </div>
                </form>
            </div>
            <img src="img/undraw_indoor_bike_pwa4.svg" alt="">
        </div>
    </div>
</body>

</html>


<?php


if (isset($_POST['submit'])) {
    include 'config.php';
    $username = $_POST['user_name'];
    $password = $_POST['password'];


    $query = "SELECT * FROM users WHERE (email='$username' or admin_name='$username') and password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['logedin'] = $username;
        header("Location: Home.php");
    } else {
        echo '<script>
        window.location.href = "index.php";
        alert("Login Failed: Invalid Username or Password!!!");
       </script>';
    }
}
