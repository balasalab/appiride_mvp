
<!--<div>
<h1>Welcome to Dashboard! <a href="<?php echo base_url(); ?>appi/logout">Logout</a></h1>
	
	<?php
	$un= '';
	if($this->session->userdata('logged_in'))
   {
	   
     $session_data = $this->session->userdata('logged_in');
     $un = $session_data['firstname'];
   }
   else
   {
	 $un = "nodata";
   }
   echo $un;
   ?>
 </div>-->

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
		<br>
			<div class="col-md-3 side_panel pn">
				<ul class="d_side_menu">
					<li id="profile" class="spactive"><a>Profile <i class="fa fa-caret-right"></i></a></li>
					<li id="journey-list" class=""><a>Journey List <i class="fa fa-caret-right"></i> </a></li>
					<li id="join-list" class=""><a>Join List <i class="fa fa-caret-right"></i> </a></li>
					<li id="" class=""><a>Notifications <i class="fa fa-caret-right"></i> </a></li>
				</ul>
			</div>
			
			<div class="col-md-9 main_panel">
				<div class="sub_item profile">
				
					<div class="panel panel-default">
					  <div class="panel-heading">
					  <h3 class="panel-title">User Profile Details</h3></div>
					  <div class="panel-body">
						<div class="col-md-6">
							<h4>First name : <?php echo $this->session->userdata('logged_in')['firstname']; ?></h4>
							<h4>Last name : <?php echo $this->session->userdata('logged_in')['lastname']; ?></h4>
						</div>
						<div class="col-md-6">
							<h4>Mobile : <?php echo $this->session->userdata('logged_in')['mobile']; ?></h4>
							<h4>Email : <?php echo $this->session->userdata('logged_in')['email']; ?></h4>
						</div>
					  </div>
					  <div class="panel-footer"><button type="button" class="save"><i class=""></i>Save</button>
					  <button type="button" class="edit"><i class=""></i>Edit</button></div>
					</div><!--panel end-->
					<br>
					<div class="panel panel-default">
					  <div class="panel-heading">
					  <h3 class="panel-title">Security Details</h3></div>
					  <div class="panel-body">
						<div class="col-md-12">
							<h4>Change password</h4>
							<strong>Old Password : <br><input type="password" /></strong><br>
							<strong>New Password : <br><input type="password" /></strong><br>
							<strong>Confirm Password : <br><input type="password" /></strong><br>
						</div>
					  </div>
					  <div class="panel-footer"></div>
					</div><!--panel end-->
				</div>
				<div class="sub_item journey-list dn">
					
					<?php
					$journey =file_get_contents(base_url().'api/appiride/journer/format/json');//http://localhost/appiride/api/appiride/journey_list/format/json
					$manage = json_decode($journey);
					foreach ($manage as $key){
						if($key->user_id == $this->session->userdata('logged_in')['userid']){
						?>
						<div class="row tal journey-view">
							<div class="panel panel-default">
							  <div class="panel-heading tac">
							  <h3 class="panel-title"><span class="ju-from fl"><i class="fa fa-map-marker"></i> _ <?php echo $key->from; ?></span>
							  <span class="ju-via  fr"><i class="fa fa-map-marker"></i> _ _ _ <?php echo $key->via; ?> _ _ _ <i class="fa fa-map-marker"></i></span>
							  <span class="ju-to"> <?php echo $key->to; ?>  _ <i class="fa fa-map-marker"></i></span></h3></div>
							  <div class="panel-body">
								<div class="col-md-3">
									<p><i class="fa fa-calendar"></i> : <?php echo $key->date; ?></p>
									<p><i class="fa fa-clock-o"></i> : <?php echo $key->stime; ?> - <i class="fa fa-adjust"></i> <?php echo $key->ampm; ?></p>
									<p><i class="fa fa-ban"></i> : <?php if($key->fixed == "YES"){echo "Fixed time";}else{echo "Flexible time";}  ?></p>
								</div>
								<div class="col-md-3">
									<p><i class="fa fa-group"></i> : <?php echo $key->seats; ?></p>
									<p><i class="fa fa-gift"></i> : <?php echo $key->fair; ?> </p>
									<p><i class="fa fa-mobile"></i> : <?php echo $key->contact; ?></p>
								</div>
								<div class="col-md-6">
									<p><i class="fa fa-envelope"></i> : <?php echo $key->desc; ?></p>
								</div>
								
								<div class="col-md-12" style="">
									<div class="<?php echo $key->id; ?>_req dn" style="border-top:1px solid #3C1551;">
										<?php
										$getreq =file_get_contents(base_url().'api/appiride/get_req_journer/jouid/'.$key->id.'/format/json');
										$greq = json_decode($getreq);
										$reqc = 0;
										if($greq != 0){
											
											foreach ($greq as $gr){
												$user =file_get_contents(base_url().'api/appiride/users/id/'.$gr->join_user_id.'/format/json');
												$user = json_decode($user);
												foreach ($user as $ud){
													echo '<p><i class="fa fa-user"></i> : '.$ud->fname.'</p>';
												}
												$reqc = $reqc + 1;;
											}
										}
											?>
									</div>
									<div>
										<a class="view_req" id="<?php echo $key->id; ?>_req" ><?php echo $reqc; ?> request</a>
									</div>
								</div><!--col12-->
								
							  </div>
							  <div class="panel-footer"><button type="button"><i class=""></i>Delete this ride</button></div>
							</div>
						</div>
						<?php
						}
					}
					?>
				</div>
				<div class="sub_item join-list dn">
				
					<?php
					$journey =file_get_contents(base_url().'api/appiride/joiner/format/json');//http://localhost/appiride/api/appiride/journey_list/format/json
					$manage = json_decode($journey);
					foreach ($manage as $key){
						if($key->user_id == $this->session->userdata('logged_in')['userid']){
						?>
						<div class="row tal join-view">
							<div class="panel panel-default">
							  <div class="panel-heading tac">
							  <h3 class="panel-title"><span class="ju-from fl"><i class="fa fa-map-marker"></i> _ <?php echo $key->from; ?></span>
							  <span class="ju-via  fr"><i class="fa fa-map-marker"></i> _ _ _ <?php echo $key->via; ?> _ _ _ <i class="fa fa-map-marker"></i></span>
							  <span class="ju-to"> <?php echo $key->to; ?>  _ <i class="fa fa-map-marker"></i></span></h3></div>
							  <div class="panel-body">
								<div class="col-md-3">
									<p><i class="fa fa-calendar"></i> : <?php echo $key->date; ?></p>
									<p><i class="fa fa-clock-o"></i> : <?php echo $key->stime; ?> - <i class="fa fa-adjust"></i> <?php echo $key->ampm; ?></p>
									<p><i class="fa fa-ban"></i> : <?php if($key->fixed == "YES"){echo "Fixed time";}else{echo "Flexible time";}  ?></p>
								</div>
								<div class="col-md-3">
									<p><i class="fa fa-group"></i> : <?php echo $key->seats; ?></p>
									<p><i class="fa fa-mobile"></i> : <?php echo $key->contact; ?></p>
								</div>
								<div class="col-md-6">
									<p><i class="fa fa-envelope"></i> : <?php echo $key->desc; ?></p>
								</div>
								
								<div class="col-md-12" style="">
									<div class="<?php echo $key->id; ?>_req dn" style="border-top:1px solid #3C1551;">
										<?php
										$getreq =file_get_contents(base_url().'api/appiride/get_req_joiner/joiid/'.$key->id.'/format/json');
										$greq = json_decode($getreq);
										$reqc = 0;
										if($greq != 0){
											
											foreach ($greq as $gr){
												$user =file_get_contents(base_url().'api/appiride/users/id/'.$gr->jour_user_id.'/format/json');
												$user = json_decode($user);
												foreach ($user as $ud){
													echo '<p><i class="fa fa-user"></i> : '.$ud->fname.'</p>';
												}
												$reqc = $reqc + 1;;
											}
										}
											?>
									</div>
									<div>
										<a class="view_req" id="<?php echo $key->id; ?>_req" ><?php echo $reqc; ?> accepted</a>
									</div>
									
								</div><!--col12-->
							  </div>

							  <div class="panel-footer"><button type="button"><i class=""></i>Delete this ride</button></div>
							</div>
						</div>
						<?php
						}
					}
					?>
				
				</div>
			</div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<script>
