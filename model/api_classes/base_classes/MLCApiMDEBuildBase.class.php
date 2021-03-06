<?php
/**
* Class and Function List:
* Function list:
* - __call()
* - Query()
* Classes list:
* - MLCApiMDEBuildBase extends MLCApiClassBase
*/
class MLCApiMDEBuildBase extends MLCApiClassBase {
    protected $strClassName = 'MDEBuild';
    public function __call($strName, $arrArguments) {
        $arrReturn = array();
        $objMDEBuild = MDEBuild::LoadById($strName);
        if (!is_null($objMDEBuild)) {
            return new MLCApiMDEBuildObject($objMDEBuild);
        } else {
            throw new MLCApiException("No MDEBuild found with the data you submitted");
        }
    }
    public function Query() {
        //Will need to accept QS Pramaeters of facebook, twitter, google
        
    }
}
?>