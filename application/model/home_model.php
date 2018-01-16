<?php 
namespace Application\Model;
require 'application/libs/PDODriver.php';
use App\Libs\PDODriver;
use \PDO;
 class Home_Model extends PDODriver{
 	function __construct(){
 		parent::__construct();

 	}
 	public function insertOrderCustomer($table,$data){
 		return $this->insert($table,$data);
 	}
 	public function getAllDataBook(){
 		$data=[];
 		$sql = "SELECT a.*,b.name AS name_author,c.name AS name_publisher,d.name_cat FROM book AS a INNER JOIN authors AS b ON a.id_author = b.id INNER JOIN publishers AS c ON a.id_publisher= c.id INNER JOIN categorys AS d ON a.id_cat = d.id ORDER BY a.create_time DESC";
 		$stmt = $this->db->prepare($sql);
 		if ($stmt) {
 			if ($stmt->execute()){
 				if ($stmt->rowcount()>0) {
 					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
 				}
 			}
 			$stmt->closeCursor();
 		}
 		return $data;

 	}
 	public function getDataBookID($id){
 		$data = [];
 		$sql = "SELECT a.*,b.name AS name_author,c.name AS name_publisher,d.name_cat FROM book AS a INNER JOIN authors AS b ON a.id_author = b.id INNER JOIN publishers AS c ON a.id_publisher= c.id INNER JOIN categorys AS d ON a.id_cat = d.id  WHERE a.id = :id LIMIT 1";
 		$stmt = $this->db->prepare($sql);
 		if ($stmt) {
 			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
 			if ($stmt->execute()){
 				if ($stmt->rowcount()>0) {
 					$data = $stmt->fetch(PDO::FETCH_ASSOC);
 				}
 			}
 			$stmt->closeCursor();
 		}
 		return $data;
 	}
 		public function getAllDataBookByKeyword($keyword=''){
		$data= array();
		$key ="%".$keyword."%";
		$sql = "SELECT a.*,b.name AS name_author,c.name AS name_publisher,d.name_cat FROM book AS a INNER JOIN authors AS b ON a.id_author = b.id INNER JOIN publishers AS c ON a.id_publisher = c.id INNER JOIN categorys AS d ON a.id_cat = d.id WHERE a.name_book LIKE :keyword OR b.name LIKE :keyword OR c.name LIKE :keyword OR d.name_cat LIKE :keyword ORDER BY a.create_time DESC";
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
 		public function getAllDataBookByPage($keyword='',$start,$limit){
		$data= array();
		$key ="%".$keyword."%";
		$sql = "SELECT a.*,b.name AS name_author,c.name AS name_publisher,d.name_cat FROM book AS a INNER JOIN authors AS b ON a.id_author = b.id INNER JOIN publishers AS c ON a.id_publisher = c.id INNER JOIN categorys AS d ON a.id_cat = d.id WHERE a.name_book LIKE :keyword OR b.name LIKE :keyword OR c.name LIKE :keyword OR d.name_cat LIKE :keyword  ORDER BY a.create_time DESC LIMIT :start,:limmit";
		$stmt =$this->db->prepare($sql);

		if ($stmt) {
			$stmt->bindParam(':keyword',$key,PDO::PARAM_STR);
			$stmt->bindParam(':start',$start,PDO::PARAM_INT);
			$stmt->bindParam(':limmit',$limit,PDO::PARAM_INT);


			if ($stmt->execute()) {
				if ($stmt->rowCount()>0) {
					$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;
	} 
 	//
 	//

//
 	//
 	//
 	




 }


 ?>