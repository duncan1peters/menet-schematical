<?php

/*
MLCApplication::InitPackage('MLCAws');
MLCApplication::InitPackage('MLCJetstrap');
MLCApplication::InitPackage('MLCStripe');
 */

//MDEApplication::GetPlan();
class Home extends HomeBase {
	protected $blnAdvSetup = false;
    protected $strFileHtmlLoc = null;
	protected $strFileDBLoc = null;
	protected $txtAppNamespace = null;
	protected $pnlLogin = null;
	protected $lnkGenerateLocal = null;
	protected $pnlInstall = null;
	protected $lnkAdvSetup = null;
	protected $arrPackageCheckboxs = array();
	protected $btnToolSelect = null;
	public $lstIdRepoType = null;
	public $txtRepoUrl = null;
	public $btnSelectRepo = null;
	public $btnSelectZip = null;
	public $btnSelectHosting = null;
	public function Form_Create(){

		parent::Form_Create();
        $this->strTemplate = __VIEW_ACTIVE_APP_DIR__ . '/www/index_noInvite.tpl.php';
	}
	public function CreateControls(){
		parent::CreateControls();
		$this->txtAppNamespace = new MJaxTextBox($this, 'txtAppNamespace');
		$this->txtAppNamespace->Placeholder = 'app_namespace';
		$this->txtAppNamespace->AddAction(
			new MJaxBlurEvent(),
			new MJaxServerControlAction(
				$this,
				'txtAppNamespace_blur'
			)
		);
		$this->pnlInstall = new MDEInstallPanel($this, 'pnlInstall');
		$this->pnlInstall->Message = "Don't worry about these if you generate on this page. They will be included in your build";
		$this->lnkAdvSetup = new MJaxLinkButton($this, 'lnkAdvSetup');
		$this->lnkAdvSetup->AddAction($this, 'lnkAdvSetup_click');
		$this->lnkAdvSetup->AddTextVariation('<i class="icon-sitemap"></i> Advanced Setup','adv_setup');
		$this->lnkAdvSetup->AddTextVariation('<i class="icon-sitemap"></i> Want a little more help','more_help');
		$this->lnkAdvSetup->AddCssClass('btn');
	
	
		if(SERVER_ENV == 'local'){
			$this->lnkGenerateLocal = new MJaxLinkButton($this, 'lnkGenerateLocal');
			$this->lnkGenerateLocal->AddAction($this, 'lnkGenerateLocal_click');
			$this->lnkGenerateLocal->Text = '<i class="icon-cogs"></i> Gen Local';
			$this->lnkGenerateLocal->AddCssClass('btn');
			
			$this->lnkGenerate->Text = '<i class="icon-cogs"></i> Generate';
		}
		$arrPackages = MDEPackage::LoadArrayByField('idBuildAssembly', MDEApplication::SCHEMATICAL_ID_BUILD_ASSEMBLY);
		foreach($arrPackages as $intIndex => $objPackage){
			$chkPackage = new MJaxCheckBox($this);
			$chkPackage->ActionParameter = $objPackage->IdPackage;
			$chkPackage->Name = $objPackage->ShortDesc;
			$chkPackage->Checked = $objPackage->IncludeByDefault;
			$chkPackage->Attr('data-tooltip', $objPackage->LongDesc);
			$chkPackage->Attr('data-about-url', $objPackage->AboutUrl);
			$this->arrPackageCheckboxs[] = $chkPackage;
		}
		$this->btnToolSelect = new MJaxLinkButton($this, 'btnToolSelect');
		$this->btnToolSelect->Text = 'Select';
		$this->btnToolSelect->AddClickEvent();
		$this->txtRepoUrl = new MJaxTextBox($this, 'txtRepoUrl');
		$this->txtRepoUrl->Attr('placeholder', 'http://');
		$intIdRepoType = null;
		
		/*$this->txtRepoUrl->AddAction(
			new MJaxBlurEvent(),
			new MJaxServerControlAction($this, 'txtRepoUrl_blur')
		);*/

		$this->lstIdRepoType = new MJaxListBox($this);	
		//$this->lstIdRepoType->AddItem('GIT', MDERepoType::GIT, ($intIdRepoType == MDERepoType::GIT));
		$this->lstIdRepoType->AddItem('SVN', MDERepoType::SVN, ($intIdRepoType == MDERepoType::GIT));
		
		$this->btnSelectRepo = new MJaxLinkButton($this);
		$this->btnSelectRepo->Text = 'Sync with Repo';
		$this->btnSelectRepo->AddCssClass('btn');
		$this->btnSelectRepo->AddClickEvent();
		
		$this->btnSelectZip = new MJaxLinkButton($this);
		$this->btnSelectZip->Text = 'Download a Zip';
		$this->btnSelectZip->AddCssClass('btn');
		$this->btnSelectZip->AddClickEvent();
		
		$this->btnSelectHosting = new MJaxLinkButton($this);
		$this->btnSelectHosting->Text = 'Checkout Schematical Hosting';
		$this->btnSelectHosting->AddCssClass('btn');
		$this->btnSelectHosting->AddClickEvent();
		$this->blnSkipMainWindowRender = true;
		
	}
    public function uplFileJetstrap_upload($strFormId, $strControlId, $mixActionParam) {
    	$strName =$this->uplFileJetstrap->FileData['name'];
		$strTempName = $this->uplFileJetstrap->FileData['tmp_name'];
		$this->txtAppNamespace->Text = MLCJetstrapDriver::GetAppNameFromZip($strName);
		$this->pnlInstall->AppName = $this->txtAppNamespace->Text;
		//move the file
		if (MDEApplication::S3Put(
			$strTempName,
			$strName
		)) {
			$this->strFileHtmlLoc = $strName;
			$this->uplFileJetstrap->Style->Display = 'none';
			//$this->Alert("File Successfully Uploaded: " . $this->strFileHtmlLoc);
			//$this->ScrollTo('divStep2');
			$this->AddJSCall(
				'MDE.Home.Success("#divDesign");'
			);
			$this->AddJSCall(
				'MDE.Home.Show("#divDatabase_content");'
			);
		}else{
			$this->Alert("Failed to Upload");
		}
    }
    public function uplFileDB_upload($strFormId, $strControlId, $mixActionParam) {
    	$strName = MDEApplication::GetNewFileName($this->uplFileDB->FileData['name']);
		$strTempName = $this->uplFileDB->FileData['tmp_name'];
		//move the file
		
		$this->strFileDBLoc = $strName;
		if (MDEApplication::S3Put($strTempName, $strName)) {
			$this->uplFileDB->Style->Display = 'none';
			//$this->Alert("File Successfully Uploaded");
			//$this->ScrollTo('divStep3');
			$this->AddJSCall(
				'MDE.Home.Success("#divDatabase");'
			);
			$this->AddJSCall(
				'MDE.Home.Show("#divTools_content");'
			);
			
		}else{
			$this->Alert("Failed to Upload");
		}
    }
	public function lnkGenerateLocal_click($strFormId, $strControlId, $mixActionParam) {
		MDEApplication::SetSaveDriver(new MLCFileSysSaveDriver());
	 	$this->lnkGenerate_click($strFormId, $strControlId, $mixActionParam);
	}
	public function btnToolSelect_click(){
		$this->AddJSCall(
			'MDE.Home.Show("#divTools_success");'
		);
		$this->AddJSCall(
			'MDE.Home.Show("#divBuildFormat_content");'
		);
	}
    public function lnkGenerate_click($strFormId, $strControlId, $mixActionParam) {
    	$strTmpLoc = __TMP_DIR__ . '/' . pathinfo($this->strFileDBLoc, PATHINFO_BASENAME);
    	
    	//TODO: Hackie Fix me
    	if($this->blnAdvSetup){
	    	$strVHostCode = $this->pnlInstall->GetVHostFile();
			MDEApplication::AddExtraFile(
				__INSTALL_ROOT_DIR__ . '/vhost.conf',
				$strVHostCode
			);
			$strEvnConf = $this->pnlInstall->GetBasicEnvConfFile();
			MDEApplication::AddExtraFile(
				__INSTALL_ROOT_DIR__ . '/model/env/conf_generated.inc.php',
				$strEvnConf
			);
		}
		if(strlen($this->pnlInstall->AppPrefix) > 0){
			$strPreFix = $this->pnlInstall->AppPrefix;
		}else{
			$strPreFix = null;
		}
		try{			
	    	$strZipName = MDEApplication::GenerateBuild(
	    		new MLCApp(
	    			$this->txtAppNamespace->Text,
					$strPreFix
				),
	    		$this->strFileHtmlLoc,
	    		$this->strFileDBLoc,
	    		array(
					'MJax',
					'MJaxBootstrap',
					'MLCDataLayer',
					'MLCApi',
				)
	    	);
	    	MLCCookieDriver::SetCookie(MDECookie::LAST_BUILD, $strZipName);
			$this->Alert("
				<h3>Your build has generated successfully</h3>" . 
				"<h4>Sign up to save your app</h4>" . 
				"<a class='btn btn-large' href='/signup.php'>Sign Up Now</a>" . 
				"<hr />" .
				"<h4>or just download it here</h4>" . 
				"<a class='btn  btn-large' target='_blank' href='/download.php?download=" . $strZipName . "'>Download it Now</a>
			");
		}catch(Exception $e){
			throw $e;
			$this->Alert($e->getMessage());
		}	
		$this->blnSkipMainWindowRender = true;
    }
	public function txtAppNamespace_blur(){
		$this->pnlInstall->AppName = $this->txtAppNamespace->Text;
	}
	public function lnkAdvSetup_click(){
		if(!$this->blnAdvSetup){
			$this->blnAdvSetup = true;
			$this->AnimateOpen('divAdvSetup');
		}else{
			$this->blnAdvSetup = false;
			$this->AnimateClosed('divAdvSetup');
		}
	}
	public function btnSelectZip_click(){
		//$this->
	}
	public function btnSelectRepo_click(){
		//$this->
	}
}
?>