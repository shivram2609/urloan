<?php echo $this->Element("progress",array("step"=>3,"appid"=>$applicationid)); ?>

<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1><?php echo __('Add Application Banking Information'); ?></h1>
<div class="info">
<?php echo $this->Form->create('ApplicationBankingInformation',array("novalidate"=>true)); ?>

	<?php
		echo $this->Form->input('institute_number',array("class"=>"validate","label"=>"Institution Number"));
		echo $this->Form->input('transit_number',array("class"=>"validate"));
		echo $this->Form->input('account_number',array("class"=>"validate"));
		echo $this->Form->input('name_of_account',array("class"=>"validate","label"=>"Full Name on Account"));
		echo $this->Form->input('second_name_of_account',array("label"=>"Second Full Name on Account (if Joint Bank Account)"));
		echo $this->Form->input('type',array("options"=>array("Chequing"=>"Chequing","Savings"=>"Savings"),"empty"=>"Select Value","class"=>"validate","label"=>"Type of Account"));
	?>
	<?php echo $this->Html->image("cheque.jpg"); ?>
	<label class="head_label">Why is my banking information required?</label>
	<label class="content_label">Our most important underwriting criteria is that all applicants have a valid bank chequing or savings account with a Canadian Financial Institution.  We require you to have a valid bank account so that we can verify the bank account to deposit your term loan into it and subsequently take your loan repayment until the term loan is paid off. </label>
	<label class="head_label">Final Step to Submit Application <em style="color:red;">*</em></label><br>
		<?php echo $this->Form->input("term2",array("type"=>"checkbox","id"=>"term2","label"=>false,"div"=>false)); ?><label style="display:inline;" for="term2">By ticking here, I confirm that I have provided Creditloans Canada Financing Inc. my accurate bank account information and have prepared the required documents per the checklist above. I acknowledge that my application will not be reviewed until my documents are emailed to documents@urloan.com or faxed to 1-855-477-1110.</label>
		<label id="term2_error" class="error hide"></label>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
</section>
