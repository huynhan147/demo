<?php 
namespace App\Controller\Home;
require 'application/core/MY_Controller.php';
require 'application/model/home_model.php';
use Application\Core\MY_Controller;
use Application\Model\Home_model;
class Home extends MY_Controller{
	private $_homeModel;
	function __construct(){
		
		$this->module=trim(strtolower(__CLASS__));
		$this->_homeModel = new Home_Model();
	}
	public function index(){
		//hendle data

		// $data=[];
			// load data and handle data
		$data =[];
		$keyword = $_GET['s'] ?? '';
		$page = $_GET['page']?? '';
		$page = (is_numeric($page)&& $page>0) ? $page : 1;
		$dataLink = [
			'c'=>'home',
			'm'=>'index',
			'page'=>'{page}',
			's'=>$keyword
		];
		$links = create_link($dataLink);
		// echo $links; die;

		$books= $this->_homeModel->getAllDataBookByKeyword($keyword);
	
			// bat dau su dung ham phan trang
		$panigate = panigation(count($books),$page,ROW_LIMIT,$keyword,$links);
		// echo '<pre>';
		// print_r($panigate);
		// die;
		
		$data['books'] = $this->_homeModel->getAllDataBookByPage($panigate['keyword'],$panigate['start'],$panigate['limit']);
		$data['panigation']=$panigate['paginationHtml'];
		$data['keyword']=$keyword;
				// $data['allDatabook']=$this->_homeModel->getAllDataBook();
		//load header
		$header = [];
		$header['title']= 'Chào mừng bạn đến với cửa hàng sách BOOK SHOPPE';
		$header['content']='BookShop';
		$this->loadHeader($header);
		//load menu
		$this->loadMenu();
		//load content
		$this->loadView('application/view/home/index_view.php',$data);
		//load sidebar
		$this->loadSidebar();
		// load footer
		$this->loadFooter();

	}
	public function __call($params,$method){
		echo 'NOT FOUND REQUEST';

	}
}
$m = $_GET['m'] ??'index';
$home = new Home();
$home->$m();


 ?>