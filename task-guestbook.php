<!doctype html>
<html lang="en">
<head>
<title>Guestbook</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
	<div id="top">
		<header>
		  <h1>Ryeder's Graduation Day</h1>
			
			<?php 
				echo date("m/d/Y h:i A"); 
			
			?>
			
		  <nav>
				<a href="index.php">Home</a>
				<a href="task-weather.php">Weather</a>
				<a href="guestbook-form.php">Guestbook</a>
				<a href="task-slideshow.php">Slideshow</a>
				<a href="contact-form.php">Contact Us</a>
				<a href="task-siteindex.php">Site Index</a>
			</nav>
		</header>
		<br/>
		<div class="contact">
		<br/>
			<?php
				if($_POST['name'] == "" || $_POST['name'] == NULL || $_POST['email'] == "" || $_POST['email'] == NULL)
					header("Location: guestbook-form.php");
					
				//make variables of previous form input
				$name = $_POST['name'];
				$email = $_POST['email'];
				$comment = $_POST['comment'];
			
				//conect to databas
				$my_Connection = mysqli_connect('localhost', 'ser2149064', 'password');
				$my_Connection -> select_db('ser2149064'); //the database name is the same as my userid
				
				//IF ALREADY SIGNED GUESTBOOK, WON'T ADD AGAIN WITH SAME EMAIL
				//store info into database
				$input = "INSERT INTO `ser2149064`.`guestbook` (`name`, `email`, `comment`) VALUES ('$name', '$email', '$comment');";		
				mysqli_query($my_Connection, $input);
				
				//send task to siteindex table
				$task = "Guestbook";

				$date = new DateTime();
				$dateof = $date->format('Y-m-d');	
				$timeof = $date->format('H:i:s');	

				//store index into database
				$taskinput = "INSERT INTO `ser2149064`.`taskindex` (`task`, `when`, `timeof`) VALUES ('$task', '$dateof', '$timeof');";
				mysqli_query($my_Connection, $taskinput);
				
				//get info from database, but not print email
				$result = $my_Connection -> query('Select name, email, comment From guestbook');
				echo "<table border = \"1\" style = \"width:80%;\">\n";
				
				echo "\t<tr><td><h3>Name</h3></td><td><h3>Comment</h3></td></tr>\n";
				
				for($x = 0; $x < $result -> num_rows; $x++)
				{
					$guest_Info = $result -> fetch_assoc();
					
					echo "\t<tr><td>$guest_Info[name]</td><td>$guest_Info[comment]</td></tr>\n";
					
				}
				
				echo '</table>';
				
				$result -> free();
				
				$my_Connection -> close();
					
			
			?>
		
		<br/>
		</div>
		<br/>
		<footer>
			<p> "This site is authored and maintained by "Sergio Gonzalez." It is not an official website of the Maricopa County Community College District, and Maricopa is not responsible for the content of this site." </p>			
		</footer>
	</div>
</body>
</html>