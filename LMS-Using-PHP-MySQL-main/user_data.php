<style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h2 {
    margin-bottom: 10px;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

th {
    background-color: #777676ff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

form label {
    display: block;
    margin-bottom: 5px;
}

form input, form textarea {
    display: block;
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 10px;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

.error {
    color: red;
    margin-bottom: 10px;
}

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

* {
    margin: 0px;
    padding: 0px;
    font-family: 'Roboto', sans-serif;
}

nav {
    background-color: white;
    /* background-color: red; */
    box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

nav li {
    float: left;
}

nav li a {
    display: block;
    color: #428bca;
    font-size: 1.2em;
    padding: 0.8em 1em;
    text-align: center;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

nav a.active {
    /* border-bottom: 2px solid blue; */
    background-color: white;
    /* border-bottom: 2px solid blue; */
}

nav li a:hover {
    /* transform: scale(1.2); */
    border-bottom: 2px solid blue;
}

body {
    /* font-family: Arial, sans-serif; */
}

.card {
    background-color: #f7f7f7;
    border: 1px solid #ccc;
    border-radius: 0.5em;
    box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
    margin: 1em;
    padding: 1em;
    width: 25vw;
    display: flex;
    flex-direction: column;
    height: 35vh;
}

.card h2 {
    font-size: 1.5em;
    margin-bottom: 0.5em;
}

.card p {
    margin: 0;
}

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

.btn:hover {
    background-color: #3071a9;
}

.cource {
    /* margin: 100px; */
    display: flex;
    flex-wrap: wrap;
    margin: 20px 80px;
    /* align-items: center; */
    /* justify-content: center; */
}

.heading {
    height: 25vh;
    padding: 20px;
    font-size: large;
    display: flex;
    align-items: center;
    justify-content: center;
    /* border: 2px solid black; */
    background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHXKWiRZa1vBz8qpzd-nIjLVksfAf1jiOUY6vWXe0q&s");
}

.down {
    height: 10vh;
    margin-left: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

<?php
// Connect to the database
include 'header.php';
include 'config.php';

function display_users($conn)
{
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Roll No</th><th>Username</th><th>Email</th><th>Semester</th><th>CGPA</th><th>Action</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['roll_no'] . "</td>";
            echo "<td>" . $row['userName'] . "</td>";
            echo "<td>" . $row['email_id'] . "</td>";
            echo "<td>" . $row['semester'] . "</td>";
            echo "<td>" . $row['cgpa'] . "</td>";
            echo "<td><a href=\"home.php?delete=" . $row['roll_no'] . "\">Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No users found.";
    }
}

// Delete user if delete button is clicked
if (isset($_GET['delete'])) {
    $roll_no = $_GET['delete'];
    $query = "DELETE FROM user WHERE roll_no = '$roll_no'";
    mysqli_query($conn, $query);
    header("Location: delete.php");
    exit();
}

// Display list of users
display_users($conn);

mysqli_close($conn);
?>