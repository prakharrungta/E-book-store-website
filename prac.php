<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="prac.php">

		<div class="input-group">
			<label>First name</label>
			<input type="text" name="fname">
		</div>
		<div class="input-group">
			<label>Last name</label>
			<input type="text" name="lname" >
		</div>
		<input type="submit" name="nn"/>
	</form>
</body>
</html>
<?php
if(isset($_POST['nn']))
{
$fname=$_POST["fname"]; 
$lname=$_POST["lname"]; 
if(strlen($fname)>10)
{
	echo 'fuck off vishrut' ;
}
else if(strlen($lname)>10)
{
	echo 'fuck off shukla';
}
}

?>