<?php 
	namespace App\Model;
	require 'application/libs/PDODriver.php';
	use App\Libs\PDODriver;
	use \PDO;
	class Test_Model extends PDODriver{
		function __construct(){
			parent::__construct();
		}
		public function getData($tab){
			return $this->getAllData($tab);
		}
		public function getDatabyID($table,$id){
			return $this->findDatabyID($table,$id);
		}
		public function myInsertData($table,$data){
			return $this->insert($table,$data);
		}
		public function myUpdateData($table,$data,$id){
			return $this->update($table,$data,$id);
		}
		public function myDeleteData($table,$id){
			return $this->delete($table,$id);
		}
	}
	
 ?>