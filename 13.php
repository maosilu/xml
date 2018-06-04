<?php
/**
XPATH，XQUERY，是专用来查询xml的查询器
查询xml非常快
*/

// 构造一个XPATH查询器
$xml = new DOMDocument('1.0', 'utf-8');
$xml->load('./10simxml.xml');

$xpath = new DOMXPATH($xml);

// /bookstore/book/title
/*$sql = '/bookstore/book/title'; // 路径表达式
$rs = $xpath->query($sql);
print_r($rs);
echo "<hr/>";
echo $rs->item(1)->nodeValue;*/

// 指定查第2本书的title
/*$sql = '/bookstore/book/title[2]'; // 错误！这样是查询book节点下面的第2个title节点，哪来的第2个title节点？所以错误
$rs = $xpath->query($sql);
print_r($rs); // 查出length=0*/

/*$sql = '/bookstore/book[2]/title';
$rs = $xpath->query($sql);
print_r($rs);
echo "<hr/>";
echo $rs->item(0)->nodeValue;*/

// 还支持位置判断
/*$sql = '/bookstore/book[price>30]/title';
$rs = $xpath->query($sql);
print_r($rs);
echo "<hr/>";
echo $rs->item(1)->nodeValue;*/

// 查询侠客行的价格
// /bookstore/下面的book，且 title=='侠客行' 的书的价格
/*$sql = '/bookstore/book[title="侠客行"]/price';
$rs = $xpath->query($sql);
print_r($rs);
echo "<hr/>";
echo $rs->item(0)->nodeValue;*/

// 




