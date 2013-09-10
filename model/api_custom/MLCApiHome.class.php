<?php
/**
* Class and Function List:
* Function list:
* Classes list:
* - MLCApiHome extends MLCApiHomeBase
*/

require_once (__MODEL_APP_API__ . '/base_classes/MLCApiHomeBase.class.php');
class MLCApiHome extends MLCApiHomeBase {
    public function __construct(){
		//MLCApiAuthDriver::Authenticate(false);
	}
	
    public function funnel(){
        return new MLCApiFunnel();
    }
    public function apps() {
        return new MLCApiMDEApp();
    }
    public function packages(){
        return new MLCApiMDEPackage();
    }
}