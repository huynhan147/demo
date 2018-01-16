<?php
namespace Application\Controller;
require 'application/core/MY_Controller.php';
use Application\Core\MY_Controller;
class Support extends MY_Controller{
		function __construct(){
		$this->module=trim(strtolower(__CLASS__));
	}
	public function index(){
		// handle data
		$data =[];
		//load header
		$header = [];
		$header['title']= 'Hỗ trợ';
		$header['content']='Support';
		$this->loadHeader($header);
		//load menu
		$this->loadMenu();
		//load content
		$this->loadView('application/view/support/index_view.php',$data);
		//load sidebar
		$this->loadSidebar();
		// load footer
		$this->loadFooter();

	}
}
$m = $_GET['m'] ??'index';
$support = new Support();
$support->$m();





 ?>