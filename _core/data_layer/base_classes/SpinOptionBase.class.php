<?php
class SpinOptionBase extends BaseEntity {
	const DB_CONN = 'DB_2';
    const TABLE_NAME = 'SpinOption';
    const P_KEY = 'idSpinOption';
    
    public function __construct(){
        $this->table = DB_PREFIX . self::TABLE_NAME;
		$this->pKey = self::P_KEY;
		$this->strDBConn = self::DB_CONN;
    }
 
	public static function LoadById($intId){
		$sql = sprintf("SELECT * FROM %s WHERE idSpinOption = %s;", self::TABLE_NAME, $intId);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		while($data = mysql_fetch_assoc($result)){
			$tObj = new SpinOption();
			$tObj->materilize($data);
			return $tObj;
		}
	}
	public static function LoadAll(){
		$sql = sprintf("SELECT * FROM %s;", self::TABLE_NAME);
		$result = MLCDBDriver::Query($sql, SpinOption::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new SpinOption();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		return $coll;
	}
	public function ToXml($blnReclusive = false){
        $xmlStr = "";
        $xmlStr .= "<SpinOption>";
        
        $xmlStr .= "<idSpinOption>";
        $xmlStr .= $this->idSpinOption;
        $xmlStr .= "</idSpinOption>";
        
        $xmlStr .= "<idVenue>";
        $xmlStr .= $this->idVenue;
        $xmlStr .= "</idVenue>";
        
        $xmlStr .= "<shortDesc>";
        $xmlStr .= $this->shortDesc;
        $xmlStr .= "</shortDesc>";
        
        $xmlStr .= "<creDate>";
        $xmlStr .= $this->creDate;
        $xmlStr .= "</creDate>";
        
        $xmlStr .= "<icon>";
        $xmlStr .= $this->icon;
        $xmlStr .= "</icon>";
        
        $xmlStr .= "<longDesc>";
        $xmlStr .= $this->longDesc;
        $xmlStr .= "</longDesc>";
        
        if($blnReclusive){
           //Finish FK Rel stuff
        }
        $xmlStr .= "</SpinOption>";
        return $xmlStr;
        
    }
   
	public static function Query($strExtra, $blnReturnSingle = false){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		$coll = new BaseEntityCollection();
		while($data = mysql_fetch_assoc($result)){
			$tObj = new SpinOption();
			$tObj->materilize($data);
			$coll->addItem($tObj);
		}
		$arrReturn = $coll->getCollection();
		if($blnReturnSingle){
			if(count($arrReturn) == 0){
				return null;
			}else{
				return $arrReturn[0];
			}	
		}else{
			return $arrReturn;
		}		
	}
	public static function QueryCount($strExtra = ''){
		$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME,  $strExtra);
		$result = MLCDBDriver::Query($sql, self::DB_CONN);
		return mysql_num_rows($result);
			
	}
     //Get children
    

    //Load by foregin key
    
    
      public function LoadByTag($strTag){
	  	return MLCTagDriver::LoadTaggedEntites($strTag, get_class($this));
	  }
	       
    
	  public function AddTag($mixTag){
	  	return MLCTagDriver::AddTag($mixTag, $this);
	  }
	  
    public function ParseArray($arrData){
    	foreach($arrData as $strKey => $mixVal){
    		$arrData[strtolower($strKey)] = $mixVal;
    	}
       
        
    }
        
        
        
        
        
