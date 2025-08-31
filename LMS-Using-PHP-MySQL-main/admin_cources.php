<!DOCTYPE html>
<html>
<head>
	<title>Courses Page</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
</head>
<body>
	<?php include('header.php'); ?>
	<div class="container">
		<!-- <h2>Courses</h2> -->
		<table>
			<tr>
				<th>Semester</th>
				<th>Course Name</th>
				<th>Course Policy</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			<?php 
			// Database Connection
			include('db.php');

			// Fetch Courses
			$sql = "SELECT * FROM cources";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // Output data of each row
			    while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['semester'] . '</td>';
                    echo '<td>' . $row['cource_name'] . '</td>';
                    echo '<td>' . $row['cource_policy'] . '</td>';
                    echo '<td><a href="edit_course.php?id=' . (isset($row['id']) ? $row['id'] : '') . '" class="btn btn-primary">Edit</a></td>';
                    echo '<td><a href="delete_course.php?id=' . (isset($row['id']) ? $row['id'] : '') . '" class="btn btn-danger">Delete</a></td>';
                    echo '</tr>';
                }
                
			} else {
			    echo "<tr><td colspan='5'>No courses found.</td></tr>";
			}

			mysqli_close($conn);
			?>
		</table>
		<br><br><br><br>
		<a href="add_course.php" class="btn btn-primary">+ Add cource</a>
	</div>
</body>
</html>
