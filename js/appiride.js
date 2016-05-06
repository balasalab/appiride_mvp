/*signup*/
var base_path = "http://localhost/appiride_mvp/";
$("#appride-signup").submit(function(){
	var form_data = $(this).serialize();
	signup_ajax(form_data);
	event.preventDefault();
});
function signup_ajax( datas ){
$.ajax({
	url:base_path+"api/appiride/add_user",
	type:"post",
	data: datas,
	success:function( data ){
		//alert( data );
	}
}).done(function( data ) {
	//alert( data );
	$("#appride-signup").trigger('reset');
	$(".signup-modal").removeClass('animated bounceInLeft').addClass('animated bounceOutRight').css("display", "table");
	
});

}
/*signup*/

/*login*/
$("#appride-login").submit(function(){
	var form_data = $(this).serialize();
	login_ajax(form_data);
	event.preventDefault();
});
function login_ajax( datas ){
$.ajax({
	url:base_path+"api/appiride/login",
	type:"post",
	data: datas,
	success:function( data ){
		//alert( data );
	}
}).done(function( data ) {
	//alert(data);
	if(data == "true"){
		//alert( "True" );
		$(".login-modal").removeClass('animated bounceInLeft').addClass('animated bounceOutRight').css("display", "table");
		location.reload();
	}
	else{
		alert( "False" );
	}
	
});

}
/*login*/

/*giver*/
$("#appride-giver").submit(function(){
	var uid = $("#user_id").val();
	if(uid > 0){
		var form_data = $(this).serialize();
		giver_form_ajax(form_data);
		event.preventDefault();
	}
	else{
		alert("please login"+$(this).serialize());
	}
	event.preventDefault();
});
function giver_form_ajax( datas ){
$.ajax({
	url:base_path+"api/appiride/add_giver_ride",
	type:"post",
	data: datas,
	success:function( data ){
		//alert( data );
	}
}).done(function( data ) {
	//alert( data );
	$("#appride-giver").trigger('reset');
});

}
/*giver*/

/*getter*/
$("#appride-getter").submit(function(){
	var uid = $("#user_id").val();
	if(uid > 0){
		var form_data = $(this).serialize();
		getter_form_ajax(form_data);
		event.preventDefault();
	}
	else{
		alert("please login"+$(this).serialize());
	}
	event.preventDefault();
});
function getter_form_ajax( datas ){
$.ajax({
	url:base_path+"api/appiride/add_getter_ride",
	type:"post",
	data: datas,
	success:function( data ){
		//alert( data );
	}
}).done(function( data ) {
	//alert( data );
	$("#appride-getter").trigger('reset');
});

}
/*getter*/



/*loginmodal*/
$(".appi-login").click(function(){
	$(".login-modal").css("display", "table").removeClass('animated bounceOutLeft').addClass('animated bounceInLeft');
});
$(".login-modal-close").click(function(){
	$(".login-modal").removeClass('animated bounceInLeft').addClass('animated bounceOutLeft').css("display", "table");
});
/*loginmodal*/

/*signup modal*/
$(".appi-signup").click(function(){
	$(".signup-modal").css("display", "table").removeClass('animated bounceOutLeft').addClass('animated bounceInLeft');
});
$(".signup-modal-close").click(function(){
	$(".signup-modal").removeClass('animated bounceInLeft').addClass('animated bounceOutLeft').css("display", "table");
});
/*signup modal*/

/*request to journer*/
$(".request_ride").click(function(){
	var jourid = $(this).data("id");
	var rr = $(this);
	//var rd  = req_journer(jourid);
	$.ajax({
		url:base_path+"api/appiride/req_journer/format/json",
		type:"post",
		data: {id : jourid},
		success:function( data ){
			$(rr).text("request pending");
			$(rr).removeClass("request_ride").addClass("request_sent");
		}
	});
});
/*request to journer*/
/*delete to journer*/
$(".delete_jour_ride").click(function(){
	var jourid = $(this).data("id");
	var rr = $(this);
	//var rd  = req_journer(jourid);
	$.ajax({
		url:base_path+"api/appiride/disable_journer/format/json",
		type:"post",
		data: {id : jourid},
		success:function( data ){
			if(data == "SUCCESS"){
				window.location.href="";
			}
		}
	});
});
/*delete to journer*/

/*dashboard*/
$(".view_req").click(function(){
	$("."+$(this).attr("id")).slideToggle("slow");
});
/*dashboard*/

/*accept to joiner*/
$(".accept_ride").click(function(){
	var joiid = $(this).data("id");
	var rr = $(this);
	//var rd  = req_journer(joiid);
	$.ajax({
		url:base_path+"api/appiride/req_joiner/format/json",
		type:"post",
		data: {id : joiid},
		success:function( data ){
			$(rr).text("accept pending");
			$(rr).removeClass("accept_ride").addClass("accept_sent");
		}
	});
});
/*accept to joiner*/





