<?php echo $this->Element("progress",array("step"=>4,"appid"=>$applicationid)); ?>

<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1>Add Documents</h1>
<div class="info">
<label class="head_label margin_null">Document Checklist</label>
<?php if(isset($this->data['ApplicationDocument']['filename0']) && !empty($this->data['ApplicationDocument']['filename0'])) {
	echo $this->Form->create("ApplicationDocument",array("type"=>"file","id"=>"ApplicationDocumentEditDocumentsForm"));
	echo $this->Form->hidden("exists",array("value"=>1));
} else {
	echo $this->Form->create("ApplicationDocument",array("type"=>"file")); ?>
<?php }
	 ?>
	
	<?php
	echo $this->Form->input("filename0",array("type"=>"file","div"=>false,"label"=>"Proof of income")); ?>
	<span><b>Tip:</b> (i.e. your most recent pay stub, recent signed letter from your employer on letterhead and should have contact details, etc.)</span>
	<?php
	echo $this->Form->input("filename1",array("type"=>"file","div"=>false,"label"=>"Proof of residence"));
	?>
	<span><b>Tip:</b> Your signed lease agreement is preferred.  Your most recent utility bill or cell phone bill showing your current physical address is also acceptable.</span>
	<?php
	echo $this->Form->input("filename2",array("type"=>"file","div"=>false,"label"=>"Government issued photo ID"));
	?>
	<span><b>Tip:</b> A driver's license or passport is acceptable. Please caution: we require your primary ID in color, acceptable methods include smartphone photo or color scan.  A second piece of ID may be required as your application progresses.</span>
	<?php
	echo $this->Form->input("filename3",array("type"=>"file","div"=>false,"label"=>"Bank Statements"));
	?>
	<span><b>Tip:</b> Please attach your most recent 90 days of bank statements to the date of your application.  We require the actual physical statements you receive by mail or downloadable online through your online banking.  If you cannot obtain these, we encourage you to perform instant banking verification for faster processing.  Please phone 1-855-723-5626 ext. 1 to make the necessary arrangements.</span>
	<label>Required Disclosure Waiver (<a href="http://www.urloan.com/wp-content/uploads/2013/12/Initial-Application-Checklist-and-Disclosure-Consent-Dec-2013.pdf" target="_blank">Click Here to Download the Initial Application Checklist and Disclosure Consent</a>)</label>
	<?php
	echo $this->Form->input("filename4",array("type"=>"file","div"=>false,"label"=>false));
	?>
	<span><b>Tip:</b> Some employers, landlords, and collection agencies will not disclose information to financing companies without a signed disclosure from the borrower. Please download the attached waiver and upload back it to field above. We perform employment verification in all cases; therefore, to the extent you believe this waiver will be required from your employer, please fill it out to improve your processing time.
</span>
	<?php
	echo $this->Form->submit("Upload",array("id"=>"frmsbmt"));
	echo $this->Form->end();
?>
</div>
</section>