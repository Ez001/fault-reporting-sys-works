<?php
	#   Date modified: 22/09/2023  

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class Engineer
	{
		//using Namespaces
		use App {
			App::__construct as private __appConst;
		}

		use Encryption;

		protected $table = '';
		const DB_TABLE = 'engineers';

		function __construct()
	 	{
			$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 	}

	 	function getAll( array $dt )
		{
			$sql = "SELECT * FROM $this->table ";
			$res = $this->fetchAllData( $sql, $dt );

			return $res ?? [];
		}

		function getById( array $dt )
		{
			$sql = "SELECT * FROM $this->table WHERE id = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res ?? [];
		}


	}

?>