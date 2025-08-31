<?php
    // Connect to database
    include 'db.php';


    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $cource_name = $_POST['cource_name'];
        $cource_policy = $_POST['cource_policy'];
        $sem = $_POST['semester'];


        // Build SQL query
        $sql = "UPDATE cources SET  semester = '$sem', cource_name = '$cource_name', cource_policy = '$cource_policy' WHERE id = '$id'";
        // echo $sql;
        // Execute query
        $result = mysqli_query($conn, $sql);

        // Check for errors
        if (!$result) {
            echo "Error updating course: " . mysqli_error($conn);
        }
        else{
            echo "<h1>Edited Successfully</h1>";
            header("Location: admin_cources.php");
        }
        
    }

    // Close database connection
    mysqli_close($conn);
    ?>