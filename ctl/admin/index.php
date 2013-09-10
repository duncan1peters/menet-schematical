<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - Admin extends AdminBase
*/
require_once ('_config.inc.php');
MLCApplication::InitPackage('MLCAws');
class Admin extends MDEForm {
	
	protected $tblEnv = null;
	protected $lnkBoot = null;
	protected $pnlEdit = null;
    public function Form_Create(){
	    parent::Form_Create();
		
		$this->CreateControls();
	
    }
    public function CreateControls(){    
		$arrInstances = AWSInstance::LoadAll();
		$this->tblEnv = new MJaxEc2InstanceList($this, $arrInstances);		
		$this->lnkBoot = new MJaxLinkButton($this, 'lnkBoot');
		$this->lnkBoot->AddCssClass('btn');
		$this->lnkBoot->Text = 'Boot new Instance';
		$this->lnkBoot->AddClickEvent();
		
    }
	public function lnkBoot_click(){
		if(is_null($this->pnlEdit)){
			$this->pnlEdit = new MJaxEc2InstanceEditPanel($this);
		}
		$this->Alert($this->pnlEdit);
	}
}
Admin::Run('Admin');
?>