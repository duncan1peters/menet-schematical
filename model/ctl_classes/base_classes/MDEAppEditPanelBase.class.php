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
* - MDEAppEditPanelBase extends MJaxPanel
*/
class MDEAppEditPanelBase extends MJaxPanel {
    protected $objMDEApp = null;
    public $intIdApp = null;
    public $txtNamespace = null;
    public $txtIdAccount = null;
    public $txtShortDesc = null;
    public $txtCreDate = null;
    public $txtRepoUrl = null;
    public $txtIdRepoType = null;
    public $txtBuildHook = null;
    public $txtDomain = null;
    public $txtPrefix = null;
    public $txtDocroot = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMDEApp = null) {
        parent::__construct($objParentControl);
        $this->objMDEApp = $objMDEApp;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MDEAppEditPanelBase.tpl.php';
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
        if (is_null($this->objMDEApp)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtNamespace = new MJaxTextBox($this);
        $this->txtNamespace->Name = 'namespace';
        $this->txtIdAccount = new MJaxTextBox($this);
        $this->txtIdAccount->Name = 'idAccount';
        $this->txtShortDesc = new MJaxTextBox($this);
        $this->txtShortDesc->Name = 'shortDesc';
        $this->txtCreDate = new MJaxTextBox($this);
        $this->txtCreDate->Name = 'creDate';
        $this->txtRepoUrl = new MJaxTextBox($this);
        $this->txtRepoUrl->Name = 'repoUrl';
        $this->txtIdRepoType = new MJaxTextBox($this);
        $this->txtIdRepoType->Name = 'idRepoType';
        $this->txtBuildHook = new MJaxTextBox($this);
        $this->txtBuildHook->Name = 'buildHook';
        $this->txtDomain = new MJaxTextBox($this);
        $this->txtDomain->Name = 'domain';
        $this->txtPrefix = new MJaxTextBox($this);
        $this->txtPrefix->Name = 'prefix';
        $this->txtDocroot = new MJaxTextBox($this);
        $this->txtDocroot->Name = 'docroot';
        if (!is_null($this->objMDEApp)) {
            $this->intIdApp = $this->objMDEApp->idApp;
            $this->txtNamespace->Text = $this->objMDEApp->namespace;
            $this->txtIdAccount->Text = $this->objMDEApp->idAccount;
            $this->txtShortDesc->Text = $this->objMDEApp->shortDesc;
            $this->txtCreDate->Text = $this->objMDEApp->creDate;
            $this->txtRepoUrl->Text = $this->objMDEApp->repoUrl;
            $this->txtIdRepoType->Text = $this->objMDEApp->idRepoType;
            $this->txtBuildHook->Text = $this->objMDEApp->buildHook;
            $this->txtDomain->Text = $this->objMDEApp->domain;
            $this->txtPrefix->Text = $this->objMDEApp->prefix;
            $this->txtDocroot->Text = $this->objMDEApp->docroot;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objMDEApp->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objMDEApp)) {
            //Create a new one
            $this->objMDEApp = new MDEApp();
        }
        $this->objMDEApp->namespace = $this->txtNamespace->Text;
        $this->objMDEApp->idAccount = $this->txtIdAccount->Text;
        $this->objMDEApp->shortDesc = $this->txtShortDesc->Text;
        $this->objMDEApp->creDate = $this->txtCreDate->Text;
        $this->objMDEApp->repoUrl = $this->txtRepoUrl->Text;
        $this->objMDEApp->idRepoType = $this->txtIdRepoType->Text;
        $this->objMDEApp->buildHook = $this->txtBuildHook->Text;
        $this->objMDEApp->domain = $this->txtDomain->Text;
        $this->objMDEApp->prefix = $this->txtPrefix->Text;
        $this->objMDEApp->docroot = $this->txtDocroot->Text;
        $this->objMDEApp->Save();
    }
    public function btnDelete_click() {
        $this->objMDEApp->Delete();
    }
    public function IsNew() {
        return is_null($this->objMDEApp);
    }
}
?>