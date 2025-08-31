<?php
session_start();
require_once 'db.php';

$query = "SELECT * FROM `announcement` WHERE `semester` = ? ";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION['sem']);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
		
		*{
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
			width: 100%;
            display: flex;
            flex-direction: column;
            height: 10vh;
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

        .cource{
            /* margin: 100px; */
            display: flex;
            flex-wrap: wrap;
            margin:20px 80px;
            /* align-items: center; */
            /* justify-content: center; */
        }
        .heading{
			height: 25vh;
            padding: 5px;
            font-size: large;
            display: flex;
			flex-direction: column;
            align-items: center;
            justify-content: center;
            /* border: 2px solid black; */
        }
        .down{
            height: 10vh;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
			
        }
		.courcename{
			margin-bottom: 15px;
			background-color: #428bca;
			width: 100%;
			padding: 5px;
			display: flex;
			justify-content: center;
			border-radius: 4px;
			color:white;
		}
		.first{
			width: 80%;
		}
		.second{
			width: 20%;

		}
		

    </style>
</head>
<body>
    <nav>
		<ul>
			<li><a href="start.php" >Home</a></li>
			<li><a href="cources.php" class="active">Courses</a></li>
			<li><a href="assignment.php">Assignments</a></li>
			<li><a href="upcoming_activities.php">Upcoming activities</a></li>
			<li><a href="announcement.php">Announcement</a></li>
			<li><a href="logout.php" >Logout </a></li>
			<!-- <img src="./logout.png" alt="img" id="log_out"> -->
		</ul>
	</nav>
	<br><br>

    <div class="cource">
		<p>
			<?php 
				while ($row = mysqli_fetch_row($result)) {
					// var_dump($row);
				?>
				<div class="card">
                    <div class="heading">

                        <p>
							<div class="courcename">
									<?php echo $row[2]."<br>"; ?>
							</div>
							<div class="desc">

								<?php echo $row[3]."<br>"; ?>
							</div>

                        </p>
                    </div>
					<br>   
				</div>
				<?php
				}
				?>
		</p>
</div> 
</body>
</html>