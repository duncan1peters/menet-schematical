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
* - MLCNotificationEditPanelBase extends MJaxPanel
*/
class MLCNotificationEditPanelBase extends MJaxPanel {
    protected $objMLCNotification = null;
    public $intIdNotification = null;
    public $txtIdUser = null;
    public $txtCreDate = null;
    public $txtClassName = null;
    public $txtData = null;
    public $txtViewed = null;
    public $lnkViewParentMLCNotification = null;
    //Regular controls
    public $btnSave = null;
    public $btnDelete = null;
    public function __construct($objParentControl, $objMLCNotification = null) {
        parent::__construct($objParentControl);
        $this->objMLCNotification = $objMLCNotification;
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/ctl_panels/MLCNotificationEditPanelBase.tpl.php';
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
        if (is_null($this->objMLCNotification)) {
            $this->btnDelete->Style->Display = 'none';
        }
    }
    public function CreateFieldControls() {
        $this->txtIdUser = new MJaxTextBox($this);
        $this->txtIdUser->Name = 'idUser';
        $this->txtCreDate = new MJaxTextBox($this);
        $this->txtCreDate->Name = 'creDate';
        $this->txtClassName = new MJaxTextBox($this);
        $this->txtClassName->Name = 'className';
        $this->txtData = new MJaxTextBox($this);
        $this->txtData->Name = 'data';
        $this->txtViewed = new MJaxTextBox($this);
        $this->txtViewed->Name = 'viewed';
        if (!is_null($this->objMLCNotification)) {
            $this->intIdNotification = $this->objMLCNotification->idNotification;
            $this->txtIdUser->Text = $this->objMLCNotification->idUser;
            $this->txtCreDate->Text = $this->objMLCNotification->creDate;
            $this->txtClassName->Text = $this->objMLCNotification->className;
            $this->txtData->Text = $this->objMLCNotification->data;
            $this->txtViewed->Text = $this->objMLCNotification->viewed;
        }
    }
    public function CreateReferenceControls() {
        if (!is_null($this->objMLCNotification->idUser)) {
            $this->lnkViewParentMLCNotification = new MJaxLinkButton($this);
            $this->lnkViewParentMLCNotification->Text = 'View AuthUser';
            $this->lnkViewParentMLCNotification->Href = __ENTITY_MODEL_DIR__ . '/AuthUser/' . $this->objMLCNotification->idUser;
        }
        // if(!is_null($this->objMLCNotification->i)){
        // }
        
    }
    public function btnSave_click() {
        if (is_null($this->objMLCNotification)) {
            //Create a new one
            $this->objMLCNotification = new MLCNotification();
        }
        $this->objMLCNotification->idUser = $this->txtIdUser->Text;
        $this->objMLCNotification->creDate = $this->txtCreDate->Text;
        $this->objMLCNotification->className = $this->txtClassName->Text;
        $this->objMLCNotification->data = $this->txtData->Text;
        $this->objMLCNotification->viewed = $this->txtViewed->Text;
        $this->objMLCNotification->Save();
    }
    public function btnDelete_click() {
        $this->objMLCNotification->Delete();
    }
    public function IsNew() {
        return is_null($this->objMLCNotification);
    }
}
?>