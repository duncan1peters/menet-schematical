<?php
MLCApplication::InitPackage('MLCSalesTools');
unset(MLCNotificationDriver::$arrCommMethod['ua_apid']);
class Landing extends MJaxPreSignupForm{
    public function Form_Create(){
        parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/index.tpl.php';
        $this->AddHeadline('Code Generation as a Service', 'codegen');


        $this->AddFooterLink("<i class='icon-facebook-sign icon-2x'></i>", '//facebook.com/schematical');
        $this->AddFooterLink("<i class='icon-twitter-sign icon-2x'></i>", '//twitter.com/schematical');
        $this->AddFooterLink("<i class='icon-github icon-2x'></i>", '//github.com/mlconsulting');
        $this->AddFooterLink("<i class='icon-linkedin-sign icon-2x'></i>", '//www.linkedin.com/company/schematical');

        $this->AddExtraField('ROLL', 'ROLL')->Attr('placeholder', '');
        $this->AddExtraField('LOOKING','LOOKING')->Attr('placeholder', '');
        $this->AddExtraField('CITY', 'CITY')->Attr('placeholder', '');
        $this->AddButtonText('Apply');
        $this->SuccessTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/_panels/presignup_thankyou.tpl.php';

    }
}
Landing::Run('Landing');
