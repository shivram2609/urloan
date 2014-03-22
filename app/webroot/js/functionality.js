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
	$("#ApplicationApplyForm,#ApplicationAdddetailsForm").find("input,select,checkbox").each(function(){
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
		if(!$(this).checkphone($("#UserdetailWorkPhone").val())) {
			++err_count_step2;
			$("#UserdetailWorkPhone_error").html("Please enter valid work phone.");
			$("#UserdetailWorkPhone_error").show();
			$("#UserdetailWorkPhone_error").focus();
		} else {
			$("#UserdetailWorkPhone_error").hide();
		}
		
		if(!$(this).checkphone($("#UserdetailHomePhone").val())) {
			++err_count_step2;
			$("#UserdetailHomePhone_error").html("Please enter valid home phone.");
			$("#UserdetailHomePhone_error").show();
			$("#UserdetailHomePhone_error").focus();
		} else {
			$("#UserdetailHomePhone_error").hide();
		}
		if(!$(this).checkphone($("#UserdetailMobilePhone").val())) {
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
	
	$("#ApplicationAgentId").live("change",function(){
		if ($(this).val() == 'other') {
			$("#ref_other").slideDown('1000');
			$("#ApplicationReferredby").removeAttr("disabled");
			$("#ApplicationReferenceno").removeAttr("disabled");
		} else {
			$("#ref_other").slideUp('1000');
			$("#ApplicationReferredby").attr("disabled",true);
			$("#ApplicationReferenceno").attr("disabled",true);
		}
	});
	
	$.fn.step0 = function(){
		var err_count_step0 = 0;
		/* check valid price */
		var price = $("#ApplicationAmount").val();
		if (!$(this).checkprice(price)) {
			++err_count_step0;
			$("#ApplicationAmount_error").html("Please enter valid amount.");
			$("#ApplicationAmount_error").show();
			$("#ApplicationAmount_error").focus();
		} else {
			$("#ApplicationAmount_error").hide();
		}
		/* check valid price end here */
		
		if ($("#ApplicationProvinceId").val() == '') {
			++err_count_step0;
			$("#ApplicationProvinceId_error").html("Please select a province.");
			$("#ApplicationProvinceId_error").show();
			$("#ApplicationProvinceId_error").focus();
		} else {
			$("#ApplicationProvinceId_error").hide();
		}
		
		if ($("#ApplicationPurpose").val() == '') {
			++err_count_step0;
			$("#ApplicationPurpose_error").html("Please select a purpose of loan.");
			$("#ApplicationPurpose_error").show();
			$("#ApplicationPurpose_error").focus();
		} else {
			$("#ApplicationPurpose_error").hide();
		}
		
		
		
		if (err_count_step0 == 0) {
			return true;
		} else {
			return false;
		}
	}
	
	$("#ApplicationApplyForm").submit(function(){
		//alert($(this).step0());
		if($("#ApplicationApply").val()) {
			return true;
		} else {
			return ($(this).step0());
		}
		
	});
	/*
	$("#step0").click(function(){
		if ($(this).step0()) {
			$("#ApplicationApplyForm").submit();
		}
	});
	*/
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
	
	$.fn.step3 = function(){
		var err_count_step3 = 0;
		if ($("#UserdetailStreetAddress").val() == '') {
			++err_count_step3;
			$("#UserdetailStreetAddress_error").html("Please enter address.");
			$("#UserdetailStreetAddress_error").show();
			$("#UserdetailStreetAddress_error").focus();
		} else {
			$("#UserdetailStreetAddress_error").hide();
		}
		
		if ($("#UserdetailCity").val() == '') {
			++err_count_step3;
			$("#UserdetailCity_error").html("Please enter city.");
			$("#UserdetailCity_error").show();
			$("#UserdetailCity_error").focus();
		} else {
			$("#UserdetailCity_error").hide();
		}
		
		if ($("#UserdetailPostalCode").val() == '') {
			++err_count_step3;
			$("#UserdetailPostalCode_error").html("Please enter postal code.");
			$("#UserdetailPostalCode_error").show();
			$("#UserdetailPostalCode_error").focus();
		} else {
			$("#UserdetailPostalCode_error").hide();
		}
		if (err_count_step3 == 0) {
			return true;
		} else {
			return false;
		}
		
	}
	
	$("#step3").click(function(){
		if($(this).step3()) {
			$("div.tab3").addClass("tab");
			$("#address_cont").slideUp("1000");
			$("#emp_cont").slideDown("1000");
		}
	});
	
	$("#step4,#step4skip").click(function(){
		$("div.tab4").addClass("tab");
		$("#emp_cont").slideUp("1000");
		$("#finan_cont").slideDown("1000");
	});
	$("#step5,#step5skip").click(function(){
		$("div.tab5").addClass("tab");
		$("#finan_cont").slideUp("1000");
		$("#terms_cont").slideDown("1000");
	});
	
	$.fn.laststep = function(){
		var term_count = 0;
		if($("#term1:checked").val() == 1 && $("#term2:checked").val() == 1) {
		} else {
			if ($("#term1:checked").val() != 1) {
				$("#term1_error").html("Please accept terms.");
				$("#term1_error").show();
			} else {
				$("#term1_error").hide();
			}
			if ($("#term2:checked").val() != 1) {
				$("#term2_error").html("Please accept terms.");
				$("#term2_error").show();
			} else {
				$("#term2_error").hide();
			}
			++term_count;
		}
		
		if(term_count > 0) {
			return false;
		} else {
			return true;
		}
	}
	
	
	$("#ApplicationAdddetailsForm").submit(function(){
		return $(this).laststep();
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
	
	$("#filename0,#filename1,#filename2,#filename3").change(function(){
		if($(this).val() != '' ){
			$("#frmsbmt").removeAttr("disabled");
		}
	});
	
	$("#ApplicationDocumentAddDocumentsForm").validate({
		rules:{
			'data[filename][0]' : {
				required 	:	false,
				accept		:	'jpeg|jpg|png|gif|pdf|doc'
			},
			'data[filename][1]' : {
				required 	:	false,
				accept		:	'jpeg|jpg|png|gif|pdf|doc'
			},
			'data[filename][2]' : {
				required 	:	false,
				accept		:	'jpeg|jpg|png|gif|pdf|doc'
			},
			'data[filename][3]' : {
				required 	:	false,
				accept		:	'jpeg|jpg|png|gif|pdf|doc'
			}
			
		},
		messages:{
			'data[filename][0]' : {
				accept		:	'Please upload jpeg,gif,png,pdf or doc file only'
			},
			'data[filename][1]' : {
				accept		:	'Please upload jpeg,gif,png,pdf or doc file only'
			},
			'data[filename][2]' : {
				accept		:	'Please upload jpeg,gif,png,pdf or doc file only'
			},
			'data[filename][3]' : {
				accept		:	'Please upload jpeg,gif,png,pdf or doc file only'
			}
			
		}
	});
	
});