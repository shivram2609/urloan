<?php echo $this->Html->css("jquery.ui"); ?>
<?php echo $this->Html->script("jquery.ui"); ?>
 <script>
$(function() {
$( "#UserdetailBirthDate" ).datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date(1995, 1 - 1, 1), changeMonth: true,
changeYear: true,yearRange: '1930:1995'});
});
 $(function() {
$( "#slider-range-min" ).slider({
range: "min",
value: 1000,
min: 100,
max: 15000,
slide: function( event, ui ) {
$( "#ApplicationAmount" ).val( ui.value );
}
});
$( "#ApplicationAmount" ).val( $( "#slider-range-min" ).slider( "value" ) );
});
</script>

<?php if($this->Session->read("raw")) { ?>
<?php echo $this->Element("progress",array("step"=>1)); ?>
<?php } ?>
<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1>Apply Online Now</h1>
<?php echo $this->Form->create("Application"); ?>
<?php if($this->Session->read("raw")) { ?>
<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->hidden("apply",array("value"=>"app")); ?>
	<?php echo $this->Form->submit("Apply Now"); ?>
	<?php echo $this->Form->end(); ?>
<?php } else { ?>
<?php echo $this->Session->flash(); ?>
<div id="qualify" class="tab">Qualify</div>
<div id="qualify_cont" class="info">
	<h2>We have some basic requirements in order to pre-qualify for a loan, please answer the following several questions so we can determine if our product is the right fit for you:</h2>
	<p style="font-size: 12px;">Fields denoted with <em style="color:red;">*</em> sign are mandatory.</p>
	<?php 
	echo $this->Form->input("Userdetail.province_id",array("options"=>$provinces,"empty"=>"Please select province","class"=>"validate"));
	echo $this->Form->input('Userdetail.birth_date',array("type"=>"text",'readonly'));
	echo $this->Form->input("empstatus",array("options"=>array("Full-Time employed"=>"Full-Time employed","Part-time employed"=>"Part-time employed","Temporary employment"=>"Temporary employment","Self employed"=>"Self employed","Unemployed"=>"Unemployed","Student"=>"Student","Home maker"=>"Home maker","Pension"=>"Pension","Disability benefit"=>"Disability benefit"),"label"=>"Employment Status"));
	?>

	<?php //echo $this->Form->input("amount",array("options"=>$loanamount,"empty"=>"Select an amount","label"=>"How much would you like to borrow?<br/>Loan amount $1,000-$15,000","class"=>"validate")); ?>
	<?php echo $this->Form->input("amount",array("empty"=>"Select an amount","label"=>"How much would you like to borrow?<br/>Loan amount $1,000-$15,000","class"=>"validate")); ?>
	<div id="slider-range-min"></div>
	<?php echo $this->Form->input("purpose",array("options"=>array(""=>"I require money for:","Debt Consolidation"=>"Debt Consolidation","Unexpected Expenses"=>"Unexpected Expenses","Starting a Business"=>"Starting a Business","Paying off a Collection Agency"=>"Paying off a Collection Agency","A Vacation"=>"A Vacation","A New Car"=>"A New Car","A Home Renovation"=>"A Home Renovation","Other Reasons"=>"Other Reasons"),"label"=>"Purpose of your loan:","class"=>"validate")); ?>
	<?php echo $this->Form->input("terms",array("options"=>$terms,"label"=>"Term 6-36 months")); ?>
<div class="proposal-pro">
	<label id="back_label">Are you currently in Bankruptcy, a Consumer Proposal, or Credit Counselling? 
</label>
	<?php echo $this->Form->radio("bankcrupt_status",array("1"=>"Yes","2"=>"No"),array("legend"=>false)); ?>
</div>
	<?php echo $this->Form->submit("Get Prequalified"); ?>
	<?php echo $this->Form->end(); ?>
</div>
<?php } ?>
</section>