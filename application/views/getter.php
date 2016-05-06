<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Getter @ appiride</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" />
	
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>
</head>
<body>

<div id="container">
	<h1>Getter info!</h1>
	<?php
	$un= '';
	if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $un = $session_data['userid'];
   }
   else
   {
	 $un = 0;
   }
   ?>
	<form id="appride-getter" name="appride-getter">
	<input type="text" name="user_id" id="user_id" value="<?php	echo $un; ?>" hidden="hidden" />
	<input type="text" name="from" placeholder="From place" required />
	<input type="text" name="to" placeholder="to place" required />
	<input type="text" name="via" placeholder="via" required />
	<input type="date" name="date" placeholder="date" required />
	<input type="time" name="stime" placeholder="time" required />
	<select name="ampm"><option value="am">AM</option><option value="pm">PM</option></select>
	<select name="fixed"><option value="YES">Time Not flexbile</option><option value="NO">Time flexbile</option></select>
	<input type="text" name="Seats" placeholder="No. of Seats" required />
	<input type="text" name="pic_place" placeholder="Pickup place" required />
	<input type="text" name="contact" placeholder="Contact no" required />
	<textarea name="desc" placeholder="Message"></textarea>
	<input type="submit" name="give" value="Get Ride" />
	</form>
	
</div>

<script src="<?php echo base_url(); ?>js/appiride.js"></script>
</body>
</html>