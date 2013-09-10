<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - MDEPackageListPanelBase extends MJaxTable
*/
class MDEPackageListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrMDEPackages = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrMDEPackages);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idPackage', 'idPackage');
        $this->AddColumn('idAsset', 'idAsset');
        $this->AddColumn('idRepoType', 'idRepoType');
        $this->AddColumn('repoUrl', 'repoUrl');
        $this->AddColumn('shortDesc', 'shortDesc');
        $this->AddColumn('longDesc', 'longDesc');
        $this->AddColumn('namespace', 'namespace');
        $this->AddColumn('idAccount', 'idAccount');
        $this->AddColumn('idBuildAssembly', 'idBuildAssembly');
        $this->AddColumn('aboutUrl', 'aboutUrl');
        $this->AddColumn('includeByDefault', 'includeByDefault');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/MDEPackage/' . $strActionParameter);
    }
}
?>