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
* - MDEAssetEditPanelBase extends MJaxPanel
*/
class MDEAssetEditPanelBase extends MJaxPanel {
    protected $objMDEAsset = null;
    public $intIdAsset = null;
    public $txtS3Loc = null;
    public $txtCreDate = null;
    public $txtIdUser = null;
    public $txtIdApp = null;
    public $txtType = null;
    public $txtShortDesc = null;
    public $txtLongDesc = null;
    public $txtNamespace = null;
    public $txtSuccess = null;
    public $txtDelDate = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMDEAsset = null) {
        parent::__construct($objParentControl);
        $this->objMDEAsset = $objMDEAsset;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MDEAssetEditPanelBase.tpl.php';
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
        if (is_null($this->objMDEAsset)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtS3Loc = new MJaxTextBox($this);
        $this->txtS3Loc->Name = 's3Loc';
        $this->txtCreDate = new MJaxTextBox($this);
        $this->txtCreDate->Name = 'creDate';
        $this->txtIdUser = new MJaxTextBox($this);
        $this->txtIdUser->Name = 'idUser';
        $this->txtIdApp = new MJaxTextBox($this);
        $this->txtIdApp->Name = 'idApp';
        $this->txtType = new MJaxTextBox($this);
        $this->txtType->Name = 'type';
        $this->txtShortDesc = new MJaxTextBox($this);
        $this->txtShortDesc->Name = 'shortDesc';
        $this->txtLongDesc = new MJaxTextBox($this);
        $this->txtLongDesc->Name = 'longDesc';
        $this->txtNamespace = new MJaxTextBox($this);
        $this->txtNamespace->Name = 'namespace';
        $this->txtSuccess = new MJaxTextBox($this);
        $this->txtSuccess->Name = 'success';
        $this->txtDelDate = new MJaxTextBox($this);
        $this->txtDelDate->Name = 'delDate';
        if (!is_null($this->objMDEAsset)) {
            $this->intIdAsset = $this->objMDEAsset->idAsset;
            $this->txtS3Loc->Text = $this->objMDEAsset->s3Loc;
            $this->txtCreDate->Text = $this->objMDEAsset->creDate;
            $this->txtIdUser->Text = $this->objMDEAsset->idUser;
            $this->txtIdApp->Text = $this->objMDEAsset->idApp;
            $this->txtType->Text = $this->objMDEAsset->type;
            $this->txtShortDesc->Text = $this->objMDEAsset->shortDesc;
            $this->txtLongDesc->Text = $this->objMDEAsset->longDesc;
            $this->txtNamespace->Text = $this->objMDEAsset->namespace;
            $this->txtSuccess->Text = $this->objMDEAsset->success;
            $this->txtDelDate->Text = $this->objMDEAsset->delDate;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objMDEAsset->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objMDEAsset)) {
            //Create a new one
            $this->objMDEAsset = new MDEAsset();
        }
        $this->objMDEAsset->s3Loc = $this->txtS3Loc->Text;
        $this->objMDEAsset->creDate = $this->txtCreDate->Text;
        $this->objMDEAsset->idUser = $this->txtIdUser->Text;
        $this->objMDEAsset->idApp = $this->txtIdApp->Text;
        $this->objMDEAsset->type = $this->txtType->Text;
        $this->objMDEAsset->shortDesc = $this->txtShortDesc->Text;
        $this->objMDEAsset->longDesc = $this->txtLongDesc->Text;
        $this->objMDEAsset->namespace = $this->txtNamespace->Text;
        $this->objMDEAsset->success = $this->txtSuccess->Text;
        $this->objMDEAsset->delDate = $this->txtDelDate->Text;
        $this->objMDEAsset->Save();
    }
    public function btnDelete_click() {
        $this->objMDEAsset->Delete();
    }
    public function IsNew() {
        return is_null($this->objMDEAsset);
    }
}
?>