<?php
error_reporting(E_ALL & ~E_NOTICE);
if($_POST['youku']){
	$id = basename(pathinfo($_POST['youku'])['dirname']); // 视频信息_id
}
/* 这是优酷视频云平台----获取视频信息的部分 */
// $client_id = '059c59fa1ec6ef92';
// $api = 'https://api.youku.com/videos/show.json?client_id='.$client_id.'&video_id='.$id.'&ext=show';

/* 这是优酷开放平台----云点播获取视频信息的部分 */
/*$time = time();
$secret = 'fac2e00aff4a13d392ca607f7801c790';
$client_id = '059c59fa1ec6ef92';

$arr = array('action'=>'youku.api.vod.getbyid.videoinfo', 'client_id'=>$client_id, 'timestamp'=>$time, 'version'=>'3.0', '_id'=>$id);
ksort($arr);
$str = '';
foreach($arr as $k => $v){
	$str .= $k.$v;
}
$str = urlencode($str);
$sign = md5($str.$secret);

$json = '{"format":"xml",
 "action":"youku.api.vod.getbyid.videoinfo","client_id":'.$client_id.',"sign":
'.$sign.',"version":"3.0","timestamp":'.$time.'}';

$api = 'https://openapi.youku.com/router/rest.json?_id='.$id.'&opensysparams='.$json;*/

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// 设置HTTPS支持
date_default_timezone_set('PRC');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查，从证书中检查SSL加密算法是否存在
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);

$res = curl_exec($ch);
curl_close($ch);
$res = json_decode($res);
var_dump($res);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>获取优酷单条视频详细信息</title>
</head>
<body>
	<pre>视频原地址：http://player.youku.com/player.php/sid/XMzE3MzI3ODg=/v.swf</pre>
	<form action="./04.php" method="post">
		<p>优酷视频：<input type="text" name="youku"></p>
		<p><input type="submit" name="" value="获取无广告地址"></p>
	</form>
	<p>无广告地址：</p>
</body>
</html>