<?php echo $this->Element("progress",array("step"=>4,"appid"=>$applicationid)); ?>

<?php echo $this->element("left_navigation"); ?>
<section class="right-panel">
<h1>Add Documents</h1>
<div class="info">
<?php
	echo $this->Form->create("ApplicationDocument",array("type"=>"file"));
	echo $this->Form->input("filename.0",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->input("filename.1",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->input("filename.2",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->input("filename.3",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->submit("Upload",array("disabled"=>true,"id"=>"frmsbmt"));
	echo $this->Form->end();
?>
</div>
</section>