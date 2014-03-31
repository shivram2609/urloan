<div class="progress-bar">
<ul>
<?php if($step == 1) { ?>
    <li class="active">Step1 : Apply</li>
<?php } elseif($step > 1) { ?>
	<li class="done">Step1 : Apply</li>
<?php } ?>
<?php if($step == 2) { ?>
    <li class="active">Step2 : Evaluate</li>
<?php } elseif($step > 2) { ?>
	<li class="done"><a href="<?php echo $this->Html->url("/add-details/".$applicationid); ?>">Step2 : Evaluate</a></li>
<?php } else { ?>
	<li>Step2 : Evaluate</li>
<?php } ?>
<?php if($step == 3) { ?>
    <li class="extrawidth1 active">Step3 : Submit banking details</li>
<?php } elseif($step > 3) { ?>
    <li class="extrawidth1 done"><a href="<?php echo $this->Html->url("/banking-details/".$applicationid); ?>" >Step3 : Submit banking details</a></li>
<?php } else { ?>
	<li>Step3 : Submit banking details</li>
<?php } ?>
<?php if($step == 4) { ?>
    <li class="extrawidth active">Step4 : Add Documents</li>
<?php } elseif($step > 4) { ?>
    <li class="extrawidth done">Step4 : Add Documents</li>
<?php } else { ?>
	<li>Step4 : Add Documents</li>
<?php } ?>
    
    <li class="extrawidth">Step5 : Credit Check</li>
</ul>
</div>