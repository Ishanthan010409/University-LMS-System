<?php
// Database Connection
include('db.php');

// Delete Course
if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM cources WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
	    echo "Course deleted successfully.";
	} else {
	    echo "Error deleting course: " . mysqli_error($conn);
	}
}

mysqli_close($conn);
header("Location: admin_cources.php");
exit();
?>