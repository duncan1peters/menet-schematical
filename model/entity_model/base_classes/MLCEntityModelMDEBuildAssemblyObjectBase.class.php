<?php
/**
* Class and Function List:
* Function list:
* - __call()
* Classes list:
* - MLCEntityModelMDEBuildAssemblyObjectBase extends MLCEntityModelObjectBase
*/
class MLCEntityModelMDEBuildAssemblyObjectBase extends MLCEntityModelObjectBase {
    protected $strClassName = 'MDEBuildAssembly';
    public function __call($strName, $arrArguments) {
        switch ($strName) {
            default:
                return parent::__call($strName, $arrArguments);
        }
    }
}
