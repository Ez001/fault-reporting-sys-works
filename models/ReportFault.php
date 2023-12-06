<?php
	#   Date modified: 22/09/2023  

	include_once( 'App.php' );
	include_once( 'Encryption.php' );

	class ReportFault
	{
		//using Namespaces
		use App {
			App::__construct as private __appConst;
		}

		use Encryption;

		protected $table = '';
		const DB_TABLE = 'report_faults';
		const DB_TABLE_USER = 'users';

		function __construct()
	 	{
			$this->__appConst();
	 		$this->table = self::DB_TABLE;
	 		$this->table_user = self::DB_TABLE_USER;
	 	}



	 	function getAll( array $dt )
		{
			$sql = "SELECT fault.*, user.first_name, user.last_name FROM $this->table fault INNER JOIN $this->table_user user ON fault.user_id = user.id";
			$res = $this->fetchAllData( $sql, $dt );

			return $res ?? [];
		}

		function updateById( array $dt )
		{
			$sql = "UPDATE $this->table SET `status` = ?, `engineer_id` = ?, `feed_back` = ? WHERE id = ?";
			$res = $this->runQuery_2( $sql, $dt );
			
			return $res ?? [];
		}

		function getCount( array $dt )
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? [];
		}

		function getCountByStatus( array $dt )
		{
			$sql = "SELECT COUNT( id ) AS total FROM $this->table WHERE status = ?";
			$res = $this->fetchData( $sql, $dt );

			return $res['total'] ?? [];
		}

		function deleteById( array $dt )
		{
			$sql = "DELETE FROM $this->table WHERE id = ?";
			$res = $this->runQuery_2( $sql, $dt );

			return $res ?? false;
		}


	}

?>