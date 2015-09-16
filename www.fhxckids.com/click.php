<?php
	include_once 'config.php';

	$pageid = $_GET['pageid'];
	$cmsid = $_GET['cmsid'];
	$sort = $_GET['sort'];
	$cmspositionid = $_GET['cmspositionid'];
	$f = $_GET['f'];
	$h = $_GET['h'];
	$clientip = $_SERVER["REMOTE_ADDR"];

	$hash = MD5($cmsid . $cmspositionid . $f);
	if ($hash == $h) {
		$strsql = " insert into clicklog(pageid,cmspositionid,sort,cmsid,`status`,clientip,addtime,`source`) values('".$pageid."','".$cmspositionid."','".$sort."','".$cmsid."',1,'".$clientip."',now(),'".$f."'); ";
		//var_dump($strsql);
		$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
		$db_selected = mysql_select_db($mysql_database, $conn);
		$result = mysql_query($strsql, $conn);
		return 'ok';
	} else {
		return 'error.';
	}
?>