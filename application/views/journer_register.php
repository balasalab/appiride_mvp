
<div class="container-fluid">
	<div class="row" style="margin-bottom:60px;">
		<div class="col-md-6 col-md-offset-3 tal">
			<h1>Journer Register</h1>
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
				
				<div class="row">
				<div class="col-sm-6 col-xs-12">
				<label><i class="fa fa-map-marker"></i>_ _ _ From <i class="fa fa-asterisk require"></i></label><br>
				<input type="text" name="from" placeholder="From place" required /><br>
				<label>To_ _ _<i class="fa fa-map-marker"></i> <i class="fa fa-asterisk require"></i></label><br>
				<input type="text" name="to" placeholder="to place" required />
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="" >
					<label><i class="fa fa-map-marker"></i>_ _ _ via_ _ _<i class="fa fa-map-marker"></i> </label><br>
					<input type="text" name="via" placeholder="via"  />
					<span class="form-cap">this one optional, if you know your via places please put, one or more places write with seperater commas</span>
					</div>
				</div>
				</div>
				
				<div class="row">
				<div class="col-sm-6 col-xs-12">
				<label><i class="fa fa-calendar"></i> Date <i class="fa fa-asterisk require"></i></label><br>
				<input type="text" name="date" placeholder="date" id="datepicker" required  />
				</div>
				<div class="col-sm-3 col-xs-12">
				<label><i class="fa fa-clock-o"></i> Time <i class="fa fa-asterisk require"></i></label><br>
				<input type="time" name="stime" placeholder="time" required />
				</div>
				<div class="col-sm-3 col-xs-12">
				<label><i class="fa fa-adjust"></i> AM/PM <i class="fa fa-asterisk require"></i></label><br>
				<select name="ampm"><option value="am">AM</option><option value="pm">PM</option></select>
				</div>
				</div>
				
				<div class="row">
				<div class="col-sm-12 col-xs-12">
				<label><i class="fa fa-ban"></i> Flexible time or not <i class="fa fa-asterisk require"></i></label><br>
				<select name="fixed"><option value="YES">Time Not flexbile</option><option value="NO">Time flexbile</option></select>
				</div>
				</div>
				
				<div class="row">
				<div class="col-sm-6 col-xs-12">
				<label><i class="fa fa-group"></i> Available Seats <i class="fa fa-asterisk require"></i></label><br>
				<input type="text" name="seats" placeholder="No. of Seats" required />
				</div>
				<div class="col-sm-6 col-xs-12">
				<label><i class="fa fa-automobile"></i> Vehicle <i class="fa fa-asterisk require"></i></label><br>
				<input type="text" name="vehicle" placeholder="Vehicle type" required />
				<span class="form-cap">(example: two wheeler, four wheeler and name of the vehicle)</span>
				</div>
				</div>
				
				<div class="row">
				<div class="col-sm-6 col-xs-12">
				<label><i class="fa fa-mobile"></i> Contact <i class="fa fa-asterisk require"></i></label><br>
				<input type="text" name="contact" placeholder="Contact no" required />
				<span class="form-cap">they easy to contact to you with this number. Note: we will show your number after you accepted the request</span>
				</div>
				<div class="col-sm-6 col-xs-12">
				<label><i class="fa fa-gift"></i> Gift Price (optional)</label><br>
				<input type="text" name="fair" placeholder="0" value="0" />
				<span class="form-cap">if you want, put affordable price, otherwise you share free ride with them </span>
				</div>
				</div>
				
				<div class="row">
				<div class="col-sm-12 col-xs-12">
				<label><i class="fa fa-bars"></i> Comment Ride</label><br>
				<textarea name="desc" placeholder="About ride" rows="6"></textarea>
				<span class="form-cap">what you want to tell somthing about ride, rules, and conditions etc. you can share via this message</span>
				</div>
				</div>

				<button type="submit"><i class="fa fa-send-o"></i> Start ride</button>
			</form>
		</div>
	</div>
</div>
