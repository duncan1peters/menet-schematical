<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - AuthAccountTypeCd_tpcdListPanelBase extends MJaxTable
*/
class AuthAccountTypeCd_tpcdListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrAuthAccountTypeCd_tpcds = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrAuthAccountTypeCd_tpcds);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idAccountTypeCd', 'idAccountTypeCd');
        $this->AddColumn('shortDesc', 'shortDesc');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthAccountTypeCd_tpcd/' . $strActionParameter);
    }
}
?>