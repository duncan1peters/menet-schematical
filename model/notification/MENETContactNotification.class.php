<?php
MLCApplication::InitPackage('MLCNotification');
class MENETContactNotification extends MLCNotificationObjectBase{
    protected $arrData = array();
    public function __construct($objNotification = null, $strEmail = null, $strComment = null){
        if(is_string($objNotification)){
            $this->arrData['name'] = $objNotification;
            $this->arrData['email'] = $strEmail;
            $this->arrData['comment'] = $strComment;
            parent::__construct(null);
        }else{
            parent::__construct($objNotification);
        }

        $this->strEmailTemplate = __MODEL_APP_NOTIFICATION__ . '/email/MENETContactNotification.email.php';
    }

    public function GetData(){
        $arrData = parent::GetData();
        $arrData = array_merge($arrData, $this->arrData);
        return $arrData;
    }
    public function SetData($arrData){
        $this->arrData = $arrData;
    }

}