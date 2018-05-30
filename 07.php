<?php
// 创建 DOM对象
$dom = new DOMDocument('1.0', 'utf-8');

// 1. 创建文本节点
$t1 = $dom->createTextNode('天龙八部');
// 2. 创建普通节点
$name = $dom->createElement('name');
// 3. 把天龙加到 name 节点中
$name->appendChild($t1);

// 4. 创建 CDATA节点
$cdata = $dom->createCDATASection('天龙八部是本好书');
// 5. 创建普通节点 intro
$intro = $dom->createElement('intro');
// 6. 把CDATA节点 添加到 intro 节点中
$intro->appendChild($cdata);

// 7. 创建 普通节点goods
$goods = $dom->createElement('goods');
$goods->appendChild($name);
$goods->appendChild($intro);

// 8. 创建属性节点 goods_id
$attr = $dom->createAttribute('goods_id');
$attr->value = 'joo1';

// 9. 把属性节点加入到 goods 下
$goods->appendChild($attr);

// 10. 创建appstore节点
$appstore = $dom->createElement('appstore');
$appstore->appendChild($goods);

// 11. 把 appstore 加到文档下面
$dom->appendChild($appstore);

// 12. 输出
// header('content-type:text/xml');
// echo $dom->saveXML();

// 13. 保存
echo $dom->save('07.xml') ? 'OK' : 'Fail';
