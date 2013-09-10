<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - MDEAssetListPanelBase extends MJaxTable
*/
class MDEAssetListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrMDEAssets = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrMDEAssets);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idAsset', 'idAsset');
        $this->AddColumn('s3Loc', 's3Loc');
        $this->AddColumn('creDate', 'creDate');
        $this->AddColumn('idUser', 'idUser');
        $this->AddColumn('idApp', 'idApp');
        $this->AddColumn('type', 'type');
        $this->AddColumn('shortDesc', 'shortDesc');
        $this->AddColumn('longDesc', 'longDesc');
        $this->AddColumn('namespace', 'namespace');
        $this->AddColumn('success', 'success');
        $this->AddColumn('delDate', 'delDate');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/MDEAsset/' . $strActionParameter);
    }
}
?>