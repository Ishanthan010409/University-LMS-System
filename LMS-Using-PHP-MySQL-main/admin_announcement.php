<style>
    /* Set the background color and font for the whole page */
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    /* Set the width and center the form on the page */


    /* Style the form fields */
    label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    /* Style the headings */
    h2 {
        color: #2196F3;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #2196F3;
        color: #fff;
        font-weight: bold;
        font-size: 18px;
    }

    td {
        font-size: 16px;
        background-color: #fff;
        color: #333;
    }

    tr:nth-child(even) td {
        background-color: #f2f2f2;
    }

    tr:hover td {
        background-color: #ddd;
    }
</style>

<link rel="stylesheet" href="style.css">

<?php
// Connect to the database
include 'db.php';
include 'header.php';


if(isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = "DELETE FROM announcement WHERE id='$id'";

	if (mysqli_query($conn, $sql)) {
	    // echo "Course deleted successfully.";
	} else {
	    echo "Error deleting course: " . mysqli_error($conn);
	}
}

// Display list of announcements
$query = "SELECT * FROM announcement";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Announcements</h2>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Semester</th><th>Course Name</th><th>Announcement</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['semester'] . "</td>";
        echo "<td>" . $row['cource_name'] . "</td>";
        echo "<td>" . $row['announcement'] . "</td>";
        // echo "<td><form method='post'><input type='hidden' name='id' value='" . $row['id'] . "'><input type='submit' name='delete_announcement' value='Delete'></form></td>";
        echo '<td><a href="admin_announcement.php?id=' . (isset($row['id']) ? $row['id'] : '') . '" class="btn btn-danger">Delete</a></td>';
        echo "</tr>";
    }
    
    echo "</table>";
    echo '<a href="add_announcement.php" class="btn btn-danger" style="margin-left:40%;">Add Announcement</a>';
} else {
    echo "No announcements found.";
}


mysqli_close($conn);
?>