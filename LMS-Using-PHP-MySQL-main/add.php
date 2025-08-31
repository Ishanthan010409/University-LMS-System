<?php
// Database Connection
include('db.php');
// Add Course
if (isset($_POST['submit'])) {
    if (isset($_POST['semester']) && isset($_POST['cource_name']) && isset($_POST['cource_policy'])) {
        $semester = $_POST['semester'];
        $cource_name = $_POST['cource_name'];
        $cource_policy = $_POST['cource_policy'];

        $sql = "INSERT INTO cources (semester, cource_name, cource_policy) VALUES ('$semester', '$cource_name', '$cource_policy')";
        if (mysqli_query($conn, $sql)) {
            echo "Course added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    header("Location: admin_cources.php");
}
?>