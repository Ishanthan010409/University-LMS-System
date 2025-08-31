<?php
session_start();
require_once 'db.php'; // Include database connection

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user from database
    $query = "SELECT * FROM user WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['username'] = $username;
        $_SESSION['roll_no'] = $row['roll_no'];
        $_SESSION['email'] = $row['email_id'];
        $_SESSION['sem'] = $row['semester'];
        $_SESSION['cgpa'] = $row['cgpa'];
        // $_SESSION['username'] = $username;
        header('Location: start.php');
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) { ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form action="login.php" method="post">
            <input type="text" name="username" class="input_field" placeholder="Username">
            <input type="password" name="password" class="input_field" placeholder="Password">
            <input type="submit" name="login" value="Login">

        </form>

        <div></div>
        <p>Not registered yet? <a href="register.php">Register here</a></p>
        <p>Login as admin? <a href="admin_login.php">Login here</a></p>
    </div>
</body>

</html>