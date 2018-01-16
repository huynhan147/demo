<?php 
namespace App\Config;
use \PDO;
class Database{
	protected $db;
	function __construct(){
		$this->connection();
	}
	function __destruct()
	{
		$this->disconnection();
	}
	protected function connection()
	{

			$this->db = new PDO('mysql:host=localhost;dbname=books;charset=utf8',"root","");
			return $this->db;

	}
	protected function disconnection()
	{
		// ngat ket noi den csdl bang PDO
		$this->db=null;
	}



}






 ?>