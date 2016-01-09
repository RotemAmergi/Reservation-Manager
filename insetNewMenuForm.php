
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
				<h2>הוספת מנה חדשה</h2>
				<section id="tableContainer">
				<?php
					// define variables and set to empty values
					$NameErr = $Menu_codetErr =$Price_per_PeopleErr ="";
					$Name = $Menu_code =$Price_per_People="";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						   if (empty($_POST["Name"])) {
							 $nameErr = "First Name is required";
						   } else {
							 $Name = test_input($_POST["Name"]);
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$Name)) {
							   $nameErr = "Only letters and white space allowed"; 
							 }
						   }
					   if (empty($_POST["Menu_code"])) {
						 $Menu_codetErr = "Menu_code is required";
					   } else {
							 $Menu_code = test_input($_POST["Menu_code"]);
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$Menu_code)) {
							   $Menu_codetErr = "Only letters and white space allowed"; 
							 }
						   }
					  if (empty($_POST["Price_per_People"])) {
						 $Price_per_PeopleErr = "Price_per_People is required";
					   } else {
							 $Price_per_People = test_input($_POST["Price_per_People"]);
							 // check if name only contains letters and whitespace
							 if (!preg_match("/^[a-zA-Z ]*$/",$Price_per_People)) {
							   $Price_per_PeopleErr = "Only letters and white space allowed"; 
							 }
						   }
					}
					?>
					<p><span class="error">* required field.</span></p>
					<form style="color:blue;font-family : arial;" method="post" action="insertOrdserRezvition1.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
						Name of the menu: <input type="text" name="Name" value="<?php echo $Name;?>">
						<span class="error">* <?php echo $NameErr;?></span>
						<br><br>
						Menu_code :<input type="text" name="Menu_code">
					   <br><br>
					   Price_per_People :<input type="text" name="Price_per_People">
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






