<?php
/**
* Class and Function List:
* Function list:
* - Form_Create()
* - CreateControls()
* - lnkC0_click()
* - btnSubmit_click()
* - uplFileJetstrap_upload()
* - uplFileDB_upload()
* - lnkGenerate_click()
* Classes list:
* - HomeBase extends MDEForm
*/
class HomeBase extends MDEForm {
    protected $lnkC0 = null;
    protected $txtEmail = null;
    protected $txtPass = null;
    protected $btnSubmit = null;
    protected $uplFileJetstrap = null;
    protected $uplFileDB = null;
    protected $lnkGenerate = null;
    protected $C1 = null;
    protected $C2 = null;
    protected $C3 = null;
    protected $C4 = null;
    protected $C5 = null;
    protected $C6 = null;
    protected $C7 = null;
    protected $C8 = null;
    protected $C9 = null;
    protected $C10 = null;
    public function Form_Create() {
        parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/' . $this->AsssetMode . '/Home.tpl.php';
        $this->CreateControls();
    }
    public function CreateControls() {
        $this->lnkC0 = new MJaxLinkButton($this, 'lnkC0', array(
            "class" => "btn btn-navbar",
            "data-toggle" => "collapse",
            "data-target" => ".nav-collapse",
            "id" => "c0"
        ));
        $this->lnkC0->Name = 'c0';
        $this->lnkC0->AddCssClass('btn btn-navbar');
        $this->lnkC0->Text = '<span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>';
        $this->lnkC0->AddAction($this, 'lnkC0_click');
        $this->txtEmail = new MJaxTextBox($this, 'txtEmail', array(
            "id" => "email",
            "name" => "email",
            "type" => "email",
            "placeholder" => "Email",
            "class" => "span2"
        ));
        $this->txtEmail->Name = 'email';
        $this->txtEmail->AddCssClass('span2');
        $this->txtPass = new MJaxTextBox($this, 'txtPass', array(
            "id" => "pass",
            "name" => "pass2",
            "type" => "password",
            "placeholder" => "Password",
            "class" => "span2"
        ));
        $this->txtPass->Name = 'pass';
        $this->txtPass->AddCssClass('span2');
        $this->btnSubmit = new MJaxButton($this, 'btnSubmit', array(
            "id" => "submit",
            "class" => "btn"
        ));
        $this->btnSubmit->Name = 'submit';
        $this->btnSubmit->AddCssClass('btn');
        $this->btnSubmit->AddAction($this, 'btnSubmit_click');
        $this->uplFileJetstrap = new MJaxUploadBox($this, 'uplFileJetstrap', array(
            "id" => "fileJetstrap",
            "name" => "fileJetstrap",
            "type" => "file"
        ));
        $this->uplFileJetstrap->Name = 'fileJetstrap';
        $this->uplFileJetstrap->AddAction(new MJaxUploadEvent() , new MJaxServerControlAction($this, 'uplFileJetstrap_upload'));
        $this->uplFileDB = new MJaxUploadBox($this, 'uplFileDB', array(
            "id" => "fileDB",
            "name" => "fileDB",
            "type" => "file"
        ));
        $this->uplFileDB->Name = 'fileDB';
        $this->uplFileDB->AddAction(new MJaxUploadEvent() , new MJaxServerControlAction($this, 'uplFileDB_upload'));
        $this->lnkGenerate = new MJaxLinkButton($this, 'lnkGenerate', array(
            "id" => "generate",
            "class" => "btn",
            "href" => "#"
        ));
        $this->lnkGenerate->Name = 'generate';
        $this->lnkGenerate->AddCssClass('btn');
        $this->lnkGenerate->Text = 'Generate';
        $this->lnkGenerate->AddAction($this, 'lnkGenerate_click');
    }
    public function lnkC0_click($strFormId, $strControlId, $mixActionParam) {
    }
    public function btnSubmit_click($strFormId, $strControlId, $mixActionParam) {
    }
    public function uplFileJetstrap_upload($strFormId, $strControlId, $mixActionParam) {
    }
    public function uplFileDB_upload($strFormId, $strControlId, $mixActionParam) {
    }
    public function lnkGenerate_click($strFormId, $strControlId, $mixActionParam) {
    }
}
?>