<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* Classes list:
* - MDESimpleReportPanel extends MJaxTable
*/
class MDESimpleReportPanel extends MJaxTable {
    public function __construct($objParentControl, $strControlId = null) {
        parent::__construct($objParentControl, $strControlId);
        $this->AddCssClass('table');
        $this->AddColumn('Stat', 'Stat');
        $this->AddColumn('Count', 'Count');
        $objRow = new MJaxTableRow($this);
        $objRow->AddData('AWSInstances', 'Stat');
        $objRow->AddData(AWSInstance::QueryCount('') , 'Count');
        $objRow = new MJaxTableRow($this);
        $objRow->AddData('MDEApps', 'Stat');
        $objRow->AddData(MDEApp::QueryCount('') , 'Count');
        $objRow = new MJaxTableRow($this);
        $objRow->AddData('MDEAssets', 'Stat');
        $objRow->AddData(MDEAsset::QueryCount('') , 'Count');
        $objRow = new MJaxTableRow($this);
        $objRow->AddData('MDEBuilds', 'Stat');
        $objRow->AddData(MDEBuild::QueryCount('') , 'Count');
        $objRow = new MJaxTableRow($this);
        $objRow->AddData('MDEBuildAssemblys', 'Stat');
        $objRow->AddData(MDEBuildAssembly::QueryCount('') , 'Count');
        $objRow = new MJaxTableRow($this);
        $objRow->AddData('MDEPackages', 'Stat');
        $objRow->AddData(MDEPackage::QueryCount('') , 'Count');
    }
}
?>