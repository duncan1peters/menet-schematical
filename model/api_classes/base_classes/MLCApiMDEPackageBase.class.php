<?php
/**
* Class and Function List:
* Function list:
* - __call()
* - Query()
* Classes list:
* - MLCApiMDEPackageBase extends MLCApiClassBase
*/
class MLCApiMDEPackageBase extends MLCApiClassBase {
    protected $strClassName = 'MDEPackage';
    public function __call($strName, $arrArguments) {
        $arrReturn = array();
        $objMDEPackage = MDEPackage::LoadById($strName);
        if (!is_null($objMDEPackage)) {
            return new MLCApiMDEPackageObject($objMDEPackage);
        } else {
            throw new MLCApiException("No MDEPackage found with the data you submitted");
        }
    }
    public function Query() {
        //Will need to accept QS Pramaeters of facebook, twitter, google
        
    }
}
?>