<?php
// Retrieve data for the dashboard
session_start();
require_once 'db.php';

$query = "SELECT * FROM `cources`";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$registered_courses = mysqli_num_rows($result);


$query = "SELECT * FROM `assignment` ";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$assignments = mysqli_num_rows($result);


$query = "SELECT * FROM `user`";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$users = mysqli_num_rows($result);


$query = "SELECT * FROM `announcement`";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
$Announcement = mysqli_num_rows($result);


$query = "SELECT * FROM `submitted_assignment`";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$completed_tasks = mysqli_num_rows($result);

?>



<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<?php include ('header.php'); ?>
	
	<div class="container">
		<div class="card">
			<h2>Courses</h2>
			<p>
				<?php echo $registered_courses ?>
			</p>
			<br>
			<a href="admin_cources.php" class="btn">cources</a>
		</div>

		<div class="card">
			<h2>Announcement</h2>
			<p>
				<?php echo $Announcement ?>
			</p>
			<br>
			<a href="admin_announcement.php" class="btn">Announcement</a>
		</div>

		<div class="card">
			<h2>users</h2>
			<p>
				<?php echo $users ?>
			</p>
			<br>
			<a href="admin_user.php" class="btn">Users</a>
		</div>

		<div class="card">
			<h2>Assignments</h2>
			<p>
				<?php echo $assignments ?>
			</p>
			<br>
			<a href="admin_assignment.php" class="btn">Assignments</a>
		</div>

		<div class="card">
			<h2> Submitted Assignments</h2>
			<p>
				<?php echo $completed_tasks ?>
			</p>
			<br>
			<a href="admin_submitted.php" class="btn">Submitted Assignments</a>
		</div>

		<div class="card">
			<h2> Upcoming Activities</h2>
			<p>
				<?php echo $completed_tasks ?>
			</p>
			<br>
			<a href="admin_upcoming.php" class="btn">Upcoming Activities</a>
		</div>
	<div>
</body>
</html>
