<?php
/**
* Class and Function List:
* Function list:
* - Form_Create()
* - CreateControls()
* - lnkBuildNow_click()
* - lnkLaunchNow_click()
* - lnkScaleNow_click()
* Classes list:
* - SignupBase extends MDEForm
*/
class SignupBase extends MDEForm {
    protected $lnkBuildNow = null;
    protected $lnkLaunchNow = null;
    protected $lnkScaleNow = null;

    public function Form_Create() {
        parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/' . $this->AsssetMode . '/Signup.tpl.php';
        $this->CreateControls();
    }
    public function CreateControls() {
        $this->lnkBuildNow = new MJaxLinkButton($this, 'lnkBuildNow', array(
            "class" => "btn btn-primary btn-large",
            "href" => "#",
            "id" => "c0"
        ));
        $this->lnkBuildNow->Name = 'c0';
        $this->lnkBuildNow->AddCssClass('btn btn-primary btn-large');
        $this->lnkBuildNow->Text = 'Build Now!';
        $this->lnkBuildNow->AddAction($this, 'lnkBuildNow_click');
        $this->lnkLaunchNow = new MJaxLinkButton($this, 'lnkLaunchNow', array(
            "class" => "btn btn-primary btn-large",
            "href" => "#",
            "id" => "c1"
        ));
        $this->lnkLaunchNow->Name = 'c1';
        $this->lnkLaunchNow->AddCssClass('btn btn-primary btn-large');
        $this->lnkLaunchNow->Text = 'Launch Now!';
        $this->lnkLaunchNow->AddAction($this, 'lnkLaunchNow_click');
        $this->lnkScaleNow = new MJaxLinkButton($this, 'lnkScaleNow', array(
            "class" => "btn btn-primary btn-large",
            "href" => "#",
            "id" => "c2"
        ));
        $this->lnkScaleNow->Name = 'c2';
        $this->lnkScaleNow->AddCssClass('btn btn-primary btn-large');
        $this->lnkScaleNow->Text = 'Scale Now!';
        $this->lnkScaleNow->AddAction($this, 'lnkScaleNow_click');
    }
    public function lnkBuildNow_click($strFormId, $strControlId, $mixActionParam) {
    }
    public function lnkLaunchNow_click($strFormId, $strControlId, $mixActionParam) {
    }
    public function lnkScaleNow_click($strFormId, $strControlId, $mixActionParam) {
    }
}
?>