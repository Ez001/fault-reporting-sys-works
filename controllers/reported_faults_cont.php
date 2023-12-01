<?php 
	
	#   Date created: 25/04/2023
   #   Date modified: 21/10/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/Fault.php' );
	include_once( 'models/ReportFault.php' );
	include_once( 'models/Engineer.php' );

	$js_modules = [ 'reported_fault' ];

	//Creating Instances
	$faults = new Fault();
	$report_fault = new ReportFault();
	$engr = new Engineer();

	if ( isset( $_POST['edit_btn'] ) ) 
	{	
		$id = $_POST['refaulted_fault_id'];
		$engineer_id = $_POST['edit_engineer_id'];
		$status = $_POST['edit_status'];

		if ( $id && $engineer_id && $status ) 
		{
			$dt_01 = [ $status, $engineer_id, $id ];
			$update_reported_fault = $report_fault->updateById( $dt_01 );

			if ( $update_reported_fault ) 
			{
				$msg = $web_app->showAlertMsg( 'success', 'Reported Fault Updated.' ); 
			} 
			else 
			{
				$msg = $web_app->showAlertMsg( 'danger', 'Sorry, Reported Fault Not Updated!.' ); 
			}
			
		}
	}


	$r_fault_arr = $report_fault->getAll( [ ] );
	$engr_arr = $engr->getAll( [ ] );

	//Report Fault interface
	include_once( 'views/reported_faults.php' );
 ?>