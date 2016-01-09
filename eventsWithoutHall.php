
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
				<h2>רשימת אירועים ללא אולם</h2>
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
				$sql = "SELECT reservation.Reservation_Code, reservation.Reservation_Date, reservation.Size_of_the_event,\n"
			    . "custemer.Id,custemer.full_name,custemer.phone,custemer.address FROM reservation\n"
			    . "INNER JOIN custemer \n"
			    . "ON reservation.Reservation_Code=custemer.Reservation_Code LIMIT 0, 30 ";
				//$result = mysqli_query($conn, $sql);
				/*
				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
				        echo "Reservation_Code: " . $row["Reservation_Code"]. " - Id: " . $row["Id"]. "- full_name : " 
						. $row["full_name"]. "- phone : " . $row["phone"]. "- address : " . $row["address"]."<br>";
				    }*/
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				    echo "<table><tr><th>Reservation Code</th><th>Id</th><th>Full Name</th><th>Reservation Date</th><th>Size of the event</th>
							<th>Phone</th><th>Address</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>".$row["Reservation_Code"]."</td><td>".$row["Id"]."<td>".$row["full_name"]."</td><td>".$row["Reservation_Date"]."</td>
								<td>".$row["Size_of_the_event"]."</td><td>".$row["phone"]."</td><td>".$row["address"]."</td></tr>";
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






