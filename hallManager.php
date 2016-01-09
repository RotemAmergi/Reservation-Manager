
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
				<h2>ניהול אולמות</h2>	
				<section id="tableContainer">					 
					 
				<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "reservvationmanager";
							
				$conn = mysqli_connect($servername, $username, $password, $dbname); // Create connection
				if (!$conn) // Check connection
				{	
				    die("Connection failed: " . mysqli_connect_error());
				}
				
				
				
				$sql = 	"   SELECT 
							reservation.Reservation_Code,
							reservation.Reservation_Date,
							reservation.Size_of_the_event,
							reservation.Invoice_code,
							reservation.Menu_code,
							menu.Menu_code,
							menu.Name,
							event.Reservation_Code,
							event.hall_code,
							events_hall.hall_code,
							events_hall.name_hall				
							FROM reservation		    
							 JOIN event ON reservation.Reservation_Code = event.Reservation_Code
							JOIN menu ON reservation.Menu_code = menu.Menu_code							 
							 JOIN events_hall ON event.hall_code = events_hall.hall_code
							WHERE events_hall.hall_code = ('".$_POST['hall_code']."')";
							
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				    echo "<table><tr><th>Invoice_code</th><th>Reservation_Code</th><th>Reservation_Date</th><th>name_hall</th><th>Menu code</th><th>Name</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>".$row["Invoice_code"]."</td><td>".$row["Reservation_Code"]."</td><td>".$row["Reservation_Date"]."</td><td>".$row["name_hall"]."</td><td>".$row["Menu_code"]."</td><td>".$row["Name"]."</td></tr>";
				    }
				    echo "</table>";
				} else {
				    echo "0 results";
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






