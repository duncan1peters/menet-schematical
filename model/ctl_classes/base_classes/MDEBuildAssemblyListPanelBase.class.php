<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - MDEBuildAssemblyListPanelBase extends MJaxTable
*/
class MDEBuildAssemblyListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrMDEBuildAssemblys = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrMDEBuildAssemblys);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idBuildAssembly', 'idBuildAssembly');
        $this->AddColumn('shortDesc', 'shortDesc');
        $this->AddColumn('idAccount', 'idAccount');
        $this->AddColumn('longDesc', 'longDesc');
        $this->AddColumn('creDate', 'creDate');
        $this->AddColumn('idAsset', 'idAsset');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/MDEBuildAssembly/' . $strActionParameter);
    }
}
?>