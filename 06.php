<?php
// 创建 DOM解析对象 
$dom = new DOMDocument('1.0', 'utf-8');
$dom->load('./06.xml');
$titles = $dom->getElementsByTagName('title');
// var_dump($titles);
// foreach($titles as $title){
// 	echo $title->nodeValue."<br/>";
// }

// echo '我们得到了 '.$titles->length.' 个书名'."<br/>";
// echo '第一个节点是：'; var_dump($titles->item(0));
// echo '第一本书的名字是：'.$titles->item(0)->nodeValue;

//‘天龙八部’是一个文本节点，而且是<title></title>的子节点
$title0 = $titles->item(0);
// var_dump($title0->childNodes); // 打印结果又是一个列表对象

echo $title0->childNodes->length.' 个子节点'."<br/>";
$text = $title0->childNodes->item(0);
echo '<pre>';
print_r($text);
echo $text->wholeText;

echo "<hr/>";

echo $dom->getElementsByTagName('title')->item(1)->childNodes->item(0)->wholeText;
