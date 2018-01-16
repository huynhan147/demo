<?php
namespace Application\Controller;
require 'application/core/MY_Controller.php';
use Application\Core\MY_Controller;
class Discount extends MY_Controller{
		function __construct(){
		$this->module=trim(strtolower(__CLASS__));
	}
	public function index(){
		// handle data
		$data =[];
		//load header
		$header = [];
		$header['title']= 'Thông tin giảm giá';
		$header['content']='Discount';
		$this->loadHeader($header);
		//load menu
		$this->loadMenu();
		//load content
		$this->loadView('application/view/discount/index_view.php',$data);
		//load sidebar
		$this->loadSidebar();
		// load footer
		$this->loadFooter();

	}
}
$m = $_GET['m'] ??'index';
$discount = new Discount();
$discount->$m();





 ?>