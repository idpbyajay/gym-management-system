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
    <title>Active member</title>
    <link rel="stylesheet" href="Active member.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">

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
        <!-- ----------------------------------------Form---------------------------------------------- -->

        <div class="box">
            <div class="list">

                <div class="top">
                    <h3>Active Member List</h3>
                   
                </div>
                <table>

                    <thead>
                        <tr class="header">

                            <th>Id</th>


                            <th>Member Id</th>


                            <th>Name</th>


                            <th>Plan</th>


                            <th>Package</th>


                            <th>Status</th>


                            <th>View</th>


                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $member =  $conn->query("SELECT r.*,p.plan,pp.package,concat(m.lastname,', ',m.firstname,' ',m.middlename) as name,m.member_id from registration_info r inner join members m on m.id = r.member_id inner join plans p on p.id = r.plan_id inner join packages pp on pp.id = r.package_id where r.status = 1 order by r.id asc");
                        while ($row = $member->fetch_assoc()) :
                        ?>
                            <tr>

                                <td class="text-center"><?php echo $i++ ?></td>
                                <td class="">
                                    <p><b><?php echo $row['member_id'] ?></b></p>

                                </td>
                                <td class="">
                                    <p><b><?php echo ucwords($row['name']) ?></b></p>

                                </td>
                                <td class="">
                                    <p><b><?php echo $row['plan'] . 'Months' ?></b></p>
                                </td>
                                <td class="">
                                    <p><b><?php echo $row['package'] ?></b></p>

                                </td>
                                <td class="text-center">
                                    <?php if (strtotime(date('Y-m-d')) <= strtotime($row['end_date'])) : ?>
                                        <span class="badge badge-success">Active</span>
                                    <?php else : ?>
                                        <span class="badge badge-danger">Exprired</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-outline-primary view_member" type="button" data-id="<?php echo $row['id'] ?>">View</button>
                                    <button class="btn btn-sm btn-outline-danger delete_member" type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
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