<?php echo $this->Html->css("jquery.ui"); ?>
<?php echo $this->Html->script("jquery.ui"); ?>
 <script>
$(function() {
$( "#UserdetailBirthDate" ).datepicker({dateFormat: 'yy-mm-dd',maxDate: new Date(1995, 1 - 1, 1), changeMonth: true,
changeYear: true});
});
</script>
<?php if($this->Session->read("raw")) { ?>
<?php echo $this->Element("progress",array("step"=>1)); ?>
<?php } ?>
<h1>Apply Online Now</h1>
<?php echo $this->Form->create("Application"); ?>
<?php if($this->Session->read("raw")) { ?>
	<?php echo $this->Form->hidden("apply",array("value"=>"app")); ?>
	<?php echo $this->Form->submit("Apply Now"); ?>
	<?php echo $this->Form->end(); ?>
<?php } else { ?>
<div id="qualify" class="tab">Qualify</div>
<div id="qualify_cont" class="info">
	<?php 
	echo $this->Form->input("Userdetail.province_id",array("options"=>$provinces,"empty"=>"Please select province","class"=>"validate"));
	echo $this->Form->input('Userdetail.birth_date',array("type"=>"text",'readonly'));
	echo $this->Form->input("empstatus",array("options"=>array("Full-Time employed"=>"Full-Time employed","Part-time employed"=>"Part-time employed","Temporary employment"=>"Temporary employment","Self employed"=>"Self employed","Unemployed"=>"Unemployed","Student"=>"Student","Home maker"=>"Home maker","Pension"=>"Pension","Disability benefit"=>"Disability benefit"),"label"=>"Employment Status"));
	?>
	<label>How much would you like to borrow?</label>
	<?php echo $this->Form->input("amount",array("options"=>$loanamount,"empty"=>"Select an amount","label"=>"Loan amount $1,000-$15,000","class"=>"validate")); ?>
	<?php echo $this->Form->input("purpose",array("options"=>array(""=>"I require money for:","Debt Consolidation"=>"Debt Consolidation","Unexpected Expenses"=>"Unexpected Expenses","Starting a Business"=>"Starting a Business","Paying off a Collection Agency"=>"Paying off a Collection Agency","A Vacation"=>"A Vacation","A New Car"=>"A New Car","A Home Renovation"=>"A Home Renovation","Other Reasons"=>"Other Reasons"),"label"=>"Purpose of your loan:","class"=>"validate")); ?>
	<?php echo $this->Form->input("terms",array("options"=>$terms,"label"=>"Term 6-36 months")); ?>
	<?php echo $this->Form->radio("bankcrupt_status",array("1"=>"Yes","2"=>"No"),array("legend"=>"Are you currently in a Bankruptcy or Proposal Proceeding?")); ?>
	<?php echo $this->Form->submit("Get Prequalified"); ?>
	<?php echo $this->Form->end(); ?>
</div>
<?php } ?>