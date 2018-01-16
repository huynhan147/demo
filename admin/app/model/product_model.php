<?php 
namespace App\Model;
require 'app/libs/PDODriver.php';
use App\Libs\PDODriver;
use \PDO;
class Product_Model extends PDODriver {
	function __construct(){
		parent::__construct();
	}
	public function getAllDataOrderCustomer(){
		$order=[];
		$sql ="SELECT a.*,b.name_book,b.images FROM orders AS a INNER JOIN book AS b ON a.book_id = b.id WHERE a.status=0";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowcount() > 0) {
					$order = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		$data= [];

		foreach ($order as $key=>$val) {
			$data[$val['book_id']]['id_book'] = $val['book_id'];
			$data[$val['book_id']]['name_book'] = $val['name_book'];
			$data[$val['book_id']]['images'] = $val['images'];
			$data[$val['book_id']]['lstCustomer'][]=$val;
		}
		$order =null;
		return $data;

	}
	public function updateStatusOrder($table,$data,$id){
		return $this->update($table,$data,$id);
	}
	public function addDataBook($data,$table){
		return $this->insert($table,$data);
	}
	public function getAllDataAuthor($table){
		return $this->getAlldata($table);
	}
	public function getAllDataCategory($table){
		return $this->getAlldata($table);
	}
	public function getAllDataPublisher($table){
		return $this->getAlldata($table);
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
}



 ?>