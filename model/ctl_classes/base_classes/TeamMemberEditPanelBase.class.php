<?php
class TeamMemberEditPanelBase extends MJaxPanel{
	protected $objTeamMember = null;
    
    	
    	public $intIdTeamMember = null;
   		
    	
	
    	
    	
    	public $txtIdTeam = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
	
   		public $lnkViewParentTeamMember = null;
	
   		public $lnkViewParentTeamMember = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objTeamMember = null){
		parent::__construct($objParentControl);
		$this->objTeamMember = $objTeamMember;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/TeamMemberEditPanelBase.tpl.php';
		}
		$this->CreateFieldControls();
		$this->CreateContentControls();
		$this->CreateReferenceControls();
		
	}
	public function CreateContentControls(){
		$this->btnSave = new MJaxButton($this);
		$this->btnSave->Text = 'Save';
		$this->btnSave->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnSave_click'));
		
		
		$this->btnDelete = new MJaxButton($this);
		$this->btnDelete->Text = 'Delete';
		$this->btnDelete->AddAction(new MJaxClickEvent(), new MJaxServerControlAction($this, 'btnDelete_click'));
		if(is_null($this->objTeamMember)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdTeam = new MJaxTextBox($this);
	  		$this->txtIdTeam->Name = 'idTeam';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	  
	  if(!is_null($this->objTeamMember)){
	     
	  	
  		
  			$this->intIdTeamMember = $this->objTeamMember->idTeamMember;
  		
  		
	     
	  		  		
	  		$this->txtIdTeam->Text = $this->objTeamMember->idTeam;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objTeamMember->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objTeamMember->creDate;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objTeamMember->idTeam)){
   			$this->lnkViewParentTeamMember = new MJaxLinkButton($this);
   			$this->lnkViewParentTeamMember->Text = 'View Team';
   			$this->lnkViewParentTeamMember->Href = __ENTITY_MODEL_DIR__ . '/Team/' . $this->objTeamMember->idTeam;  
   		}
	  
  		if(!is_null($this->objTeamMember->idUser)){
   			$this->lnkViewParentTeamMember = new MJaxLinkButton($this);
   			$this->lnkViewParentTeamMember->Text = 'View User';
   			$this->lnkViewParentTeamMember->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objTeamMember->idUser;  
   		}
	  
	 // if(!is_null($this->objTeamMember->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objTeamMember)){
			//Create a new one
			$this->objTeamMember = new TeamMember();
		}

  		  
  		
		  
  		 
      	$this->objTeamMember->idTeam = $this->txtIdTeam->Text;
		
		  
  		 
      	$this->objTeamMember->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objTeamMember->creDate = $this->txtCreDate->Text;
		
		
		$this->objTeamMember->Save();
  	}
  	public function btnDelete_click(){
  		$this->objTeamMember->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objTeamMember);
  	}
  	
}
?>