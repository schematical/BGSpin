<h2>Spin the Wheel</h2>
<?php foreach($_CONTROL->arrOptionPanels as $intIndex => $pnlOption){
	$pnlOption->Render(); 
} ?>
<hr/>
<?php $_CONTROL->btnContinue->Render(); ?>
