
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
				<h2>יצירת אירוע</h2>
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

						$sql="INSERT INTO `reservation` (`Reservation_Code`,`Reservation_Date`,`Size_of_the_event`,`Invoice_code`,`Menu_code`) 
						VALUES 
						(('".$_POST['Reservation_Code']."'),
						('".$_POST['Reservation_Date']."'),
						('".$_POST['Size_of_the_event']."'),
						('".$_POST['Invoice_code']."'),
						('".$_POST['Menu_code']."'))";
						if (mysqli_query($conn, $sql)) {
							echo "New record created successfully return to table";
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
						mysqli_close($conn);
						?>
						<?php
					// define variables and set to empty values
					$Reservation_CodeErr = $Event_CodeErr = $hall_codeErr = $type_event_codeErr ="";
				    $Reservation_Code= $Event_Code = $hall_code =$type_event_code = "";
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
				   
				   if (empty($_POST["Event_Code"])) {
				     $Event_CodeErr = "Event_Code is required";
				   } else $Event_Code = test_input($_POST["Event_Code"]);{
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$Event_Code)) {
				       $Event_CodeErr = "Only letters and white space allowed"; 
				     }
				   }
				   if (empty($_POST["hall_code"])) {
				     $hall_codeErr = "hall_code is required";
				   } else {
				     $hall_code = test_input($_POST["hall_code"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$hall_code)) {
				       $hall_codeErr = "Only letters and white space allowed"; 
				     }
				   }
				    if (empty($_POST["type_event_code"])) {
				     $type_event_codeErr = "type_event_code is required";
				   } else {
				     $type_event_code = test_input($_POST["type_event_code"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$type_event_code)) {
				       $type_event_codeErr = "Only letters and white space allowed"; 
				     }
				   }
				   }
				
				function test_input($data) {
				   $data = trim($data);
				   $data = stripslashes($data);
				   $data = htmlspecialchars($data);
				   return $data;
				}
				?>
				<p><span class="error">* required field.</span></p>
				<p>Hall code:
					<br>
					Name hall : oppo   - Hall code: 12   -People_capacity : 800
					<br>
					Name hall : root     -  Hall code:22   -People_capacity:  900
					<br>
					Name hall : porto      - Hall code:32   -People_capacity:  3000
					<br>
					Name hall : benado      - Hall code:42   -People_capacity:  2000
					<br>
					Name hall :  toro    - Hall code: 52    -People_capacity:  3000</p>
					<p>type_event_code:
					<br>
					type_event_code: 400   	- type_event: bar -mizva/ bat-mizva
					<br>
					type_event_code: 401   	 - type_event: brit/brita  
					<br>
					type_event_code: 402      - type_event: Wedding  
					<br>
					type_event_code: 403     - type_event: Birthday
					<br>
					type_event_code: 404    - type_event: Dance bar  </p>
					<form style="color:blue;font-family : arial;" method="post" action="insertOrdserRezvition3.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
					     Reservation_Code: <input type="text" name="Reservation_Code" value="<?php echo $Reservation_Code;?>">
						<span class="error">* <?php echo $Reservation_CodeErr;?></span>
						<br><br>
						Event_Code :<input type="text" name="Event_Code">
					   <br><br>
					    hall_code :<input type="text" name="hall_code">
					   <br><br>
					   type_event_code :<input type="text" name="type_event_code">
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