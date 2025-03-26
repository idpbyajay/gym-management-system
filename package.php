<?php include 'config.php';
session_start();
$start=$_SESSION['logedin'];
    if($start == true)
    {
    
    }
    else{
        header("location:index.php");
    }

// ----------------------Delete---------------
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `packages` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    header("location:package.php");
    exit;
}
//---------------------------Save---------------
if(isset($_POST['save'])){
    $package=$_POST['package'];
    $description=$_POST['description'];
    $amount=$_POST['amount'];

    $sql="INSERT INTO `packages`(`package`,`description`,`amount`) VALUES('$package','$description','$amount')";
    $result=mysqli_query($conn,$sql);
    header('location:package.php');
    exit;   
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active member</title>
    <link rel="icon" href="img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="packages.css">
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
        <!-- --------------------------Package Form---------------------- -->
        <div class="box-1">

            <form action="" method="post" class="add">
                <h3>Package Form</h3>

                <div class="text_input">
                    <label for="package">Package Name</label>
                    <input type="text" name="package">
                </div>
                <div class="text_input">
                    <label for="description">Descraption</label>
                    <textarea name="description" id="description"></textarea>
                </div>
                <div class="text_input">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount">
                </div>
                <div class="btn">
                    <button name="save">Save</button>
                    <button>Cancel</button>
                </div>

            </form>
        </div>
        <!-- ----------------------------------------Table---------------------------- -->
        <div class="box-2">

            <div class="list">


                <h3>Package List</h3>

                <table>
                   
                    <thead>
                        <tr class="header">

                            <th>Id</th>


                            <th>Package</th>


                            <th>Description</th>
                            
                            
                            <th>Amount</th>


                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $package =  $conn->query("SELECT * from `packages` order by id asc");
                        while ($row = $package->fetch_assoc()) :
                        ?>
                            <tr class="text_area">

                                <td><?php echo $i++ ?></td>


                                <td>
                                    <?php echo $row['package'] ?>
                                </td>
                                
                                
                                <td>
                                    <?php echo $row['description'] ?>
                                    
                                </td>
                                
                                
                                <td>
                                    <?php echo $row['amount'] ?>
                                    
                                </td>


                                <td>
                                <a style="text-decoration: none;" class="delete" href="package.php?id=<?php echo $row['id'] ?>">Delete</a>
                                </td>

                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>