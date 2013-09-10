<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - MLCApiMDEApp extends MLCApiMDEAppBase
*/
require_once (__MODEL_APP_API__ . "/base_classes/MLCApiMDEAppBase.class.php");
class MLCApiMDEApp extends MLCApiMDEAppBase {
    public function __call($strName, $arrArguments) {
        $arrReturn = array();
        if(is_numeric($strName)){
            $objMDEApp = MDEApp::LoadById($strName);
        }else{
            $objMDEApp = MDEApp::LoadSingleByField('namespace',$strName);
        }
        if (!is_null($objMDEApp)) {
            return new MLCApiMDEAppObject($objMDEApp);
        } else {
            throw new MLCApiException("No MDEApp found with the data you submitted");
        }
    }
}
?>