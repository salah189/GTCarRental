<?php
//retrieve session data
  session_start();
//echo "Manager SSN is  ". $_SESSION['manager'] . "<br />";
 $mgrssn = $_SESSION['manager'];  
  $dbHost = "academic-mysql.cc.gatech.edu";         //Location Of Database usually its localhost 
    $dbUser = "cs4400_Group_59";            //Database User Name 
    $dbPass = "sg44Hlvd";            //Database Password 
    $dbDatabase = "cs4400_Group_59";    //Database Name 
     
    $db = mysql_connect($dbHost,$dbUser,$dbPass)or die("Error connecting to database."); 
    //Connect to the databasse 
    mysql_select_db($dbDatabase, $db)or die("Couldn't select the database."); 
?>
 
<html>
<head>
<title>GT Car Rental: Rental Change Request   </title>

<body bgcolor="#000000">
<center>
<font color="#ffffff">


</head>
<body>

<p><b>Rental Change Request </b></p>        


<!-- ************************************************************* -->  

<?php


 ?>


<!-- ************************************************************* -->  
       

<form action="verifyChange.php" method="post">
	Enter username: 
	<select name="username">
		<?php
		//Lists the locations from the SQL table in the option list
		$getModel = mysql_query("SELECT DISTINCT Username FROM Reservation");
		while ($temp = mysql_fetch_assoc($getModel)) {
			echo "<option value='".$temp['Username']."'>".$temp['Username']."</option>";
		}
		
	echo '</select>
	<br>
	<p><b>Rental Information </b></p> 

	Car Model: Select Location:
	<select name="model">';

		//Lists the locations from the SQL table in the option list
		$getModel = mysql_query("SELECT Model FROM Car");
		while ($temp = mysql_fetch_assoc($getModel)) {
			echo "<option value='".$temp['Model']."'>".$temp['Model']."</option>";
		}
		
	echo '</select><br>
	Select Location:
	<select name="location">';

		//Lists the locations from the SQL table in the option list
		$getLocations = mysql_query("SELECT Location_Name FROM Location");
		while ($temp = mysql_fetch_assoc($getLocations)) {
			echo "<option value='".$temp['Location_Name']."'>".$temp['Location_Name']."</option>";
		}
		
	echo '</select><br>

	Original return date & time (YYYY-MM-DD HH:MM:SS format):
	<select name="dateTime">';

		//Lists the locations from the SQL table in the option list
		$getModel = mysql_query("SELECT Return_Date_Time FROM Reservation WHERE Username = username");
		while ($temp = mysql_fetch_assoc($getModel)) {
			echo "<option value='".$temp['Return_Date_Time']."'>".$temp['Return_Date_Time']."</option>";
		}
		?>
	</select><br>

	New return date & time (YYYY-MM-DD HH:MM:SS format):
	<input type="text" name="new"><br>
	

	<input type="submit" value="Update">
</form>

<p><b>User Affected </b></p> 

<form>
	Username: <input type="text" name="userAffectedUsername"><br>

	Original pick up time:
	<select name="returnTimeStartDate">
	<option value="117">1/17/2013</option>
	<option value="118">1/18/2013</option>
	</select>

	<select name="returnTimeStartTime">
	<option value="1200">12:00PM</option>
	<option value="1230">12:30PM</option>
	</select><br>

	Original return time:
	<select name="returnTimeStartDate">
	<option value="117">1/17/2013</option>
	<option value="118">1/18/2013</option>
	</select>

	<select name="returnTimeStartTime">
	<option value="1200">12:00PM</option>
	<option value="1230">12:30PM</option>
	</select><br>

	Email Address: <input type="text" name="email"><br>
	Phone Number: <input type="text" name="phoneNumber"><br>
	<input type="submit" value="Cancel Reservation">
	<input type="submit" value="Show car availability">
</form>
