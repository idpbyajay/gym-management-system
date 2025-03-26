<?php

include 'config.php';

session_start();
$start = $_SESSION['logedin'];
if ($start == true) {
} else {
    header("location:index.php");
}

// ---------------------Save-----------------------


if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $rate = $_POST['rate'];

    $query = "INSERT INTO `trainers`(`name`,`email`,`contact`,`rate`) VALUES('$name','$email','$contact','$rate')";
    $result = mysqli_query($conn, $query);
    header('location:trainer.php');
    exit;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Add trainers.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <!-- ----------------------------------------Menu---------------------------------------------- -->
        <nav class="navbar">
            <div class="logo">
                <img src="img/logo.png" alt="erorr">
            </div>
            <ul class="menu">
                <li class="item"><a href="Home.php">Home</a></li>
                <li class="item"> <a href="member.php">Member</a></li>
                <li class="item"> <a href="Active member.php">Validation</a></li>
                <li class="item"> <a href="plan.php">Plan</a></li>
                <li class="item"> <a href="package.php">Packages</a></li>
                <li class="item"> <a href="trainer.php">Trainers</a></li>
                <li class="item"><a href="logout.php" name="user">Logout</a></li>

            </ul>
        </nav>

        <!-- --------------------------Trainer Form---------------------- -->
        <div class="box">

            <form action="" method="post">
                <h3>Trainer Form</h3>
                <div class="form_body">

                    <div>

                        <div class="text">
                            <label for="name">Name</label>
                            <input type="text" name="name">
                        </div>
                        <div class="text">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                        </div>
                        <div class="text">
                            <label for="contact">Contect</label>
                            <input type="number" name="contact">
                        </div>
                        <div class="text">
                            <label for="rate">Rate</label>
                            <input type="number" name="rate">
                        </div>
                        <div class="btn">
                            <button type="submit" name="save">Save</button>
                            <button type="reset" value="_reset()">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>