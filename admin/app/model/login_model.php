<?php 
namespace App\Model;
require 'app/libs/PDODriver.php';
use App\Libs\PDODriver;
use \PDO;
class Login_Model extends PDODriver{
	function __construct(){
		parent::__construct();
	}
	public function checkLoginAdmin($user,$pass){
		$data = [];
		$sql = "SELECT * FROM admins As a WHERE a.username =:username AND a.password =:password AND a.status =1 LIMIT 1";
		$stmt= $this->db->prepare($sql);
		if ($stmt) {
			$stmt->bindParam(':username',$user,PDO::PARAM_STR);
			$stmt->bindParam(':password',$pass,PDO::PARAM_STR);
			if ($stmt->execute()) {
				if ($stmt->rowCount()>0) {
					$data = $stmt->fetch(PDO::FETCH_ASSOC);
				}
			}
			$stmt->closeCursor();
		}
		return $data;

	}
}





 ?>