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
$sql = '/bookstore/book/title'; // 路径表达式
$rs = $xpath->query($sql);
print_r($rs);
echo "<hr/>";
echo $rs->item(1)->nodeValue;

