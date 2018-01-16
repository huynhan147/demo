<?php 
namespace App\Core;
class MY_Controller {
	function __construct(){
		$this->checkLoginIsAdmin();
	}
	protected function getUsernameAdmin(){
		$username= $_SESSION['username']??'';
		return $username;
	}
	protected function getIdAdmin(){
		$id = $_SESSION['id']??'';
		$id = is_numeric($id)?$id:0;
		return $id;
	}
	protected function getEmailAdmin(){
		$email= $_SESSION['email']??'';
		return $email;
	}
	protected function getRoleAdmin(){
		$role= $_SESSION['role']??'';
		$role = is_numeric($role)?$role:'';
		return $role;
	}
	protected function checkLoginIsAdmin(){
		$id = $this->getIdAdmin();
		$user = $this->getUsernameAdmin();
		if (empty($user) OR $id<=0) {
			header('Location:?c=login');
			die();
		}
	}
	protected function loadHeader($header = array()){
		$title=$header['title']??'';
		$content=$header['content']??'';
		$username = $this->getUsernameAdmin();
		require 'app/view/partials/header_view.php';
		
	}
	protected function loadSidebar(){
		require 'app/view/partials/sidebar_view.php';
	} 
	protected function loadView($pathView,$Passdata=[]){
		// $passData = $data;
		// echo '<pre>';
		// print_r($data); 
		// die;
		$data=$Passdata;
		require "{$pathView}";

	}
	protected function loadFooter(){
		require 'app/view/partials/footer_view.php';
	}
}



 ?>