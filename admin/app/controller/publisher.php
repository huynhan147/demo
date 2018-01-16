<?php 
namespace App\Controller;
require 'app/core/MY_Controller.php';
require 'app/model/publisher_model.php';
use App\Core\MY_Controller;
use App\Model\Publisher_Model;
class Publisher extends MY_Controller{
	private $pdModel;
	function __construct(){
		parent::__construct();
		$this->pdModel = new Publisher_Model();
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}

	public function index(){
		$data =[];
		$keyword = $_GET['s'] ?? '';
		$header=[];
		$header['title']="This is Publisher";
		$header['content']="Kim DOng";
		$data =[];
		$data['publisher'] = $this->pdModel->getAllDataPublisherByKeyword($keyword);
		$data['keyword'] = $keyword;
		$this->loadHeader($header);
		$this->loadSidebar();
		$this->loadView('app/view/publisher/index_view.php',$data);
		$this->loadFooter();



	}
	public function add(){
		$data = [];
		if (isset($_GET['sate'])&&$_GET['sate']==='err') {
			$data['errAdd']= $_SESSION['errAdd'] ?? [];
		}
		$header=[];
		$header['title']="This is Add Publisher";
		$header['content']="publisher";
		$this->loadHeader($header);
		//load sidebar
		$this->loadSidebar();
		//load content view
		$this->loadView('app/view/publisher/add_view.php',$data);
		//load footer
		$this->loadFooter();
	}
	public function addPublisher(){
		if (isset($_POST['btnsubmit'])) {
			$namepub = $_POST['namepublisher']??'';
			$phone = $_POST['phonepublisher']?? '';
			$address = $_POST['addresspublisher']??'';
			$note = $_POST['notepublisher']??'';
			$filename = null;
			if (isset($_FILES['logopublisher'])) {
				$filename = myUploadDataPublisher($_FILES);
				
			}
			$checkadd = myValidateAddPublisher($namepub,$phone,$address,$note,$filename);
			$flag = TRUE;
			foreach ($checkadd as $val) {
				if (!empty($val)) {
					$flag =FALSE;
					break;
				}
			}
			if ($flag) {
				if (isset($_SESSION['errAdd'])) {
					unset($_SESSION['errAdd']);
				}
				$dataPublisher= array(
					'name' => $namepub,
					'phone' => $phone,
					'address' => $address,
					'note' => $note,
					'logo' => $filename,
					'create_time' =>date('Y-m-d H:i:s'),
					'update_time'=>null


				);
				$add= $this->pdModel->addDataPublisher($dataPublisher,'publishers');
				if ($add) {
					header('Location:?c=publisher&m=add&sate=success');
				}else {
					header('Location:?c=publisher&m=add&sate=fail');
				}

			}else{
				$_SESSION['errAdd'] = $checkadd;
				header('Location:?c=publisher&m=add&sate=err');
			}
		}
	}
}
$publisher = new Publisher();
$method = $_GET['m']?? 'index';
$publisher->$method();

 ?>