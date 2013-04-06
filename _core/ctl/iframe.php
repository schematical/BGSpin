<?php
require_once('_config.inc.php');

class iframe extends BGForm{
	public function Form_Create(){
		parent::Form_Create();
		$this->strTemplate = __BG_SPIN_CORE_VIEW__ . '/iframe.tpl.php';
		//This puts an iFrame through to the game
		$this->CreateControls();
	}
	
	public function CreateControls(){
	   
    		
   		
	} 	
}
iframe::Run('iframe');
?>