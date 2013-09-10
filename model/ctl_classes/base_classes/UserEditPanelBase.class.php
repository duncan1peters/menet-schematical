<?php
class UserEditPanelBase extends MJaxPanel{
	protected $objUser = null;
    
    	
    	public $intIdUser = null;
   		
    	
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtFoursquareId = null;
   		
	
    	
    	
    	public $txtUsername = null;
   		
	
    	
    	
    	public $txtFoursquareCode = null;
   		
	
	
	
  		public $lnkViewChildCheckin = null;
  	
  		public $lnkViewChildConsumer = null;
  	
  		public $lnkViewChildTeam = null;
  	
  		public $lnkViewChildTeamMember = null;
  	
  		public $lnkViewChildVenue = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objUser = null){
		parent::__construct($objParentControl);
		$this->objUser = $objUser;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/UserEditPanelBase.tpl.php';
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
		if(is_null($this->objUser)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtFoursquareId = new MJaxTextBox($this);
	  		$this->txtFoursquareId->Name = 'foursquareId';
  		
	     
	  	
	  		$this->txtUsername = new MJaxTextBox($this);
	  		$this->txtUsername->Name = 'username';
  		
	     
	  	
	  		$this->txtFoursquareCode = new MJaxTextBox($this);
	  		$this->txtFoursquareCode->Name = 'foursquareCode';
  		
	  
	  if(!is_null($this->objUser)){
	     
	  	
  		
  			$this->intIdUser = $this->objUser->idUser;
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objUser->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtFoursquareId->Text = $this->objUser->foursquareId;
  		
  		
  		
	     
	  		  		
	  		$this->txtUsername->Text = $this->objUser->username;
  		
  		
  		
	     
	  		  		
	  		$this->txtFoursquareCode->Text = $this->objUser->foursquareCode;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objUser->i)){
	   
  		
		$this->lnkViewChildCheckin = new MJaxLinkButton($this);
		$this->lnkViewChildCheckin->Text = 'View Checkins';
		$this->lnkViewChildCheckin->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objUser->idUser . '/Checkins';  
	
	  
  		
		$this->lnkViewChildConsumer = new MJaxLinkButton($this);
		$this->lnkViewChildConsumer->Text = 'View Consumers';
		$this->lnkViewChildConsumer->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objUser->idConsumer . '/Consumers';  
	
	  
  		
		$this->lnkViewChildTeam = new MJaxLinkButton($this);
		$this->lnkViewChildTeam->Text = 'View Teams';
		$this->lnkViewChildTeam->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objUser->idUser . '/Teams';  
	
	  
  		
		$this->lnkViewChildTeamMember = new MJaxLinkButton($this);
		$this->lnkViewChildTeamMember->Text = 'View TeamMembers';
		$this->lnkViewChildTeamMember->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objUser->idUser . '/TeamMembers';  
	
	  
  		
		$this->lnkViewChildVenue = new MJaxLinkButton($this);
		$this->lnkViewChildVenue->Text = 'View Venues';
		$this->lnkViewChildVenue->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objUser->idUser . '/Venues';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objUser)){
			//Create a new one
			$this->objUser = new User();
		}

  		  
  		
		  
  		 
      	$this->objUser->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objUser->foursquareId = $this->txtFoursquareId->Text;
		
		  
  		 
      	$this->objUser->username = $this->txtUsername->Text;
		
		  
  		 
      	$this->objUser->foursquareCode = $this->txtFoursquareCode->Text;
		
		
		$this->objUser->Save();
  	}
  	public function btnDelete_click(){
  		$this->objUser->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objUser);
  	}
  	
}
?>