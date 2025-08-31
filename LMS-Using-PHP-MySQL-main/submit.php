<?php
session_start();
require('db.php');

$var1 = $_GET['cource_name'];
$var2 = $_GET['pra_no'];
$var3 = $_GET['date'];
$username = $_SESSION['roll_no'];

if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["upload_file"]["size"] > 5000000) { // 5 MB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($fileType != "pdf" && $fileType != "doc" && $fileType != "docx" && $fileType != "txt" && $fileType != "jpg" && $fileType != "jpeg" && $fileType != "png") {
        echo "Sorry, only PDF, DOC, DOCX, TXT, JPG, JPEG, PNG files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["upload_file"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $query = "SELECT * FROM submitted_assignment WHERE roll_no = ? AND cource_name = ? AND pra_no = ? ";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $username,$var1,$var2);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $query = "UPDATE submitted_assignment SET submission_date= ? WHERE roll_no = ? AND cource_name = ? AND pra_no = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss",date('Y-m-d'), $username ,$var1,$var2);
        $stmt->execute();

    } else {
        $query = "INSERT INTO submitted_assignment (roll_no, cource_name, pra_no, submission_date, date) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssss",$username ,$var1,$var2,date('Y-m-d'),$var3);
        $stmt->execute();
    }
    header('Location: assignment.php'); 
    exit();
}
