<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* Classes list:
* - MENETSimpleReportPanel extends MJaxTable
*/
class MENETSimpleReportPanel extends MJaxTable {
    public function __construct($objParentControl, $strControlId = null) {
        parent::__construct($objParentControl, $strControlId);
        $this->AddCssClass('table');
        $this->AddColumn('Stat', 'Stat');
        $this->AddColumn('Count', 'Count');
    }
}
?>