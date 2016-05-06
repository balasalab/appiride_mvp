<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Signup @ appiride</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" />
	
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>
</head>
<body>

<div id="container">
	<h1>Welcome to Signup!</h1>
	
	<form id="appride-signup" name="appride-signup">
	<input type="text" name="fname" placeholder="first name" required />
	<input type="text" name="lname" placeholder="last name" />
	<input type="email" name="email" placeholder="email id" required />
	<input type="mobile" name="mobile" placeholder="mobile number" required />
	<input type="password" name="password" placeholder="password" required />
	<input type="submit" name="signup" />
	</form>
	
</div>

<script src="<?php echo base_url(); ?>js/appiride.js"></script>
</body>
</html>