       public static function Parse($mixData, $blnReturnId = false){
        	if(is_numeric($mixData)){
        		if($blnReturnId){
        			return $mixData;
        		}
        		return SpinOption::Load($mixData);
        	}elseif(
        		(is_object($mixData)) && 
        		(get_class($mixData) == 'SpinOption')
        	){
        		if(!$blnReturnId){
        			return $mixData;
        		}
        		return $mixData->intIdSpinOption;
        	}elseif(is_null($mixData)){
        		return null;
        	}else{
        		throw new Exception(__FUNCTION__ . '->Parse - Parameter 1 must be either an intiger or a class type "SpinOption"');
        	}        	
        }
        public static function LoadSingleByField( $strField, $mixValue, $strCompairison = '='){
        	$arrResults = self::LoadArrayByField($strField, $mixValue, $strCompairison);
        	if(count($arrResults)){
        		return $arrResults[0];
        	}
        	return null;
        }
        public static function LoadArrayByField( $strField, $mixValue, $strCompairison = '='){
			if(is_numeric($mixValue)){
				$strValue = $mixValue;
			}else{
				$strValue = sprintf('"%s"', $mixValue);
			} 
			$strExtra = sprintf(' WHERE %s %s %s', $strField, $strCompairison, $strValue);
			
			$sql = sprintf("SELECT * FROM %s %s;", self::TABLE_NAME, $strExtra);
			//die($sql);
			$result = MLCDBDriver::query($sql, self::DB_CONN);
			$coll = new BaseEntityCollection();
			while($data = mysql_fetch_assoc($result)){
				
				$tObj = new SpinOption();
				$tObj->materilize($data);
				$coll->addItem($tObj);
			}
			$arrResults = $coll->getCollection();
			
			return $arrResults;
		}
        public function __toArray(){
        	$arrReturn = array();
            $arrReturn['_ClassName'] = "SpinOption";
               
                                 
                 $arrReturn['idSpinOption'] = $this->idSpinOption;
               
                                 
                 $arrReturn['idVenue'] = $this->idVenue;
               
                                 
                 $arrReturn['shortDesc'] = $this->shortDesc;
               
                                 
                 $arrReturn['creDate'] = $this->creDate;
               
                                 
                 $arrReturn['icon'] = $this->icon;
               
                                 
                 $arrReturn['longDesc'] = $this->longDesc;
            
            return $arrReturn;
        }
        public function __toJson($blnPosponeEncode = false){
        	$arrReturn = $this->__toArray();  
        	if($blnPosponeEncode){
        		return json_encode($arrReturn);
        	}else{
        		return $arrReturn;
        	} 
        }
        public function __get($strName){
	        switch($strName){
	        	 
	   			case('IdSpinOption'): 
	   			case('idSpinOption'): 
	   				if(array_key_exists('idSpinOption', $this->arrDBFields)){
	        			return $this->arrDBFields['idSpinOption'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('IdVenue'): 
	   			case('idVenue'): 
	   				if(array_key_exists('idVenue', $this->arrDBFields)){
	        			return $this->arrDBFields['idVenue'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	   				if(array_key_exists('shortDesc', $this->arrDBFields)){
	        			return $this->arrDBFields['shortDesc'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	   				if(array_key_exists('creDate', $this->arrDBFields)){
	        			return $this->arrDBFields['creDate'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('Icon'): 
	   			case('icon'): 
	   				if(array_key_exists('icon', $this->arrDBFields)){
	        			return $this->arrDBFields['icon'];
	        		}
	        		return null;
	        	break;
	        	 
	   			case('LongDesc'): 
	   			case('longDesc'): 
	   				if(array_key_exists('longDesc', $this->arrDBFields)){
	        			return $this->arrDBFields['longDesc'];
	        		}
	        		return null;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	       
	    }
	    public function __set($strName, $strValue){
	   		$this->modified = 1;
	   		switch($strName){
	   			 
	   			case('IdSpinOption'): 
	   			case('idSpinOption'): 
	        		$this->arrDBFields['idSpinOption'] = $strValue;
	        	break;
	        	 
	   			case('IdVenue'): 
	   			case('idVenue'): 
	        		$this->arrDBFields['idVenue'] = $strValue;
	        	break;
	        	 
	   			case('ShortDesc'): 
	   			case('shortDesc'): 
	        		$this->arrDBFields['shortDesc'] = $strValue;
	        	break;
	        	 
	   			case('CreDate'): 
	   			case('creDate'): 
	        		$this->arrDBFields['creDate'] = $strValue;
	        	break;
	        	 
	   			case('Icon'): 
	   			case('icon'): 
	        		$this->arrDBFields['icon'] = $strValue;
	        	break;
	        	 
	   			case('LongDesc'): 
	   			case('longDesc'): 
	        		$this->arrDBFields['longDesc'] = $strValue;
	        	break;
	        	
	        	defualt:
	        		throw new Exception('No property with name "' . $strName . '" exists in class ". get_class($this) . "');
	        	break;
	        }
	    }
}
?>