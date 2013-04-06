<?php
require_once(__MODEL_APP_CONTROL__ . "/base_classes/SpinOptionEditPanelBase.class.php");
class SpinOptionEditPanel extends SpinOptionEditPanelBase {
	public function __construct($objParentControl, $objSpinOption = null){
		parent::__construct($objParentControl);
		$this->objSpinOption = $objSpinOption;
		$this->SetEditMode();
		$this->AddCssClass('row well');
		$this->txtShortDesc->attr('placeholder', '1/2 off taps');
	}
	public function SetEditMode($blnEdit = true){
		if($blnEdit){
			$this->strTemplate = __BG_SPIN_CORE_VIEW__ . '/SpinOptionEditPanelBase.tpl.php';
		}else{
			$this->strTemplate = __BG_SPIN_CORE_VIEW__ . '/SpinOptionEditPanelBase_display.tpl.php';
		}
	}
	public function btnSave_click(){
		
		if(method_exists($this->objParentControl, 'pnlSpinOptionEdit_save')){
			$this->objParentControl->pnlSpinOptionEdit_save($this->objSpinOption);
		}
        $this->objForm->SkipMainWindowRender = true;
	}
	public function ForceSave(){
		if(!is_null(BGAuthDriver::Venue())){
			$this->txtIdVenue->Text = BGAuthDriver::Venue()->IdVenue;
		}
		$this->txtCreDate->Text = MLCDateTime::Now();
		parent::btnSave_click();
	}

}


?>