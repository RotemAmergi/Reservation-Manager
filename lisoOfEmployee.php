
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
				<h2>רשימת עובדים </h2>
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
				
				$sql = "\n"
			    . "SELECT reservation.Reservation_Code ,\n"
			    . "employee.Phone_Number,\n"
			    . "employee.Residential_address,\n"
			    . "employee.Start_date_of_work,\n"
			    . "employee.Date_of_Birth,\n"
			    . "employee.Gender,\n"
				. "employee.Id,\n"
			    . "employee.First_Name,\n"
			    . "employee.Last_Name,\n"
			    . "duty.Duty_Description\n"
			    . "FROM reservation  \n"
			    . "join employee ON reservation.Reservation_Code = employee.Reservation_Code\n"
			    . "join duty ON employee.Duty_Code = duty.Duty_Code LIMIT 0, 30 ";
											
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
					echo "<table><tr><th>Id</th><th>First Name</th><th>Last Name</th><th>Date of Birth</th><th>Gender</th><th>Phone Number</th>
					<th>Address</th><th>Start work</th><th>Duty Description</th></tr>";
					// output data of each row
					while($row = $result->fetch_assoc()) 
					{
						echo "<tr>
						<td>".$row["Id"]."</td>
						<td>".$row["First_Name"]."</td>
						<td>".$row["Last_Name"]."</td>
						<td>".$row["Date_of_Birth"]."</td>
						<td>".$row["Gender"]."</td>
						<td>".$row["Phone_Number"]."</td>
						<td>".$row["Residential_address"]."</td>
						<td>".$row["Start_date_of_work"]."</td>
						<td>".$row["Duty_Description"]."</td>
						</tr>";
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






