<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login @ appiride</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" />
	
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>
</head>
<body>

<div id="container" style="text-align:center;">
	<h1>Welcome to Login!</h1>
	
	<form id="appride-login" name="appride-login">
	<input type="email" name="email" placeholder="Email id" required /><br>
	<input type="password" name="password" placeholder="Password" required /><br>
	<input type="submit" name="Login" />
	</form>
   
</div>

<script src="<?php echo base_url(); ?>js/appiride.js"></script>
</body>
</html>