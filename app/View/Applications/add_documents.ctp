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