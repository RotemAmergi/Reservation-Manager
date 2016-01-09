
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
				<h2>הזמנת אירוע חדש</h2>
				<img src="images/BRADPURPLE.png" alt="purple flower" id="purpleFlower">
				<section id="formContainer!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!">
								
				<?php
				// define variables and set to empty values
				$nameErr = $Last_NameErr = $GenderErr = $Phone_NumberErr=$Duty_DescriptionErr=$Residential_addressErr= "";
				$First_Name = $Last_Name = $Gender = $Phone_Number=$Duty_Description =$Residential_address= "";
				
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				   if (empty($_POST["First_Name"])) {
				     $nameErr = "First Name is required";
				   } else {
				     $First_Name = test_input($_POST["First_Name"]);
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$First_Name)) {
				       $nameErr = "Only letters and white space allowed"; 
				     }
				   }
				   
				   if (empty($_POST["Last_Name"])) {
				     $Last_NameErr = "Last_Name is required";
				   } else $Last_Name = test_input($_POST["Last_Name"]);{
				     // check if name only contains letters and whitespace
				     if (!preg_match("/^[a-zA-Z ]*$/",$Last_Name)) {
				       $Last_NameErr = "Only letters and white space allowed"; 
				     }
				   }
				     
				   if (empty($_POST["Phone_Number"])) {
				     $Phone_Number = "";
				   } else {
				     $Phone_NumberErr = test_input($_POST["Phone_Number"]);
				     // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
				     if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Phone_Number)) {
				       $Phone_NumberErr = "Invalid URL"; 
				     }
				   }
				
				   if (empty($_POST["Gender"])) {
				     $GenderErr = "Gender is required";
				   } else {
				     $Gender = test_input($_POST["Gender"]);
				   }
				   
				   if (empty($_POST["Duty_Description"])) {
				     $Duty_DescriptionErr = "Duty_Description is required";
				   } else {
				     $Duty_DescriptionErr = test_input($_POST["Duty_Description"]);
				   }
				}
				
				function test_input($data) {
				   $data = trim($data);
				   $data = stripslashes($data);
				   $data = htmlspecialchars($data);
				   return $data;
				}
				?>
				<form method="post" action="addc.php"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
				    
				   First Name: <input type="text" name="First_Name" value="<?php echo $First_Name;?>">
				   <span class="error">* <?php echo $nameErr;?></span>
				   <br>
				   Last Name: <input type="text" name="Last_Name" value="<?php echo $Last_Name;?>">
				   <span class="error">* <?php echo $Last_NameErr;?></span>
				   <br>
				   phone_number: <input type="text" name="Last_Name" value="<?php echo $Phone_Number;?>">
				   <span class="error">* <?php echo $Phone_NumberErr;?></span>
				   <br>
				   Gender:
				   <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender=="female") echo "checked";?>  value="female">Female
				   <input type="radio" name="Gender" <?php if (isset($Gender) && $Gender=="male") echo "checked";?>  value="male">Male
				   <span class="error">* <?php echo $GenderErr;?></span>
				   <br>
				    Address: <input type="text" name="Residential_address" value="<?php echo $Residential_address;?>">
				   <span class="error">* <?php echo $Residential_addressErr;?></span>
				   <br>
				   Date of Birth: <input type="date" name="Date_of_Birth">
				   <br>
				   Start date of work: <input type="date" name="Start_date_of_work">
				   <br><br>
				    Duty Description:
				   <span class="error">* <?php echo $Duty_DescriptionErr;?></span><br>
				   <input type="radio" name="Duty_Description" <?php if (isset($Duty_Description) && $Gender=="manager hall") echo "checked";?>  value="manager hall">manager hall (300)<br>
				   <input type="radio" name="Duty_Description" <?php if (isset($Duty_Description) && $Gender=="Meltzer") echo "checked";?>  value="Meltzer">Meltzer (301)<br>
				   <input type="radio" name="Duty_Description" <?php if (isset($Duty_Description) && $Gender=="Chef") echo "checked";?>  value="Chef">Chef (302)<br>
				   <input type="radio" name="Duty_Description" <?php if (isset($Duty_Description) && $Gender=="Security Guard") echo "checked";?>  value="Security Guard">Security Guard (303)<br>
				   <input type="radio" name="Duty_Description" <?php if (isset($Duty_Description) && $Gender=="Cleaner") echo "checked";?>  value="Cleaner">Cleaner (304)<br>

				   <br>
				   <p><span class="error" id="error">* required field</span></p>
				   <input type="submit" id="submitButton" name="submit" value="Submit"> 
				</form>

				</section>	
			</main>
			
			<script>document.write(sideNav)</script>
			<script>document.write(footer)</script>
	</div>
	
</body>
</html>






