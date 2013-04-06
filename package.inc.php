<?php
define('__BG_SPIN__', dirname(__FILE__));
define('__BG_SPIN_CORE__', __BG_SPIN__ . '/_core');
/*if(!defined('__MLC_AUTH__')){
	MLCApplication::InitPackage('MLCAuth');
}*/


MLCDBDriver::ParseDBConnection('DB_BGSpin');
define('__BG_SPIN_CORE_CTL__', __BG_SPIN_CORE__ . '/ctl');
define('__BG_SPIN_CORE_DATA_LAYER__', __BG_SPIN_CORE__ . '/data_layer');
define('__BG_SPIN_CORE_VIEW__', __BG_SPIN_CORE__ . '/view');
MLCApplicationBase::$arrClassFiles['MDEApplication'] = __MDE_CORE_MODEL__ . '/MDEApplication.class.php';
MLCApplicationBase::$arrClassFiles['MDEAuthDriver'] = __MDE_CORE_MODEL__ . '/MDEAuthDriver.class.php';
//Data Model
MLCApplicationBase::$arrClassFiles['SpinOption'] = __BG_SPIN_CORE_DATA_LAYER__ . '/SpinOption.class.php';

//CTL
MLCApplicationBase::$arrClassFiles['BGSpinOptionListPanel'] = __BG_SPIN_CORE__ . '/ctl/BGSpinOptionListPanel.class.php';
MLCApplicationBase::$arrClassFiles['SpinOptionEditPanel'] = __BG_SPIN_CORE__ . '/ctl/SpinOptionEditPanel.class.php';


//require_once(__BG_SPIN_CORE__ . '/_exception.inc.php');
//require_once(__BG_SPIN_CORE__ . '/_enum.inc.php');

