<style>
    /* Set the background color and font for the whole page */
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    /* Set the width and center the form on the page */
    form {
        width: 40%;
        margin: 0 auto;
    }

    /* Style the form fields */
    label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="date"],
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
</style>
<link rel="stylesheet" href="style.css">
<?php
ob_start();
echo "hello";
// Connect to the database
include 'db.php';
include 'header.php';


// Handle add announcement form submission
if (isset($_POST['submit'])) {
    $semester = $_POST['semester'];
    $cource_name = $_POST['cource_name'];
    $announcement = $_POST['announcement'];

    $query = "INSERT INTO announcement (semester, cource_name, announcement) VALUES ('$semester', '$cource_name', '$announcement')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // echo "Announcement added successfully.";
    header("Location: admin_announcement.php");
}

// Display add announcement form
echo "<h2>Add Announcement</h2>";
echo "<form action='add_announcement.php' method='post'>";
echo "<label for='semester'>Semester:</label>";
echo "<input type='number' name='semester' required><br><br>";
echo "<label for='cource_name'>Course Name:</label>";
echo "<input type='text' name='cource_name' required><br><br>";
echo "<label for='announcement'>Announcement:</label>";
echo "<textarea name='announcement' required></textarea><br><br>";
echo "<input type='submit' name='submit' value='Add Announcement'>";
echo "</form>";
ob_end_flush();
?>