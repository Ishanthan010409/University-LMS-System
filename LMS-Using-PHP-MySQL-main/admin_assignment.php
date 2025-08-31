<html>

<head>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <?php
    // Connect to the database
    include 'db.php';
    include 'header.php';

    function display_assignments($conn)
    {
        $query = "SELECT * FROM assignment";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo "Error: " . mysqli_error($conn);
            exit();
        }

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Semester</th><th>Practical No.</th><th>Course Name</th><th>Date</th><th>Action</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['semester'] . "</td>";
                echo "<td>" . $row['pra_no'] . "</td>";
                echo "<td>" . $row['cource_name'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td><button class=btn><a href=\"edit_assignment.php?id=" . $row['id'] . "\">Edit</a></button> <button class=btn> <a href=\"delete_assignment.php?id=" . $row['id'] . "\">Delete</a></button></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No assignments found.";
        }
    }

    // Display list of assignments
    display_assignments($conn);

    mysqli_close($conn);
    ?>
</body>

</html>