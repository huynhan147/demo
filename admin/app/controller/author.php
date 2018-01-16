<?php 
namespace App\Controller;
require 'app/core/MY_Controller.php';
require 'app/model/author_model.php';
use App\Core\MY_Controller;
use App\Model\Author_Model;

class Author extends MY_Controller{
	private $pdModel;
	function __construct(){
		parent::__construct();
		$this->pdModel=  new Author_Model();
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}
	public function index(){
		$data=[];
		$keyword = $_GET['s'] ?? '';
		$header=[];
		$header['title']="This is Authors";
		$header['content']="CoNan";
		$data['author'] = $this->pdModel->getAllDataAuthorByKeyword($keyword);
		$data['keyword'] = $keyword;
		$this->loadHeader($header);
		$this->loadSidebar();
		$this->loadView('app/view/author/index_view.php',$data);
		$this->loadFooter();
	}
	public function add(){
		$data=[];
		if (isset($_GET['sate'])&&$_GET['sate']==='err') {
			$data['errAdd']= $_SESSION['errAdd'] ?? [];
		}
		$header=[];
		$header['title']="This is Authors";
		$header['content']="CoNan";
		$this->loadHeader($header);
		$this->loadSidebar();
		$this->loadView('app/view/author/add_view.php',$data);
		$this->loadFooter();
	}
	public function addAuthor(){
		if (isset($_POST['btnsubmit'])) {
			$nameau = $_POST['nameauthor']??'';
			$phone = $_POST['phoneauthor']?? '';
			$address = $_POST['addressauthor']??'';
			$note = $_POST['noteauthor']??'';
			$filename = null;
			if (isset($_FILES['avatarauthor'])) {
				$filename = myUploadDataAuthor($_FILES);
				
			}
			$checkadd = myValidateAddAuthor($nameau,$phone,$address,$note,$filename);
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
				$dataAuthor= array(
					'name' => $nameau,
					'phone' => $phone,
					'address' => $address,
					'note' => $note,
					'avatar' => $filename,
					'create_time' =>date('Y-m-d H:i:s'),
					'update_time'=>null


				);
				$add= $this->pdModel->addDataAuthor($dataAuthor,'authors');
				if ($add) {
					header('Location:?c=author&m=add&sate=success');
				}else {
					header('Location:?c=author&m=add&sate=fail');
				}

			}else{
				$_SESSION['errAdd'] = $checkadd;
				header('Location:?c=author&m=add&sate=err');
			}
		}
	}
}

$author = new Author();
$method = $_GET['m']?? 'index';
$author->$method();
  ?>