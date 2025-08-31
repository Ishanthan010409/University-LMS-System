<?php
session_start();
require_once 'db.php';

// Check if user is logged in as admin
if (!isset($_SESSION['admin_name'])) {
    header('Location: admin_login.php');
    exit();
}

$message = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add new assignment
    if (isset($_POST['add_assignment'])) {
        $semester = $_POST['semester'];
        $pra_no = $_POST['pra_no'];
        $cource_name = $_POST['cource_name'];
        $date = $_POST['date'];
        
        $query = "INSERT INTO assignment (semester, pra_no, cource_name, date) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iiss", $semester, $pra_no, $cource_name, $date);
        
        if ($stmt->execute()) {
            $message = "Assignment added successfully!";
        } else {
            $message = "Error adding assignment: " . $conn->error;
        }
    }
    // Update assignment
    elseif (isset($_POST['update_assignment'])) {
        $id = $_POST['id'];
        $semester = $_POST['semester'];
        $pra_no = $_POST['pra_no'];
        $cource_name = $_POST['cource_name'];
        $date = $_POST['date'];
        
        $query = "UPDATE assignment SET semester=?, pra_no=?, cource_name=?, date=? WHERE id=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("iissi", $semester, $pra_no, $cource_name, $date, $id);
        
        if ($stmt->execute()) {
            $message = "Assignment updated successfully!";
        } else {
            $message = "Error updating assignment: " . $conn->error;
        }
    }
}

// Handle delete action
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM assignment WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $message = "Assignment deleted successfully!";
    } else {
        $message = "Error deleting assignment: " . $conn->error;
    }
}

// Fetch all upcoming assignments
$query = "SELECT * FROM assignment WHERE date >= CURDATE() ORDER BY date ASC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Upcoming Activities</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            padding-top: 60px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .btn {
            background-color: #4285f4;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }
        
        .btn-edit {
            background-color: #fbbc05;
        }
        
        .btn-delete {
            background-color: #ea4335;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .form-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="container">
        <div class="header">
            <h1>Upcoming Activities</h1>
            <a href="admin_start (1).php" class="btn">Back to Dashboard</a>
        </div>
        
        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'Error') !== false ? 'error' : 'success'; ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        
        <!-- Add/Edit Form -->
        <div class="form-container">
            <h2><?php echo isset($_GET['edit']) ? 'Edit' : 'Add New'; ?> Assignment</h2>
            <form method="POST" action="">
                <?php
                $editing = isset($_GET['edit']);
                $assignment = null;
                
                if ($editing) {
                    $id = $_GET['edit'];
                    $query = "SELECT * FROM assignment WHERE id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $assignment = $stmt->get_result()->fetch_assoc();
                }
                ?>
                
                <?php if ($editing): ?>
                    <input type="hidden" name="id" value="<?php echo $assignment['id']; ?>">
                <?php endif; ?>
                
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number" class="form-control" id="semester" name="semester" 
                           value="<?php echo $editing ? $assignment['semester'] : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="pra_no">Practical Number</label>
                    <input type="number" class="form-control" id="pra_no" name="pra_no" 
                           value="<?php echo $editing ? $assignment['pra_no'] : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="cource_name">Course Name</label>
                    <input type="text" class="form-control" id="cource_name" name="cource_name" 
                           value="<?php echo $editing ? htmlspecialchars($assignment['cource_name']) : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="date">Due Date</label>
                    <input type="date" class="form-control" id="date" name="date" 
                           value="<?php echo $editing ? $assignment['date'] : ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <?php if ($editing): ?>
                        <button type="submit" name="update_assignment" class="btn">Update Assignment</button>
                        <a href="admin_upcoming.php" class="btn btn-delete">Cancel</a>
                    <?php else: ?>
                        <button type="submit" name="add_assignment" class="btn">Add Assignment</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
        
        <!-- Assignments List -->
        <div class="assignments-list">
            <h2>Upcoming Assignments</h2>
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Semester</th>
                            <th>Practical No</th>
                            <th>Course Name</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['semester']; ?></td>
                                <td><?php echo $row['pra_no']; ?></td>
                                <td><?php echo htmlspecialchars($row['cource_name']); ?></td>
                                <td><?php echo date('F j, Y', strtotime($row['date'])); ?></td>
                                <td>
                                    <a href="?edit=<?php echo $row['id']; ?>" class="btn btn-edit">Edit</a>
                                    <a href="?delete=<?php echo $row['id']; ?>" 
                                       class="btn btn-delete" 
                                       onclick="return confirm('Are you sure you want to delete this assignment?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No upcoming assignments found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>