<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - MLCApiMDEPackage extends MLCApiMDEPackageBase
*/
require_once (__MODEL_APP_API__ . "/base_classes/MLCApiMDEPackageBase.class.php");
class MLCApiMDEPackage extends MLCApiMDEPackageBase {
    public function __call($strName, $arrArguments) {
        $arrReturn = array();
        if(is_numeric($strName)){
            $objMDEPackage = MDEPackage::LoadById($strName);
        }elseif(is_string($strName)){
            $objMDEPackage = MDEPackage::LoadSingleByField('namespace',$strName);
        }else{
            $objMDEPackage = null;
        }
        if (!is_null($objMDEPackage)) {
            return new MLCApiMDEPackageObject($objMDEPackage);
        } else {
            throw new MLCApiException("No MDEPackage found with the data you submitted");
        }
    }
}
?>