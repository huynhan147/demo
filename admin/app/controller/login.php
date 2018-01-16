<?php 
namespace App\Controller;
require 'app/model/login_model.php';
use App\Model\Login_Model;
class Login
{
	private $loginModel;
	function __construct(){
		$this->loginModel= new Login_Model();

	}
	public function logout(){
		if (isset($_SESSION['id'])&&isset($_SESSION['username'])&&isset($_SESSION['email'])&&isset($_SESSION['role'])) {
			unset($_SESSION['id']);
			unset($_SESSION['username']);
			unset($_SESSION['email']);
			unset($_SESSION['role']);
		}
		header('Location:?c=login');
	}
	public function index(){
		require'app/view/login/index_view.php';
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}
	public function handle(){
		if (isset($_POST['btnsubmit'])) {
			$user = $_POST['user']??'';
			$user = strip_tags($user);
			$pass = $_POST['pass']??'';
			$pass=strip_tags($pass);
			if (empty($user)OR empty($pass)) {
				header('Location:?c=login&m=index&state=err');
			}else {
				//kiem tra xem tai khoan co ton tai trong database hay khong?
				$checklogin = $this->loginModel->checkLoginAdmin($user,md5($pass));
				if (!empty($checklogin)&& isset($checklogin['id'])) {
					$_SESSION['id'] = $checklogin['id'];
					$_SESSION['username']=$checklogin['username'];
					$_SESSION['email'] = $checklogin['email'];
					$_SESSION['role']=$checklogin['role'];
					header('Location:?c=dashboard');
					
				}else{
					header('Location:?c=login&m=index&state=fail');
				}

			}
		}
	}
}
$login = new Login();
$method = $_GET['m']?? 'index';
$login->$method();

 ?>