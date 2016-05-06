<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Giver @ appiride</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" />
	
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>
</head>
<body>

<div id="container">
	<h1>Giver info!</h1>
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
	<form id="appride-giver" name="appride-giver">
	<input type="text" name="user_id" id="user_id" value="<?php	echo $un; ?>" hidden="hidden" />
	<input type="text" name="from" placeholder="From place" required />
	<input type="text" name="to" placeholder="to place" />
	<input type="text" name="via" placeholder="via"  />
	<input type="date" name="date" placeholder="date"  />
	<input type="time" name="stime" placeholder="time"  />
	<select name="ampm"><option value="am">AM</option><option value="pm">PM</option></select>
	<input type="text" name="Seats" placeholder="No. of Seats"  />
	<input type="text" name="fair" placeholder="0" />
	<input type="text" name="contact" placeholder="Contact no"  />
	<input type="text" name="vehicle" placeholder="Vehicle type"  />
	<input type="submit" name="give" value="Start Ride" />
	</form>
	
</div>

<script src="<?php echo base_url(); ?>js/appiride.js"></script>
</body>
</html>