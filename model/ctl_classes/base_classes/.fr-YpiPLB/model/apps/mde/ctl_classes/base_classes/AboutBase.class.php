<?php
/**
* Class and Function List:
* Function list:
* - Form_Create()
* - CreateControls()
* Classes list:
* - AboutBase extends MDEForm
*/
class AboutBase extends MDEForm {
    protected $C0 = null;
    protected $C1 = null;
    protected $C2 = null;
    protected $C3 = null;
    protected $C4 = null;
    protected $C5 = null;
    protected $C6 = null;
    protected $C7 = null;
    protected $C8 = null;
    protected $C9 = null;
    public function Form_Create() {
        parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/' . $this->AsssetMode . '/About.tpl.php';
        $this->CreateControls();
    }
    public function CreateControls() {
    }
}
?>