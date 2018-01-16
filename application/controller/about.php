<?php
namespace Application\Controller;
require 'application/core/MY_Controller.php';
use Application\Core\MY_Controller;
class About extends MY_Controller{
	function __construct(){
		$this->module=trim(strtolower(__CLASS__));
	}
	public function index(){
		// handle data
		$data =[];
		//load header
		$header = [];
		$header['title']= 'Về chúng tôi';
		$header['content']='About';
		$this->loadHeader($header);
		//load menu
		$this->loadMenu();
		//load content
		$this->loadView('application/view/about/index_view.php',$data);
		//load sidebar
		$this->loadSidebar();
		// load footer
		$this->loadFooter();

	}
}
$m = $_GET['m'] ??'index';
$about = new About();
$about->$m();





 ?>