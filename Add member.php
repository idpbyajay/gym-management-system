<?php include 'config.php';
session_start();
$start=$_SESSION['logedin'];
    if($start == true)
    {
    
    }
    else{
        header("location:index.php");
    }

if (isset($_GET['id'])) {
    $qry = $conn->query("SELECT * FROM members where id=" . $_GET['id'])->fetch_array();
    foreach ($qry as $k => $v) {
        $$k = $v;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add member</title>
    <link rel="stylesheet" href="Add member.css">
    <link rel="icon" href="img/logo.png" type="image/x-icon">

</head>

<body>

    <div class="container">
        <div class="blank"></div>
        <div class="blanks"></div>
        <form action="" method="post" id="manage-member">
            <div id="msg"></div>
            <input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
            <div class="id">
                <div>
                    <label>ID No.</label>
                    <input type="text" name="member_id" value="<?php echo isset($member_id) ? $member_id : '' ?>">
                    <small><i>Leave this blank if you want to a auto generate ID no.</i></small>
                </div>
            </div>
            <div class="name">
                <div>
                    <label>First Name</label>
                    <input type="text" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
                </div>
                <div>
                    <label>Middle Name</label>
                    <input type="text" name="middlename" value="<?php echo isset($middlename) ? $middlename : '' ?>">
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" name="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
                </div>
            </div>
            <div class="contact">
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo isset($email) ? $email : '' ?>" required>
                </div>
                <div>
                    <label>Contact #</label>
                    <input type="text" name="contact" value="<?php echo isset($contact) ? $contact : '' ?>" required>
                </div>
                <div>
                    <label>Gender</label>
                    <select name="gender" required="" id="">
                        <option <?php echo isset($gender) && $gender == '' ? 'selected' : '' ?>></option>
                        <option <?php echo isset($gender) && $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option <?php echo isset($gender) && $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                        <option <?php echo isset($gender) && $gender == 'Other' ? 'selected' : '' ?>>Other</option>
                    </select>
                </div>
            </div>
            <div class="address">
                <div>
                    <label>Address</label>
                    <textarea name="address"><?php echo isset($address) ? $address : '' ?></textarea>
                </div>
            </div>
            <div class="db">
                <div>
                    <label>Plan</label>
                    <select name="plan_id" required="required" class="" id="">
                        <option value=""></option>
                        <?php
                        $qry = $conn->query("SELECT * FROM plans order by plan asc");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($plan_id) && $plan_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['plan']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <label>Package</label>
                    <select name="package_id" required="required" id="">
                        <option value=""></option>
                        <?php
                        $qry = $conn->query("SELECT * FROM packages order by package asc");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($package_id) && $package_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['package']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <label>Trainer</label>
                    <select name="trainer_id" id="">
                        <option value=""></option>
                        <?php
                        $qry = $conn->query("SELECT * FROM trainers order by name asc");
                        while ($row = $qry->fetch_assoc()) :
                        ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($trainer_id) && $trainer_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
            </div>
            <div class="btn">
                <button type="submit" name="save">Save</button>
                <button type="reset" value="reset">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php

if(isset($_POST['save'])){
    $member_id=$_POST['member_id'];
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $plan=$_POST['plan'];
    $package=$_POST['package'];
    $trainer=$_POST['trainer'];
    
    // $result = mysqli_query($conn, $query);
    $sql="INSERT INTO `members`(`member_id`,`firstname`,`middlename`,`lastname`,`contact`,`email`,`address`,`gender`)VALUES('$member_id','$firstname','$middlename','$lastname','$contact','$email','$address','$gender')";

    $result=$conn->query($sql);
    if($result){
       echo "<script>
        alert('Saved successfully');
        header('location:member.php');
        </script>";
    }
    else{

        echo "<script>
        alert('Error');
        header('location:Add member.php');
        </script>";
        
    }

}



?>