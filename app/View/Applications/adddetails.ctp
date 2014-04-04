<?php echo $this->Html->css("jquery.ui"); ?>
<?php echo $this->Html->script("jquery.ui"); ?>
 <script>
$(function() {
$( "#ApplicationEmptime" ).datepicker({changeMonth: true,
changeYear: true,yearRange: '1950:2014'});
});
</script>
<?php echo $this->Element("progress",array("step"=>2)); ?>
<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1>Evaluate</h1>
<p>Fields marked <em style="color:red;">*</em> sign are mandatory.</P>
<?php echo $this->Form->create("Application"); ?>
<div id="pers" class="tab0">Personal Details</div>
<div id="pers_cont" class="info">
	<?php echo $this->Form->input("Userdetail.salutation",array("options"=>array("Mr"=>"Mr","Ms"=>"Ms"),"label"=>"Title")); 
	echo $this->Form->input('Userdetail.first_name',array("class"=>"validate"));
	echo $this->Form->input('Userdetail.last_name',array("class"=>"validate"));
	echo $this->Form->input('Userdetail.gender',array("options"=>array("Male"=>"Male","Female"=>"Female")));
	?>
	<?php
	echo $this->Form->input('referredby',array("label"=>"How did you hear about us?"));
	?>
	
	<?php
	echo $this->Form->input("dependents",array("options"=>array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5+"=>"5+"),"empty"=>"Select Value","class"=>"validate","label"=>"Number of dependants:"));
	echo $this->Form->input("contacttime",array("options"=>array("morning"=>"Morning","afternoon"=>"Afternoon","evening"=>"Evening",'anytime'=>"Anytime"),"empty"=>"Select Value","label"=>"Best time to contact you:","class"=>"validate"));
	echo $this->Form->input("carstatus",array("options"=>array("yes"=>"Yes","no"=>"No"),"empty"=>"Select Value","label"=>"Do you own a car?:","class"=>"validate"));
	echo $this->Form->input("maritalstatus",array("options"=>array("Single"=>"Single","Married"=>"Married","Divorced"=>"Divorced","Widowed"=>"Widowed","Separated"=>"Separated","Common Law"=>"Common Law"),"empty"=>"Select Value","label"=>"Marital Status:","class"=>"validate"));
	?>
	<input type="button" value="Save & Continue" id="step1"/>
</div>
<div id="contact" class="tab1">Your Contact Information</div>
	<div id="contact_cont" class="info hide">
		<?php
			echo $this->Form->input('Userdetail.work_phone',array("class"=>"validate"));
			echo $this->Form->input('Userdetail.work_phone_extension');
			echo $this->Form->input('Userdetail.home_phone',array("class"=>"validate"));
			echo $this->Form->input('Userdetail.mobile_phone',array("class"=>"validate"));
		?>
		<input type="button" value="Save & Continue" id="step2"/>
	</div>
<div id="address" class="tab2">Your address details</div>
	<div id="address_cont" class="info hide">
	<?php
		echo $this->Form->input("Userdetail.street_number",array("class"=>"validate","label"=>"Street Number"));
		echo $this->Form->input("Userdetail.street_name",array("class"=>"validate","label"=>"Street Name"));
		echo $this->Form->input("Userdetail.street_unit",array("class"=>"validate","label"=>"Unit"));
		echo $this->Form->input("Userdetail.street_type_id",array("options"=>$streettypes,"empty"=>"Select street type","class"=>"validate","label"=>"Street type"));
		echo $this->Form->input("Userdetail.street_direction",array("class"=>"validate","label"=>"Direction"));
		echo $this->Form->input('Userdetail.city',array("class"=>"validate"));
		echo $this->Form->input('Userdetail.postal_code',array("class"=>"validate","label"=>"Postal code","placeholder"=>"e.g T5G 1X3"));
		echo $this->Form->input('rent',array("class"=>"validate","label"=>"Monthly Mortgage or Rent(Amount $)"));
		echo $this->Form->input("time_curr_address",array("options"=>array("6 months"=>"6 Months","1 year"=>"1 Year","1+ years"=>"1+ Years"),"class"=>"validate","label"=>"Time at current address"));
		echo $this->Form->input('Userdetail.province',array("options"=>$provinces,"class"=>"validate","label"=>"Province in Canada"));
		echo $this->Form->input("Userdetail.resident_status",array("options"=>array("Tenant"=>"Tenant","Owner"=>"Owner"),"empty"=>"Select residential status","label"=>"Residential Status","class"=>"validate"));
	?>
	<input type="button" value="Save & Continue" id="step3"/>
	</div>

<div id="emp" class="tab3">Your employment details</div>
	<div id="emp_cont" class="info hide">
		<?php echo $this->Form->input("company",array("type"=>"text")); ?>
		<?php echo $this->Form->input("position",array("type"=>"text")); ?>
		<?php echo $this->Form->input("empmainline",array("type"=>"text","label"=>"Employer main phone line")); ?>
		<?php echo $this->Form->input("emptime",array("type"=>"text","label"=>"Start date at current employer:","readonly"=>true)); ?>
		<?php echo $this->Form->input("pay",array("type"=>"text","label"=>"Net Monthly pay:")); ?>
		<?php echo $this->Form->input("payfreq",array("options"=>array("Weekly"=>"Weekly","Bi-Weekly"=>"Bi-Weekly","Semi-Monthy"=>"Semi-Monthy","Monthly"=>"Monthly"),"empty"=>"Select value","label"=>"Pay frequency ")); ?>
		<?php echo $this->Form->input("empcontact",array("type"=>"text","label"=>"Employer Contact Person:")); ?>
		<input type="button" value="Save & Continue" id="step4"/>
	</div>
<div id="finan" class="tab4">Additional Financial Disclosure</diV>
	<div id="finan_cont" class="info hide">
	<label style="font-weight: bold;">List your assets below (Home, Car, Jewellery, Furniture, etc.)</label>
	<div style="float:left; width:100%" id="assetscont">
	<label style="float: left; width: 53%;">Assets name</label><label style="float: left; width: 45%;">Dollar value</label>
		<?php echo $this->Form->input("Application.assetsline.0",array("label"=>false,"div"=>false,"class"=>"assets1")); ?>
		<?php echo $this->Form->input("Application.assets.0",array("label"=>false,"div"=>false,"class"=>"assets2")); ?>
	</div>
		<a href="javascript:void(0);" id="asset_1" class="addasset">Add More</a>
	
	<label style="font-weight: bold; margin-top: 20px;">List your liabilities by name (please separate by line):</label>
	<div style="float:left; width:100%" id="liabilitiescont">
	<label style="float: left; width: 53%;">Liability name</label><label style="float: left; width: 45%;">Dollar value</label>
		<?php echo $this->Form->input("Application.liabilityline.0",array("label"=>false,"div"=>false,"class"=>"assets1")); ?>
		<?php echo $this->Form->input("Application.liabilities.0",array("label"=>false,"div"=>false,"class"=>"assets2")); ?>
	</div>
	<a href="javascript:void(0);" id="liability_1" class="addliability">Add More</a>
	
	
	<label style="font-weight: bold; margin-top: 20px;">List Monthly Expenses by name (please separate by line):</label>
	<div style="float:left; width:100%" id="expensescont">
	<label style="float: left; width: 53%;">Expenses name</label><label style="float: left; width: 45%;">Dollar value</label>
		<?php echo $this->Form->input("Application.expenselist.0",array("label"=>false,"div"=>false,"class"=>"assets1")); ?>
		<?php echo $this->Form->input("Application.expenses.0",array("label"=>false,"div"=>false,"class"=>"assets2")); ?>
	</div>
	<a href="javascript:void(0);" id="expense_1" class="addexpense">Add More</a>
		<div class="clear">&nbsp;</div>
	<input type="button" value="Save & Continue" id="step5"/>
	</div>
<div id="terms" class="tab5">Acceptance of Terms</div>
	<div id="terms_cont" class="info hide">
		<?php echo $this->Form->input("term1",array("type"=>"checkbox","id"=>"term1","label"=>false,"div"=>false)); ?><label for="term1">By ticking here you consent to us contacting you by regular mail, e-mail, telephone, and automated message and/or passing your application to trusted third parties as described in our Privacy Policy.</label><br/>
		<label id="term1_error" class="error hide"></label>
		<br/><hr/><br/><br/>
		<label>Please read our Privacy Policy. We regret we cannot approve your personal loan until you check the box to confirm you have read this document. *</label><br/><br/>
		<?php echo $this->Form->input("term2",array("type"=>"checkbox","id"=>"term2","label"=>false,"div"=>false)); ?><label for="term2">I have read the Privacy Policy. Also, By checking this box next I authorize Creditloans Canada Financing Inc. or any agent we assign the contract to, to obtain a credit bureau report containing credit information or personal information about you. You authorize us to obtain information about you from third parties including employers and landlords and verify information with them. Creditloans Canada Financing Inc. may disclose to other credit grantors or to credit bureau agencies the information we obtain as a result of your credit approval process.</label><br/>
		<label id="term2_error" class="error hide"></label>
	</div>
<?php echo $this->Form->submit("Complete Step"); ?>
<?php echo $this->Form->end(); ?>
</section>