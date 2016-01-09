
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
				<section id="tableContainer">			
							
				<form style="color: blue; font-family: arial;" method="post" action="hallManager.php"
						<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>Please choose a hall (from the list):   
					<select name="hall_code"> 
						<option value="42">Benado</option>		<!--42 -->
					    <option value="12">Oppo</option>		<!--12 -->
						<option value="32">Porto</option>		<!--32 -->
						<option value="22">Root</option>		<!--22 -->
						<option value="52">Toro</option>		<!--52 -->
					</select>  
					<br>
					<input type="submit" name="submit" value="Submit">				
				</form>			
					
					<!-- -->
				
				</section>	
			</main>
			
			<script>document.write(sideNav)</script>
			<script>document.write(footer)</script>
	</div>
	
</body>
</html>






