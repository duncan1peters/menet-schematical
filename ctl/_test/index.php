<?php
MLCApplication::InitPackage('MLCLocation');
define('__GOOGLE_API_KEY__', '957059295923-5k84s277agjcbgjaiqn9094d4kk8ajms.apps.googleusercontent.com');
define('__GOOGLE_API_SECRET__', 'K4Z7CoP_c1sITYi7x9L3XcCt');
require_once(dirname(__FILE__) . '/google/Google_Client.php');
require_once(dirname(__FILE__) . '/google/contrib/Google_DriveService.php');
$client = new Google_Client();
$client->setClientId(__GOOGLE_API_KEY__);
$client->setClientSecret(__GOOGLE_API_SECRET__);
$client->setRedirectUri('http://' . $_SERVER['SERVER_NAME'] . '/_test/index.php');
$client->setScopes(array(
    'https://www.googleapis.com/auth/drive',
    'https://www.googleapis.$objLocationcom/auth/userinfo.email',
    'https://www.googleapis.com/auth/userinfo.profile'
));
$client->setUseObjects(true);
// initialize the drive service with the client.


// if there is an existing session, set the access token
$objUser = MLCAuthDriver::User();

//$objUser->SetUserSetting('google_token',null);
if (is_null($objUser)) {
    MLCAuthDriver::Authenticate('matt@mattleaconsulting.com', 'learnlearn');
    die("Authed try again");
} else {
    $strAccessToken = $objUser->GetUserSetting('google_token');

    if (is_null($strAccessToken)){
        if (!array_key_exists('code', $_GET)) {
            die(header('location: ' . $client->createAuthUrl()));
        } else {
            $strResponse = $client->authenticate($_GET['code']);
            $arrResponse = json_decode($strResponse, true);
            echo("REsponse: " . $strResponse . "\n");
            $objUser->SetUserSetting('google_token', $strResponse);//$arrResponse['access_token']);
            die(header('location: ./index.php'));
        }
    }else{
        $client->setAccessToken($strAccessToken);

    }
}

$service = new Google_DriveService($client);


$request = new Google_HttpRequest('https://docs.google.com/feeds/download/spreadsheets/Export?key=0Am5wKKvRU6UHdHJzNV91NWVGWU9BYk1NOWplWHpab0E&exportFormat=csv');
$response = $client->getIo()->authenticatedRequest($request);

$arrLineData = array();
$strResponse = $response->getResponseBody();
//_dv($strResponse);
$arrLines = (explode("\n",$response->getResponseBody()));
unset($arrLines[0]);
foreach($arrLines as $intIndex => $strLine){
    $arrData = str_getcsv($strLine);
    if(array_key_exists(3, $arrData)){
        $objLocation = new MLCLocation();

        $objLocation->Zip = $arrData[3];
        if(array_key_exists(25, $arrData)){
            if(strlen($arrData[25])>0){
                $objLocation->Address1 = '100 ' .$arrData[25];
            }
        }


        $objLocation->GetLatLng();
        $objLocation->ShortDesc =  $arrData[2];

        $objLocation->Save();
    }
    //_dv($objLocation);
    /*
     * [0]=>
  string(9) "Timestamp"
  [1]=>
  string(9) "Full Name"
  [2]=>
  string(19) "Best Email Address:"
  [3]=>
  string(18) "Post Code/Zipcode:"
  [4]=>
  string(14) "Date Of Birth:"
  [5]=>
  string(27) "Entrepreneurial Experience."
  [6]=>
  string(25) "What do you kick-ass at? "
  [7]=>
  string(33) "Who is it that you want to help? "
  [8]=>
  string(41) "What is your mission as an entrepreneur? "
  [9]=>
  string(46) "What do you need to take it to the Next Level?"
  [10]=>
  string(71) "What percentage of your income is brought in as an active entrepreneur?"
  [11]=>
  string(141) "There is an elite group of entrepreneurs in Madison on a private facebook group. Is this something you are interested in becoming a part of? "
  [12]=>
  string(86) "If yes to above please insert the direct URL to your facebook page so we can find you."
  [13]=>
  string(29) "What areas are you targeting?"
  [14]=>
  string(31) "Do you currently sell products?"
  [15]=>
  string(43) "Where can I learn more about your business?"
  [16]=>
  string(66) "Check the answer form the statement below that best describes you."
  [17]=>
  string(0) ""
  [18]=>
  string(0) ""
  [19]=>
  string(0) ""
  [20]=>
  string(22) "What are your hobbies?"
  [21]=>
  string(70) "If selected will you selflessly help others in this awesome community?"
  [22]=>
  string(6) "State:"
  [23]=>
  string(49) "Tell us about your entrepreneurial achievements? "
  [24]=>
  string(0) ""
  [25]=>
  string(12) "Street Name:"
     */
}
die("blah");
$arrResponse = $service->files->listFiles();
_dv($arrResponse->items[0]);
die("End");
// Retrieve metadata for the file specified by $fileId.
$file = $service->files->get($fileId);

// Get the contents of the file.



_dv($response->getResponseBody());



