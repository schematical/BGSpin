<?php
require_once('_config.inc.php');

class player extends BGForm{

	public function Form_Create(){
		parent::Form_Create();
		$this->CreateControls();
		$this->strTemplate = __BG_SPIN_CORE_VIEW__ . '/player.tpl.php';
		//This will allow the user to spin if it is their turn
		
		//This will display the current deal
		
		//This will also count down to the next available spin
	}
	
	public function CreateControls(){
	   
    		
   		
	}
	
  	
  	
}
player::Run('player');
?>