
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
				<h2>שינויים בגודל האירוע </h2>
				<section id="tableContainer">
				<?php
					// define variables and set to empty values
					$Reservation_CodeErr = $Size_of_the_eventErr ="";
					$Reservation_Code = $Size_of_the_event = "";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
					   if (empty($_POST["Reservation_Code"])) {
						 $Reservation_CodeErr = "Reservation_Code is required";
					   } else {
							 $Reservation_Code = test_input($_POST["Reservation_Code"]);
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[1-9][0-9]*$/",$Reservation_Code)) {
							   $Reservation_CodeErr = "Only letters and white space allowed"; 
							 }
						   }
					  if (empty($_POST["Size_of_the_event"])) {
						 $Size_of_the_eventErr = "Size_of_the_event is required";
					   } else {
							 $Size_of_the_event = test_input($_POST["Size_of_the_event"]);
							 // check if name only contains letters and whitespace
							 if (preg_match("'/^-?[0-9]{1,4}$/'",$Size_of_the_event)) {
							   $Size_of_the_eventErr = "Only letters and white space allowed"; 
							 }
						   }
					}
					?>
					<p><span class="error">* required field.</span></p>
					<form style="color:blue;font-family : arial;" method="post" action="addc.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>> 
					   Reservation_Code :
					   <select name="Reservation_Code"> 
						<option value="1">1</option>
					    <option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					    <option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="10">12</option>
						</select>
					   <br><br>
					    Size_of_the_event: <input type="text" name="Size_of_the_event">
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






