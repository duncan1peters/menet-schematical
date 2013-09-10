<?php
/**
* Class and Function List:
* Function list:
* - __construct()
* Classes list:
* - MLCApiHomeBase extends MLCApiClassBase
*/
class MLCApiHomeBase extends MLCApiClassBase {
    public function __construct() {
        MLCApiAuthDriver::Authenticate(false);
    }
}
?>