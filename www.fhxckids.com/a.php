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
		$headers = getallheaders();
	}

	$hubSignature = $headers['X-Hub-Signature'];
	list($algo, $hash) = explode('=', $hubSignature, 2);
	$payload = file_get_contents('php://input');
	$payloadHash = hash_hmac($algo, $payload, $secret);

	if ($hash === $payloadHash) {
		echo exec("/data/Git.sh");
	} else {
		echo "hash error";
	}
?>