<?php
session_start();

// variable declaration
$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";
$name="";
$image="";
$price="";
$sellerid="";
$password="";

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'mydb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
	// receive all input values from the form
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
	$lname = mysqli_real_escape_string($db, $_POST['lname']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$country = mysqli_real_escape_string($db, $_POST['country']);
	$state = mysqli_real_escape_string($db, $_POST['state']);
	$pincode = mysqli_real_escape_string($db, $_POST['pincode']);

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) { array_push($errors, "first name is required"); }
	if (empty($lname)) { array_push($errors, "last name is required"); }
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if (empty($state)) { array_push($errors, "State is required"); }
	if (empty($country)) { array_push($errors, "Country is required"); }
	if (empty($pincode)) { array_push($errors, "Pincode is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$query = "INSERT INTO users (fname, lname, username, email, password,country,state,pincode) 
				  VALUES('$fname','$lname','$username', '$email', '$password','$country','$state','$pincode')";
		mysqli_query($db, $query);

		$_SESSION['username'] = $username;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
	}

}
// LOGIN USER
if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = md5($password);
		$query = "(SELECT * FROM users WHERE username='$username' AND password='$password')";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

if (isset($_POST['addbook'])) {
	// receive all input values from the form
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$image = mysqli_real_escape_string($db, $_POST['image']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	$query = "INSERT INTO tbl_product (name, image, price) 
				  VALUES(' $name',' $image',' $price')";
				  mysqli_query($db, $query);
				  header('location: index.php');
}
//seller log in
if (isset($_POST['slogin_user'])) {
	$sellerid = mysqli_real_escape_string($db, $_POST['sellerid']);
	$password3 = mysqli_real_escape_string($db, $_POST['password3']);

	if (empty($sellerid)) {
		array_push($errors, "sellerid is required");
	}
	if (empty($password3)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		//$password3 = md5($password3);
		$query = "(SELECT * FROM seller WHERE sellerid='$sellerid' AND password='$password3')";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) 
		{	$_SESSION['sellerid'] = $sellerid;
			$_SESSION['success'] = "You are now logged in";
			header('location: addbook.php');
		}else
		{			
			array_push($errors, "Wrong username/password combination");
		}
	}
}
?>


