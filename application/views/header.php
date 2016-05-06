<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>jquery-ui/jquery-ui.min.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/animate.css" type="text/css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" />
	
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/angular.min.js"></script>
	<script src="<?php echo base_url(); ?>jquery-ui/jquery-ui.min.js"></script>
	
</head>
<body>
<header>
<div class="container-fluid">

<?php
$un= '';
if($this->session->userdata('logged_in'))
{
 $session_data = $this->session->userdata('logged_in');
 $un = $session_data['firstname'];
}
else
{
}
?>
		   
	<div class="row">
		<div class="col-md-12 menu tal">
			<div class="hori-menu">
				<span><a href="<?php echo base_url();?>"><i class="fa fa-globe"></i> Home</a></span>
				<!--<span><a href="<?php echo base_url();?>appi/journer"><i class="fa fa-car"></i> Journer</a></span>
					<span><a href="<?php echo base_url();?>appi/joiner"><i class="fa fa-group"></i> Joiner</a></span>-->
				<span class="dropdown pn">
				  <span class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
					<i class="fa fa-car"></i> Journer
					<i class="caret"></i>
				  </span>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>appi/journer">Journer</a></li>
					<?php
					if($un){
					?>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>appi/journer_register">Register</a></li>
					<?php
					}
					else{
					?>
					<li role="presentation"><a role="menuitem" tabindex="-1" class="appi-login">Register</a></li>
					<?php
					}
					?>
				  </ul>
				</span>
				
				<span class="dropdown pn">
				  <span class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
					<i class="fa fa-group"></i> Joiner
					<i class="caret"></i>
				  </span>
				  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>appi/joiner">Joiner</a></li>
					<?php
					if($un){
					?>
					<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>appi/joiner_register">Register</a></li>
					<?php
					}
					else{
					?>
					<li role="presentation"><a role="menuitem" tabindex="-1" class="appi-login">Register</a></li>
					<?php
					}
					?>
					
				  </ul>
				</span>
				
				<span><a href="<?php echo base_url();?>appi/instance"><i class="fa fa-comment-o"></i> Instance</a></span>
			</div><!--hori menu-->
			<div class="vert-menu">
				<span class="menu-icon"><i class="fa fa-bars"></i></span>
				<ul class="vert-nav">
					<li><a href="<?php echo base_url();?>"><i class="fa fa-globe"></i> Home</a></li>
					<li><a href="<?php echo base_url();?>appi/journer"><i class="fa fa-car"></i> Journer</a> ->
						<?php
						if($un){
						?>
						<a href="<?php echo base_url();?>appi/journer_register">Register</a></li>
						<?php
						}
						else{
						?>
						<a role="menuitem" tabindex="-1" class="appi-login">Register</a></li>
						<?php
						}
						?>
					<li><a href="<?php echo base_url();?>appi/joiner"><i class="fa fa-group"></i> Joiner</a> -> 
						<?php
						if($un){
						?>
						<a href="<?php echo base_url();?>appi/joiner_register">Register</a></li>
						<?php
						}
						else{
						?>
						<a role="menuitem" tabindex="-1" class="appi-login">Register</a></li>
						<?php
						}
						?>
					<li><a href="<?php echo base_url();?>appi/instance"><i class="fa fa-comment-o"></i> Instance</a></li>
				</ul>
			</div><!--vert menu-->
			<?php
			if($un)
		   {
			 ?>
			<!--<span class="fr"><i class="fa fa-user"></i> welcome <?php echo $un; ?> !</span>-->
			<span class="dropdown fr pn">
			  <span class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
				<i class="fa fa-user"></i> welcome <?php echo $un; ?> !
				<i class="caret"></i>
			  </span>
			  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>appi/dashboard">Dashboard</a></li>
				<li role="presentation" class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url();?>appi/logout">Logout</a></li>
			  </ul>
			</span>
			<?php
		   }
		   else
		   {
			?>
			<span class="fr appi-login"><i class="fa fa-unlock-alt"></i> Login</span>
			<span class="fr appi-signup"> <i class="fa fa-plus-square"></i> New user</span>
			<span class="cb"></span>
			<?php
		   }
		   ?>
			
			
		</div>
	</div>
</div>
</header>

<div class="login-modal">
<span class="login-modal-close" style="position:absolute; top:10px; right:10px; color:#fff; cursor:pointer; font-size:22px;"><i class="fa fa-times-circle" ></i></span>
	<div class="login-col-12">
		<div class="form-outer">
			<form id="appride-login" name="appride-login">
			<label>Email</label><br><input type="email" name="email" placeholder="Email" required value="chandra@gmail.com" /><br>
			<label>Password</label><br><input type="password" name="password" placeholder="Password" required value="chandra" /><br>
			<button type="submit">Login</button>
			</form>
		</div>
	</div>
</div>

<div class="signup-modal">
<span class="signup-modal-close" style="position:absolute; top:10px; right:10px; color:#fff; cursor:pointer; font-size:22px;"><i class="fa fa-times-circle" ></i></span>
	<div class="signup-col-12">
		<div class="form-outer">
			<form id="appride-signup" name="appride-signup">
			<label>First name</label><br><input type="text" name="fname" placeholder="first name" required />
			<label>Last name</label><br><input type="text" name="lname" placeholder="last name" />
			<label>Email</label><br><input type="email" name="email" class="signup_email" placeholder="email id" required />
			<span class="email_note"></span><br>
			<label>Mobile</label><br><input type="mobile" name="mobile" placeholder="mobile number" required />
			<label>Password</label><br><input type="password" name="password" placeholder="password" required />
			<button type="submit" class="signup_submit">Signup</button>
			</form>
		</div>
	</div>
</div>

<script>
$(".menu-icon").click(function(){
	$(".vert-nav").slideToggle();
});

$(".signup_email").change(function(){
	var em = $(this).val();
	if(em){
		//alert("sdf");
		$.ajax({
			url:"http://localhost/appiride/api/appiride/check_signup_mail/format/json",
			type:"post",
			data: {email : em},
			success:function( data ){
				if(data == 1){
					$(".email_note").html("<span style='color:#FF0000;'>this email already register</span>");
					$(".signup_submit").attr("type", "button");
				}
				else{
					$(".email_note").html("<span style='color:#AEFF00;'>this email accpeted</span>");
					$(".signup_submit").attr("type", "submit");
				}
			}
		});
	}
});
</script>