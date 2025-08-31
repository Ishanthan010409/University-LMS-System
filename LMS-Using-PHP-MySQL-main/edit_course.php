<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM cources WHERE id = '$id'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <h2>Edit Course</h2>
                <form action="edit_submit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" class="form-control" id="semester" name="semester"
                            value="<?php echo $row['semester']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cource_name">Course Name</label>
                        <input type="text" class="form-control" id="cource_name" name="cource_name"
                            value="<?php echo $row['cource_name']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="cource_policy">Course Policy</label>
                        <textarea class="form-control" id="cource_policy"
                            name="cource_policy"><?php echo $row['cource_policy']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
                    <a href="admin_cources.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>