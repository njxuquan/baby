<?php
	$secret = 'github';
	$headers = array();
	if (!function_exists('getallheaders')) {
		foreach ($_SERVER as $name => $value) {
			if (substr($name, 0, 5) == 'HTTP_') {
				$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
			}
		}
	} else {
		headers = getallheaders();
	}
	//github发送过来的签名
	$hubSignature = $headers['X-Hub-Signature'];
	list($algo, $hash) = explode('=', $hubSignature, 2);

	// 获取body内容
	$payload = file_get_contents('php://input');

	// 计算签名
	$payloadHash = hash_hmac($algo, $payload, $secret);

	// 判断签名是否匹配
	if ($hash === $payloadHash) {
		   //调用shell
		//echo exec("/data/Git.sh");
		echo json_encode(array($payloadHash, $hubSignature));
	}
?>