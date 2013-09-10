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
* - MDEPackageEditPanelBase extends MJaxPanel
*/
class MDEPackageEditPanelBase extends MJaxPanel {
    protected $objMDEPackage = null;
    public $intIdPackage = null;
    public $txtIdAsset = null;
    public $txtIdRepoType = null;
    public $txtRepoUrl = null;
    public $txtShortDesc = null;
    public $txtLongDesc = null;
    public $txtNamespace = null;
    public $txtIdAccount = null;
    public $txtIdBuildAssembly = null;
    public $txtAboutUrl = null;
    public $txtIncludeByDefault = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMDEPackage = null) {
        parent::__construct($objParentControl);
        $this->objMDEPackage = $objMDEPackage;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MDEPackageEditPanelBase.tpl.php';
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
        if (is_null($this->objMDEPackage)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtIdAsset = new MJaxTextBox($this);
        $this->txtIdAsset->Name = 'idAsset';
        $this->txtIdRepoType = new MJaxTextBox($this);
        $this->txtIdRepoType->Name = 'idRepoType';
        $this->txtRepoUrl = new MJaxTextBox($this);
        $this->txtRepoUrl->Name = 'repoUrl';
        $this->txtShortDesc = new MJaxTextBox($this);
        $this->txtShortDesc->Name = 'shortDesc';
        $this->txtLongDesc = new MJaxTextBox($this);
        $this->txtLongDesc->Name = 'longDesc';
        $this->txtNamespace = new MJaxTextBox($this);
        $this->txtNamespace->Name = 'namespace';
        $this->txtIdAccount = new MJaxTextBox($this);
        $this->txtIdAccount->Name = 'idAccount';
        $this->txtIdBuildAssembly = new MJaxTextBox($this);
        $this->txtIdBuildAssembly->Name = 'idBuildAssembly';
        $this->txtAboutUrl = new MJaxTextBox($this);
        $this->txtAboutUrl->Name = 'aboutUrl';
        $this->txtIncludeByDefault = new MJaxTextBox($this);
        $this->txtIncludeByDefault->Name = 'includeByDefault';
        if (!is_null($this->objMDEPackage)) {
            $this->intIdPackage = $this->objMDEPackage->idPackage;
            $this->txtIdAsset->Text = $this->objMDEPackage->idAsset;
            $this->txtIdRepoType->Text = $this->objMDEPackage->idRepoType;
            $this->txtRepoUrl->Text = $this->objMDEPackage->repoUrl;
            $this->txtShortDesc->Text = $this->objMDEPackage->shortDesc;
            $this->txtLongDesc->Text = $this->objMDEPackage->longDesc;
            $this->txtNamespace->Text = $this->objMDEPackage->namespace;
            $this->txtIdAccount->Text = $this->objMDEPackage->idAccount;
            $this->txtIdBuildAssembly->Text = $this->objMDEPackage->idBuildAssembly;
            $this->txtAboutUrl->Text = $this->objMDEPackage->aboutUrl;
            $this->txtIncludeByDefault->Text = $this->objMDEPackage->includeByDefault;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objMDEPackage->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objMDEPackage)) {
            //Create a new one
            $this->objMDEPackage = new MDEPackage();
        }
        $this->objMDEPackage->idAsset = $this->txtIdAsset->Text;
        $this->objMDEPackage->idRepoType = $this->txtIdRepoType->Text;
        $this->objMDEPackage->repoUrl = $this->txtRepoUrl->Text;
        $this->objMDEPackage->shortDesc = $this->txtShortDesc->Text;
        $this->objMDEPackage->longDesc = $this->txtLongDesc->Text;
        $this->objMDEPackage->namespace = $this->txtNamespace->Text;
        $this->objMDEPackage->idAccount = $this->txtIdAccount->Text;
        $this->objMDEPackage->idBuildAssembly = $this->txtIdBuildAssembly->Text;
        $this->objMDEPackage->aboutUrl = $this->txtAboutUrl->Text;
        $this->objMDEPackage->includeByDefault = $this->txtIncludeByDefault->Text;
        $this->objMDEPackage->Save();
    }
    public function btnDelete_click() {
        $this->objMDEPackage->Delete();
    }
    public function IsNew() {
        return is_null($this->objMDEPackage);
    }
}
?>