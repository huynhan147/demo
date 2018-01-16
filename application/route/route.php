<?php
session_start();
require 'application/config/constant.php'; 
require 'application/helper/common_helper.php';
class Route{
	public function home(){
		// echo "this is".__FUNCTION__;
		require 'application/controller/home.php';

	}
	public function about(){
		require 'application/controller/about.php';
	}
	public function cart(){
		require 'application/controller/cart.php';
	}
	public function discount(){
		require 'application/controller/discount.php';
	}
	public function support(){
		require 'application/controller/support.php';	
	}
	public function contact(){
		require 'application/controller/contact.php';	
	}
	public function test(){
		require 'application/controller/test.php';
	}
	public function __call($params,$method){
		echo 'NOT FOUND REQUEST';

	}
}
$c = isset($_GET['c']) ? trim($_GET['c']):'home';
$controller = new Route();
$controller->$c();// tu dong goi den cac phuong thuc


 ?>