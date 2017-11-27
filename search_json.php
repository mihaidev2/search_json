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
		if (
			preg_match("/$searchData/i", $obj->pname)
		    ||
			preg_match("/$searchData/i", $obj->pdesc)
			||
			preg_match("/$searchData/i", $obj->auction)) 
		{
			$arrResult[] = $obj;
		}
	}

	// read the founded results and display them in html format
	foreach ($arrResult as $key => $obj) {
		$arrResult[$key] = '<div><b>id</b></div>';
	}

	
	echo implode('<br/>', $arrResult);

} else {
	echo 'Add an word or expression.';
}