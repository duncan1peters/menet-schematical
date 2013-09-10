<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* - SetupCols()
* - objRow_click()
* Classes list:
* - AuthUserSettingListPanelBase extends MJaxTable
*/
class AuthUserSettingListPanelBase extends MJaxTable {
    public function __construct($objParentControl, $arrAuthUserSettings = array()) {
        parent::__construct($objParentControl);
        $this->SetupCols();
        $this->SetDataEntites($arrAuthUserSettings);
        foreach ($this->Rows as $intIndex => $objRow) {
            $objRow->AddAction($this, 'objRow_click');
        }
    }
    public function SetupCols() {
        $this->AddColumn('idUserSetting', 'idUserSetting');
        $this->AddColumn('idUser', 'idUser');
        $this->AddColumn('key', 'key');
        $this->AddColumn('data', 'data');
    }
    public function objRow_click($strFomrId, $strControlId, $strActionParameter) {
        $this->objForm->Redirect(__ENTITY_MODEL_DIR__ . '/AuthUserSetting/' . $strActionParameter);
    }
}
?>