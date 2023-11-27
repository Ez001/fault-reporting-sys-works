<?php 
	#   Date modified: 22/11/2023  

	include_once( 'models/User.php' );

	//Creating instances
	$user = new User();  
	$admin_id = $user->getLoggedUser();

	//when not logged in
	if ( !$admin_id ) 
	{
		header( "Location: ./", true, 301 );
		exit();
	}

?>