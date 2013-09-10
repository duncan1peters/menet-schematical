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
* - MDEBuildEditPanelBase extends MJaxPanel
*/
class MDEBuildEditPanelBase extends MJaxPanel {
    protected $objMDEBuild = null;
    public $intIdBuild = null;
    public $txtIdApp = null;
    public $txtIdUser = null;
    public $txtCreDate = null;
    public $txtLog = null;
    public $txtIdBuildStatus = null;
    public $txtS3Loc = null;
    public $txtIdAddress = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMDEBuild = null) {
        parent::__construct($objParentControl);
        $this->objMDEBuild = $objMDEBuild;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MDEBuildEditPanelBase.tpl.php';
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
        if (is_null($this->objMDEBuild)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtIdApp = new MJaxTextBox($this);
        $this->txtIdApp->Name = 'idApp';
        $this->txtIdUser = new MJaxTextBox($this);
        $this->txtIdUser->Name = 'idUser';
        $this->txtCreDate = new MJaxTextBox($this);
        $this->txtCreDate->Name = 'creDate';
        $this->txtLog = new MJaxTextBox($this);
        $this->txtLog->Name = 'log';
        $this->txtIdBuildStatus = new MJaxTextBox($this);
        $this->txtIdBuildStatus->Name = 'idBuildStatus';
        $this->txtS3Loc = new MJaxTextBox($this);
        $this->txtS3Loc->Name = 's3Loc';
        $this->txtIdAddress = new MJaxTextBox($this);
        $this->txtIdAddress->Name = 'idAddress';
        if (!is_null($this->objMDEBuild)) {
            $this->intIdBuild = $this->objMDEBuild->idBuild;
            $this->txtIdApp->Text = $this->objMDEBuild->idApp;
            $this->txtIdUser->Text = $this->objMDEBuild->idUser;
            $this->txtCreDate->Text = $this->objMDEBuild->creDate;
            $this->txtLog->Text = $this->objMDEBuild->log;
            $this->txtIdBuildStatus->Text = $this->objMDEBuild->idBuildStatus;
            $this->txtS3Loc->Text = $this->objMDEBuild->s3Loc;
            $this->txtIdAddress->Text = $this->objMDEBuild->idAddress;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objMDEBuild->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objMDEBuild)) {
            //Create a new one
            $this->objMDEBuild = new MDEBuild();
        }
        $this->objMDEBuild->idApp = $this->txtIdApp->Text;
        $this->objMDEBuild->idUser = $this->txtIdUser->Text;
        $this->objMDEBuild->creDate = $this->txtCreDate->Text;
        $this->objMDEBuild->log = $this->txtLog->Text;
        $this->objMDEBuild->idBuildStatus = $this->txtIdBuildStatus->Text;
        $this->objMDEBuild->s3Loc = $this->txtS3Loc->Text;
        $this->objMDEBuild->idAddress = $this->txtIdAddress->Text;
        $this->objMDEBuild->Save();
    }
    public function btnDelete_click() {
        $this->objMDEBuild->Delete();
    }
    public function IsNew() {
        return is_null($this->objMDEBuild);
    }
}
?>