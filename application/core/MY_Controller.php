<?php 
namespace Application\Core;
class MY_Controller {
	protected $module;
	protected function loadHeader($header=[]){
		$title = $header['title'] ??'';
		$content = $header['content']??'';
		$tabHeader = $this->module;
		$arrTab = explode("\\",$tabHeader);
		$tabHeader = end($arrTab);
		$countCart = (isset($_SESSION['cart'])&&!empty($_SESSION['cart']))?count($_SESSION['cart']) : 0;
		require 'application/view/partials/header_view.php';

	}
	protected function loadMenu(){
		require 'application/view/partials/menu_view.php';
	}
	protected function loadView($pathView,$passData=[]){
		$data = $passData;
		require "{$pathView}";
	}
	protected function loadSidebar(){
		require 'application/view/partials/sidebar_view.php';
	}
	protected function loadFooter(){
		require 'application/view/partials/footer_view.php';
	}


}




 ?>