<?php
class TeamEditPanelBase extends MJaxPanel{
	protected $objTeam = null;
    
    	
    	public $intIdTeam = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtTeamName = null;
   		
	
    	
    	
    	public $txtIdVenue = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtClosed = null;
   		
	
	
   		public $lnkViewParentTeam = null;
	
	
  		public $lnkViewChildTeamMember = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objTeam = null){
		parent::__construct($objParentControl);
		$this->objTeam = $objTeam;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/TeamEditPanelBase.tpl.php';
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
		if(is_null($this->objTeam)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtTeamName = new MJaxTextBox($this);
	  		$this->txtTeamName->Name = 'teamName';
  		
	     
	  	
	  		$this->txtIdVenue = new MJaxTextBox($this);
	  		$this->txtIdVenue->Name = 'idVenue';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtClosed = new MJaxTextBox($this);
	  		$this->txtClosed->Name = 'closed';
  		
	  
	  if(!is_null($this->objTeam)){
	     
	  	
  		
  			$this->intIdTeam = $this->objTeam->idTeam;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objTeam->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtTeamName->Text = $this->objTeam->teamName;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdVenue->Text = $this->objTeam->idVenue;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objTeam->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtClosed->Text = $this->objTeam->closed;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objTeam->idUser)){
   			$this->lnkViewParentTeam = new MJaxLinkButton($this);
   			$this->lnkViewParentTeam->Text = 'View User';
   			$this->lnkViewParentTeam->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objTeam->idUser;  
   		}
	  
	 // if(!is_null($this->objTeam->i)){
	   
  		
		$this->lnkViewChildTeamMember = new MJaxLinkButton($this);
		$this->lnkViewChildTeamMember->Text = 'View TeamMembers';
		$this->lnkViewChildTeamMember->Href = __ENTITY_MODEL_DIR__ . '/Team/' . $this->objTeam->idTeam . '/TeamMembers';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objTeam)){
			//Create a new one
			$this->objTeam = new Team();
		}

  		  
  		
		  
  		 
      	$this->objTeam->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objTeam->teamName = $this->txtTeamName->Text;
		
		  
  		 
      	$this->objTeam->idVenue = $this->txtIdVenue->Text;
		
		  
  		 
      	$this->objTeam->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objTeam->closed = $this->txtClosed->Text;
		
		
		$this->objTeam->Save();
  	}
  	public function btnDelete_click(){
  		$this->objTeam->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objTeam);
  	}
  	
}
?>