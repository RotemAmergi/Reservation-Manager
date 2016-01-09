
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
				<h2>יצירה דף הזמנה </h2>
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

						$sql="INSERT INTO `custemer` (`Reservation_Code`,`Id`,`full_name`,`phone`,`address`) 
						VALUES 
						(('".$_POST['Reservation_Code']."'),
						('".$_POST['Id']."'),
						('".$_POST['full_name']."'),
						('".$_POST['phone']."'),
						('".$_POST['address']."'))";
						if (mysqli_query($conn, $sql)) {
							echo "New record created successfully return to table";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
						mysqli_close($conn);
						?>
						<?php
					// define variables and set to empty values
					$Reservation_CodeErr = $Reservation_DateErr = $Size_of_the_eventErr = $Invoice_codeErr=$Menu_codeErr="";
				    $Reservation_Code= $Reservation_Date = $Size_of_the_event = $Invoice_code=$Menu_code="";
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				   if (empty($_POST["Reservation_Code"])) {
				     $Reservation_CodeErr = "Reservation_Code is required";
				   } else {
				     $Reservation_Code = test_input($_POST["Reservation_Code"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$Reservation_Code)) {
				       $Reservation_CodeErr = "Only letters and white space allowed"; 
				     }
				   }
				   
				   if (empty($_POST["Reservation_Date"])) {
				     $Reservation_DateErr = "Reservation_Date is required";
				   } else $Reservation_Date = test_input($_POST["Reservation_Date"]);{
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$Reservation_Date)) {
				       $Reservation_DateErr = "Only letters and white space allowed"; 
				     }
				   }
				   if (empty($_POST["Size_of_the_event"])) {
				     $Size_of_the_eventErr = "Size_of_the_event is required";
				   } else {
				     $Size_of_the_event = test_input($_POST["Size_of_the_event"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$Size_of_the_event)) {
				       $Size_of_the_eventErr = "Only letters and white space allowed"; 
				     }
				   }
				   }
				
				   if (empty($_POST["Invoice_code"])) {
				     $Invoice_codeErr = "Invoice_code is required";
				   } else {
				     $Invoice_codeErr = test_input($_POST["Invoice_code"]);
				   }
				   if (empty($_POST["Menu_code"])) {
				     $Menu_codeErr = "Menu_code is required";
				   } else {
				     $Menu_codeErr = test_input($_POST["Menu_code"]);
				   }
				   
				function test_input($data) {
				   $data = trim($data);
				   $data = stripslashes($data);
				   $data = htmlspecialchars($data);
				   return $data;
				}
				?>
				<p><span class="error">* required field.</span></p>
				<p> menu:
					<br>
					Name : Bar & Bat Mitzvahs Served Dinner   - menu code: 2020   -Price_per_People : 60
					<br>
					Name : Outdoor Casual Wedding   -  menu code: 2030   -Price_per_People:  50
					<br>
					Name : Served Plated Menu  - menu code: 2040   -Price_per_People:  60
					<br>
					Name : Hot appetizers  	- menu code: 2050   -Price_per_People:  35
					<br>
					Name  :  EVENING BITES  - menu code: 2060    -Price_per_People:  70</p>
					<form style="color:blue;font-family : arial;" method="post" action="insertOrdserRezvition2.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
					     Reservation_Code: <input type="text" name="Reservation_Code" value="<?php echo $Reservation_Code;?>">
						<span class="error">* <?php echo $Reservation_CodeErr;?></span>
						<br><br>
						Reservation_Date :<input type="date" name="Reservation_Date">
					   <br><br>
					    Size_of_the_event :<input type="text" name="Size_of_the_event">
					   <br><br>
					    Invoice_code :<input type="text" name="Invoice_code">
					   <br><br>
					    Menu_code :<input type="text" name="Menu_code">
					   <br><br>
					   <input type="submit" name="submit" value="Submit"> 
					</form>
				</section>	
			</main>
			<script>document.write(sideNav)</script>
			<script>document.write(footer)</script>
	</div>
</body>
</html>