
<!DOCTYPE HTML>
<html dir=RTL>
	<head>
		<meta charset="UTF-8">
			<title>מערכת לניהול אירועים</title>
			<link rel="stylesheet" type="text/css" href="include/cssstyle.css">
			<script language="JavaScript" src="include/javascript.js"></script>
	</head>

	<body onLoad=mark()>
		<script>document.write(header)</script>

		<div id="wrapper">
			<main>
				<h2>הוספה של תפריט</h2>
				<section>
								
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "reservvationmanager";
					// Create connection
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					// Check connection
					if (!$conn) {
						die("Connection failed: " . mysqli_connect_error());
					}

					$sql="INSERT INTO `menu` (`Name`,`Menu_code`,`Price_per_People`) 
					VALUES 
					(('".$_POST['Name']."'),
					('".$_POST['Menu_code']."'),
					('".$_POST['Price_per_People']."'))";

					if (mysqli_query($conn, $sql)) {
						echo "New record created successfully return to table";
					} else {
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}

					mysqli_close($conn);
					?>

				</section>	
			</main>
			
			<script>document.write(sideNav)</script>
			<script>document.write(footer)</script>
	</div>
	
</body>
</html>






