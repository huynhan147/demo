<?php 
function create_link($data){
	$stringUri = '';
	$uri = '';
	foreach ($data as $key=>$value) {
		$uri.="&{$key}={$value}";
	}
	$stringUri =BASE_URL."?".(!empty($uri)? ltrim($uri,"&"): '');
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


 ?>