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
			<?php
				$my_Connection = mysqli_connect('localhost', 'ser2149064', 'password');
				$my_Connection -> select_db('ser2149064'); //the database name is the same as my userid
				
				$task = "Contact";

				$date = new DateTime();
				$dateof = $date->format('Y-m-d');	
				$timeof = $date->format('H:i:s');	

				//store index into database
				$input = "INSERT INTO `ser2149064`.`taskindex` (`task`, `when`, `timeof`) VALUES ('$task', '$dateof', '$timeof');";
				mysqli_query($my_Connection, $input);
			
				//calls function to validate an email address
				if(validateEmail($_REQUEST['email']))
				{
					//info from user
					$name = $_REQUEST['name'];
					$email = $_REQUEST['email'];
					$subject = $_REQUEST['subject'];
					$comment = $_REQUEST['comment'];

					//string to string to make easier
					$mailcontent = "User name: " . $name . "<br />" .
								   "User email: " . $email . "<br />" .
								   "User subject: " . $subject . "<br />" .
								   "User comment: " . $comment . "<br />";

					//MAIL FUNCTION
					switch($subject)
					{
						case "Join":
							$toAddress = "joinser2149064@maricopa.edu";
							break;
							
						case "Complaint":
							$toAddress = "complaintser2149064@maricopa.edu"; //can switch it out, maybe someone from HR
							break;
							
						default:
							$toAddress = "otherser2149064@maricopa.edu"; //switch for proper contact						
							
					}
					
					//store email info into database
					$input = "INSERT INTO `ser2149064`.`contactemail` (`name`, `email`, `subject`, `toemail`, `comment`) VALUES ('$name', '$email', '$subject', '$toAddress', '$comment');";
					
					mysqli_query($my_Connection, $input);
					
					$header = "From: " . $email . "\r\n";
					//mail($toAddress, $subject, $mailcontent, $header);
					echo "mail(\$toAddress, \$subject, \$mailcontent, \$header);";

					//acknowledge submitted
					echo "<h3>Email has been sent with the following information:</h3></h4>" . $mailcontent . "</h4>";
				}

				else
					echo "<h3 style=\"color:red;\">Invalid email.</h3>";

				//function to validate email
				function validateEmail($email)
				{
					$emailExpression = "/^[a-zA-Z0-9\.-_]{1,}@[a-zA-Z0-9\.-_]{1,}(.com|.net|.edu){1}/";

					if(preg_match($emailExpression, $email))
						return true;

					else 
						return false;

				}
			
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