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
			color: #061ef3ff;
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
			background-color: #969696ff;
			border: 1px solid #ccc;
			border-radius: 0.5em;
			box-shadow: 0 0.5em 1em rgba(0, 0, 0, 0.1);
			margin: 1em;
			padding: 1em;
			width: 21vw;
            display: flex;
            flex-direction: column;
            height: 20vh;
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
			background-color: #061ef3ff;
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
			background-color: #061ef3ff;
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
            padding: 20px;
            font-size: large;
            display: flex;
            align-items: center;
            justify-content: center;
            /* border: 2px solid black; */
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQHXKWiRZa1vBz8qpzd-nIjLVksfAf1jiOUY6vWXe0q&s");
        }
        .down{
			height: 10vh;
            margin-left: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
		
		</style>


<header>
<h1>Admin Portal</h1>
    <nav>
		<ul>
			<li><a href="admin_start (1).php" >Home</a></li>
			<li><a href="admin_user.php" >Users</a></li>
			<li><a href="admin_cources.php" >Cources</a></li>
			<li><a href="admin_assignment.php">Assignments</a></li>
			<li><a href="admin_submitted.php">Submitted Assignments</a></li>
			<li><a href="admin_announcement.php">Announcement</a></li>
			<li><a href="logout.php" >Logout </a></li>
			<!-- <img src="./logout.png" alt="img" id="log_out"> -->
		</ul>
	</nav>
    <br><br>
</header>