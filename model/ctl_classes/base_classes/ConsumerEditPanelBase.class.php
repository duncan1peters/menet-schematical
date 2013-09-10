<?php
class ConsumerEditPanelBase extends MJaxPanel{
	protected $objConsumer = null;
    
    	
    	public $intIdConsumer = null;
   		
    	
	
    	
    	
    	public $txtFoursquareId = null;
   		
	
    	
    	
    	public $txtCreDate = null;
   		
	
    	
    	
    	public $txtIdUser = null;
   		
	
	
   		public $lnkViewParentConsumer = null;
	
	
	//Regular controls
	
	public $btnSave = null;
	public $btnDelete = null;

	public function __construct($objParentControl, $objConsumer = null){
		parent::__construct($objParentControl);
		$this->objConsumer = $objConsumer;
		if($objParentControl->AsssetMode != MJaxAssetMode::MOBILE){
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $objParentControl->AsssetMode . '/ctl_panels/ConsumerEditPanelBase.tpl.php';
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
		if(is_null($this->objConsumer)){
			$this->btnDelete->Style->Display = 'none';
		}
	
	}
	public function CreateFieldControls(){
	     
	  	
	     
	  	
	  		$this->txtFoursquareId = new MJaxTextBox($this);
	  		$this->txtFoursquareId->Name = 'foursquareId';
  		
	     
	  	
	  		$this->txtCreDate = new MJaxTextBox($this);
	  		$this->txtCreDate->Name = 'creDate';
  		
	     
	  	
	  		$this->txtIdUser = new MJaxTextBox($this);
	  		$this->txtIdUser->Name = 'idUser';
  		
	  
	  if(!is_null($this->objConsumer)){
	     
	  	
  		
  			$this->intIdConsumer = $this->objConsumer->idConsumer;
  		
  		
	     
	  		  		
	  		$this->txtFoursquareId->Text = $this->objConsumer->foursquareId;
  		
  		
  		
	     
	  		  		
	  		$this->txtCreDate->Text = $this->objConsumer->creDate;
  		
  		
  		
	     
	  		  		
	  		$this->txtIdUser->Text = $this->objConsumer->idUser;
  		
  		
  		
	  
	  }
	}
	public function CreateReferenceControls(){
	  
  		if(!is_null($this->objConsumer->idConsumer)){
   			$this->lnkViewParentConsumer = new MJaxLinkButton($this);
   			$this->lnkViewParentConsumer->Text = 'View User';
   			$this->lnkViewParentConsumer->Href = __ENTITY_MODEL_DIR__ . '/User/' . $this->objConsumer->idConsumer;  
   		}
	  
	 // if(!is_null($this->objConsumer->i)){
	   
	 // }
	}
	
	public function btnSave_click(){
		if(is_null($this->objConsumer)){
			//Create a new one
			$this->objConsumer = new Consumer();
		}

  		  
  		
		  
  		 
      	$this->objConsumer->foursquareId = $this->txtFoursquareId->Text;
		
		  
  		 
      	$this->objConsumer->creDate = $this->txtCreDate->Text;
		
		  
  		 
      	$this->objConsumer->idUser = $this->txtIdUser->Text;
		
		
		$this->objConsumer->Save();
  	}
  	public function btnDelete_click(){
  		$this->objConsumer->Delete();
  	}
  	public function IsNew(){
  		return is_null($this->objConsumer);
  	}
  	
}
?>