//alert($( document ).height());
//$(".side_panel").css("height", $( document ).height()-100);
$( ".content-loadd" ).load( "profile.php" );
$(".d_side_menu li").click(function(){
	$(".d_side_menu li").removeClass("spactive");
	$(this).addClass("spactive");
	
	$(".sub_item").addClass("dn");
	$("."+$(this).attr("id")).removeClass("dn");
	
	//$(".sub_item").css("display", "none").addClass('animated bounceOutLeft').removeClass('animated bounceInRight');
	//$("."+$(this).attr("id")).css("display", "block").removeClass('animated bounceOutLeft').addClass('animated bounceInRight');
});
</script>

<style>
.side_panel{
	border:0px solid #fff;
}
.side_panel ul{
	list-style-type:none;
	margin:0px;
	padding:0px;
}
.side_panel li{
	font-size:18px;
	padding:10px;
}
.side_panel li a{
	text-decoration:none;
	color:#fff;
	cursor:pointer;
}
.side_panel li a i{
	float:right;
}
.spactive{
background-color: rgba(0,0,0,0.5);
}
.main_panel{
	border:0px solid #fff;
}
.sub_item{
}

/*Dashboard profile-view*/
.profile{
	padding:0px 10px;
	margin-bottom:40px;
	font-size:12px;
}

