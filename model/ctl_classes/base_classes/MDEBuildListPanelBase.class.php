<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - MDEBuildListPanelBase extends MJaxTable
*/
class MDEBuildListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrMDEBuilds = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrMDEBuilds);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idBuild', 'idBuild');
        $this->AddColumn('idApp', 'idApp');
        $this->AddColumn('idUser', 'idUser');
        $this->AddColumn('creDate', 'creDate');
        $this->AddColumn('log', 'log');
        $this->AddColumn('idBuildStatus', 'idBuildStatus');
        $this->AddColumn('s3Loc', 's3Loc');
        $this->AddColumn('idAddress', 'idAddress');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/MDEBuild/' . $strActionParameter);
    }
}
?>