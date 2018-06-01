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

