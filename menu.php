
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
				<h2>סוגי תפריטים ומנות</h2>
				<button class="buttonSquare" onclick=location.href="updateMenuForm.php">שינוי במחיר המנה</button>
				<button class="buttonSquare" onclick=location.href="dishDecForm.php">שינוי בתיאור המנה</button>	
				<button class="buttonSquare" onclick=location.href="insetNewMenuForm.php">הוספה של תפריט</button>
				<button class="buttonSquare" onclick=location.href="insertDishForm.php">הוספה של מנה</button>
				<button class="buttonSquare" onclick=location.href="deleteForm.php">מחיקה של מנה</button>					
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
				$sql = "SELECT menu.Menu_code,
						menu.Name, 
						menu.Price_per_People,
						dish.Id_dish,
						dish.Name_dish,
						dish.Des_dish
						FROM menu
						join dish ON menu.Menu_code = dish.Menu_code	
						ORDER BY menu.Menu_code";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) 
				{
				    echo "<table><tr><th>Menu code</th><th>Menu.Name</th><th>Id_dish</th><th>Name_dish</th><th>Des_dish</th><th>Price per one people</th></tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) 
				    {
				       echo "<tr><td>".$row["Menu_code"]."</td>
						<td>".$row["Name"]."</td>
						<td>".$row["Id_dish"]."</td>
						<td>".$row["Name_dish"]."</td>
						<td>".$row["Des_dish"]."</td>
						<td>".$row["Price_per_People"]."</td></tr>";
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






