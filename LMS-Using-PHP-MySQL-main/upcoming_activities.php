<?php
session_start();
require_once 'db.php';

$query = "SELECT * FROM `assignment` WHERE `date` > ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", date("Y-m-d"));
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upcoming Activities</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

		* {
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
			/* border-bottom: 2px solid blue; */
		}

		nav li a:hover {
			/* transform: scale(1.2); */
			border-bottom: 2px solid blue;
		}

		body {
			/* font-family: Arial, sans-serif; */
		}



		.cource {
			/* margin: 100px; */
			display: flex;
			flex-wrap: wrap;
			width: 50vw;
			height: 50vh;
			margin: 50px auto;

			/* align-items: center; */
			/* justify-content: center; */
		}

		table {
			border-collapse: collapse;
			width: 100%;
			text-align: center;
			margin: auto;
		}

		th {
			background-color: #428bca;
			color: white;
			font-weight: bold;
			text-transform: uppercase;
		}

		th,
		td {
			padding: 12px;
			width: 180px;
			height: 75px;
		}

		tr {
			border: 1px solid #ddd;

		}

		tr:hover {
			background-color: #f5f5f5;
		}

		.btn {
			border: none;
			background-color: #428bca;
			border-radius: 0.5em;
			color: #fff;
			cursor: pointer;
			font-size: 1em;
			padding: 0.5em 1em;
			text-align: center;
			text-decoration: none;
			transition: background-color 0.3s ease;
		}

		.btn:hover {
			background-color: #3071a9;
		}
	</style>
</head>

<body>
	<nav>
		<ul>
			<li><a href="start.php">Home</a></li>
			<li><a href="cources.php">Courses</a></li>
			<li><a href="assignment.php">Assignments</a></li>
			<li><a href="upcoming_activities.php" class="active">Upcoming activities</a></li>
			<li><a href="announcement.php">Announcement</a></li>
			<li><a href="logout.php">Logout </a></li>
			<!-- <img src="./logout.png" alt="img" id="log_out"> -->
		</ul>
	</nav>
	<br><br>

	<div class="cource">
		<p>
		<table>
			<tr>
				<th>Sr. no.</th>
				<th>Cource</th>
				<th>assignment no.</th>
				<th>Due date</th>
			</tr>

			<?php
			$cnt = 1;
			while ($row = mysqli_fetch_row($result)) {
				?>
				<?php
				if (date("Y-m-d") > $row[4]) {
					?>

					<tr style="color:red;">

						<?php
				} else {
					?>

					<tr>

						<?php
				}
				?>
					<td>
						<?php echo $cnt++; ?>
					</td>
					<td>
						<?php echo $row[3] ?>
					</td>
					<td>
						<?php echo $row[2]; ?>
					</td>
					<td>
						<?php echo $row[4]; ?>
					</td>


				</tr>

				<?php
			}
			// echo mysqli_num_rows($result);
			?>
		</table>
		</p>
	</div>
</body>

</html>