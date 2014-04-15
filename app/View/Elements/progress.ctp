<div class="progress-bar">
<ul>
<?php if($step == 1) { ?>
    <li class="active"><span>Step1</span> Start</li>
<?php } elseif($step > 1) { ?>
	<li class="done"><span><img src="<?php echo $this->webroot; ?>img/abc.jpg" /></span> Start</li>
<?php } ?>
<?php if($step == 2) { ?>
    <li class="active"><span>Step2</span> Apply</li>
<?php } elseif($step > 2) { ?>
	<li class="done"><a href="<?php echo $this->Html->url("/add-details/".$applicationid); ?>"><span><img src="<?php echo $this->webroot; ?>img/abc.jpg" /></span> Apply</a></li>
<?php } else { ?>
	<li><span>Step2</span> Apply</li>
<?php } ?>
<?php if($step == 3) { ?>
    <li class="extrawidth1 active"><span>Step3</span> Submit banking details</li>
<?php } elseif($step > 3) { ?>
    <li class="extrawidth1 done"><a href="<?php echo $this->Html->url("/banking-details/".$applicationid); ?>" ><span><img src="<?php echo $this->webroot; ?>img/abc.jpg" /></span> Submit banking details</a></li>
<?php } else { ?>
	<li><span>Step3</span> Submit banking details</li>
<?php } ?>
<?php if($step == 4) { ?>
    <li class="extrawidth active"><span>Step4</span> Add Documents</li>
<?php } elseif($step > 4) { ?>
    <li class="extrawidth done"><span><img src="<?php echo $this->webroot; ?>img/abc.jpg" /></span> Add Documents</li>
<?php } else { ?>
	<li><span>Step4</span> Add Documents</li>
<?php } ?>
</ul>
</div>
<div style="position: relative; z-index: -2147483648; width: 75%; left: 94px; top: -78px; border-bottom: 2px dotted;">&nbsp;</div>