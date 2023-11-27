<?php
   #   Date modified: 22/11/2023  

	const ENVIRONMENT = 'Test';//Test Live

   //DB Config
	const HOST = 'localhost';
	const USER = 'root';
	const PWORD = '';
	const DB = 'fault_report_app_db';

	$msg = '';
	$clear = false;
	$website_title = 'Fault Reporting System';
	$test_email = 'ez@gmail.com';

	const APP_SESS = 'fault_admin_id';
	const APP_SESS_TIME = 3500;

	//url
   $server_name = ENVIRONMENT == 'Test' ? 'http://' : 'https://';
   $server_name .= $_SERVER['SERVER_NAME'];
   $uri = $_SERVER['REQUEST_URI'];
   $app_url = ( strlen( $uri ) > 1 ) ? "$server_name$uri" : "$server_name";

   //directory
   $root_dir = dirname( __DIR__ );
   $cur_dir = dirname( __FILE__ );

	$js_modules = [];
?> 