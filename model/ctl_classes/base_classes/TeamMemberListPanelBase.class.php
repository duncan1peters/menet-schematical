<?php
class TeamMemberListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrTeamMembers = array()){
		
		
	    	
	    	$this->AddColumn('idTeamMember','idTeamMember');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('idTeam','idTeam');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrTeamMembers);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/TeamMember/' . $strActionParameter);
	}
	
  	
}
?>