<?php 
   #   Date modified: 22/11/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/ReportFault.php');

	//Creating Instance
	$reported_fault = new ReportFault();


	$total_faults = $reported_fault->getCount( [ ] );
	$total_completed_faults = $reported_fault->getCountByStatus( [ 'Completed' ] );
	$total_pending_faults = $reported_fault->getCountByStatus( [ 'Pending' ] );


	//Dashboard interface
	include_once( 'views/dashboard.php' );
 ?>