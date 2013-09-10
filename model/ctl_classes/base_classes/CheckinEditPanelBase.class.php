<?php
class CheckinEditPanelBase extends MJaxPanel{
	protected $objCheckin = null;
    
    	
    	public $intIdCheckin = null;
   		
    	
	
    	
    	
    	public $txtIdUser = null;
   		
	
    	
    	
    	public $txtIdVenue = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdCheckinType = null;
   		
	
    	
    	
    	public $txtUniqueId = null;
   		
	
    	
    	
    	public $txtData = null;
   		
	
	
   		public $lnkViewParentCheckin = null;
	
   		public $lnkViewParentCheckin = null;
	
   		public $lnkViewParentCheckin = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objCheckin = null){
		parent::__construct($objParentControl);
		$this->objCheckin = $objCheckin;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/CheckinEditPanelBase.tpl.php';
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
		if(is_null($this->objCheckin)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	     
	  	
	  		$this->txtIdVenue = new MJaxTextBox($this);
	  		$this->txtIdVenue->Name = 'idVenue';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdCheckinType = new MJaxTextBox($this);
	  		$this->txtIdCheckinType->Name = 'idCheckinType';
  		
	     
	  	
	  		$this->txtUniqueId = new MJaxTextBox($this);
	  		$this->txtUniqueId->Name = 'uniqueId';
  		
	     
	  	
	  		$this->txtData = new MJaxTextBox($this);
	  		$this->txtData->Name = 'data';
  		
	  
	  if(!is_null($this->objCheckin)){
	     
	  	
  		
  			$this->intIdCheckin = $this->objCheckin->idCheckin;
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objCheckin->idUser;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdVenue->Text = $this->objCheckin->idVenue;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objCheckin->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdCheckinType->Text = $this->objCheckin->idCheckinType;
  		
  		
  		
	     
	  		  		
	  		$this->txtUniqueId->Text = $this->objCheckin->uniqueId;
  		
  		
  		
	     
	  		  		
	  		$this->txtData->Text = $this->objCheckin->data;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objCheckin->idUser)){
   			$this->lnkViewParentCheckin = new MJaxLinkButton($this);
   			$this->lnkViewParentCheckin->Text = 'View User';
   			$this->lnkViewParentCheckin->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objCheckin->idUser;  
   		}
	  
  		if(!is_null($this->objCheckin->idVenue)){
   			$this->lnkViewParentCheckin = new MJaxLinkButton($this);
   			$this->lnkViewParentCheckin->Text = 'View Venue';
   			$this->lnkViewParentCheckin->Href = __ENTITY_MODEL_DIR__ . '/Venue/' . $this->objCheckin->idVenue;  
   		}
	  
  		if(!is_null($this->objCheckin->idCheckinType)){
   			$this->lnkViewParentCheckin = new MJaxLinkButton($this);
   			$this->lnkViewParentCheckin->Text = 'View CheckinType';
   			$this->lnkViewParentCheckin->Href = __ENTITY_MODEL_DIR__ . '/CheckinType/' . $this->objCheckin->idCheckinType;  
   		}
	  
	 // if(!is_null($this->objCheckin->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objCheckin)){
			//Create a new one
			$this->objCheckin = new Checkin();
		}

  		  
  		
		  
  		 
      	$this->objCheckin->idUser = $this->txtIdUser->Text;
		
		  
  		 
      	$this->objCheckin->idVenue = $this->txtIdVenue->Text;
		
		  
  		 
      	$this->objCheckin->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objCheckin->idCheckinType = $this->txtIdCheckinType->Text;
		
		  
  		 
      	$this->objCheckin->uniqueId = $this->txtUniqueId->Text;
		
		  
  		 
      	$this->objCheckin->data = $this->txtData->Text;
		
		
		$this->objCheckin->Save();
  	}
  	public function btnDelete_click(){
  		$this->objCheckin->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objCheckin);
  	}
  	
}
?>