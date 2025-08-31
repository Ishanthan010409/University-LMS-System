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
// Connect to the database
ob_start();
include 'db.php';
include 'header.php';

// Retrieve the id of the assignment to edit
$id = $_GET['id'];

// Retrieve the assignment details from the database
$query = "SELECT * FROM assignment WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    exit();
}

// Retrieve the data from the result
$row = mysqli_fetch_assoc($result);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve the data from the form
    $semester = $_POST['semester'];
    $pra_no = $_POST['pra_no'];
    $course_name = $_POST['course_name'];
    $date = $_POST['date'];

    // Update the assignment in the database
    $query = "UPDATE assignment SET semester='$semester', pra_no='$pra_no', cource_name='$course_name', date='$date' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Redirect to the assignment list page
    header("Location: admin_assignment.php");
    // exit();
}

mysqli_close($conn);
ob_end_flush();
?>

<h2>Edit Assignment</h2>

<form method="post">
    <label for="semester">Semester:</label>
    <input type="text" name="semester" value="<?php echo $row['semester']; ?>"><br>

    <label for="pra_no">Practical No.:</label>
    <input type="text" name="pra_no" value="<?php echo $row['pra_no']; ?>"><br>

    <label for="course_name">Course Name:</label>
    <input type="text" name="course_name" value="<?php echo $row['cource_name']; ?>"><br>

    <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo $row['date']; ?>"><br>

    <input type="submit" name="submit" value="Save">
</form>
