<?php 
	
	#   Date created: 25/04/2023
   #   Date modified: 21/10/2023 

	//auth
	include_once( 'user_auth.php' );

	//App Function
	include_once( 'models/Fault.php' );
	include_once( 'models/ReportFault.php' );
	include_once( 'models/Engineer.php' );

	//Creating Instances
	$faults = new Fault();
	$report_fault = new ReportFault();
	$engr = new Engineer();


	$r_fault_arr = $report_fault->getAll( [ ] );

	//Report Fault interface
	include_once( 'views/reported_faults.php' );
 ?>