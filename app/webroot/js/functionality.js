$(document).ready(function(){
	var steps = 0;
	$.fn.hasAttr = function(name) {  
	   return this.attr(name) !== undefined;
	};
	
	$("#UserLoginForm,#UserSignupForm,#UserChangepasswordForm").find("input").each(function(){
		if($(this).hasAttr("required")){
			$(this).removeAttr("required");
		}
	});
	$("#ApplicationApplyForm").find("input,select,checkbox").each(function(){
		if($(this).hasClass("validate")){
			$(this).after('<label id = "'+$(this).attr("id")+'_error" class="hide error"></label>');
		}
	});
		
	$(".tab").live("click",function(){
		var contid = $(this).attr("id")+"_cont";
		$("#"+contid).slideToggle(1000);
	});
	
	/* to validate first step of application  */
	$.fn.step1 = function(){
		var err_count_step1 = 0;
		/* check valid price */
		var price = $("#ApplicationAmount").val();
		if (!$(this).checkprice(price)) {
			++err_count_step1;
			$("#ApplicationAmount_error").html("Please enter valid amount.");
			$("#ApplicationAmount_error").show();
			$("#ApplicationAmount_error").focus();
		} else {
			$("#ApplicationAmount_error").hide();
		}
		/* check valid price end here */
		
		if($("#ApplicationPurpose").val() == '') {
			++err_count_step1;
			$("#ApplicationPurpose_error").html("Please enter loan purpose.");
			$("#ApplicationPurpose_error").show();
			$("#ApplicationPurpose_error").focus();
		} else {
			$("#ApplicationPurpose_error").hide();
		}
		
		if($("#UserdetailFirstName").val() == '') {
			++err_count_step1;
			$("#UserdetailFirstName_error").html("Please enter first name.");
			$("#UserdetailFirstName_error").show();
			$("#UserdetailFirstName_error").focus();
		} else {
			$("#UserdetailFirstName_error").hide();
		}
		
		if($("#UserdetailLastName").val() == '') {
			++err_count_step1;
			$("#UserdetailLastName_error").html("Please enter first name.");
			$("#UserdetailLastName_error").show();
			$("#UserdetailLastName_error").focus();
		} else {
			$("#UserdetailLastName_error").hide();
		}
		
		if($("#ApplicationContacttime").val() == '') {
			++err_count_step1;
			$("#ApplicationContacttime_error").html("Please enter contact time.");
			$("#ApplicationContacttime_error").show();
			$("#ApplicationContacttime_error").focus();
		} else {
			$("#ApplicationContacttime_error").hide();
		}
		if (err_count_step1 == 0) {
			return true;
		} else {
			return false;
		}
		
	}
	/* to validate first step of application end here */
	
	$.fn.step2 = function(){
		var err_count_step2 = 0;
		if(!$(this).checkprice($("#UserdetailWorkPhone").val())) {
			++err_count_step2;
			$("#UserdetailWorkPhone_error").html("Please enter valid work phone.");
			$("#UserdetailWorkPhone_error").show();
			$("#UserdetailWorkPhone_error").focus();
		} else {
			$("#UserdetailWorkPhone_error").hide();
		}
		if(!$(this).checkprice($("#UserdetailHomePhone").val())) {
			++err_count_step2;
			$("#UserdetailHomePhone_error").html("Please enter valid home phone.");
			$("#UserdetailHomePhone_error").show();
			$("#UserdetailHomePhone_error").focus();
		} else {
			$("#UserdetailHomePhone_error").hide();
		}
		if(!$(this).checkprice($("#UserdetailMobilePhone").val())) {
			++err_count_step2;
			$("#UserdetailMobilePhone_error").html("Please enter valid mobile phone.");
			$("#UserdetailMobilePhone_error").show();
			$("#UserdetailMobilePhone_error").focus();
		} else {
			$("#UserdetailMobilePhone_error").hide();
		}
		
		if (err_count_step2 == 0) {
			return true;
		} else {
			return false;
		}
	}
	
	
	$.fn.checkprice = function(price){
		var reg = /^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/;
		return reg.test(price);
	}
	
	$.fn.checkphone = function(phone){
		var reg = /^\d{10}$/;
		return reg.test(phone);
	}
	
	$("#step1").click(function(){
		if ($(this).step1()) {
			$("div.tab1").addClass("tab");
			$("#pers_cont").slideUp("1000");
			$("#contact_cont").slideDown("1000");
		}
	});
	$("#step2").click(function(){
		if ($(this).step2()) {
			$("div.tab2").addClass("tab");
			$("#contact_cont").slideUp("1000");
			$("#address_cont").slideDown("1000");
		}
	});
	
	
	
	
	
	$("#UserSignupForm").validate({
		rules:{
			'data[User][username]' : {
				required	: true,
				email		: true
		
			},
			'data[User][newpassword]' : {
				required	:	true,
				minlength	:	8,
				maxlength	:	15
			},
			'data[Userdetail][first_name]' : {
				required	:	true
				
			}
			,
			'data[Userdetail][last_name]' : {
				required	:	true
				
			},
			'data[User][confirmpassword]' : {
				required	:	true,
				equalTo		:	'#UserNewpassword',
				minlength	:	8,
				maxlength	:	15
			}
		},
		messages:{
			'data[User][username]' : {
				required	: 'Please enter username.',
				email		: 'Please enetr valid email.'
			},
			'data[User][newpassword]' : {
				required	:	'Please enter password.',
				minlength	:	'Password length must be 8 character long.',
				maxlength	:	'Password length can not exceed 15 characters.'
			},
			'data[Userdetail][first_name]' : {
				required	:	'Please enter name'
			},
			'data[Userdetail][last_name]' : {
				required	:	'Please enter last name'
			},
			'data[User][confirmpassword]' : {
				required	:	'Please re-type new password.',
				equalTo		:	'New and Re-type password do not match.',
				minlength	:	'Password cannot be less than 8 characters.',
				maxlength	:	'Password cannot be more than 15 characters.'
			}
		}
	});	
	
	
	
	
	$("#UserLoginForm").validate({
		rules:{
			'data[User][username]'	:{
				required	:	true,
				email	:	true
			},
			'data[User][password]'	:{
				required	: true,
				minlength	: 5
			}
		},
		messages:{
			'data[User][username]'	:{
				required	:	'Please enter username.',
				email		:	'Please enter valid email.'
			},
			'data[User][password]'	:{
				required	:	'Please enter password.',
				minlength	:	'Password length must be 5 character long.'
			}
		}
	});
	
	$("#UserChangepasswordForm,#UserEditProfileAccountForm").validate({
		rules : {
			'data[User][oldpassword]' : {
				required	:	true,
				minlength	:	5,
				maxlength	:	15
			},
			'data[User][newpassword]' : {
				required	:	true,
				minlength	:	5,
				maxlength	:	15
			},
			'data[User][confirmpassword]' : {
				required	:	true,
				equalTo		:	'#UserNewpassword',
				minlength	:	5,
				maxlength	:	15
			}
		},
		messages : {
			'data[User][oldpassword]' : {
				required	:	'Please enter current password.',
				minlength	:	'Password cannot be less than 5 characters.',
				maxlength	:	'Password cannot be more than 15 characters.'
			},
			'data[User][newpassword]' : {
				required	:	'Please enter new password.',
				minlength	:	'Password cannot be less than 5 characters.',
				maxlength	:	'Password cannot be more than 15 characters.'
			},
			'data[User][confirmpassword]' : {
				required	:	'Please re-type new password.',
				equalTo		:	'New and Re-type password do not match.',
				minlength	:	'Password cannot be less than 5 characters.',
				maxlength	:	'Password cannot be more than 15 characters.'
			}
		}
	});
});