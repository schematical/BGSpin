<?php
require_once('_config.inc.php');

class bartender extends BGForm{

	public function Form_Create(){
		parent::Form_Create();
		$this->CreateControls();
		$this->strTemplate = __BG_SPIN_CORE_VIEW__ . '/bartender.tpl.php';
		//This will allow the bartender to select a user/Possibly at random
		
		//This will allow the bartender to veto the spin
		
		//This will also count down to the next available spin
		
	}
	
	public function CreateControls(){
	   
    		
   		
	}
	
  	
  	
}
bartender::Run('bartender');
?>