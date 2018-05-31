<?php
/*
节点的删除与修改
*/
$dom = new DOMDocument("1.0", 'utf-8');
$dom->load('08.xml');

// 删除操作

// 第一种方法：删除第一个goods节点
// $book = $dom->getElementsByTagName('goods')->item(0);
// $appstore = $dom->getElementsByTagName('appstore')->item(0);
// $oldbook = $appstore->removeChild($book);

// 第二种方法：删除第一个goods节点
// $books = $dom->documentElement;
// $book = $books->getElementsByTagName('goods')->item(0);
// $oldbook = $books->removeChild($book);

// 第三种方法：删除第一个goods节点
$tl = $dom->getElementsByTagName('goods')->item(0);
$oldbook = $tl->parentNode->removeChild($tl);

// 修改操作（其实节点不能删，只能替）
$book = $dom->getElementsByTagName('name')->item(0);

$name = $dom->createTextNode('神雕侠侣');
// $newbook = $dom->createElement('name');
// $newbook->appendChild($name);

$book->replaceChild($name, $book->firstChild);


$intro = $dom->getElementsByTagName('intro')->item(0);

$cdata = $dom->createCDATASection('我喜欢杨过和小龙女');
// $newintro = $dom->createElement('intro');
// $newintro->appendChild($cdata);

$intro->replaceChild($cdata, $intro->firstChild); 

// 输出xml
header('content-type:text/xml');
echo $dom->saveXML();