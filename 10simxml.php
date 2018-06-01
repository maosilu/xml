<?php
/**
用 SimpleXML 快速解析XML文档
*/
// 从文件载入xml文档
$simxml = simplexml_load_file('./10simxml.xml');
// var_dump($simxml);
// echo $simxml->book[2]->title;

// 查看有几本书
echo '有 '.$simxml->count().' 个子元素。'."<br/>";

$sons = $simxml->children();
foreach($sons as $son){
	echo '元素名称是 '.$son->getName().'，有 '.$son->count().' 个子元素'."<br/>";
}
