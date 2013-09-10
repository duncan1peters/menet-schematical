<?php
class CheckinListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrCheckins = array()){
		
		
	    	
	    	$this->AddColumn('idCheckin','idCheckin');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('idVenue','idVenue');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idCheckinType','idCheckinType');
	   		
		
	    	
	    	
	    	$this->AddColumn('uniqueId','uniqueId');
	   		
		
	    	
	    	
	    	$this->AddColumn('data','data');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrCheckins);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Checkin/' . $strActionParameter);
	}
	
  	
}
?>