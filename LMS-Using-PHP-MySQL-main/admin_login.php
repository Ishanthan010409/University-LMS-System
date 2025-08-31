<?php
session_start();
include 'db.php'; // Include database connection

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch user from database
    $query = "SELECT * FROM admin WHERE admin_name = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['admin_name'] = $username;
        header('Location:  admin_start (1).php'); 
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Admin Login</h2>
        <?php if (isset($error)) { ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php } ?>
        <form action="admin_login.php" method="post">
            <input type="text" name="username"  class="input_field" placeholder="Adminname">
            <input type="password" name="password" class="input_field" placeholder="Password">
            <input type="submit" name="login" value="Login">

        </form>

    </div>
</body>

</html>