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
	$("#ApplicationApplyForm,#ApplicationAdddetailsForm,#ApplicationBankingInformationAddForm").find("input,select,checkbox").each(function(){
		if($(this).hasClass("validate")){
			$(this).prev("label").html($(this).prev("label").html() + "<em style='color:red;'>*<em>");
			$(this).after('<label id = "'+$(this).attr("id")+'_error" class="hide error"></label>');
		}
		if($(this).hasClass("non-validate")){
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
		if($("#ApplicationDependents").val() == '') {
			++err_count_step1;
			$("#ApplicationDependents_error").html("Please select number of dependants.");
			$("#ApplicationDependents_error").show();
			$("#ApplicationDependents_error").focus();
		} else {
			$("#ApplicationDependents_error").hide();
		}
		if($("#ApplicationCarstatus").val() == '') {
			++err_count_step1;
			$("#ApplicationCarstatus_error").html("Please select car status.");
			$("#ApplicationCarstatus_error").show();
			$("#ApplicationCarstatus_error").focus();
		} else {
			$("#ApplicationCarstatus_error").hide();
		}
		if($("#ApplicationMaritalstatus").val() == '') {
			++err_count_step1;
			$("#ApplicationMaritalstatus_error").html("Please select marital status.");
			$("#ApplicationMaritalstatus_error").show();
			$("#ApplicationMaritalstatus_error").focus();
		} else {
			$("#ApplicationMaritalstatus_error").hide();
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
		
		if (!$(this).validate_email($("#UserdetailPrimaryEmail").val())) {
			++err_count_step2;
			$("#UserdetailPrimaryEmail_error").html("Please enter valid email address.");
			$("#UserdetailPrimaryEmail_error").show();
			$("#UserdetailPrimaryEmail_error").focus();
		} else {
			$("#UserdetailPrimaryEmail_error").hide();
		}
		if ($("#UserdetailWorkEmail").val() != '' && !$(this).validate_email($("#UserdetailWorkEmail").val())) {
			++err_count_step2;
			$("#UserdetailWorkEmail_error").html("Please enter valid email address.");
			$("#UserdetailWorkEmail_error").show();
			$("#UserdetailWorkEmail_error").focus();
		} else {
			$("#UserdetailWorkEmail_error").hide();
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
		
		if ($("#UserProvinceId").val() == '') {
			++err_count_step0;
			$("#UserProvinceId_error").html("Please select a province.");
			$("#UserProvinceId_error").show();
			$("#UserProvinceId_error").focus();
		} else {
			$("#UserProvinceId_error").hide();
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
	
	$.fn.checkbankinfo = function(){
		var err_count_bankinfo = 0;
		if ($("#ApplicationBankingInformationInstituteNumber").val() == '') {
			++err_count_bankinfo;
			$("#ApplicationBankingInformationInstituteNumber_error").html("Please enter institute number.");
			$("#ApplicationBankingInformationInstituteNumber_error").show();
			$("#ApplicationBankingInformationInstituteNumber_error").focus();
		} else {
			$("#ApplicationBankingInformationInstituteNumber_error").hide();
		}
		if ($("#ApplicationBankingInformationTransitNumber").val() == '') {
			++err_count_bankinfo;
			$("#ApplicationBankingInformationTransitNumber_error").html("Please enter transit number.");
			$("#ApplicationBankingInformationTransitNumber_error").show();
			$("#ApplicationBankingInformationTransitNumber_error").focus();
		} else {
			$("#ApplicationBankingInformationTransitNumber_error").hide();
		}
		if ($("#ApplicationBankingInformationAccountNumber").val() == '') {
			++err_count_bankinfo;
			$("#ApplicationBankingInformationAccountNumber_error").html("Please enter account number.");
			$("#ApplicationBankingInformationAccountNumber_error").show();
			$("#ApplicationBankingInformationAccountNumber_error").focus();
		} else {
			$("#ApplicationBankingInformationAccountNumber_error").hide();
		}
		if ($("#ApplicationBankingInformationNameOfAccount").val() == '') {
			++err_count_bankinfo;
			$("#ApplicationBankingInformationNameOfAccount_error").html("Please enter full name on account.");
			$("#ApplicationBankingInformationNameOfAccount_error").show();
			$("#ApplicationBankingInformationNameOfAccount_error").focus();
		} else {
			$("#ApplicationBankingInformationNameOfAccount_error").hide();
		}
		if ($("#ApplicationBankingInformationType").val() == '') {
			++err_count_bankinfo;
			$("#ApplicationBankingInformationType_error").html("Please select type of account.");
			$("#ApplicationBankingInformationType_error").show();
			$("#ApplicationBankingInformationType_error").focus();
		} else {
			$("#ApplicationBankingInformationType_error").hide();
		}
		if ($("#term2:checked").val() != 1) {
			++err_count_bankinfo;
			$("#term2_error").html("Please accept terms.");
			$("#term2_error").show();
		} else {
			$("#term2_error").hide();
		}
		
		
		if (err_count_bankinfo == 0) {
			return true;
		} else {
			return false;
		}
	}
	
	$("#ApplicationBankingInformationAddForm").submit(function(){
		return $(this).checkbankinfo();
	});
	
	$("#ApplicationApplyForm").submit(function(){
		//alert($(this).step0());
		if($("#ApplicationApply").val()) {
			return true;
		} else {
			if($(this).step0()) {
				$(".back").show();
				setTimeout(function(){ alert(true); return true; },10000);
			} else {
				return false;
			}
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
			$("div.tab0").addClass("tab");
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
		if ($("#UserdetailStreetUnit").val() == '') {
			++err_count_step3;
			$("#UserdetailStreetUnit_error").html("Please enter street unit.");
			$("#UserdetailStreetUnit_error").show();
			$("#UserdetailStreetUnit_error").focus();
		} else if(parseInt($("#UserdetailStreetUnit").val())+0 != $("#UserdetailStreetUnit").val()  ) {
			++err_count_step3;
			$("#UserdetailStreetUnit_error").html("Please enter valid number.");
			$("#UserdetailStreetUnit_error").show();
			$("#UserdetailStreetUnit_error").focus();
		} else {
			$("#UserdetailStreetUnit_error").hide();
		}
		if ($("#UserdetailStreetNumber").val() == '') {
			++err_count_step3;
			$("#UserdetailStreetNumber_error").html("Please enter street number.");
			$("#UserdetailStreetNumber_error").show();
			$("#UserdetailStreetNumber_error").focus();
		} else {
			$("#UserdetailStreetNumber_error").hide();
		}
		if ($("#UserdetailStreetName").val() == '') {
			++err_count_step3;
			$("#UserdetailStreetName_error").html("Please enter street name.");
			$("#UserdetailStreetName_error").show();
			$("#UserdetailStreetName_error").focus();
		} else {
			$("#UserdetailStreetName_error").hide();
		}
		if ($("#UserdetailStreetTypeId").val() == '') {
			++err_count_step3;
			$("#UserdetailStreetTypeId_error").html("Please enter street type.");
			$("#UserdetailStreetTypeId_error").show();
			$("#UserdetailStreetTypeId_error").focus();
		} else {
			$("#UserdetailStreetTypeId_error").hide();
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
		if ($("#ApplicationTimeCurrAddress").val() == '') {
			++err_count_step3;
			$("#ApplicationTimeCurrAddress_error").html("Please enter time at current address.");
			$("#ApplicationTimeCurrAddress_error").show();
			$("#ApplicationTimeCurrAddress_error").focus();
		} else {
			$("#ApplicationTimeCurrAddress_error").hide();
		}
		if ($("#UserdetailProvince").val() == '') {
			++err_count_step3;
			$("#UserdetailProvince_error").html("Please enter province.");
			$("#UserdetailProvince_error").show();
			$("#UserdetailProvince_error").focus();
		} else {
			$("#UserdetailProvince_error").hide();
		}
		if ($("#UserdetailResidentStatus").val() == '') {
			++err_count_step3;
			$("#UserdetailResidentStatus_error").html("Please select residential status.");
			$("#UserdetailResidentStatus_error").show();
			$("#UserdetailResidentStatus_error").focus();
		} else {
			$("#UserdetailResidentStatus_error").hide();
		}
		
		if ($("#ApplicationRent").val() == '') {
			++err_count_step3;
			$("#ApplicationRent_error").html("Please enter rent.");
			$("#ApplicationRent_error").show();
			$("#ApplicationRent_error").focus();
		} else if(parseFloat($("#ApplicationRent").val())+0 != $("#ApplicationRent").val()  ) {
			++err_count_step3;
			$("#ApplicationRent_error").html("Please enter valid amount.");
			$("#ApplicationRent_error").show();
			$("#ApplicationRent_error").focus();
		} else {
			$("#ApplicationRent_error").hide();
		}
		if($("#ApplicationTimeCurrAddress").val() < 2) {
			$(".prior-address").show();
			if ($("#UserdetailStreetUnit1").val() == '') {
				++err_count_step3;
				$("#UserdetailStreetUnit1_error").html("Please enter street unit.");
				$("#UserdetailStreetUnit1_error").show();
				$("#UserdetailStreetUnit1_error").focus();
			} else if(parseInt($("#UserdetailStreetUnit1").val())+0 != $("#UserdetailStreetUnit1").val()  ) {
				++err_count_step3;
				$("#UserdetailStreetUnit1_error").html("Please enter valid number.");
				$("#UserdetailStreetUnit1_error").show();
				$("#UserdetailStreetUnit1_error").focus();
			} else {
				$("#UserdetailStreetUnit1_error").hide();
			}
			if ($("#UserdetailStreetNumber1").val() == '') {
				++err_count_step3;
				$("#UserdetailStreetNumber1_error").html("Please enter street number.");
				$("#UserdetailStreetNumber1_error").show();
				$("#UserdetailStreetNumber1_error").focus();
			} else {
				$("#UserdetailStreetNumber1_error").hide();
			}
			if ($("#UserdetailStreetName1").val() == '') {
				++err_count_step3;
				$("#UserdetailStreetName1_error").html("Please enter street name.");
				$("#UserdetailStreetName1_error").show();
				$("#UserdetailStreetName1_error").focus();
			} else {
				$("#UserdetailStreetName1_error").hide();
			}
			if ($("#UserdetailStreetTypeId1").val() == '') {
				++err_count_step3;
				$("#UserdetailStreetTypeId1_error").html("Please enter street type.");
				$("#UserdetailStreetTypeId1_error").show();
				$("#UserdetailStreetTypeId1_error").focus();
			} else {
				$("#UserdetailStreetTypeId1_error").hide();
			}
			
			if ($("#UserdetailCity1").val() == '') {
				++err_count_step3;
				$("#UserdetailCity1_error").html("Please enter city.");
				$("#UserdetailCity1_error").show();
				$("#UserdetailCity1_error").focus();
			} else {
				$("#UserdetailCity1_error").hide();
			}
			
			if ($("#UserdetailPostalCode1").val() == '') {
				++err_count_step3;
				$("#UserdetailPostalCode1_error").html("Please enter postal code.");
				$("#UserdetailPostalCode1_error").show();
				$("#UserdetailPostalCode1_error").focus();
			} else {
				$("#UserdetailPostalCode1_error").hide();
			}
			if ($("#ApplicationTimeCurrAddress1").val() == '') {
				++err_count_step3;
				$("#ApplicationTimeCurrAddress1_error").html("Please enter time at current address.");
				$("#ApplicationTimeCurrAddress1_error").show();
				$("#ApplicationTimeCurrAddress1_error").focus();
			} else {
				$("#ApplicationTimeCurrAddress1_error").hide();
			}
			if ($("#UserdetailProvince1").val() == '') {
				++err_count_step3;
				$("#UserdetailProvince1_error").html("Please enter province.");
				$("#UserdetailProvince1_error").show();
				$("#UserdetailProvince1_error").focus();
			} else {
				$("#UserdetailProvince1_error").hide();
			}
			if ($("#UserdetailResidentStatus1").val() == '') {
				++err_count_step3;
				$("#UserdetailResidentStatus1_error").html("Please select residential status.");
				$("#UserdetailResidentStatus1_error").show();
				$("#UserdetailResidentStatus1_error").focus();
			} else {
				$("#UserdetailResidentStatus1_error").hide();
			}
			
			if ($("#ApplicationRent1").val() == '') {
				++err_count_step3;
				$("#ApplicationRent1_error").html("Please enter rent.");
				$("#ApplicationRent1_error").show();
				$("#ApplicationRent1_error").focus();
			} else if(parseFloat($("#ApplicationRent1").val())+0 != $("#ApplicationRent1").val()  ) {
				++err_count_step3;
				$("#ApplicationRent1_error").html("Please enter valid amount.");
				$("#ApplicationRent1_error").show();
				$("#ApplicationRent1_error").focus();
			} else {
				$("#ApplicationRent1_error").hide();
			}
		}
		if (err_count_step3 == 0) {
			return true;
		} else {
			return false;
		}
		
	}
	$("#ApplicationTimeCurrAddress").live("change",function(){
		if($(this).val() < 2 ){
			$(".prior-address").show();
		} else {
			$(".prior-address").hide();
		}
	});
	$("#step3").click(function(){
		if($(this).step3()) {
			$("div.tab3").addClass("tab");
			$("#address_cont").slideUp("1000");
			$("#emp_cont").slideDown("1000");
		}
	});
	
	$.fn.checknumber = function(number) {
		var checknumber = parseFloat(number)+0;
		if( !isNaN(checknumber) && checknumber == number) {
			return true;
		} else {
			return false;
		}
	}
	
	$.fn.step4 = function(){
		var err_count_step4 = 0;
		if ($("#ApplicationEmpstatus").val() == '') {
		alert("here");
			++err_count_step4;
			$("#ApplicationEmpstatus_error").html("Please select employee status.");
			$("#ApplicationEmpstatus_error").show();
			$("#ApplicationEmpStatus").focus();
		} else {
			$("#ApplicationEmpStatus_error").hide();
		}
		if ($("#ApplicationCurrCompTime").val() == '') {
			++err_count_step4;
			$("#ApplicationCurrCompTime_error").html("Please enter current company time.");
			$("#ApplicationCurrCompTime_error").show();
			$("#ApplicationCurrCompTime_error").focus();
		} else if(!$(this).checknumber($("#ApplicationCurrCompTime").val())) {
			++err_count_step4;
			$("#ApplicationCurrCompTime_error").html("Please enter valid current company time.");
			$("#ApplicationCurrCompTime_error").show();
			$("#ApplicationCurrCompTime_error").focus();
		} else {
			$("#ApplicationEmpStatus_error").hide();
		}
		if ($("#ApplicationCompany").val() == '') {
			++err_count_step4;
			$("#ApplicationCompany_error").html("Please enter company.");
			$("#ApplicationCompany_error").show();
			$("#ApplicationCompany_error").focus();
		} else {
			$("#ApplicationCompany_error").hide();
		}
		if ($("#ApplicationPay").val() == '') {
			++err_count_step4;
			$("#ApplicationPay_error").html("Please enter monthly pay.");
			$("#ApplicationPay_error").show();
			$("#ApplicationPay_error").focus();
		} else if(!$(this).checknumber($("#ApplicationPay").val())) {
			++err_count_step4;
			$("#ApplicationPay_error").html("Please enter valid monthly pay.");
			$("#ApplicationPay_error").show();
			$("#ApplicationPay_error").focus();
		} else {
			$("#ApplicationPay_error").hide();
		}
		if ($("#ApplicationPosition").val() == '') {
			++err_count_step4;
			$("#ApplicationPosition_error").html("Please enter position.");
			$("#ApplicationPosition_error").show();
			$("#ApplicationPosition").focus();
		} else {
			$("#ApplicationPosition_error").hide();
		}
		if ($("#ApplicationPayfreq").val() == '') {
			++err_count_step4;
			$("#ApplicationPayfreq_error").html("Please enter pay frequency.");
			$("#ApplicationPayfreq_error").show();
			$("#ApplicationPayfreq").focus();
		} else {
			$("#ApplicationPayfreq_error").hide();
		}
		if ($("#ApplicationEmpmainline").val() == '' || !$(this).checkphone($("#ApplicationEmpmainline").val())) {
			++err_count_step4;
			$("#ApplicationEmpmainline_error").html("Please enter valid phone number.");
			$("#ApplicationEmpmainline_error").show();
			$("#ApplicationEmpmainline").focus();
		} else {
			$("#ApplicationEmpmainline_error").hide();
		}
		if ($("#ApplicationEmpcontact").val() == '') {
			++err_count_step4;
			$("#ApplicationEmpcontact_error").html("Please enter employer contact name.");
			$("#ApplicationEmpcontact_error").show();
			$("#ApplicationEmpcontact").focus();
		} else {
			$("#ApplicationEmpcontact_error").hide();
		}
		if ($("#ApplicationEmptime").val() == '') {
			++err_count_step4;
			$("#ApplicationEmptime_error").html("Please enter current company time.");
			$("#ApplicationEmptime_error").show();
			$("#ApplicationEmptime").focus();
		} else {
			$("#ApplicationEmptime_error").hide();
		}
		if ($("#ApplicationPayDays").val() == '') {
			++err_count_step4;
			$("#ApplicationPayDays_error").html("Please enter pay days.");
			$("#ApplicationPayDays_error").show();
			$("#ApplicationPayDays").focus();
		} else {
			$("#ApplicationPayDays_error").hide();
		}
		if ($("#ApplicationHowPaid").val() == '') {
			++err_count_step4;
			$("#ApplicationHowPaid_error").html("Please select how are you paid.");
			$("#ApplicationHowPaid_error").show();
			$("#ApplicationHowPaid").focus();
		} else {
			$("#ApplicationHowPaid_error").hide();
		}
		if ($("#ApplicationLastPay").val() == '') {
			++err_count_step4;
			$("#ApplicationLastPay_error").html("Please enter last pay day.");
			$("#ApplicationLastPay_error").show();
			$("#ApplicationLastPay").focus();
		} else {
			$("#ApplicationLastPay_error").hide();
		}
		if ($("#ApplicationNextPay").val() == '') {
			++err_count_step4;
			$("#ApplicationNextPay_error").html("Please next pay day.");
			$("#ApplicationNextPay_error").show();
			$("#ApplicationNextPay").focus();
		} else {
			$("#ApplicationNextPay_error").hide();
		}
		
		
		if(err_count_step4 == 0) {
			return true;
		} else {
			return false;
		}
		
	}
	
	$("#step4,#step4skip").click(function(){
		if($(this).step4()) {
			$("div.tab4").addClass("tab");
			$("#emp_cont").slideUp("1000");
			$("#finan_cont").slideDown("1000");
		}
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
	
	$.fn.validate_email = function(email) {
		var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
		if (reg.test(email)){
			return true; 
		} else {
			return false;
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
	
	$(".addasset").live("click",function(){
		var id = $(this).attr("id").split("_");
		var str = '<input type="text" id="ApplicationAssetsline'+id[1]+'" class="assets1" name="data[Application][assetsline]['+id[1]+']" placeholder="Home, Car, Jewelry, Furniture, etc.">		<input type="text" id="ApplicationAssets'+id[1]+'" class="assets2" name="data[Application][assets]['+id[1]+']">';
		$("#assetscont").append(str);
		$(this).attr("id","asset_"+(parseInt(id[1])+1));
	});
	$(".addliability").live("click",function(){
		var id = $(this).attr("id").split("_");
		var str = '<input type="text" id="ApplicationLiabilityline'+id[1]+'" class="assets1" name="data[Application][liabilityline]['+id[1]+']" placeholder="Payday loans, Visa, Mastercard, Auto Loan, etc.">		<input type="text" id="ApplicationLiabilities'+id[1]+'" class="assets2" name="data[Application][liabilities]['+id[1]+']">';
		$("#liabilitiescont").append(str);
		$(this).attr("id","liability_"+(parseInt(id[1])+1));
	});
	$(".addexpense").live("click",function(){
		var id = $(this).attr("id").split("_");
		var str = '<input type="text" id="ApplicationExpenselist'+id[1]+'" class="assets1" name="data[Application][expenselist]['+id[1]+']" placeholder="Rent, Transportation, Gas, Insurance, Cell phone, etc.">		<input type="text" id="ApplicationExpenses'+id[1]+'" class="assets2" name="data[Application][expenses]['+id[1]+']">';
		$("#expensescont").append(str);
		$(this).attr("id","addexpense_"+(parseInt(id[1])+1));
	});
	
	$(function() {
		var pull = $('#pull');
		menu = $('nav ul');
		menuHeight = menu.height();

		$(pull).on('click', function(e) {
			e.preventDefault();
			menu.slideToggle();
		});

		$(window).resize(function() {
			var w = $(window).width();
			if (w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	});
});