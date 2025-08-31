<?php
session_start();
require_once 'db.php';

// Registered Courses
$query = "SELECT * FROM `cources` WHERE `semester` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION['sem']);
$stmt->execute();
$result_courses = $stmt->get_result();
$registered_courses = $result_courses->num_rows;

// Announcements
$query = "SELECT * FROM `announcement` WHERE `semester` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION['sem']);
$stmt->execute();
$result_announcements = $stmt->get_result();
$Announcement = $result_announcements->num_rows;

// Assignments
$query = "SELECT * FROM `assignment` WHERE `semester` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION['sem']);
$stmt->execute();
$result_assignments = $stmt->get_result();
$assignments = $result_assignments->num_rows;

// Upcoming Activities
$query = "SELECT * FROM `assignment` WHERE `date` > ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", date("Y-m-d"));
$stmt->execute();
$result_upcoming = $stmt->get_result();
$upcoming_activities = $result_upcoming->num_rows;

// Submitted Assignments
$query = "SELECT * FROM `submitted_assignment` WHERE `roll_no` = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION['roll_no']);
$stmt->execute();
$result_submitted = $stmt->get_result();
$completed_tasks = $result_submitted->num_rows;

// Progress Calculation (safe)
$total_tasks = $assignments;
if ($total_tasks > 0) {
    $progress_percentage = (int)(($completed_tasks / $total_tasks) * 100);
} else {
    $progress_percentage = 0;
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>My LMS Platform Dashboard</title>
	<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

		*{
			margin: 0px;
			padding: 0px;
			font-family: 'Roboto', sans-serif;
		}
		nav {
			background-color: white;
			/* background-color: red; */
			box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 1;
		}

		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
		}

		nav li {
			float: left;
		}

		nav li a {
			display: block;
			color: #428bca;
			font-size: 1.2em;
			padding: 0.8em 1em;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.3s ease;
		}
		nav a.active {
			/* border-bottom: 2px solid blue; */
			background-color: white;
		}

		nav li a:hover {
            border-bottom: 2px solid blue;
		}

		body {
			 background-color: white;
			 font-family: Arial, sans-serif; 
		}

		h1 {
			font-size: 2em;
			margin-bottom: 0.5em;
		}

		.container {
			display: flex;
			flex-wrap: wrap;
			margin: 1em;
		}

		.card {
			background-color: #d8d7d7ff;
			border: 1px solid #ccc;
			border-radius: 0.5em;
			box-shadow: 0 0.5em 1em rgba(41, 36, 36, 0.1);
			margin: 1em;
			padding: 1em;
			width: calc(33% - 2em);
		}

		.card h2 {
			font-size: 1.5em;
			margin-bottom: 0.5em;
		}

		.card p {
			margin: 0;
		}

		.progress {
			background-color: #d8d7d7ff;
			border: 1px solid #ccc;
			border-radius: 0.5em;
			box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
			margin: 2em 1em;
			padding: 1em;
			width: calc(50% - 2em);
		}

		.progress h2 {
			font-size: 1.5em;
			margin-bottom: 0.5em;
		}

		.progress-bar {
			background-color: #fff;
			border-radius: 0.5em;
			height: 1em;
			margin-bottom: 0.5em;
			position: relative;
			width: 100%;
		}

		.progress-bar span {
			background-color: #428bca;
			border-radius: 0.5em;
			display: block;
			height: 1em;
			position: absolute;
			top: 0;
			left: 0;
			text-align: center;
			width:<?php echo $progress_percentage ?>%;
			color: white;
		}

		.btn {
			border: none;
			background-color: #0488fcff;
			border-radius: 0.6em;
			color: #fff;
			cursor: pointer;
			font-size: 1em;
			padding: 0.5em 1em;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.3s ease;
		}

		.btn:hover {
			background-color: #0488fcff;
		}

		.sticky-card {
			position: fixed;
			top: 49px;
			right: 0;
			height: 100vh;
			width: 300px;
			background-color: #d8d7d7ff;
			border: 1px solid #ccc;
			/* border-radius: 0.5em; */
			box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
			overflow-y: scroll;
		}


		.card-header {
			background-color: #0488fcff;
			color: #fff;
			padding: 0.5em 1em;
			border-top-left-radius: 0.5em;
			border-top-right-radius: 0.5em;
		}

		.card-body {
			padding: 1em;
		}

		.student-info {
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}

		.student-photo {
			width: 200px;
			height: 200px;
			border-radius: 50%;
			overflow: hidden;
			margin-right: 1em;
			margin-bottom: 20px;
		}

		.student-photo img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}

		.student-details {
			flex-grow: 1;
		}

		.student-details p {
			margin: 25px 10px;
		}

		.card .btn {
			opacity: 0;
			transition: all 200ms;
		}

		.card:hover .btn {
			opacity: 1;
		}
		/* #log_out{
			height: 10px;
			width: 10px;
		} */
	</style>
