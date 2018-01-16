<?php 
namespace App\Libs;
require 'app/config/database.php';
use App\Config\Database;
use \PDO;


/*
coment
*/

class PDODriver extends Database{

	private $_data = array();
	public function __construct(){
		parent::__construct();
	}
	//lay ra ten truong la khoa chinh cua mot bang nao do
	private function getPrimaryKey($table){
		$mydata=[];
		$sql = "SHOW KEYS FROM {$table} WHERE Key_name='PRIMARY'";
		$stmt= $this->db->prepare($sql);
		if ($stmt) {
			if ($stmt->execute()) {
				if ($stmt->rowCount()>0) {
					$mydata = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $mydata['Column_name'] ?? '';
		// isset($mydata['Column_name']) ? $mydata['Column_name'] : '';

	}
	//thuc hanh lay tat ca du lieu cua cac bang khac nhau
	public function getAlldata($table){
		$sql = "SELECT * FROM {$table}";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$this->_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $this->_data;
	}
	// viet ham lay du lieu theo ID 
	public function findDatabyID($table,$id){
		$nameid = $this->getPrimaryKey($table);
		$sql= "SELECT * FROM {$table} WHERE {$nameid} =:id";
		$stmt = $this->db->prepare($sql);
		if($stmt){
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			if($stmt->execute()){
				if($stmt->rowCount() > 0){
					$this->_data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $this->_data;
	}
	// viet ham insert data
	public function insert($table,$data=[]){
		$filedTable='';
		$filedParam = '';
		foreach ($data as $key=>$val) {
			$filedTable.=($filedTable=='') ? $key : ','.$key;
			$filedParam .=($filedParam=='') ? ":{$key}" : ",:{$key}";
		}
		$sql = "INSERT INTO {$table}({$filedTable}) VALUES({$filedParam})";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			foreach ($data as $k=>&$v) {// sau moi vong lap for gia tri $v duoc phep thay doi?
				$stmt->bindParam(":{$k}",$v,PDO::PARAM_STR);
				
			}
			if ($stmt->execute()) {
				return TRUE;
			}
			$stmt->closeCursor();
		}
		return FALSE;
	}
	public function update($table,$data,$id){
		$primaryKey = $this->getPrimaryKey($table);
		$fieldData= '';
		foreach ($data as $key=>$val) {
			$fieldData .= ($fieldData=='') ?"{$key}= :{$key}" : ",{$key}= :{$key}";
			
		}
		$sql = "UPDATE {$table} SET {$fieldData} WHERE {$primaryKey} = :id";
		$stmt = $this->db->prepare($sql);
		if ($stmt) {
			foreach ($data as $k=>&$v) {
				$stmt->bindParam(":{$k}",$v,PDO::PARAM_STR);
				
			}
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);
			if (!empty($this->findDatabyID($table,$id))) // ktra co ton tai id hay khong
			{
			if ($stmt->execute()) {
				return TRUE;
			}
		}
			$stmt->closeCursor();
		}
		return FALSE;
	}
	public function delete($table,$id){
		$primaryKey = $this->getPrimaryKey($table);
		$sql="DELETE FROM {$table} WHERE {$primaryKey}= :id";
		$stmt=$this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(":id",$id,PDO::PARAM_INT);		
			if ($stmt->execute()) {
				return TRUE;
		}
			$stmt->closeCursor();
		}
		return FALSE;
	}

}

 ?>