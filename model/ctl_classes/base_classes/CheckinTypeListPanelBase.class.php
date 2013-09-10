<?php
class CheckinTypeListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrCheckinTypes = array()){
		
		
	    	
	    	$this->AddColumn('idCheckinType','idCheckinType');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('shortDesc','shortDesc');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrCheckinTypes);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/CheckinType/' . $strActionParameter);
	}
	
  	
}
?>