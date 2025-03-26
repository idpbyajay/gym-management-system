<?php include 'config.php';
session_start();
$start = $_SESSION['logedin'];
if ($start == true) {
} else {
	header("location:index.php");
}
// ---------------------Delete---------------
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "DELETE FROM `plans` WHERE `id`='$id'";
	$result = mysqli_query($conn, $sql);
	header("location:plan.php");
	exit;
}



// -----------------------------Save--------------------
if (isset($_POST['submit'])) {
	$plan = $_POST['plan'];
	$amount = $_POST['amount'];


	$sql = "INSERT INTO `plans`(`plan`,`amount`)VALUE('$plan','$amount')";
	$result = $conn->query($sql);
	header("location:plan.php");
	exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plains</title>
	<link rel="icon" href="img/logo.png" type="image/x-icon">

	<link rel="stylesheet" href="plan.css">
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
		<!-- -----------------------------Form------------------------------ -->
		<div class="box-1">

			<form action="plan.php" method="POST" class="add">
				<h3>Add plans</h3>
				<div class="text_input">
					<label for="month">Months</label>
					<input type="number" name="plan" id="month">
				</div>
				<div class="text_input">
					<label for="amount">Amount</label>
					<input type="number" name="amount" id="amount">
				</div>
				<div class="btn">
					<button type="submit" name="submit">Save</button>
					<button type="reset" name="cancel" onclick="_reset()">Cancel</button>
				</div>
			</form>
		</div>



		<!-- ---------------------------------------Table----------------------------- -->
		<div class="box-2">
			<div class="list">
				<h3>Plan List</h3>
				<table>
					<thead>
						<tr class="header">
							<th class="">Id</th>
							<th>Plan</th>
							<th>Amounts</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$plan = $conn->query("SELECT * FROM plans order by id asc");
						while ($row = $plan->fetch_assoc()) :
						?>
							<tr class="text_area">

								<td>
									<?php echo $i++ ?>
								</td>
								<td>
									<p><b><?php echo $row['plan'] ?></b> month/s</p>
								</td>
								<td>
									<b><?php echo number_format($row['amount'], 2) ?></b>
								</td>

								<td>
									<a style="text-decoration: none;" class="delete" href="plan.php?id=<?php echo $row['id'] ?>">Delete</a>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- -------------------------------------JavaScript------------------------------ -->
	<?php

	?>


	<!-- -------------------------------------JavaScript------------------------------ -->

	<!-- <script>
		function _reset() {
			$('#manage-plan').get(0).reset()
			$('#manage-plan input,#manage-plan textarea').val('')
		}
		$('#manage-plan').submit(function(e) {
			e.preventDefault()
			start_load()
			$.ajax({
				url: 'ajax.php?action=save_plan',
				data: new FormData($(this)[0]),
				cache: false,
				contentType: false,
				processData: false,
				method: 'POST',
				type: 'POST',
				success: function(resp) {
					if (resp == 1) {
						alert_toast("Data successfully added", 'success')
						setTimeout(function() {
							location.reload()
						}, 1500)

					} else if (resp == 2) {
						alert_toast("Data successfully updated", 'success')
						setTimeout(function() {
							location.reload()
						}, 1500)

					}
				}
			})
		})
		$('.edit_plan').click(function() {
			start_load()
			var cat = $('#manage-plan')
			cat.get(0).reset()
			cat.find("[name='id']").val($(this).attr('data-id'))
			cat.find("[name='plan']").val($(this).attr('data-plan'))
			cat.find("[name='amount']").val($(this).attr('data-amount'))
			end_load()
		})
		$('.delete_plan').click(function() {
			_conf("Are you sure to delete this plan?", "delete_plan", [$(this).attr('data-id')])
		})

		function delete_plan($id) {
			start_load()
			$.ajax({
				url: 'ajax.php?action=delete_plan',
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
		$('table').dataTable()
	</script> -->
</body>

</html>