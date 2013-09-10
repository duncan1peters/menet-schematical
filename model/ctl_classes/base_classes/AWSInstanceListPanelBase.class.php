<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - AWSInstanceListPanelBase extends MJaxTable
*/
class AWSInstanceListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrAWSInstances = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrAWSInstances);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idInstance', 'idInstance');
        $this->AddColumn('awsId', 'awsId');
        $this->AddColumn('namespace', 'namespace');
        $this->AddColumn('dns', 'dns');
        $this->AddColumn('creDate', 'creDate');
        $this->AddColumn('idAccount', 'idAccount');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AWSInstance/' . $strActionParameter);
    }
}
?>