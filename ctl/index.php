<?php
MLCApplication::InitPackage('MLCSalesTools');
//MLCApplication::InitPackage('MLCLocation');
//unset(MLCNotificationDriver::$arrCommMethod['ua_apid']);
class Landing extends MJaxPreSignupForm{
    public $pnlMap = null;

    public $txtName = null;
    public $txtEmail = null;
    public $txtComment = null;
    public $btnSent = null;
    public $btnReset = null;
    public function Form_Create(){
        parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/index.tpl.php';
        $this->AddHeadline('Code Generation as a Service', 'codegen');


        $this->txtName = new MJaxTextBox($this, 'txtTest');
        $this->txtName->AddCssClass('text');
        $this->txtName->Attr('placeholder', 'Name');

        $this->txtEmail = new MJaxTextBox($this, 'txtCEmail');
        $this->txtEmail->AddCssClass('text');
        $this->txtEmail->Attr('placeholder', 'Email');

        $this->txtComment = new MJaxTextBox($this, 'contact-message');
        $this->txtComment->AddCssClass('text');
        $this->txtComment->TextMode = MJaxTextMode::MultiLine;
        $this->txtComment->Attr('placeholder', 'Message');


        //$arrLocations = MLCLocation::LoadAll()->getCollection();

        // $this->pnlMap = new MJaxGoogleMapPanel($this, $arrLocations[3]);
        // $this->pnlMap->Style->Width = '600px';
        // $this->pnlMap->Style->Height = '400px';
        // foreach($arrLocations as $intIndex => $objLocation){
        //     $mkrBlah = new MJaxGoogleMapMarker($this->pnlMap, $objLocation);
        //     $mkrBlah->ActionParameter = $objLocation;
        //     $mkrBlah->AddAction(
        //         new MJaxGoogleMapClickEvent(),
        //         new MJaxServerControlAction($this, 'map_click')
        //     );
        // }

        //<input type="submit" class="button button-style1" value="Send" />
        $this->btnSent = new MJaxButton($this, 'btnSend');
        $this->btnSent->AddCssClass('button button-style1');
        $this->btnSent->Text = 'Send';
        $this->btnSent->AddAction(
            new MJaxClickEvent(),
            new MJaxServerControlAction($this, 'btnSend_click')
        );

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
    public function map_click($strControlId, $strFormId, $strActionParameter){
        die($strActionParameter->ShortDesc);
    }
    public function btnSend_click(){
        // $objAccount = AuthAccount::LoadById(__MST_ACCOUNT__);

        // $objNotification = new MENETContactNotification(
        //     $this->txtName->Text,
        //     $this->txtEmail->Text,
        //     $this->txtComment->Text
        // );

        // $objNotification->Subject = "You have been contacted";

        // MLCNotificationDriver::Send($objNotification, $objAccount);
    }
}
Landing::Run('Landing');