</head>

<body>
	<nav>
		<ul>
			<li><a href="start.php" class="active">Home</a></li>
			<li><a href="cources.php">Courses</a></li>
			<li><a href="assignment.php">Assignments</a></li>
			<li><a href="upcoming_activities.php">Upcoming activities</a></li>
			<li><a href="announcement.php">Announcement</a></li>
			<li><a href="logout.php" >Logout </a></li>
			<!-- <img src="./logout.png" alt="img" id="log_out"> -->
		</ul>
	</nav>
	<br><br>
	<!-- <h1>My LMS Platform Dashboard</h1> -->

	<div class="container">
		<div class="card">
			<h2>Registered Courses</h2>
			<p>
				<?php echo $registered_courses ?>
			</p>
			<br>
			<a href="cources.php" class="btn">cources</a>
		</div>

		<div class="card">
			<h2>Announcement</h2>
			<p>
				<?php echo $Announcement ?>
			</p>
			<br>
			<a href="announcement.php" class="btn">Announcement</a>
		</div>

		<div class="card">
			<h2>Upcoming Activities</h2>
			<p>
				<?php echo $upcoming_activities ?>
			</p>
			<br>
			<a href="upcoming_activities.php" class="btn">Upcoming activities</a>
		</div>

		<div class="card">
			<h2>Assignments</h2>
			<p>
				<?php echo $assignments ?>
			</p>
			<br>
			<a href="assignment.php" class="btn">Assignments</a>
		</div>

		<div class="progress">
			<h2>Progress</h2>
			<div class="progress-bar">
				<span>
					<?php echo $progress_percentage ?>%
				</span>
			</div>
			<p>
				<?php echo $completed_tasks ?> out of
				<?php echo $total_tasks ?> tasks completed
			</p>
		</div>
		<!-- <div>
		<p>
			<?php 
				while ($row = mysqli_fetch_row($result)) {
				?>
				<div class="card">
					<p>
						<?php echo $row[1]; ?>
					</p>
					<br>
					<a href="<?php echo $row[2];?>" class="btn">Download</a>
				</div>
				<?php
				}
				?>
		</p>
		</div> -->
		<div class="sticky-card">
			<div class="card-header">
				<h2 align="center">Student Details</h2>
			</div>
			<div class="card-body">
				<div class="student-info">
					<div class="student-photo">
						<img src="https://i.ibb.co/yVGxFPR/2.png" alt="Student Photo" height="100px" width="100px">
					</div>
					<div class="student-details">
						<p clas="info"><strong>Name:</strong>
						<?php echo $_SESSION['username']; ?>
						</p>
						<p clas="info"><strong>Roll no:</strong>
						<?php echo $_SESSION['roll_no']; ?>
						</p>
						<p clas="info"><strong>Email:</strong> 
						<?php echo $_SESSION['email']; ?>
						</p>
					<!-- <p clas="info"><strong>Roll:</strong> 12345</p> -->
						<p clas="info"><strong>Semester:</strong> 
						<?php echo $_SESSION['sem']; ?>
						</p>
						<p clas="info"><strong>CGPA:</strong> 
						<?php echo $_SESSION['cgpa']; ?>
						
						</p>
					</div>
				</div>
			</div>
		</div>

	</div>

</body>

</html>