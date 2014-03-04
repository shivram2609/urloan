<h1>Apply Online Now</h1>
<?php echo $this->Form->create("Application"); ?>
<div id="qualify" class="tab">Qualify</div>
<div id="qualify_cont" class="info hide">
	<?php 
	echo $this->Form->input("province_id",array("options"=>$provinces,"empty"=>"Please select province","class"=>"validate"));
	echo $this->Form->input('Userdetail.birth_date');
	echo $this->Form->input("empstatus",array("options"=>array("options"=>array("Full-Time employed"=>"Full-Time employed","Part-time employed"=>"Part-time employed","Temporary employment"=>"Temporary employment","Self employed"=>"Self employed","Unemployed"=>"Unemployed","Student"=>"Student","Home maker"=>"Home maker","Pension"=>"Pension","Disability benefit"=>"Disability benefit"),"label"=>"Employment Status")));
	?>
	<label>How much would you like to borrow?</label>
	<?php echo $this->Form->input("amount",array("type"=>"text","label"=>"Loan amount $1,000-$15,000","class"=>"validate")); ?>
	<?php echo $this->Form->input("purpose",array("options"=>array(""=>"I require money for:","Debt Consolidation"=>"Debt Consolidation","Unexpected Expenses"=>"Unexpected Expenses","Starting a Business"=>"Starting a Business","Paying off a Collection Agency"=>"Paying off a Collection Agency","A Vacation"=>"A Vacation","A New Car"=>"A New Car","A Home Renovation"=>"A Home Renovation","Other Reasons"=>"Other Reasons"),"label"=>"Purpose of your loan:","class"=>"validate")); ?>
	<?php echo $this->Form->input("terms",array("options"=>$terms,"label"=>"Term 6-36 months")); ?>
	<input type="button" value="Submit" id="step0"/>
</div>
<div id="pers" class="tab0">Personal Details</div>
<div id="pers_cont" class="info hide">
	<?php echo $this->Form->input("Userdetail.salutation",array("options"=>array("Mr"=>"Mr","Ms"=>"Ms"),"label"=>"Title")); 
	echo $this->Form->input('Userdetail.first_name',array("class"=>"validate"));
	echo $this->Form->input('Userdetail.last_name',array("class"=>"validate"));
	echo $this->Form->input('Userdetail.gender',array("options"=>array("Male"=>"Male","Female"=>"Female")));
	echo $this->Form->input('referredby');
	echo $this->Form->input('referenceno',array("label"=>"Reference Person Phone:"));
	echo $this->Form->input("dependents",array("options"=>array("0"=>"0","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5+"=>"5+"),"empty"=>"Select Value","label"=>"No of dependants:"));
	echo $this->Form->input("contacttime",array("options"=>array("morning"=>"Morning","afternoon"=>"Afternoon","evening"=>"Evening"),"empty"=>"Select Value","label"=>"Best time to contact you:","class"=>"validate"));
	echo $this->Form->input("carstatus",array("options"=>array("yes"=>"Yes","no"=>"No"),"empty"=>"Select Value","label"=>"Do you own a car?:"));
	echo $this->Form->input("maritalstatus",array("options"=>array("Single"=>"Single","Married"=>"Married","Divorced"=>"Divorced","Widowed"=>"Widowed","Separated"=>"Separated","Common Law"=>"Common Law"),"empty"=>"Select Value","label"=>"Marital Status:"));
	?>
	<input type="button" value="Submit" id="step1"/>
</div>
<div id="contact" class="tab1">Your Contact Information</div>
	<div id="contact_cont" class="info hide">
		<?php
			echo $this->Form->input('Userdetail.work_phone',array("class"=>"validate"));
			echo $this->Form->input('Userdetail.work_phone_extension');
			echo $this->Form->input('Userdetail.home_phone',array("class"=>"validate"));
			echo $this->Form->input('Userdetail.mobile_phone',array("class"=>"validate"));
		?>
		<input type="button" value="Submit" id="step2"/>
	</div>
