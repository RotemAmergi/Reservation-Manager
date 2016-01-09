
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
				<h2>רשימת לקוחות שביצעו הזמנות</h2>				
														
				<button class="buttonSquare" onclick=location.href="listOfCustomer.php">sort by reservation code (default)</button>	
				<button class="buttonSquare" onclick=location.href="listOfCustomerNameASC.php">sort by customer name (a-z)</button>	
				<button class="buttonSquare" onclick=location.href="listOfCustomerNameDESC.php">sort by customer name (z-a)</button>						
						
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
				$sql = "SELECT Id,full_name,phone,address,Reservation_Code 
				FROM custemer 
				ORDER BY full_name ASC";				
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
				    echo "<table><tr>
					    <th>Id</th>
					    <th>Full Name</th>
					    <th>Phone</th>
				 	    <th>Address</th>
				  	    <th>Res. Code</th>
				    </tr>";
				   
				    while($row = $result->fetch_assoc())  // output data of each row
				    {
				        echo "<tr><td>".
				        $row["Id"]."</td><td>".
				        $row["full_name"]."</td><td>".
				        $row["phone"]."</td><td>".
				        $row["address"]."</td><td>".
						$row["Reservation_Code"]."</td></tr>";
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






