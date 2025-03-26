<?php include 'config.php';
session_start();
$start = $_SESSION['logedin'];
if ($start == true) {
} else {
    header("location:index.php");
}


// -------------------------------DELETE---------------------
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `members` WHERE `id`='$id'";
    $result = mysqli_query($conn, $sql);
    header("location:member.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member</title>
    <link rel="stylesheet" href="members.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">

</head>

<body>
    <div class="container">
        <!-- ------------------------------------------Navbar---------------------------- -->
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
        <!-- ------------------------------------------Table---------------------------- -->
        <div class="box">

            <div class="list">

                <div class="top">
                    <h3>Member</h3>
                    <span>
                        <button class="add-btn" type="button" onclick="location.href='Add member.php'">Add New</button>
                    </span>

                </div>
                <table>
                    <thead>
                        <tr class="header">
                            <th class="text-center">Id</th>
                            <th class="">Member ID</th>
                            <th class="">Name</th>
                            <th class="">Email</th>
                            <th class="">Contact</th>
                            <!-- <th class="text-center">View</th> -->
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $member =  $conn->query("SELECT *,concat(firstname,', ',middlename,' ',lastname) as name from members order by concat(firstname,', ',middlename,' ',lastname) asc");
                        while ($row = $member->fetch_assoc()) :
                        ?>
                            <tr class="text_area">
                                <td>
                                    <?php echo $i++ ?></td>
                                </td>
                                <td>
                                    <?php echo $row['member_id'] ?>
                                </td>
                                <td>
                                    <?php echo ($row['name']) ?>
                                </td>
                                <td>
                                    <?php echo $row['email'] ?>
                                </td>
                                <td>
                                    <?php echo $row['contact'] ?>
                                </td>
                                <!-- <td>
                                    <button class="view" type="button" id="view" data-id="<?php echo $row['id'] ?>">View</button>
                                </td> -->
                                <td>
                                    <button class="edit" type="button" id="edit" onclick="('location:edit member.php?<?php echo $row['id'] ?>')">Edit</button>
                                </td>
                                <td>
                                    <a style="text-decoration: none;" class="delete" href="member.php?id=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>

                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <!-- --------------------------------EDIT SECTION--------------------------- -->





    <!-- ------------------------------------------JavaScript----------------------------------- -->
    <!-- <script>
        $(document).ready(function() {
            $('table').dataTable()
        })
        $('#new_member').click(function() {
            uni_modal("<i class='fa fa-plus'></i> New Member", "manage_member.php", 'mid-large')
        })
        $('.view_member').click(function() {
            uni_modal("<i class='fa fa-id-card'></i> Member Details", "view_member.php?id=" + $(this).attr('data-id'), 'large')

        })
        $('.edit_member').click(function() {
            uni_modal("<i class='fa fa-edit'></i> Manage Member Details", "manage_member.php?id=" + $(this).attr('data-id'), 'mid-large')

        })
        $('.delete_member').click(function() {
            _conf("Are you sure to delete this topic?", "delete_member", [$(this).attr('data-id')], 'mid-large')
        })

        function delete_member($id) {
            start_load()
            $.ajax({
                url: 'ajax.php?action=delete_member',
                method: 'POST',
                data: {
                    id: $id
                },
                success: function(resp) {
                    if (resp == 1) {
                        alert_toast("Data successfully deleted", 'success')
                        setTimeout(function() {
                            location.reload()
                        }, 1500)

                    }
                }
            })
        }
    </script> -->


</body>

</html>