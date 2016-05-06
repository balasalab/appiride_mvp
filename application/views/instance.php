
<div class="container-fluid">
	<div class="row" style="margin-bottom:60px;">
		<div class="col-md-6 col-md-offset-3 tal">
			
			<?php
			$uid = "";
			$uname= '';
			if($this->session->userdata('logged_in'))
		   {
			 $session_data = $this->session->userdata('logged_in');
			 $uid = $session_data['userid'];
			 $uname = $session_data['firstname'];
		   }
		   else
		   {
				$uid = 0;
				$uname = 0;
		   }
		   ?>
			<form id="appride-instance" name="appride-instance">
			<input type="text" name="user_id" id="user_id" value="<?php	echo $uid; ?>" hidden="hidden" />
			<input type="text" name="user_name" id="user_name" value="<?php	echo $uname; ?>" hidden="hidden" />

				<div class="row">
				<div class="col-sm-12 col-xs-12">
				<label><i class="fa fa-bars"></i> Message <span class="form-cap">[ write your needs and help's during travel ]</span></label><br>
				<textarea name="message" placeholder="comments" rows="4" required></textarea>
				</div>
				</div>
				<?php
				if($uname){
				?>
				<button type="submit"><i class="fa fa-send-o"></i> post</button>
				<?php
				}
				else{
				?>
				<button type="button" class="appi-login"><i class="fa fa-send-o"></i> post</button>
				<?php
				}
				?>
				<?php
				function inst(){
				$instance = file_get_contents('http://localhost/appiride/api/appiride/instance/format/json');
				$manage = json_decode($instance);
				foreach ($manage as $key){			
					//echo '<div>'.$key->message.'</div>';
				}
				}
				?>
				<div class="instance_post">
				<span class="top_post"></span>
				</div>
				
				
			</form>
		</div>
	</div>
</div>

<script>
/*instance*/
$("#appride-instance").submit(function(){
	var uid = $("#user_id").val();
	if(uid > 0){
		var form_data = $(this).serialize();
		instance_form_ajax(form_data);
		event.preventDefault();
	}
	else{
		alert("please login");
	}
	event.preventDefault();
});
function instance_form_ajax( datas ){
$.ajax({
	url:"http://localhost/appiride/api/appiride/add_instance_ride",
	type:"post",
	data: datas,
	success:function( data ){
		if( data != "NOTSUCCESS" );
		{
			//setTimeout(function() { instance_update( data ); }, 5000);
			instance_update( data )
			$("#appride-instance").trigger('reset');
		}
	}
}).done(function( data ) {
	//alert( data );
	//$("#appride-instance").trigger('reset');
});

}

function instance_post(){
$.ajax({
	url:"http://localhost/appiride/api/appiride/instance/format/json",
	type:"get",
	data: {},
	success:function( data ){
		$.each(data, function(i, v){
			$(".instance_post").append('<div class="post_div"><div class="datetime">'+v.datetime+'</div><div class="ind_post"><div class="post_name">'+v.user_name+'</div><div class="post_message">'+v.message+'</div></div></div><br>');
		});
	}
}).done(function( data ) {
});
}

instance_post();

function instance_update( id ){
$.ajax({
	url:"http://localhost/appiride/api/appiride/instance/id/"+id+"/format/json",
	type:"get",
	data: {},
	success:function( data ){
		//alert("asdasdasd");
		$.each(data, function(i, v){
			$('<div class="post_div"><div class="datetime">'+v.datetime+'</div><div class="ind_post"><div class="post_name">'+v.user_name+'</div><div class="post_message">'+v.message+'</div></div></div><br>').insertAfter( ".top_post" );
		});
	}
}).done(function( data ) {
});
}
/*instance*/
</script>
