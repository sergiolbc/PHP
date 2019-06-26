<!doctype html>
<html lang="en">
<head>
<title>Site Index</title>
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
				//conect to database
				$my_Connection = mysqli_connect('localhost', 'ser2149064', 'password');
				$my_Connection -> select_db('ser2149064'); //the database name is the same as my userid
				
				$task = "Site Index";

				$date = new DateTime();
				$dateof = $date->format('Y-m-d');	
				$timeof = $date->format('H:i:s');	

				//store index into database
				$input = "INSERT INTO `ser2149064`.`taskindex` (`task`, `when`, `timeof`) VALUES ('$task', '$dateof', '$timeof');";
				mysqli_query($my_Connection, $input);
				
				//get info from database
				$result = $my_Connection -> query('Select `task`, `when`, `timeof` From `ser2149064`.`taskindex` Order by `id` DESC');
				echo "<table border = \"1\" style = \"width:80%;\">\n";
				
				echo "\t<tr style = \"text-align:center;\"><th colspan = \"3\"><h2>Site Index</h2></th></tr>\n";
				echo "\t<tr style = \"text-align:center;\"><td><h4>Task</h4></td><td><h4>Date</h4></td><td><h4>Time</h4></td></tr>\n";
				
				//display the last 15 task indexes
				$rows = $result -> num_rows;
				for($x = ($rows - 15); $x < $rows; $x++)
				{
					$task_Info = $result -> fetch_assoc();
					
					echo "\t<tr><td>$task_Info[task]</td><td>$task_Info[when]</td><td>$task_Info[timeof]</td></tr>\n";
					
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