
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
				<h2>הזמנת אירוע חדש - הכנסת לקוח</h2>
				<img src="images/BRADPURPLE.png" alt="purple flower" id="purpleFlower">
				<section id="formContainer!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">
								
				<?php
				// define variables and set to empty values
				$Reservation_CodeErr = $IdErr = $full_nameErr = $phoneErr=$addressErr= "";
				$Reservation_Code= $Id = $full_name = $phone=$address = "";
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
				   
				   if (empty($_POST["Id"])) {
				     $IdErr = "Id is required";
				   } else $Id = test_input($_POST["Id"]);{
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$Id)) {
				       $IdErr = "Only letters and white space allowed"; 
				     }
				   }
				   if (empty($_POST["full_name"])) {
				     $full_nameErr = "full_name is required";
				   } else {
				     $full_name = test_input($_POST["full_name"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$full_name)) {
				       $full_nameErr = "Only letters and white space allowed"; 
				     }
				   }
				   }
				
				   if (empty($_POST["phone"])) {
				     $GenderErr = "phone is required";
				   } else {
				     $phoneErr = test_input($_POST["phone"]);
				   }
				   
				   if (empty($_POST["address"])) {
				     $addressErr = "address is required";
				   } else {
				     $addressErr = test_input($_POST["address"]);
				   }
				
				
				function test_input($data) {
				   $data = trim($data);
				   $data = stripslashes($data);
				   $data = htmlspecialchars($data);
				   return $data;
				}
				?>
				<p><span class="error">* required field.</span></p>
					<form style="color:blue;font-family : arial;" method="post" action="insertOrdserRezvition1.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
					     Reservation_Code: <input type="text" name="Reservation_Code" value="<?php echo $Reservation_Code;?>">
						<span class="error">* <?php echo $Reservation_CodeErr;?></span>
						<br><br>
						Id :<input type="text" name="Id">
					   <br><br>
					    Full name :<input type="text" name="full_name">
					   <br><br>
					    Phone :<input type="text" name="phone">
					   <br><br>
					   Address :<input type="text" name="address">
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






