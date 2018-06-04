<?php
/**
array to xml
*/

/* 
一维数组转xml
*/
/*$arr = array(
	'name' => 'Jhon',
	'age' => 29
);

function arr2xml($arr){
	$xml = <<<EOT
<?xml version="1.0" encoding="utf-8" ?>
<root></root>
EOT;
	$arrxml = new SimpleXMLElement($xml);
	foreach($arr as $k => $v){
		// $root = $arrxml->getName();
		$arrxml->addChild($k, $v);
	}
	return $arrxml->asXml();
}

header('Content-type:text/xml');
echo arr2xml($arr);*/

/*
多维数组转xml
*/
$arr = array(
	'name' => 'Jhon',
	'age' => 29,
	'job' => array(
		'title' => 'Manager',
		'salary' => 9000,
		'team' => array('hh', 'gg', 'yy'),
	),
);

function arr2xml(Array $arr){
	$xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8" ?><root></root>');
	foreach($arr as $k => $v){
		if(is_array($v)){
			$xml->addChild($k);
			arr2xml($v);
		}else{
			$xml->addChild($k, $v);
		}
	}
	return $xml->asXML();
}
header('Content-type:text/xml');
echo arr2xml($arr);