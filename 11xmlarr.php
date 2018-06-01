<?php
/**
利用simplexml对象把xml文件转成数组
*/

$simxml = simplexml_load_file('./10simxml.xml');

// print_r($simxml);
// echo "<hr/>";
// // 类型强制转化，把对象转成数组
// print_r((array)$simxml);
// echo "<hr/>";

/*
类型强制转化还是不能把所有的对象类型转成数组类型
办法：写一个函数，递归把simpleXMLElement对象转成数组
思路：下巴最外层对象转成数组，再循环数组，某个单元只要还是对象，就继续调用自身来转换
*/
function toArr($xmlele){
	$arr = (array)$xmlele;
	foreach($arr as $k => $v){
		if($v instanceof SimpleXMLElement || is_array($v)){
			$arr[$k] = toArr($v);
		}
	}
	
	return $arr;
}

$arr = toArr($simxml);
print_r($arr);