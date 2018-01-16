<?php 
namespace  App\Controller;
require 'app/core/MY_Controller.php';
use App\Core\MY_Controller;
class DashBoard extends MY_Controller{
	function __construct(){
		parent::__construct();
	}
	public function index(){

		// day la phan xu ly du lieu- dieu huong cac request
		$data=[];
		// load header
		$header = [];
		$header['title']= 'This is DashBoard my Admin';
		$header['content']='Nguyen Phi Huy';
		$this->loadHeader($header);
		//load sidebar
		$this->loadSidebar();
		//load content view
		$this->loadView('app/view/dashboard/index_view.php',$data);
		// load footer
		$this->loadFooter();
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}

}
$dashboard = new DashBoard();
$method = $_GET['m']?? 'index';
$dashboard->$method();

 ?>