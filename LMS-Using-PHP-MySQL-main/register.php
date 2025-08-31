<?php
session_start();
require_once 'db.php'; // Include database connection

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $sem = $_POST['sem'];
    $cgpa = $_POST['cgpa'];
    $password = $_POST['password'];
    $roll_no = $_POST['roll_no'];

    // Check if username already exists in the database
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $error = "Username already taken";
    } else {
        // Insert new user into the database
        $query = "INSERT INTO user (roll_no, userName, email_id, semester, cgpa, password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss",$roll_no, $username, $email, $sem, $cgpa, $password);
        $stmt->execute();

        // Set session variables for registered user
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        header('Location: login.php'); // Redirect to home page after successful registration
        exit();
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,500;1,300&family=Roboto:wght@100;700&display=swap');
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register.php" method="post">
            <input type="text" name="username" class="input_field" placeholder="Username">
            <input type="email" name="email" class="input_field"  placeholder="email_id">
            <input type="text" name="roll_no" class="input_field"  placeholder="roll_no">
            <input type="number" name="sem" class="input_field"  placeholder="semester">
            <input type="text" name="cgpa" class="input_field"  placeholder="cgpa">
            <input type="password" name="password" class="input_field" placeholder="Password">
            <input type="submit" name="register" value="Register">
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>

</html>