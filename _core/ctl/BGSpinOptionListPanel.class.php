<?php
class BGSpinOptionListPanel extends MJaxPanel {
	public $arrOptionPanels = array();
	public $btnContinue = null;
	public function __construct($objParentControl, $mixOptions = null) {
        parent::__construct($objParentControl);    
        $this->strTemplate = __BG_SPIN_CORE_VIEW__ . '/' . get_class($this). '.tpl.php';
		
		
		$this->btnContinue = new MJaxButton($this);
		$this->btnContinue->Text = 'Continue';
		$this->btnContinue->AddAction($this, 'btnContinue_click');
		
		//TODO: Add real option edit
		if(is_null($mixOptions)){
			$objVenue = BGAuthDriver::Venue();
			//_dp(BGAuthDriver::Account());
			if(!is_null($objVenue)){
				$arrOptions	= SpinOption::LoadArrayByField('idVenue', $objVenue->IdVenue);
				foreach($arrOptions as $intIndex => $objOption){
					$this->arrOptionPanels[] = new SpinOptionEditPanel($this, $objOption);
				}
			}
		}
		$this->arrOptionPanels[] = new SpinOptionEditPanel($this);
	}
	public function btnContinue_click(){
		$this->objForm->AnimateOpen('divSignup');
	}
	public function pnlSpinOptionEdit_save(){
		$this->arrOptionPanels[] = new SpinOptionEditPanel($this);
		$this->blnModified = true;
	}
	public function SaveAll(){
		foreach($this->arrOptionPanels as $intIndex => $pnlOptions){
			if(strlen($pnlOptions->txtShortDesc->Text) != 0){
				$pnlOptions->ForceSave();
			}
		}
	}
}


?>