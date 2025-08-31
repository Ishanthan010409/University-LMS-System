<?php
session_start();
require_once 'db.php';

$query = "SELECT * FROM `submitted_assignment`";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Assignment</title>
	<style>
    /* Set the background color and font for the whole page */
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    /* Set the width and center the form on the page */


    /* Style the form fields */
    label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    /* Style the submit button */
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    /* Style the headings */
    h2 {
        color: #2196F3;
        text-align: center;
        margin-top: 40px;
        margin-bottom: 20px;
    }
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    th, td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #2196F3;
        color: #fff;
        font-weight: bold;
        font-size: 18px;
    }

    td {
        font-size: 16px;
        background-color: #fff;
        color: #333;
    }

    tr:nth-child(even) td {
        background-color: #f2f2f2;
    }

    tr:hover td {
        background-color: #ddd;
    }
</style>

<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include ('header.php'); ?>
	<h2>Submitted Assignments</h2>
    <div class="cource">
		<p>
		<table>
  			<tr>
    			<th>Sr. no.</th>
    			<th>Roll no</th>
    			<th>Cource Name</th>
    			<th>Practical</th>
    			<th>Submitiion Date</th>
    			<th>Due Date</th>
  			</tr>

			<?php 
				$cnt=1;
				while ($row = mysqli_fetch_row($result)) {
			?>
					<?php 
							if(date("Y-m-d") > $row[3]){
					?>

					<tr style="color:red;" >

					<?php
							}
							else{
					?>

					<tr>

					<?php	
							}
					?>
    				<td> <?php echo $cnt++; ?> </td>
    				<td><?php echo $row[1]; ?></td>
    				<td><?php echo $row[2]; ?></td>
    				<td><?php echo $row[3]; ?></td>
    				<td><?php echo $row[4]; ?></td>
    				<td><?php echo $row[5]; ?></td>
    				
					
  				</tr>

				<?php
					}
					// echo mysqli_num_rows($result);
				?>
		</table>
		</p>
</div> 
</body>
</html>