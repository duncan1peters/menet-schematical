<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - CreateContentControls()
* - CreateFieldControls()
* - CreateReferenceControls()
* - btnSave_click()
* - btnDelete_click()
* - IsNew()
* Classes list:
* - AWSInstanceEditPanelBase extends MJaxPanel
*/
class AWSInstanceEditPanelBase extends MJaxPanel {
    protected $objAWSInstance = null;
    public $intIdInstance = null;
    public $txtAwsId = null;
    public $txtNamespace = null;
    public $txtDns = null;
    public $txtCreDate = null;
    public $txtIdAccount = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objAWSInstance = null) {
        parent::__construct($objParentControl);
        $this->objAWSInstance = $objAWSInstance;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/AWSInstanceEditPanelBase.tpl.php';
        $this->CreateFieldControls();
        $this->CreateContentControls();
        $this->CreateReferenceControls();
    }
    public function CreateContentControls() {
        $this->btnSave = new MJaxButton($this);
        $this->btnSave->Text = 'Save';
        $this->btnSave->AddAction(new MJaxClickEvent() , new MJaxServerControlAction($this, 'btnSave_click'));
        $this->btnDelete = new MJaxButton($this);
        $this->btnDelete->Text = 'Delete';
        $this->btnDelete->AddAction(new MJaxClickEvent() , new MJaxServerControlAction($this, 'btnDelete_click'));
        if (is_null($this->objAWSInstance)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtAwsId = new MJaxTextBox($this);
        $this->txtAwsId->Name = 'awsId';
        $this->txtNamespace = new MJaxTextBox($this);
        $this->txtNamespace->Name = 'namespace';
        $this->txtDns = new MJaxTextBox($this);
        $this->txtDns->Name = 'dns';
        $this->txtCreDate = new MJaxTextBox($this);
        $this->txtCreDate->Name = 'creDate';
        $this->txtIdAccount = new MJaxTextBox($this);
        $this->txtIdAccount->Name = 'idAccount';
        if (!is_null($this->objAWSInstance)) {
            $this->intIdInstance = $this->objAWSInstance->idInstance;
            $this->txtAwsId->Text = $this->objAWSInstance->awsId;
            $this->txtNamespace->Text = $this->objAWSInstance->namespace;
            $this->txtDns->Text = $this->objAWSInstance->dns;
            $this->txtCreDate->Text = $this->objAWSInstance->creDate;
            $this->txtIdAccount->Text = $this->objAWSInstance->idAccount;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objAWSInstance->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objAWSInstance)) {
            //Create a new one
            $this->objAWSInstance = new AWSInstance();
        }
        $this->objAWSInstance->awsId = $this->txtAwsId->Text;
        $this->objAWSInstance->namespace = $this->txtNamespace->Text;
        $this->objAWSInstance->dns = $this->txtDns->Text;
        $this->objAWSInstance->creDate = $this->txtCreDate->Text;
        $this->objAWSInstance->idAccount = $this->txtIdAccount->Text;
        $this->objAWSInstance->Save();
    }
    public function btnDelete_click() {
        $this->objAWSInstance->Delete();
    }
    public function IsNew() {
        return is_null($this->objAWSInstance);
    }
}
?>