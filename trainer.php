<?php include 'config.php';
session_start();
$start=$_SESSION['logedin'];
    if($start == true)
    {
    
    }
    else{
        header("location:index.php");
    }

// ---------------------Delete---------------
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM `trainers` WHERE `id`='$id'";
	$result = mysqli_query($conn, $sql);
	header("location:trainer.php");
	exit;
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="trainers.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
        <div class="package">

            <!-- --------------------------Trainer table---------------------- -->
            <div class="form">
                <div class="box">

                    <div class="list">

                        <div class="top">
                            <h3>Trainer</h3>
                            <span>
                                <button class="add-btn" type="button" onclick="location.href='Add trainer.php'">Add New</button>
                            </span>

                        </div>
                        <!-- <hr> -->
                        <table >
                            <thead>
                                <tr class="header">

                                    <th >Id</th>


                                    <th >Information</th>


                                    <th >Edit</th>


                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
								$i = 1;
								$trainer = $conn->query("SELECT * FROM trainers order by id asc");
								while($row=$trainer->fetch_assoc()):
								?>
                                    <tr class="text_area">

                                        <td ><?php echo $i++ ?></td>


                                        <td >
                                            <p><i class="fa fa-user"></i> <b><?php echo $row['name'] ?></b></p>
										    <p><small><i class="fa fa-at"></i> <b><?php echo $row['email'] ?></b></small></p>
										    <p><small><i class="fa fa-phone-square-alt"></i> <b><?php echo $row['contact'] ?></b></small></p>
										    <p><small><i class="fa fa-money-bill"></i> <b><?php echo number_format($row['rate'],2) ?></b></small></p>
										
                                        </td>


                                        <td ><button class="edit" type="button" data-id="<?php echo $row['id'] ?>">Edit</button>
                                        </td>


                                        <td >
                                            <button class="delete" type="button" data-id="<?php echo $row['id'] ?>">									<a style="text-decoration: none;" class="delete" href="Trainer.php?id=<?php echo $row['id'] ?>">Delete</a>
                                            </button>
                                        </td>
                                    </tr>

                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>