
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
				<h2>רשימת הזמנות שבוצעו</h2>
				<button class="buttonSquare" onclick=location.href="changeSizeOfEvent.php">שינויים בגודל האירוע</button>	
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
					reservation.Reservation_Date,
					reservation.Invoice_code, 
									
					reservation.Size_of_the_event,
					custemer.Id,
					custemer.full_name,
					custemer.phone,
					custemer.address,
					event.Event_Code,
					event.type_event_code,
					events_hall.hall_code,
					events_hall.name_hall,
					events_hall.People_capacity,
					event_type.type_event,
					event_type.type_event_code			
					FROM reservation			
					join custemer ON reservation.Reservation_Code = custemer.Reservation_Code				
					join event ON reservation.Reservation_Code = event.Reservation_Code				
					join events_hall ON event.hall_code = events_hall.hall_code			
					join event_type ON event.type_event_code = event_type.type_event_code		
					ORDER BY reservation.Size_of_the_event DESC" ;
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
				    echo "<table><tr><th>Invoice code</th><th>Res. Code</th><th>Id</th><th>Full Name</th><th>Res. Date</th><th>Event size</th>
							<th>Phone</th><th>Address</th><th>hall name</th><th>Event type</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) 
				    {
				        echo "<tr><td>".
				        $row["Invoice_code"]."</td><td>".
				        $row["Reservation_Code"]."</td><td>".
				        $row["Id"]."<td>".
				        $row["full_name"]."</td><td>".
				        $row["Reservation_Date"]."</td><td>".
						$row["Size_of_the_event"]."</td><td>".
						$row["phone"]."</td><td>".
						$row["address"]."</td><td>".
						$row["name_hall"]."</td><td>".
						$row["type_event"]."</td></tr>";
				    }
				    echo "</table>";
				} 
				else 
				{
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






