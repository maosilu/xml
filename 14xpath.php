<?php
/**
XPATH如何不考虑路径的层次，来查询某个节点

比如 13.php 严格层次查询 /bookstore/book/title
如果查询 /bookstore/shu 的呢
*/
$xml = new DOMDocument('1.0', 'utf-8');
$xml->load('./10simxml.xml');

$xpath = new DOMXPATH($xml);

/*$sql = '/bookstore/book[last()]/title';
$rs = $xpath->query($sql);
echo $rs->item(0)->nodeValue; // 只能查到book节点的title*/

// 思考：如何查询所有的title，不考虑层次关系？
/*
/a/b，这说明a，b就是父子关系，而如果用 /a//b，这说明a只是b的祖先就行，忽略了层次
*/
// 不分层次查出所有title
/*$sql = '//title[last()]';
echo "<hr/>";
foreach($xpath->query($sql) as $v){
	echo $v->nodeValue."<br/>";
}*/