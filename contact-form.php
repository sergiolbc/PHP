<!doctype html>
<html lang="en">
<head>
<title>Contact</title>
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
			<form action = "task-contact.php" method = "get">
						<table>
						<tr><td>Name:</td><td><input type = "text" name = "name"/></td></tr>
						<tr><td>Email:</td><td><input type = "text" name = "email"/></td></tr>
							
						<tr><td>Subject:</td><td>
							<select name = "subject">
								<option value = "Join">Join</option>
								<option value = "Complaint">Complaint</option>
								<option value = "Other">Other</option>
							</select>
						</td></tr>		
							
						<tr><td>Comment:</td><td><textarea name="comment" rows="5" cols="40">Enter text here.</textarea></td></tr>
						<tr><td colspan = "2"><input type = "submit" value = "Submit" />&nbsp;<input type="reset" value="Reset"></td></tr>
						</table>
			</form>
			<br/>
		</div>
		<br/>
		<footer>
			<p> "This site is authored and maintained by "Sergio Gonzalez." It is not an official website of the Maricopa County Community College District, and Maricopa is not responsible for the content of this site." </p>			
		</footer>
	</div>
</body>
</html>