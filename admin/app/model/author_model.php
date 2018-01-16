<?php 
namespace App\Model;
require 'app/libs/PDODriver.php';
use App\Libs\PDODriver;
use \PDO;
class Author_Model extends PDODriver{
	function __construct(){
		parent::__construct();

	}
	public function addDataAuthor($data,$table){
		return $this->insert($table,$data);
	}
		public function getAllDataAuthorByKeyword($keyword=''){
		$data= array();
		$key ="%".$keyword."%";
		$sql = "SELECT a.*FROM authors AS a WHERE a.name LIKE :keyword OR a.address LIKE :keyword ORDER BY a.create_time DESC";
		$stmt =$this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(':keyword',$key,PDO::PARAM_STR);
			if ($stmt->execute()) {
				if ($stmt->rowCount()>0) {
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	}

}


 ?>