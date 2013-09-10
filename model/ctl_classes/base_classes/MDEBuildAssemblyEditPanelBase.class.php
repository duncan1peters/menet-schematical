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
* - MDEBuildAssemblyEditPanelBase extends MJaxPanel
*/
class MDEBuildAssemblyEditPanelBase extends MJaxPanel {
    protected $objMDEBuildAssembly = null;
    public $intIdBuildAssembly = null;
    public $txtShortDesc = null;
    public $txtIdAccount = null;
    public $txtLongDesc = null;
    public $txtCreDate = null;
    public $txtIdAsset = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMDEBuildAssembly = null) {
        parent::__construct($objParentControl);
        $this->objMDEBuildAssembly = $objMDEBuildAssembly;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MDEBuildAssemblyEditPanelBase.tpl.php';
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
        if (is_null($this->objMDEBuildAssembly)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtShortDesc = new MJaxTextBox($this);
        $this->txtShortDesc->Name = 'shortDesc';
        $this->txtIdAccount = new MJaxTextBox($this);
        $this->txtIdAccount->Name = 'idAccount';
        $this->txtLongDesc = new MJaxTextBox($this);
        $this->txtLongDesc->Name = 'longDesc';
        $this->txtCreDate = new MJaxTextBox($this);
        $this->txtCreDate->Name = 'creDate';
        $this->txtIdAsset = new MJaxTextBox($this);
        $this->txtIdAsset->Name = 'idAsset';
        if (!is_null($this->objMDEBuildAssembly)) {
            $this->intIdBuildAssembly = $this->objMDEBuildAssembly->idBuildAssembly;
            $this->txtShortDesc->Text = $this->objMDEBuildAssembly->shortDesc;
            $this->txtIdAccount->Text = $this->objMDEBuildAssembly->idAccount;
            $this->txtLongDesc->Text = $this->objMDEBuildAssembly->longDesc;
            $this->txtCreDate->Text = $this->objMDEBuildAssembly->creDate;
            $this->txtIdAsset->Text = $this->objMDEBuildAssembly->idAsset;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objMDEBuildAssembly->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objMDEBuildAssembly)) {
            //Create a new one
            $this->objMDEBuildAssembly = new MDEBuildAssembly();
        }
        $this->objMDEBuildAssembly->shortDesc = $this->txtShortDesc->Text;
        $this->objMDEBuildAssembly->idAccount = $this->txtIdAccount->Text;
        $this->objMDEBuildAssembly->longDesc = $this->txtLongDesc->Text;
        $this->objMDEBuildAssembly->creDate = $this->txtCreDate->Text;
        $this->objMDEBuildAssembly->idAsset = $this->txtIdAsset->Text;
        $this->objMDEBuildAssembly->Save();
    }
    public function btnDelete_click() {
        $this->objMDEBuildAssembly->Delete();
    }
    public function IsNew() {
        return is_null($this->objMDEBuildAssembly);
    }
}
?>