
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
				<h2>חשבוניות</h2>
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
				$sql = "SELECT 
						reservation.Reservation_Code, 
						reservation.Size_of_the_event,
						reservation.Invoice_code,
						reservation.Menu_code,
						menu.Menu_code,
						menu.Name,
						menu.Price_per_People
						FROM reservation			    
						join menu ON reservation.Menu_code = menu.Menu_code	"; 
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				    echo "<table><tr><th>Invoice_code</th><th>Reservation Code</th><th>Menu code</th><th>Name Menu</th><th>Price per People</th><th>Size event</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>".$row["Invoice_code"]."</td><td>".$row["Reservation_Code"]."</td><td>".$row["Menu_code"]."</td><td>".$row["Name"]."</td><td>".$row["Price_per_People"]."</td>
						<td>".$row["Size_of_the_event"]."</td></tr>";
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






