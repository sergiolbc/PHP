<!doctype html>
<html lang="en">
<head>
<title>Weather</title>
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
			<div class = "weather">	
				<br/>
				<?php
					$my_Connection = mysqli_connect('localhost', 'ser2149064', 'password');
					$my_Connection -> select_db('ser2149064'); //the database name is the same as my userid

					$task = "Weather Search";

					$date = new DateTime();
					$dateof = $date->format('Y-m-d');	
					$timeof = $date->format('H:i:s');	

					//store index into database
					$input = "INSERT INTO `ser2149064`.`taskindex` (`task`, `when`, `timeof`) VALUES ('$task', '$dateof', '$timeof');";
					mysqli_query($my_Connection, $input);

					$my_Connection -> close(); //the rest doesn't use the database
				
					$lat = $_GET['lat'];
					
					$lon = $_GET['lon'];
					
					$url = "https://api.darksky.net/forecast/faf636d643d85714bbf400a638f08ce2/" . $lat . "," . $lon;

					$forecast = json_decode(file_get_contents($url));

					$temp = intval($forecast->currently->temperature);
				
					$sum = $forecast->currently->summary;
					
					echo "<h3>Latitude: " . $lat . " Longitude: " . $lon . "</h3>";

					echo "<h1>". $temp . "F</h1>";
				
					echo $sum . "<br>";

				?>
				
				<p><a href="https://darksky.net/poweredby/">Powered by Dark Sky</a></p>				
			</div>
			<br/>
		
		<footer>
			<p> "This site is authored and maintained by "Sergio Gonzalez." It is not an official website of the Maricopa County Community College District, and Maricopa is not responsible for the content of this site." </p>			
		</footer>
	</div>
</body>
</html>