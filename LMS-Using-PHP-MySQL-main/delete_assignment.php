<?php
// Connect to the database
include 'db.php';

// Retrieve the id of the assignment to delete
$id = $_GET['id'];

// Delete the assignment from the database
$query = "DELETE FROM assignment WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Check if the query was successful
if (mysqli_affected_rows($conn) > 0) {
    // Redirect to the assignment list page
    header("Location: admin_assignment.php");
    exit();
} else {
    echo "Error deleting assignment.";
}

mysqli_close($conn);
?>
