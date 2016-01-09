
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
				<h2>שינויי בשמות התפריט </h2>
				<section id="tableContainer">
				<?php
					// define variables and set to empty values
					$Des_dishErr = $Name_dishErr =$Id_dishErr="";
					$Des_dish = $Name_dish = $Id_dish="";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						if (empty($_POST["Des_dish"])) {
							 $Des_dish = " Des_dish is required";
						   } else {
							 $Des_dish = test_input($_POST["Des_dish"]);
							 // check if Des_dish only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$Des_dish)) {
							   $Des_dish = "Only letters and white space allowed"; 
							 }
						   }
					   if (empty($_POST["Name_dish"])) {
						 $Name_dishErr = "Name_dish is required";
					   } else {
							 $Name_dish = test_input($_POST["Name_dish"]);
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$Name_dish)) {
							   $Name_dishErr = "Only letters and white space allowed"; 
							 }
						   }
						   if (empty($_POST["Id_dish"])) {
						 $Id_dishErr = "Id_dish is required";
					   } else {
							 $Id_dish = test_input($_POST["Id_dish"]);
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$Id_dish)) {
							   $Id_dishErr = "Only letters and white space allowed"; 
							 }
						   }
					}
					?>
					<p><span class="error">* required field.</span></p>
					<form style="color:blue;font-family : arial;" method="post" action="updateMenu.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>> 
						Name of the dish: <input type="text" name="Name_dish" value="<?php echo $Name_dish;?>">
						<span class="error">* <?php echo $Name_dishErr;?></span>
						<br><br>
					   Id_dish: <input type="text" name="Id_dish">
					   <br><br>
					  Des_dish:<input type="text" name="Des_dish">
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






