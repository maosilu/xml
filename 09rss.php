<?php
/**
动态生成 rss订阅 中的channel 和 item
*/
class Feed{
	private $dom = null; 
	private $rss = null;

	public $title = ''; // channel 的 title
	public $link = ''; // channel 的 link
	public $description = ''; // channel 的 description
	public $template = './rss.xml'; // xml模板

	public function __construct(){
		$this->dom = new DOMDocument('1.0', 'utf-8');
		$this->dom->load($this->template);
		$this->rss = $this->dom->getElementsByTagName('rss')->item(0);
	}

	// 输出
	public function display(){
		$this->createChann();
		header("Content-type:text/xml");
		echo $this->dom->saveXML();
	}

	// 生成channel，用来创建RSS唯一且必须的channel节点
	protected function createChann(){
		$channel = $this->dom->createElement('channel');
		$channel->appendChild($this->createEle('title', $this->title));
		$channel->appendChild($this->createEle('link', $this->link));
		$channel->appendChild($this->createEle('description', $this->description));
		$channel->appendChild($this->createItem(array('title'=>'诺基亚', 'description'=>'好用')));

		$this->rss->appendChild($channel);
	}

	// 生成item, 
	protected function createItem($arr){
		$item = $this->dom->createElement('item');
		foreach($arr as $k => $v){
			$item->appendChild($this->createEle($k, $v));
		}
		return $item;
	}

	// 封装一个方法，直接创建如：<ele>some text</ele>这样的节点
	protected function createEle($name, $value){
		$name = $this->dom->createElement($name, $value);
		// $name = $this->dom->createElement($name);
		// $value = $this->dom->createTextNode($value);
		// $name->appendChild($value);
		return $name;
	}
}

$feed = new Feed();
$feed->title = '布尔商城';
$feed->link = 'http://localhost:8080/xml/rss.php';
$feed->description = '我喜欢';
$feed->display();
