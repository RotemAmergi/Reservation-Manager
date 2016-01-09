
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
				<h2>רשימת אירועים לפי תקופה</h2>
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
				
				$sql = "SELECT reservation.Reservation_Code,
						reservation.Reservation_Date,
						event.Reservation_Code,
						event.Event_Code,
						event.hall_code,
						event.type_event_code,
						events_hall.hall_code,
						events_hall.name_hall,
						events_hall.People_capacity,
						event_type.type_event_code,
						event_type.type_event			    
						FROM reservation			    
						join event ON reservation.Reservation_Code = event.Reservation_Code			   
						join events_hall ON event.hall_code = events_hall.hall_code			    
						join event_type ON event.type_event_code = event_type.type_event_code		   
						ORDER BY reservation.Reservation_Date ASC  ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				    echo "<table><tr><th>Res. Code</th><th>Event Code</th><th>Hall code</th><th>Name hall</th><th>People capacity</th><th>Event type</th><th>Event type code</th><th>Res. Date</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>".$row["Reservation_Code"]."</td>
						<td>".$row["Event_Code"]."</td>
						<td>".$row["hall_code"]."</td>
						<td>".$row["name_hall"]."</td>
						<td>".$row["People_capacity"]."</td>
						<td>".$row["type_event"]."</td>
						<td>".$row["type_event_code"]."</td>
						<td>".$row["Reservation_Date"]."</td></tr>";
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






