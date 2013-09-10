<?php
if(!defined('SERVER_ENV')){
	switch($_SERVER['SERVER_NAME']){
		case('menet-schematical.com'):
			define('SERVER_ENV', 'local');
			define('MLC_APPLICATION_NAME', 'menet');
            define('MLC_DISPLAY_EXCEPTIONS', '1');
		break;
        case('menet.schematical.com'):
            define('SERVER_ENV', 'dev');
            define('MLC_APPLICATION_NAME', 'menet');
            define('MLC_DISPLAY_EXCEPTIONS', '1');
        break;
        case('www.myentrepreneurnet.com'):
        case('myentrepreneurnet.com'):
            define('SERVER_ENV', 'prod');
            define('MLC_APPLICATION_NAME', 'menet');
        break;
	}
}
if(defined('SERVER_ENV')){
    define('MLC_APPLICATION_PREFIX', 'MENET');
	switch(SERVER_ENV){
        case('local'):
            define('DB_1', serialize(array(
                'host'=>'localhost',
                'db_name'=>'menet',
                'user'=>'root',
                'pass'=>'tj111092'
            )));
            define('DB_0', serialize(array(
                'host'=>'localhost',
                'db_name'=>'util',
                'user'=>'root',
                'pass'=>'tj111092'
            )));

            break;
		case('dev'):
			define('DB_1', serialize(array(
				'host'=>'localhost',
				'db_name'=>'menet',
				'user'=>'root',
				'pass'=>'learnlearn'
			)));
			define('DB_0', serialize(array(
				'host'=>'localhost',
				'db_name'=>'util',
				'user'=>'root',
				'pass'=>'learnlearn'
			)));
			
		break;
	}
    define('POSTMARKAPP_API_KEY', 'e2e62665-0392-40e7-ac3f-a1dfb5c9349c');
    define('POSTMARKAPP_MAIL_FROM_ADDRESS', 'mlea@schematical.com');
    define('POSTMARKAPP_MAIL_FROM_NAME', 'Duncan Peters');
    define('__URBANAIRSHIP_KEY__', 'PhAs_gCiST203aBOS9Yinw');
    define('__URBANAIRSHIP_SECRET__', 'OWEWIKBOTlOaeWeD71cu9w');
    define('__URBANAIRSHIP_MASTER_SECRET__', '_vjYVnVXSc-RhgsOqBXljw');
	define('MAILCHIMP_LIST_ID', 'ce2cb6569f');
    define('__MAILCHIMP_API_KEY__', '186a9a1f87126511c403db7ff6196155-us6');
    define('__MST_ACCOUNT__', '1');
}