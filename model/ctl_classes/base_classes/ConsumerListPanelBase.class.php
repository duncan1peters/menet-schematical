<?php
class ConsumerListPanelBase extends MJaxTable{
	public function __construct($objParentControl, $arrConsumers = array()){
		
		
	    	
	    	$this->AddColumn('idConsumer','idConsumer');
	   		
	    	
		
	    	
	    	
	    	$this->AddColumn('foursquareId','foursquareId');
	   		
		
	    	
	    	
	    	$this->AddColumn('creDate','creDate');
	   		
		
	    	
	    	
	    	$this->AddColumn('idUser','idUser');
	   		
		
		
		parent::__construct($objParentControl);
		$this->SetDataEntites($arrConsumers);
		foreach($this->Rows as $intIndex => $objRow){
			
			$objRow->AddAction($this, 'objRow_click');
		}
		
		
	}
	public function objRow_click($strFomrId, $strControlId, $strActionParameter){

		$this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/Consumer/' . $strActionParameter);
	}
	
  	
}
?>