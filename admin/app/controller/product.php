<?php 
namespace  App\Controller;
require 'app/core/MY_Controller.php';
require 'app/model/product_model.php';
use App\Model\Product_Model;
use App\Core\MY_Controller;
class Product extends MY_Controller{
	private $pdModel;
	function __construct(){
		parent::__construct();
		$this->pdModel = new Product_Model();
	}
	function __call($r,$q){
		echo 'NOT FOUND PAGE';
	}
	public function index(){
		// load data and handle data
		$data =[];
		$keyword = $_GET['s'] ?? '';
		$page = $_GET['page']?? '';
		$page = (is_numeric($page)&& $page>0) ? $page : 1;
		$dataLink = [
			'c'=>'product',
			'm'=>'index',
			'page'=>'{page}',
			's'=>$keyword
		];
		$links = create_link($dataLink);
		// echo $links; die;

		$books= $this->pdModel->getAllDataBookByKeyword($keyword);
	
			// bat dau su dung ham phan trang
		$panigate = panigation(count($books),$page,ROW_LIMIT,$keyword,$links);
		// echo '<pre>';
		// print_r($panigate);
		// die;
		//
		$data['books'] = $this->pdModel->getAllDataBookByPage($panigate['keyword'],$panigate['start'],$panigate['limit']);
		$data['panigation']=$panigate['paginationHtml'];

		// echo '<pre>';
		// print_r($data['books']);
		// die;
		$data['keyword'] = $keyword;

		// load header
		$header=[];
		$header['title']="This is Product";
		$header['content']="CoNan";
		$this->loadHeader($header);
		//load sidebar
		$this->loadSidebar();
		//load content view
		$this->loadView('app/view/product/index_view.php',$data);
		//load footer
		$this->loadFooter();
	}
	public function add(){
		// load data and handle data
		$data =[];
		if (isset($_GET['sate'])&&$_GET['sate']==='err') {
			$data['errAdd']= $_SESSION['errAdd'] ?? [];
		}
		
		// lay toan bo du lieu
		$data['author'] = $this->pdModel->getAllDataAuthor('authors');
		$data['publisher'] = $this->pdModel->getAllDataPublisher('publishers');
		$data['category'] = $this->pdModel->getAllDataCategory('categorys');
		// echo '<pre>';
		// print_r($data['author']);
		// die;

		// load header

		$header=[];
		$header['title']="This is Add Product";
		$header['content']="CoNan";
		$this->loadHeader($header);
		//load sidebar
		$this->loadSidebar();
		//load content view
		$this->loadView('app/view/product/add_view.php',$data);
		//load footer
		$this->loadFooter();
	}
	public function handleadd(){
		if (isset($_POST['btnsubmit'])) {
			$namebook=$_POST['namebook']??'';
			$author =$_POST['slcAuthor']??'';
			$publisher=$_POST['slcPublisher']??'';
			$category =$_POST['slcCategory']??'';
			$detail = $_POST['slcSescription']?? '';
			$price = $_POST['slcPrice']?? '';
			$quanity =$_POST['slcQuanity']??'';
			$page = $_POST['slcPagebook']??'';
			$filename=null;
			if (isset($_FILES['slcImage'])) {
				$filename = myUploadData($_FILES);
				
			}
			$checkAdd= myValidateAddBook($namebook,$author,$publisher,$category,$detail,$price,$page,$quanity,$filename);
			$flag = TRUE;
			foreach ($checkAdd as $val) {
				if (!empty($val)) {
					$flag =FALSE;
					break;
				}
			}
			if ($flag) {
				if (isset($_SESSION['errAdd'])) {
					unset($_SESSION['errAdd']);
				}
				$dataBook= array(
					'name_book' => $namebook,
					'id_author' => $author,
					'id_publisher' => $publisher,
					'id_cat' => $category,
					'description' => $detail,
					'price' => $price,
					'quanity' => $quanity,
					'images' => $filename,
					'page' => $page,
					'view' =>0,
					'lang' =>null,
					'create_time' =>date('Y-m-d H:i:s'),
					'update_time'=>null


				);
				$add= $this->pdModel->addDataBook($dataBook,'book');
				if ($add) {
					header('Location:?c=product&m=add&sate=success');
				}else {
					header('Location:?c=product&m=add&sate=fail');
				}

			}else{
				$_SESSION['errAdd'] = $checkAdd;
				header('Location:?c=product&m=add&sate=err');
			}


		}
	}

}
$product = new Product();
$method = $_GET['m']?? 'index';
$product->$method();

 ?>