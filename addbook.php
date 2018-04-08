<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Adding book</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
		<h2>Addbook</h2>
	</div>
		<form method="post" action="addbook.php">
   	<div class="input-group">
			<label>name</label>
			<input type="text" name="name">
		</div>
		<div class="input-group">
			<label>image</label>
			<input type="text" name="image" >
		</div>
		<div class="input-group">
			<label>price</label>
			<input type="text" name="price"> 
		</div>
			<div class="input-group">
			<button type="submit" class="btn" name="addbook">Add</button>
	</div>
	<p>
		<a href="index.php">Homepage</a>
			</p>
	</form>
</body>
</html>