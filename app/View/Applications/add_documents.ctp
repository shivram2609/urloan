<?php echo $this->Element("progress",array("step"=>4,"appid"=>$applicationid)); ?>

<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1>Add Documents</h1>
<div class="info">
<label class="head_label margin_null">Document Checklist</label>
<?php
	echo $this->Form->create("ApplicationDocument",array("type"=>"file")); ?>
	
	<?php
	echo $this->Form->input("filename.0",array("type"=>"file","div"=>false,"label"=>"Proof of income")); ?>
	<span><b>Tip:</b> (i.e. a pay stub, recent employment letter, etc.)</span>
	<?php
	echo $this->Form->input("filename.1",array("type"=>"file","div"=>false,"label"=>"Proof of residence"));
	?>
	<span><b>Tip:</b> A recent utility bill or cell phone bill showing the address on your application is required.</span>
	<?php
	echo $this->Form->input("filename.2",array("type"=>"file","div"=>false,"label"=>"Government issued photo ID"));
	?>
	<span><b>Tip:</b> A driver's license or passport is acceptable. Please caution: for those submitting photo identification, if a scan or fax is provided please ensure your photo, home address, and signature are visible otherwise the identification will be rejected; a smartphone photo is also acceptable.</span>
	<?php
	echo $this->Form->submit("Upload",array("disabled"=>true,"id"=>"frmsbmt"));
	echo $this->Form->end();
?>
</div>
</section>