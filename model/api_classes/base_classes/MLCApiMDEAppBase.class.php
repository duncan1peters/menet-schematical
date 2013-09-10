<?php
/**
* Class and Function List:
* Function list:
* - __call()
* - Query()
* Classes list:
* - MLCApiMDEAppBase extends MLCApiClassBase
*/
class MLCApiMDEAppBase extends MLCApiClassBase {
    protected $strClassName = 'MDEApp';
    public function __call($strName, $arrArguments) {
        $arrReturn = array();
        $objMDEApp = MDEApp::LoadById($strName);
        if (!is_null($objMDEApp)) {
            return new MLCApiMDEAppObject($objMDEApp);
        } else {
            throw new MLCApiException("No MDEApp found with the data you submitted");
        }
    }
    public function Query() {
        //Will need to accept QS Pramaeters of facebook, twitter, google
        
    }
}
?>