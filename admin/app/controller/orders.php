<?php 
namespace App\Controller;
require 'app/core/MY_Controller.php';
require 'app/model/product_model.php';
use App\Model\Product_Model;
use App\Core\MY_Controller;
class Orders extends MY_Controller{
	private $pdModel;
	function __construct(){
		parent::__construct();
		$this->pdModel = new Product_Model();
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}
	public function index(){
		$data=[];
		$data['lstOrder'] = $this->pdModel->getAllDataOrderCustomer();
		$header=[];
		$header['title']="This is Authors";
		$header['content']="CoNan";

		$this->loadHeader($header);
		$this->loadSidebar();
		$this->loadView('app/view/orders/index_view.php',$data);
		$this->loadFooter();
	}
	public function handle(){
		// lay du lieu guwi len
		$status = $_POST['status']??'';
		$idOrder = $_POST['idOrder'] ?? '';
		// validate
		$status=  ($status==1 ||$status ==-1) ? $status :'';
		$idOrder = (is_numeric($idOrder)&& $idOrder>0) ? $idOrder : '';
		//
		// xu ly
		if (empty($status)OR empty($idOrder)) {
			echo 'ERR';
		}else{
			$dataUpdate=[
				'status'=>$status
			];
			$up = $this->pdModel->updateStatusOrder('orders',$dataUpdate,$idOrder);
			if ($up) {
				echo 'OK';
			}else{
				echo 'FALSE';
			}
		}
	}
}

$orders = new Orders();
$method = $_GET['m']?? 'index';
$orders->$method();
  ?>