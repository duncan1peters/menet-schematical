<?php
/**
* Class and Function List:
* Function list:
* - Form_Create()
* - CreateControls()
* - lnkC0_click()
* - lnkAdd_click()
* - lnkSubtract_click()
* - lnkMultiply_click()
* - lnkDivision_click()
* Classes list:
* - Calculator extends MDEForm
*/
class Calculator extends MDEForm {
    protected $lnkC0 = null;
    protected $txtNum1 = null;
    protected $txtNum2 = null;
    protected $lnkAdd = null;
    protected $lnkSubtract = null;
    protected $lnkMultiply = null;
    protected $lnkDivision = null;
    protected $txtResult = null;
    public function Form_Create() {
        parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/' . $this->AsssetMode . '/Calculator.tpl.php';
        $this->CreateControls();
		$this->blnForceRenderFormState = false;
		$this->blnSkipMainWindowRender = true;
    }
    public function CreateControls() {
        $this->lnkC0 = new MJaxLinkButton($this, 'lnkC0', array(
            "class" => "brand",
            "href" => "#",
            "id" => "c0"
        ));
        $this->lnkC0->Name = 'c0';
        $this->lnkC0->AddCssClass('brand');
        $this->lnkC0->Text = 'Project name';
        $this->lnkC0->AddAction($this, 'lnkC0_click');
        $this->txtNum1 = new MJaxTextBox($this, 'txtNum1', array(
            "id" => "num1",
            "name" => "num1",
            "type" => "",
            "placeholder" => "First Number"
        ));
        $this->txtNum1->Name = 'num1';
        $this->txtNum2 = new MJaxTextBox($this, 'txtNum2', array(
            "id" => "num2",
            "name" => "num2",
            "type" => "",
            "placeholder" => "Second Number"
        ));
        $this->txtNum2->Name = 'num2';
        $this->lnkAdd = new MJaxLinkButton($this, 'lnkAdd', array(
            "id" => "add",
            "class" => "btn",
            "href" => "#"
        ));
        $this->lnkAdd->Name = 'add';
        $this->lnkAdd->AddCssClass('btn');
        $this->lnkAdd->Text = '+';
        $this->lnkAdd->AddAction($this, 'lnkAdd_click');
        $this->lnkSubtract = new MJaxLinkButton($this, 'lnkSubtract', array(
            "id" => "subtract",
            "class" => "btn",
            "href" => "#"
        ));
        $this->lnkSubtract->Name = 'subtract';
        $this->lnkSubtract->AddCssClass('btn');
        $this->lnkSubtract->Text = '-';
        $this->lnkSubtract->AddAction($this, 'lnkSubtract_click');
        $this->lnkMultiply = new MJaxLinkButton($this, 'lnkMultiply', array(
            "id" => "multiply",
            "class" => "btn",
            "href" => "#"
        ));
        $this->lnkMultiply->Name = 'multiply';
        $this->lnkMultiply->AddCssClass('btn');
        $this->lnkMultiply->Text = '*';
        $this->lnkMultiply->AddAction($this, 'lnkMultiply_click');
        $this->lnkDivision = new MJaxLinkButton($this, 'lnkDivision', array(
            "id" => "division",
            "class" => "btn",
            "href" => "#"
        ));
        $this->lnkDivision->Name = 'division';
        $this->lnkDivision->AddCssClass('btn');
        $this->lnkDivision->Text = '/';
        $this->lnkDivision->AddAction($this, 'lnkDivision_click');
        $this->txtResult = new MJaxTextBox($this, 'txtResult', array(
            "id" => "result",
            "name" => "result"
        ));
        $this->txtResult->Name = 'result';
        $this->txtResult->TextMode = 'MultiLine';
    }
    public function lnkC0_click($strFormId, $strControlId, $mixActionParam) {
    }
    public function lnkAdd_click($strFormId, $strControlId, $mixActionParam) {
    	$this->txtResult->Text = $this->txtNum1->Text + $this->txtNum2->Text;
    }
    public function lnkSubtract_click($strFormId, $strControlId, $mixActionParam) {
    	$this->txtResult->Text = $this->txtNum1->Text - $this->txtNum2->Text;
    }
    public function lnkMultiply_click($strFormId, $strControlId, $mixActionParam) {
    	$this->txtResult->Text = $this->txtNum1->Text * $this->txtNum2->Text;
    }
    public function lnkDivision_click($strFormId, $strControlId, $mixActionParam) {
    	$this->txtResult->Text = $this->txtNum1->Text / $this->txtNum2->Text;
    }
}
?>