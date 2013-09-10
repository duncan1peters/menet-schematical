<?php
class CheckinTypeEditPanelBase extends MJaxPanel{
	protected $objCheckinType = null;
    
    	
    	public $intIdCheckinType = null;
   		
    	
	
    	
    	
    	public $txtShortDesc = null;
   		
	
	
	
  		public $lnkViewChildCheckin = null;
  	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objCheckinType = null){
		parent::__construct($objParentControl);
		$this->objCheckinType = $objCheckinType;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/CheckinTypeEditPanelBase.tpl.php';
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
		if(is_null($this->objCheckinType)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtShortDesc = new MJaxTextBox($this);
	  		$this->txtShortDesc->Name = 'shortDesc';
  		
	  
	  if(!is_null($this->objCheckinType)){
	     
	  	
  		
  			$this->intIdCheckinType = $this->objCheckinType->idCheckinType;
  		
  		
	     
	  		  		
	  		$this->txtShortDesc->Text = $this->objCheckinType->shortDesc;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
	 // if(!is_null($this->objCheckinType->i)){
	   
  		
		$this->lnkViewChildCheckin = new MJaxLinkButton($this);
		$this->lnkViewChildCheckin->Text = 'View Checkins';
		$this->lnkViewChildCheckin->Href = __ENTITY_MODEL_DIR__ . '/CheckinType/' . $this->objCheckinType->idCheckinType . '/Checkins';  
	
	  
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objCheckinType)){
			//Create a new one
			$this->objCheckinType = new CheckinType();
		}

  		  
  		
		  
  		 
      	$this->objCheckinType->shortDesc = $this->txtShortDesc->Text;
		
		
		$this->objCheckinType->Save();
  	}
  	public function btnDelete_click(){
  		$this->objCheckinType->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objCheckinType);
  	}
  	
}
?>