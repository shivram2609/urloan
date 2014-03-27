<?php echo $this->Element("progress",array("step"=>3,"appid"=>$applicationid)); ?>
<h1>Add Documents</h1>
<?php
	echo $this->Form->create("ApplicationDocument",array("type"=>"file"));
	echo $this->Form->input("filename.0",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->input("filename.1",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->input("filename.2",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->input("filename.3",array("type"=>"file","label"=>"Upload File"));
	echo $this->Form->submit("Upload",array("disabled"=>true,"id"=>"frmsbmt"));
	echo $this->Html->link("Skip",array("controller"=>"confirmation"));
	echo $this->Form->end();
?>