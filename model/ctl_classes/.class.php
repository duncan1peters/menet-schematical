<?php
class  extends MDEForm{
    
    	
    	protected $Test = null;
   		
	
    	
    	protected $Test = null;
   		
	
	
	

	public function Form_Create(){
		parent::Form_Create();
		if($this->AsssetMode != 'mobile'){//Temporary fix
			$this->strTemplate = __VIEW_MAIN_APP_DIR__  . '/' . $this->AsssetMode . '/.tpl.php';
		}
		$this->CreateControls();
		
		
	}
	
	public function CreateControls(){
	   
	    	$this->Test = new ($this, '');
	    	$this->Test->Text = "";
	    	$this->Test->Name = "";
	    	
	   		
	    	
	   
	    	$this->Test = new ($this, '');
	    	$this->Test->Text = "";
	    	$this->Test->Name = "";
	    	
	   		
	    	
	   
	}
	
	
	
  	
	
  	
}
?>