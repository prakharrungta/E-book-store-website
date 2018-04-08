<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
<style>

</style>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
		<h2>seller Log in</h2>
	</div>
		<form method="post" action="sellerlogin.php">
   	<?php include('errors.php'); ?>

		<div class="input-group">
			<label>sellerid</label>
			<input type="text" name="sellerid" >
		</div>
		<div class="input-group">
			<label>Password3</label>
			<input type="password" name="password3">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="slogin_user">Login</button>
		</div>
		</form>
</body>
</html>