<div id="address" class="tab2">Your address details</div>
	<div id="address_cont" class="info hide">
	<?php
		echo $this->Form->input('Userdetail.street_address',array("class"=>"validate"));
		echo $this->Form->input('Userdetail.address1',array("class"=>"validate"));
		echo $this->Form->input('Userdetail.city',array("class"=>"validate"));
		echo $this->Form->input('Userdetail.province',array("class"=>"validate"));
		echo $this->Form->input('Userdetail.postal_code',array("class"=>"validate"));
	?>
	<input type="button" value="Submit" id="step3"/>
	</div>

<div id="emp" class="tab3">Your employment details</div>
	<div id="emp_cont" class="info hide">
		<?php echo $this->Form->input("company",array("type"=>"text")); ?>
		<?php echo $this->Form->input("position",array("type"=>"text")); ?>
		<?php echo $this->Form->input("empmainline",array("type"=>"text","label"=>"Employer Main Line")); ?>
		<?php echo $this->Form->input("emptime",array("type"=>"text","label"=>"Time at Current Employer (Months):")); ?>
		<?php echo $this->Form->input("pay",array("type"=>"text","label"=>"Net Monthly pay:")); ?>
		<?php echo $this->Form->input("payfreq",array("options"=>array("Weekly"=>"Weekly","Bi-Weekly"=>"Bi-Weekly","Semi-Monthy"=>"Semi-Monthy","Monthly"=>"Monthly"),"empty"=>"Select value","label"=>"Pay frequency ")); ?>
		<?php echo $this->Form->input("empcontact",array("type"=>"text","label"=>"Employer Contact Person:")); ?>
		<input type="button" value="Submit" id="step4"/>
		<input type="button" value="Skip" id="step4skip"/>
	</div>
<div id="finan" class="tab4">Additional Financial Disclosure</diV>
	<div id="finan_cont" class="info hide">
		<?php echo $this->Form->input("assetsline",array("type"=>"textarea","label"=>"List your assets by name (please separate by line): ","placeholder"=>"Home, Car, Jewelry, Furniture, etc.")); ?>
		<?php echo $this->Form->input("assets",array("type"=>"textarea","label"=>"Assets (by dollar value, separate by same line): ")); ?>
		<?php echo $this->Form->input("liabilityline",array("type"=>"textarea","label"=>"List your liabilities by name (please separate by line) ","placeholder"=>"Payday loans, Visa, Mastercard, Auto Loan, etc.")); ?>
		<?php echo $this->Form->input("liabilities",array("type"=>"textarea","label"=>"Liabilities (by dollar value, separate by same line): ")); ?>
		<?php echo $this->Form->input("expenselist",array("type"=>"textarea","label"=>"List Monthly Expenses by name (please separate by line): ","placeholder"=>"Rent, Transportation, Gas, Insurance, Cell phone, etc.")); ?>
		<?php echo $this->Form->input("expenses",array("type"=>"textarea","label"=>"Monthly Expenses (by dollar value, separate by same line): ")); ?>
		<input type="button" value="Submit" id="step5"/>
		<input type="button" value="Skip" id="step5skip"/>
	</div>
<div id="terms" class="tab5">Acceptance of Terms</div>
	<div id="terms_cont" class="info hide">
		<?php echo $this->Form->input("term1",array("type"=>"checkbox","id"=>"term1","label"=>false,"div"=>false)); ?><label for="term1">By ticking here you consent to us contacting you by regular mail, e-mail, telephone, and automated message and/or passing your application to trusted third parties as described in our Privacy Policy.</label>
		<label id="term1_error" class="error hide"></label>
		<br/><hr/><br/>
		<label>Please read our Privacy Policy. We regret we cannot approve your personal loan until you check the box to confirm you have read this document. *</label>
		<?php echo $this->Form->input("term2",array("type"=>"checkbox","id"=>"term2","label"=>false,"div"=>false)); ?><label for="term2">I have read the Privacy Policy. Also, By checking this box next I authorize Creditloans Canada Financing Inc. or any agent we assign the contract to, to obtain a credit bureau report containing credit information or personal information about you. You authorize us to obtain information about you from third parties including employers and landlords and verify information with them. Creditloans Canada Financing Inc. may disclose to other credit grantors or to credit bureau agencies the information we obtain as a result of your credit approval process.</label>
		<label id="term2_error" class="error hide"></label>
	</div>
<?php echo $this->Form->submit("Complete Step"); ?>
<?php echo $this->Form->end(); ?>