.profile {
margin-bottom:10px;
}
.profile .panel{
margin:0px;
border-radius:2px;
}
.profile .panel-default{
border:none;
}
.profile .panel-default>.panel-heading{
padding: 5px 10px;
background:#3C1551;
background-image:none !important;
background-color:none !important;
color:#E6B6FF;
border-radius:2px
}
.profile .panel-body{
color:#3C1551;
}
.profile .panel-footer {
padding:2px;
}
.profile .panel-footer  button{
background-color:#3C1551;
color:#fff;
border:none;
padding:5px;
font-size:12px;
border-radius:2px;
font-weight:bold;
}
.profile .panel-footer .save{
float:right;
}
/*Dashboard profile-view*/

/*Dashboard journey-view*/
.journey-list{
	padding:0px 10px;
	margin-bottom:40px;
	font-size:12px;
}

.journey-view {
margin-bottom:10px;
}
.journey-view .panel{
margin:0px;
border-radius:2px;
}
.journey-view .panel-default{
border:none;
}
.journey-view .panel-default>.panel-heading{
padding: 5px 10px;
background:#3C1551;
background-image:none !important;
background-color:none !important;
color:#E6B6FF;
border-radius:2px
}
.journey-view .panel-body{
color:#3C1551;
}
.journey-view .panel-footer {
padding:2px;
text-align:right;
}
.journey-view .panel-footer  button{
background-color:#3C1551;
color:#fff;
border:none;
padding:5px;
font-size:12px;
border-radius:2px;
font-weight:bold;
}
.view_req{
cursor:pointer;
}
/*Dashboard journey-view*/

/*Dashboard join-view*/
.join-list{
	padding:0px 10px;
	margin-bottom:40px;
	font-size:12px;
}

.join-view {
margin-bottom:10px;
}
.join-view .panel{
margin:0px;
border-radius:2px;
}
.join-view .panel-default{
border:none;
}
.join-view .panel-default>.panel-heading{
padding: 5px 10px;
background:#3C1551;
background-image:none !important;
background-color:none !important;
color:#E6B6FF;
border-radius:2px
}
.join-view .panel-body{
color:#3C1551;
}
.join-view .panel-footer {
padding:2px;
text-align:right;
}
.join-view .panel-footer  button{
background-color:#3C1551;
color:#fff;
border:none;
padding:5px;
font-size:12px;
border-radius:2px;
font-weight:bold;
}
/*Dashboard journey-view*/
</style>