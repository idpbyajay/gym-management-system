<?php include 'config.php';
session_start();
$start = $_SESSION['logedin'];
if ($start == true) {
} else {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness And Fitness</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="Home.css">
</head>

<body>
    <div class="container">
        <!-- ----------------------------------------Menu---------------------------------------------- -->
        <nav class="navbar ">
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
        <div class="right">
            <!-- ----------------------------------------Card------------------------------------- -->
            <section class="card ">

                <div class="card-1 animation">
                    <h4><b>
                            <?php echo $conn->query("SELECT * FROM registration_info where status = 1")->num_rows; ?>
                        </b></h4>
                    <h3>Active member</h3>
                </div>

                <div class="card-1 animation">
                    <h4><b>
                            <?php echo $conn->query("SELECT * FROM plans")->num_rows; ?>
                        </b></h4>
                    <h3>Total membership plan</h3>
                </div>

                <div class="card-1 animation">
                    <h4><b>
                            <?php echo $conn->query("SELECT * FROM packages")->num_rows; ?>
                        </b></h4>
                    <h3>Total package</h3>
                </div>

            </section>
            <div class="home">
                <div>
                    <h1 class="animation">Welcom Back <span> Administrator</span></h1>
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, quae rem molestias suscipit
                        laboriosam ab non saepe, soluta debitis optio, impedit aspernatur voluptas fugit nulla maiores.
                        Recusandae repudiandae nostrum dolorem similique, culpa saepe tempora quo unde mollitia possimus
                        incidunt cupiditate iste necessitatibus nemo cumque temporibus magni laborum reprehenderit optio
                        sequi.</p> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>