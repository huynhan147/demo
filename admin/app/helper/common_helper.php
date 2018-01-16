<?php 
function myUploadData($file=null){
	if ($file['slcImage']['error']==0) {
		$filename=$file['slcImage']['name'];
		$tmpname=$file['slcImage']['tmp_name'];
		if ($tmpname !=='') {
			if (move_uploaded_file($tmpname,PATH_UPLOAD_IMG.$filename)) {
				return $filename;
			}
		}
	}
	return;


}
function myValidateAddBook($namebook,$author,$publisher,$category,$detail,$price,$page,$quanity,$filename){
	$error = [];
	$error['namebook']= (!empty($namebook))? '':'ENTER NAMEBOOK';
	$error['author'] = (is_numeric($author)&&$author>0) ? '' : 'ENTER Name Author';
	$error['publisher'] = (is_numeric($publisher)&&$publisher>0) ? '' : 'ENTER Name Publisher';
	$error['category']= (is_numeric($category)&&$category>0) ? '' : 'ENTER Name Category';
	$error['detail']= (!empty($detail))? '':'ENTER DETAIL';
	$error['price']= (is_numeric($price)&&$price>0)? '':'ENTER PRICE';
	$error['page']=(is_numeric($page)&&$page>0)? '': 'ENTER PAGE';
	$error['quanity']=(is_numeric($quanity)&&$quanity>0)? '': 'ENTER Quanity';
	$error['filename']=($filename=='') ?'ENTER IMAGE BOOK' : '';


	return $error;
}
function create_link($data){
	$stringUri ='';
	$uri ='';
	foreach ($data as $key=>$val) {
		$uri.="&{$key}={$val}";
	}
	$stringUri = BASE_URL."?".(!empty($uri) ? ltrim($uri,"&") : '');
	return $stringUri;
}
function panigation($totalRecord,$currentPage,$rowLimit,$keyword,$links){
	// di xac dinh lai currentpage
	// can tinh duoc totalpage
	$totalPage =ceil($totalRecord/$rowLimit);
	if ($currentPage<=0) {
		$currentPage =1;
	}elseif ($currentPage>$totalPage) {
		$currentPage = $totalPage;
	}
	// can tinh start
	$start = ($currentPage - 1) * $rowLimit;
	$html ='';
	$html.= "<nav aria-label='Page navigation'>";
	$html.="<ul class='pagination'>";
	//xu ly cho preview page
	if ($currentPage>1&&$currentPage <= $totalPage) {
		$html.="<li><a href='".str_replace('{page}',($currentPage-1),$links)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";

	}
	// het xu ly
	// xu ly cho cac trang con lai
	for($i = 1; $i<=$totalPage;$i++){
		// kiem tra xem nguoi dung dang dung o dung trang hien tai hay khong neu dung toi active hieu ung cho nguoi dung biet 
		if ($i ==$currentPage) {
			$html .="<li class='active'><a>".$currentPage."<span class='sr-only'></span></a></li>";
		}else{
			$html .="<li><a href='".str_replace('{page}',$i,$links)."'>".$i."</a></li>";
		}
	}
	// xu ly cho nut nextpage
	if ($currentPage<$totalPage&&$currentPage>=1) {
		$html.=" <li><a href='".str_replace('{page}',($currentPage+1),$links)."' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
	}
	//het

	$html.="</ul>";
	$html.="</nav>";
	return array(
		'page'=>$currentPage,
		'start'=>$start,
		'limit'=>$rowLimit,
		'paginationHtml'=>$html,
		'keyword'=>$keyword
	);
}










////////////////////////////---------------------Publisher----------------------////////////////////////////
function myUploadDataPublisher($file=null){
	if ($file['logopublisher']['error']==0) {
		$filename=$file['logopublisher']['name'];
		$tmpname=$file['logopublisher']['tmp_name'];
		if ($tmpname !=='') {
			if (move_uploaded_file($tmpname,PATH_UPLOAD_IMG_PUBLISHER.$filename)) {
				return $filename;
			}
		}
	}
	return;


}
function myValidateAddPublisher($namepublisher,$phone,$address,$note,$filename){
	$error = [];
	$error['namepublisher']= (!empty($namepublisher))? '':'ENTER Publisher';
	$error['phone']= (!empty($phone))? '':'ENTER phone';
	$error['address']= (!empty($address))? '':'ENTER address';
	$error['note']= (!empty($note))? '':'ENTER note';
	$error['filename']=($filename=='') ?'ENTER Logo Publisher' : '';


	return $error;
}




/////////////////////-----------------------AUthor------------------//////////////////////
function myUploadDataAuthor($file=null){
	if ($file['avatarauthor']['error']==0) {
		$filename=$file['avatarauthor']['name'];
		$tmpname=$file['avatarauthor']['tmp_name'];
		if ($tmpname !=='') {
			if (move_uploaded_file($tmpname,PATH_UPLOAD_IMG_AUTHOR.$filename)) {
				return $filename;
			}
		}
	}
	return;


}
function myValidateAddAuthor($nameauthor,$phone,$address,$note,$filename){
	$error = [];
	$error['nameauthor']= (!empty($nameauthor))? '':'ENTER Author';
	$error['phone']= (!empty($phone))? '':'ENTER phone';
	$error['address']= (!empty($address))? '':'ENTER address';
	$error['note']= (!empty($note))? '':'ENTER note';
	$error['filename']=($filename=='') ?'ENTER Avatar Author' : '';
	return $error;
}

 ?>