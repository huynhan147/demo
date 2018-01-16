<?php 
namespace App\Controller\Home;
require 'application/core/MY_Controller.php';
require 'application/model/home_model.php';
//nhung thu vien phpmailer
require 'application/libs/PHPMailer/src/PHPMailer.php';
require 'application/libs/PHPMailer/src/Exception.php';
require 'application/libs/PHPMailer/src/SMTP.php';
//vi thu vien dang dc namespace nen  can use de su dung thu vien
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Application\Core\MY_Controller;
use Application\Model\Home_model;
class Cart extends MY_Controller{
	private $_homeModel;
	function __construct(){
		$this->module = trim(strtolower(__CLASS__));
		$this->_homeModel = new Home_model();
	}
	public function add(){
		$idPd = $_GET['id'] ?? '';
		$idPd = (is_numeric($idPd)&& $idPd>0) ? $idPd : 0;
		// lay thong tin chi tiet cua san pham
		$infoBook = $this->_homeModel->getDataBookID($idPd);
		if (!empty($infoBook)) {
			$qty =$_POST['qty'] ?? 1;
			// kiem tra xem da ton tai gio hang hay chua
			if (isset($_SESSION['cart'])) {
				// tu lan thu 2 tro di
				// kiem tra ton tai hay chua neu da ton tai thi chi update so luong neu khong toi them moi vao gio hang
				if (isset($_SESSION['cart'][$idPd]['id'])&&$_SESSION['cart'][$idPd]['id']=$idPd) {
					$_SESSION['cart'][$idPd]['qty']+=$qty;
				}else{
				$_SESSION['cart'][$idPd]['id']=$infoBook['id'];
				$_SESSION['cart'][$idPd]['name_book']= $infoBook['name_book'];
				$_SESSION['cart'][$idPd]['images'] = $infoBook['images'];
				$_SESSION['cart'][$idPd]['price']= $infoBook['price'];
				$_SESSION['cart'][$idPd]['qty']=$qty;	
				}
			}else {
				//lan dau nguoi dung mua san pham
				// khoi tao gio hang
				$_SESSION['cart'][$idPd]['id']=$infoBook['id'];
				$_SESSION['cart'][$idPd]['name_book']= $infoBook['name_book'];
				$_SESSION['cart'][$idPd]['images'] = $infoBook['images'];
				$_SESSION['cart'][$idPd]['price']= $infoBook['price'];
				$_SESSION['cart'][$idPd]['qty']=$qty;
			}
					//quay ra trang show cart
		header('Location:?c=cart&m=index');

		}else{
			header('Location:?c=home');
		}
	}
	public function index(){
		$data = [];
		$data['cart'] = $_SESSION['cart'] ??[];
		// load header
		$header = [];
		$header['title'] = "This is cart";
		$header['content'] = "This cc";
		$this->loadHeader($header);
		// load content view
		$this->loadView('application/view/cart/index_view.php',$data);
		//load footer
		$this->loadFooter();
	}
	public function delete(){
		if (isset($_SESSION['cart'])) {
			unset($_SESSION['cart']);
		}
		header('Location:?c=cart&m=index');
	}
	function remove(){
		$id = $_GET['id'] ??'';
		$id = (is_numeric($id)&&$id>0) ? $id : 0;
		if (isset($_SESSION['cart'][$id])) {
			unset($_SESSION['cart'][$id]);
		}
		header('Location:?c=cart&m=index');
	}
	function update(){

		if (isset($_POST['btnsubmit'])) {

			$qtyPd = $_POST['txtQty'] ??[];
			foreach ($qtyPd as $key=>$val) {
				// kiem tra xem san pham nguoi dung muon up date co nam trong gio hang hay khong 
				if (isset($_SESSION['cart'][$key])&&$val<10&&$val>0) {
					$_SESSION['cart'][$key]['qty'] = $val;
				}
				// if (isset($qtyPd[$key])) {
				// 	$_SESSION['cart'][$key]['qty'] = 
				// }
			}
			header('Location:?c=cart&m=index');
		}
	}
	public function order(){
		if (isset($_POST['bnSubmit'])) {
			//lay cac thong tin ma nguoi dung nhap vao form
			$fullname = $_POST['txtHoTen'] ?? '';
			$fullname = strip_tags($fullname);
			$phone = $_POST['txtSoDienThoai'] ?? '';
			$email = $_POST['txtEmail'] ?? '';
			$address = $_POST['txtDiaChi'] ?? '';
			$note = $_POST['txtGhiChu'] ?? '';
			// validate
			$phone= is_numeric($phone)? $phone : '';
			$email =strip_tags($email);
			$address =strip_tags($address);
			// rang buoc du lieu va sendmail 
			//
	


			//
			// tien hanh insert du lieu vao database
			if (isset($_SESSION['cart'])&&!empty($_SESSION['cart'])) {
				$checkInsertFlag = FALSE;
				foreach ($_SESSION['cart'] as $key=>$val) {
					$name = $val['name_book'];
					$gia=($val['qty']*$val['price']);
					$sl=$val['qty'];
					$image =$val['images'];
					$dataInsert = array(
						'book_id'=>$val['id'],
						'nameCustomer'=>$fullname,
						'phoneCustomer'=>$phone,
						'emailCustomer'=>$email,
						'addressCustomer'=>$address,
						'noteCustomer'=>$note,
						'status'=>0,//waiting....
						'money'=>($val['qty']*$val['price']),
						'qtyproduct'=>$val['qty'],
						'create_time'=> date('Y-m-d H:i:s'),
						'update_time'=>null


					);
					$insert=TRUE;
					 $insert = $this->_homeModel->insertOrderCustomer('orders',$dataInsert);
					if ($insert) {
						$checkInsertFlag = TRUE;
						//gui mail  
					$mail = new PHPMailer(true);
					$mail->CharSet = 'UTF-8';
					$content = "Chào <h2>".$fullname."</h2>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn là : <strong>".$name."</strong>. Số lượng : ".$sl.". Tiền thanh toán : <strong>".number_format($gia)." vnđ</strong>. Địa chỉ là <address>".$address."</address>. Chúng tôi sẽ liên hệ cho bạn thời gian sớm nhất và cập nhật thời gian giao hàng";
					$mail->addAttachment(IMG_PATH_UPLOAD.$image);
					$subject ="Cửa hàng sách BOOK SHOPPE";
					$mail->isSMTP();
					$mail->Host = 'smtp.googlemail.com';
					$mail->SMTPAuth = true;
					$mail->Username = 'trieuntgvt3h@gmail.com';                 
				    $mail->Password = 'trieunt123';                           
				    $mail->SMTPSecure = 'tsl';                           
				    $mail->Port = 587;
				          $mail->SMTPOptions = array(
				            'ssl' => array(
				            'verify_peer' => false,
				            'verify_peer_name' => false,
				            'allow_self_signed' => true
				            )
				            );
				    // sang phan gui mail
    				$mail->setFrom('trieuntgvt3h@gmail.com', 'Cửa hàng BOOK SHOPPE');
    				$mail->addAddress($email);
    				$mail->isHTML(true);                                  // Set email format to HTML
   					$mail->Subject = $subject;
    				$mail->Body    = $content;
					//xoa bo gio hang
					// unset($_SESSION['cart']);
					if($mail->send()){
				
    					header('location:?c=cart&m=index&state=success');
    						}else{
    					header('location:?c=cart&m=index&state=err');
    					}				
					
					}



				}
				if ($checkInsertFlag) {
						unset($_SESSION['cart']);
						header('location:?c=cart&m=index&state=success');

						}else{
					header('location:?c=cart&m=index&state=err');
				}
				
			
			}
		}
	}

}

$m = $_GET['m'] ??'index';
$cart = new Cart();
$cart->$m();

 ?>