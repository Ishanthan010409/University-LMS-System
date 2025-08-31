<!DOCTYPE html>
<html>
<head>
    <title>Admin Portal</title>
    <link rel="stylesheet" type="text/css" href="final_style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        * {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }
        nav {
            background-color: white;
            box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1;
        }
        nav ul { list-style-type: none; overflow: hidden; }
        nav li { float: left; }
        nav li a {
            display: block;
            color: #428bca;
            font-size: 1.2em;
            padding: 0.8em 1em;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        nav a.active { background-color: white; }
        nav li a:hover { border-bottom: 2px solid blue; }
        .cource { display: flex; flex-wrap: wrap; margin: 80px 80px; }
        table { border-collapse: collapse; width: 100%; text-align: center; }
        th { background-color: #428bca; color: white; font-weight: bold; text-transform: uppercase; }
        th, td { padding: 12px; }
        tr { border: 1px solid #ddd; }
        tr:hover { background-color: #f5f5f5; }
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
        .btn:hover { background-color: #3071a9; }
        .message { margin: 80px; font-size: 1.2em; color: green; }
    </style>
</head>
<body>

<?php
include 'db.php';
include 'header.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

// Delete user if delete button is clicked
if (isset($_GET['delete'])) {
    $roll_no = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM user WHERE roll_no = ?");
    $stmt->bind_param("s", $roll_no);
    if ($stmt->execute()) {
        $message = "User with Roll No: $roll_no deleted successfully.";
    } else {
        $message = "Error deleting user.";
    }
    $stmt->close();
}

// Display message if any
if (!empty($message)) {
    echo "<p class='message'>$message</p>";
}

// Display list of users
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);

if ($result === false) {
    die("Error executing query: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>RollNo</th><th>Username</th><th>Email</th><th>Semester</th><th>Grade</th><th>Action</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['roll_no']) . "</td>";
        echo "<td>" . htmlspecialchars($row['userName']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['semester']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cgpa']) . "</td>";
        echo "<td>
            <a href='?delete=" . urlencode($row['roll_no']) . "' class='btn' onclick=\"return confirm('Are you sure you want to delete this user?');\">Delete</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='message'>No users found.</p>";
}

mysqli_close($conn);
?>

</body>
</html>
