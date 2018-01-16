<?php 
session_start();
require 'app/config/constant.php';
require 'app/helper/common_helper.php';
class Route{
	public function login(){
		require 'app/controller/login.php';
	}
	public function dashboard(){
		require 'app/controller/dashboard.php';
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}
	public function product(){
		require 'app/controller/product.php';
	}
	public function publisher(){
		require 'app/controller/publisher.php';
	}
	public function author(){
		require 'app/controller/author.php';

	}
	public function orders(){
		require 'app/controller/orders.php';
	}

 }
 $route = new Route();
 $controller = $_GET['c'] ??'login';
 $route->$controller();
 ?>
