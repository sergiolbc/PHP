<!doctype html>
<html lang="en">
<head>
<title>Slideshow</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<?php
		//connect to database
		$my_Connection = mysqli_connect('localhost', 'ser2149064', 'password');
		$my_Connection -> select_db('ser2149064');
		
		//register index done and time of
		$task = "Slideshow";
		$date = new DateTime();
		$dateof = $date->format('Y-m-d');	
		$timeof = $date->format('H:i:s');	

		//store index into database
		$input = "INSERT INTO `ser2149064`.`taskindex` (`task`, `when`, `timeof`) VALUES ('$task', '$dateof', '$timeof');";
		mysqli_query($my_Connection, $input);

		$infoarray = array();

		$result = $my_Connection -> query('Select id, title, caption From photoinfo');

		for($x = 0; $x < $result -> num_rows; $x++)
		{
			$photoinfo = $result -> fetch_assoc();

			$onephoto = array($photoinfo['title'], $photoinfo['caption']);

			$infoarray[] = $onephoto;

		}
					
		$my_Connection -> close();	

	?>
	<script>
		var image0 = new Image();
		image0.src = "images/tacobell.jpg";
		var title0 = "<?php echo $infoarray[0][0]; ?>";
		var caption0 = "<?php echo $infoarray[0][1]; ?>";
		
		var image1 = new Image();
		image1.src = "images/boys.jpg";
		var title1 = "<?php echo $infoarray[1][0]; ?>";
		var caption1 = "<?php echo $infoarray[1][1]; ?>";
		
		var image2 = new Image();
		image2.src = "images/river.jpg";
		var title2 = "<?php echo $infoarray[2][0]; ?>";
		var caption2 = "<?php echo $infoarray[2][1]; ?>";
		
		var image3 = new Image();
		image3.src = "images/lostboy.jpg";
		var title3 = "<?php echo $infoarray[3][0]; ?>";
		var caption3 = "<?php echo $infoarray[3][1]; ?>";
		
		var image4 = new Image();
		image4.src = "images/boardwalk.jpg";
		var title4 = "<?php echo $infoarray[4][0]; ?>";
		var caption4 = "<?php echo $infoarray[4][1]; ?>";
	
	</script>
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
		<div class="slideshow">
			<img src="images/boardwalk.jpg" alt ="Picture of Friends" name = "slide" width = "400">
			
			<form name = "photoform" class = "slideshowtext">
				<textarea name="title" rows="1" value = " " cols="20" readonly = "readonly"></textarea>
				<br><br>
				<textarea name="caption" rows="1" value = " " cols="50" readonly = "readonly"></textarea>
			</form>
			
			<br>
			
		  <script type = "text/javascript">
				var step = 0;
				function slideit()
				{
					document.images.slide.src = eval ("image" + step + ".src");
					photoform.title.value = eval("title" + step);
					photoform.caption.value = eval("caption" + step);
					
					if(step < 4)
					{step++;}
					
					else
					{step = 0;}
					
					setTimeout("slideit()", 3000);
				}
				slideit();
			</script>
			
	  </div>
		<footer>
			<p> "This site is authored and maintained by "Sergio Gonzalez." It is not an official website of the Maricopa County Community College District, and Maricopa is not responsible for the content of this site." </p>			
		</footer>
	</div>
</body>
</html>