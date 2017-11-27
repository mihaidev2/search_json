<?php

$arrResult 	= array();

// read the data to be searched
$searchData	= trim($_GET['searchData']);

// read the content of json file, where to search
$jsonData 	= file_get_contents('data.json');


if ($searchData) {

	$jsonData = json_decode($jsonData);

	// parse the json content and search into each object properties, the $searchData
	foreach($jsonData as $obj) {
		if (preg_match("/$searchData/i", $obj->pname) || preg_match("/$searchData/i", $obj->pdesc) || preg_match("/$searchData/i", $obj->auction)) {
			$arrResult[] = $obj;
		}
	}

	// read the founded results and display them in html format
	foreach ($arrResult as $key => $obj) {
		$arrResult[$key] 
			= '<div class="box_obj" 
				onmouseover="$(this).css(\'background-color\',\'#FFF0BC\');"
				onmouseout="$(this).css(\'background-color\',\'#E0CDA9\');">
					<div class="first_area">
						<div class="first_area_first floatleft"><b>id</b> '.$obj->id.'</div>
						<div class="first_area_second floatleft">&nbsp;<b>aname</b> '.$obj->aname.'</div>
						<div class="first_area_third floatleft">&nbsp;<b>pname</b> '.$obj->pname.'</div>
					</div>
					<div class="second_area"><b>pdesc</b><br/>'.$obj->pdesc.'</div>
					<div class="third_area"><b>psdesc</b><br/>'.$obj->psdesc.'</div>
					<div class="fourth_area"><b>sku</b> '.$obj->sku.'</div>
					<div class="fifth_area"><b>url</b> '.$obj->url.'</div>
					<div class="sixth_area"><b>img</b><br/><img src="'.$obj->img.'" class="img" /></div>
					<div class="seventh_area"><b>img 80</b><br/><img src="'.$obj->img_80.'" class="img2"></b></div>
					<div class="eighth_area"><b>img 250</b><br/><img src="'.$obj->img_250.'" class="img2"></div>
					<div class="ninth_area">
						<div class="ninth_area_first floatleft"><b>lot nr</b> '.$obj->lot_nr.'</div>
						<div class="ninth_area_second floatleft">&nbsp;<b>lot emin</b> '.$obj->lot_emin.'</div>
						<div class="ninth_area_third floatleft">&nbsp;<b>lot emax</b> '.$obj->lot_emax.'</div>
						<div class="ninth_area_fourth floatleft">&nbsp;<b>lot est</b> '.$obj->lot_est.'</div>
					</div>
					<div class="tenth_area"><b>auction</b> '.$obj->auction.'</div>
			 	</div>';
	}

	
	echo implode('', $arrResult);

} else {
	echo 'Add an word or expression.';
}