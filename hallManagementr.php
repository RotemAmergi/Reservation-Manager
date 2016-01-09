
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
				<h2>ניהול אולמות</h2>
				<section>
						<?php
					// define variables and set to empty values
					$hall_codeErr ="";
				    $hall_code= "";
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
				   if (empty($_POST["hall_code"])) {
				     $hall_codeErr = "hall_code is required";
				   } else {
				     $hall_code = test_input($_POST["hall_code"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$hall_code)) {
				       $hall_codeErr = "Only letters and white space allowed"; 
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
				<form style="color:blue;font-family : arial;" method="post" action="hallManager.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
					    <p>Please choose a hall (from the list): </p>
						<select name="hall_code">
						<option value="42">Benado</option>		<!--42 -->
					    <option value="12">Oppo</option>		<!--12 -->
						<option value="32">Porto</option>		<!--32 -->
						<option value="22">Root</option>		<!--22 -->
						<option value="52">Toro</option>		<!--52 -->
					</select>  
					   <input type="submit" name="submit" value="Submit"> 
					</form>
				</section>	
			</main>
			<script>document.write(sideNav)</script>
			<script>document.write(footer)</script>
	</div>
</body>
</html>