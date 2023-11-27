<?php
	#   Date modified: 22/09/2023  

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class Fault
	{
		//using Namespaces
		use App {
			App::__construct as private __appConst;
		}

		use Encryption;

		protected $table = '';
		const DB_TABLE = 'faults';

		function __construct()
	 	{
			$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

		function getById( array $dt )
		{
			$sql = "SELECT title FROM $this->table WHERE id = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res['title'] ?? [];
		}

	}

?>