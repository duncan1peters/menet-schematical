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
* - AuthUserSettingEditPanelBase extends MJaxPanel
*/
class AuthUserSettingEditPanelBase extends MJaxPanel {
    protected $objAuthUserSetting = null;
    public $intIdUserSetting = null;
    public $txtIdUser = null;
    public $txtKey = null;
    public $txtData = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objAuthUserSetting = null) {
        parent::__construct($objParentControl);
        $this->objAuthUserSetting = $objAuthUserSetting;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/AuthUserSettingEditPanelBase.tpl.php';
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
        if (is_null($this->objAuthUserSetting)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtIdUser = new MJaxTextBox($this);
        $this->txtIdUser->Name = 'idUser';
        $this->txtKey = new MJaxTextBox($this);
        $this->txtKey->Name = 'key';
        $this->txtData = new MJaxTextBox($this);
        $this->txtData->Name = 'data';
        if (!is_null($this->objAuthUserSetting)) {
            $this->intIdUserSetting = $this->objAuthUserSetting->idUserSetting;
            $this->txtIdUser->Text = $this->objAuthUserSetting->idUser;
            $this->txtKey->Text = $this->objAuthUserSetting->key;
            $this->txtData->Text = $this->objAuthUserSetting->data;
        }
    }
    public function CreateReferenceControls() {
        // if(!is_null($this->objAuthUserSetting->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objAuthUserSetting)) {
            //Create a new one
            $this->objAuthUserSetting = new AuthUserSetting();
        }
        $this->objAuthUserSetting->idUser = $this->txtIdUser->Text;
        $this->objAuthUserSetting->key = $this->txtKey->Text;
        $this->objAuthUserSetting->data = $this->txtData->Text;
        $this->objAuthUserSetting->Save();
    }
    public function btnDelete_click() {
        $this->objAuthUserSetting->Delete();
    }
    public function IsNew() {
        return is_null($this->objAuthUserSetting);
    }
}
?>