<?php
class TeamListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrTeams = array()){
		
		
	    	
	    	$this->AddColumn('idTeam','idTeam');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('teamName','teamName');
	   		
		
	    	
	    	
	    	$this->AddColumn('idVenue','idVenue');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('closed','closed');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrTeams);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Team/' . $strActionParameter);
	}
	
  	
}
?>