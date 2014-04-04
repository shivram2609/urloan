<div class="progress-bar">
<ul>
<?php if($step == 1) { ?>
    <li class="active"><span>Step1</span> Apply</li>
<?php } elseif($step > 1) { ?>
	<li class="done"><span>Step1</span> Apply</li>
<?php } ?>
<?php if($step == 2) { ?>
    <li class="active"><span>Step2</span> Evaluate</li>
<?php } elseif($step > 2) { ?>
	<li class="done"><a href="<?php echo $this->Html->url("/add-details/".$applicationid); ?>"><span>Step2</span> Evaluate</a></li>
<?php } else { ?>
	<li><span>Step2</span> Evaluate</li>
<?php } ?>
<?php if($step == 3) { ?>
    <li class="extrawidth1 active"><span>Step3</span> Submit banking details</li>
<?php } elseif($step > 3) { ?>
    <li class="extrawidth1 done"><a href="<?php echo $this->Html->url("/banking-details/".$applicationid); ?>" ><span>Step3</span> Submit banking details</a></li>
<?php } else { ?>
	<li><span>Step3</span> Submit banking details</li>
<?php } ?>
<?php if($step == 4) { ?>
    <li class="extrawidth active"><span>Step4</span> Add Documents</li>
<?php } elseif($step > 4) { ?>
    <li class="extrawidth done"><span>Step4</span> Add Documents</li>
<?php } else { ?>
	<li><span>Step4</span> Add Documents</li>
<?php } ?>
</ul>
</div>
<div style="position: relative; z-index: -2147483648; width: 75%; left: 94px; top: -78px; border-bottom: 2px dotted;">&nbsp;</div>