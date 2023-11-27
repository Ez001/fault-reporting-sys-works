<?php 
	#   Date modified: 22/11/2023  

	include_once( 'models/User.php' );
	
	//Creating instances
	$user = new User(); 

	if ( isset( $_POST[ 'log_btn' ] ) ) 
	{
		// Getting user values
		$email = $_POST[ 'email' ];
		$pword = $_POST[ 'pword' ]; 

		//Validating inputs
		if ( $email && $pword ) 
		{
			$dt_01 = [ $email ];
			$admin_dt = $user->getLogin( $dt_01 );
			$role = $admin_dt['role'] ?? '';

			$pwordx = $admin_dt[ 'pword' ] ?? '';
		
			//Match user password
			$match_pword = $user->decPword( $pword, $pwordx );

			if ( $match_pword && $role == 'Works' ) 
			{  
				$id = $admin_dt[ 'id' ];
				//set session and cookie
				$time_out = time() + APP_SESS_TIME;
				$_SESSION[ APP_SESS ] = $id;
				setcookie( APP_SESS, $id, $time_out );

				//redirect
				header( 'Location: ./dashboard', true, 301 );
				exit();
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Admin Does Not Exist!' ); 
			}			

		}
		else 
		{  
			$msg = $web_app->showAlertMsg( 'info', 'Please, Enter Username And Password.' ); 	
		}
	}

	//login interface
	include_once( 'views/login.php' );
?>