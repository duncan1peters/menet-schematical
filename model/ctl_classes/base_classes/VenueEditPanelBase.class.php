<?php
class VenueEditPanelBase extends MJaxPanel{
	protected $objVenue = null;
    
    	
    	public $intIdVenue = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
    	
    	
    	public $txtFoursquareId = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
	
   		public $lnkViewParentVenue = null;
	
	
  		public $lnkViewChildCheckin = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objVenue = null){
		parent::__construct($objParentControl);
		$this->objVenue = $objVenue;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/VenueEditPanelBase.tpl.php';
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
		if(is_null($this->objVenue)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	     
	  	
	  		$this->txtFoursquareId = new MJaxTextBox($this);
	  		$this->txtFoursquareId->Name = 'foursquareId';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	  
	  if(!is_null($this->objVenue)){
	     
	  	
  		
  			$this->intIdVenue = $this->objVenue->idVenue;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objVenue->shortDesc;
  		
  		
  		
	     
	  		  		
	  		$this->txtFoursquareId->Text = $this->objVenue->foursquareId;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objVenue->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objVenue->idUser;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objVenue->idUser)){
   			$this->lnkViewParentVenue = new MJaxLinkButton($this);
   			$this->lnkViewParentVenue->Text = 'View User';
   			$this->lnkViewParentVenue->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objVenue->idUser;  
   		}
	  
	 // if(!is_null($this->objVenue->i)){
	   
  		
		$this->lnkViewChildCheckin = new MJaxLinkButton($this);
		$this->lnkViewChildCheckin->Text = 'View Checkins';
		$this->lnkViewChildCheckin->Href = __ENTITY_MODEL_DIR__ . '/Venue/' . $this->objVenue->idVenue . '/Checkins';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objVenue)){
			//Create a new one
			$this->objVenue = new Venue();
		}

  		  
  		
		  
  		 
      	$this->objVenue->shortDesc = $this->txtShortDesc->Text;
		
		  
  		 
      	$this->objVenue->foursquareId = $this->txtFoursquareId->Text;
		
		  
  		 
      	$this->objVenue->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objVenue->idUser = $this->txtIdUser->Text;
		
		
		$this->objVenue->Save();
  	}
  	public function btnDelete_click(){
  		$this->objVenue->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objVenue);
  	}
  	
}
?>