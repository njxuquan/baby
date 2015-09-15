<?php
	$mysql_server_name = 'localhost';
	$mysql_username = 'root';
	$mysql_password = 'root';
	$mysql_database = 'baby';
	$conn = mysql_connect($mysql_server_name, $mysql_username, $mysql_password);
	$db_selected = mysql_select_db($mysql_database, $conn);
	
	$strsql = " SELECT id,title,content,tag,link,imgurl,cmspositionid,sort FROM cms where begindate <= now() and enddate > now() and pageid = 1 ";
	mysql_query("SET NAMES 'utf8'", $conn);
	$result = mysql_query($strsql, $conn);
	//var_dump($result);
	$arrData = array();
	while($row = mysql_fetch_array($result))
	{
		if (array_key_exists('_' . $row['cmspositionid'], $arrData)) {
			$arrData['_' . $row['cmspositionid']]['_' . $row['sort']] = array('cmspositionid' => $row['cmspositionid'], 'id' => $row['id'], 'title' => $row['title'], 'content' => $row['content'], 'tag' => $row['tag'], 'link' => $row['link'], 'imgurl' => $row['imgurl']);
		} else {
			$arrData['_' . $row['cmspositionid']] = array('_' . $row['sort'] => array('cmspositionid' => $row['cmspositionid'], 'id' => $row['id'], 'title' => $row['title'], 'content' => $row['content'], 'tag' => $row['tag'], 'link' => $row['link'], 'imgurl' => $row['imgurl']));
		}
	}
	mysql_close($conn);

	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	if (strpos($user_agent, 'MicroMessenger') === false) {
		include_once 'pc.php';
	} else {
		include_once 'wap.php';
	}
	
	function pcRender($data, $modId) {
	//var_dump($data);
		if (array_key_exists($modId, $data)) {
			$arrMod = $data[$modId];
			ksort($arrMod);
			//var_dump($arrMod);
			$ret = array();
			$from = 'pc';
			if ($modId == '_20' || $modId == '_21') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="1190" height="90"></a>';
				}
			} elseif ($modId == '_1') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="780" height="320"><p><span>'.getTitle($v, 10).'</span></p></a></li>';
				}
			} elseif ($modId == '_2') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<li><div><h5><img src="img/p_hot_d.jpg"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 15).'</a></h5><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getContent($v, 36).'</a></p></div></li>';
				}
			} elseif ($modId == '_3') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<span><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 15).'</a></span>';
				}
			} elseif ($modId == '_4') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<li><a class="left" href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="175" height="130"></a><a class="right" href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><h6>'.getTitle($v, 22).'</h6><p>'.getContent($v, 60).'</p></a></li>';
				}
			} elseif ($modId == '_5') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<div class="lec_pic"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="330" height="245"><p>'.getTitle($v, 12).'</p></a></div><h6 class="s_bt1 s_bt">'.getTag($v, 4).'<i></i></h6>';
				}
			} elseif ($modId == '_6') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 18).'</a></p>';
				}
			} elseif ($modId == '_7') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1') {
						$ret[] = '<p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><span style="color:#ff977f"><i>1</i>/</span>'.getTitle($v, 16).'</a></p>';
					} else {
						$ret[] = '<p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><span><i>'.substr($k, 1).'</i>/</span>'.getTitle($v, 16).'</a></p>';
					}
				}
			} elseif ($modId == '_8') {
				foreach ($arrMod as $k => $v) {
					if ($k != '_3') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="370" height="275"><p>'.getTitle($v, 12).'</p></a><h6 class="s_bt3 s_bt">'.getTag($v, 4).'<i></i></h6></li>';
					} else {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="370" height="275"><p>'.getTitle($v, 12).'</p></a><h6 class="s_bt3 s_bt">'.getTag($v, 4).'<i></i></h6></li>';
					}
				}
			} elseif ($modId == '_9') {
				foreach ($arrMod as $k => $v) {
					if ($k != '_3') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="235" height="235"><p>'.getTitle($v, 12).'</p></a><h6 class="s_bt5 s_bt">'.getTag($v, 4).'<i></i></h6></li>';
					} else {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="235" height="235"><p>'.getTitle($v, 12).'</p></a><h6 class="s_bt5 s_bt">'.getTag($v, 4).'<i></i></h6></li>';
					}
				}
			} elseif ($modId == '_10') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1' || $k == '_3' || $k == '_5') {
						$ret[] = '<li class="li1"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 18).'</a></p></li>';
					} else {
						$ret[] = '<li><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 18).'</a></p></li>';
					}
				}
			} elseif ($modId == '_11') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<p class="p'.substr($k, 1).'"><i></i><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 16).'</a></p>';
				}
			} elseif ($modId == '_12') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1' || $k == '_3' || $k == '_5' || $k == '_7') {
						$ret[] = '<li class="li1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="40" height="40"></a><span><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 6).'</a></span></li>';
					} else {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="40" height="40"></a><span><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 6).'</a></span></li>';
					}
				}
			} elseif ($modId == '_13') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="170" height="170"><p>'.getTitle($v, 8).'</p></a></li>';
					} else {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="170" height="170"><p>'.getTitle($v, 8).'</p></a></li>';
					}
				}
			} elseif ($modId == '_14') {
				foreach ($arrMod as $k => $v) {
					if ($k != '_4') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="168" height="230"></a></li>';
					} else {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="168" height="230"></a></li>';
					}
				}
			} elseif ($modId == '_15') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="330" height="245"><p>'.getTitle($v, 12).'</p></a>';
				}
			} elseif ($modId == '_16') {
				foreach ($arrMod as $k => $v) {
					if ($k != '_3') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="370" height="275"><p>'.getTitle($v, 14).'</p></a></li>';
					} else {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="370" height="275"><p>'.getTitle($v, 14).'</p></a></li>';
					}
				}
			} elseif ($modId == '_17') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 18).'</a></p>';
				}
			} elseif ($modId == '_18') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1' || $k == '_3') {
						$ret[] = '<p><span><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 18).'</a></span></p>';
					} else {
						$ret[] = '<p class="p1"><span><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 18).'</a></span></p>';
					}
				}
			} elseif ($modId == '_19') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1') {
						$ret[] = '<div class="show_t"><ul class="clearfix"><li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p>'.getTitle($v, 10).'</p></a></li>';
					} elseif ($k == '_2' || $k == '_3' || $k == '_7') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p>'.getTitle($v, 10).'</p></a></li>';
					} elseif ($k == '_4') {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="465" height="300"><p>'.getTitle($v, 10).'</p></a></li></ul></div>';
					} elseif ($k == '_5') {
						$ret[] = '<div class="show_b"><ul class="clearfix"><li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p>'.getTitle($v, 10).'</p></a></li>';
					} elseif ($k == '_6') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="465" height="300"><p>'.getTitle($v, 10).'</p></a></li>';
					} elseif ($k == '_8') {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p>'.getTitle($v, 10).'</p></a></li></ul></div>';
					}
				}
			}
			
			return implode('',$ret);
		} else {
			return '';
		}
	}
	
	function wapRender($data, $modId) {
		if (array_key_exists($modId, $data)) {
			$arrMod = $data[$modId];
			ksort($arrMod);
			//var_dump($arrMod);
			$ret = array();
			$from = 'wap';
			if ($modId == '_1') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<div class="swiper-slide"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"><div><p>'.getTitle($v, 12).'</p></div></a></div>';
				}
			} elseif ($modId == '_2') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_3') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_4') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<div class="clearfix"><a class="left" href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"></a><a class="right" href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><h5>'.getTitle($v, 18).'</h5></a></div>';
				}
			} elseif ($modId == '_5') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"><div><p>'.getTitle($v, 14).'</p></div></a>';
				}
			} elseif ($modId == '_6') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_7') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_8') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"><p>'.getTitle($v, 6).'</p></a>';
				}
			} elseif ($modId == '_9') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"><p>'.getTitle($v, 6).'</p></a>';
				}
			} elseif ($modId == '_10') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_11') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<p class="p'.substr($k, 1).'"><i></i><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 16).'</a></p>';
				}
			} elseif ($modId == '_12') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="40" height="40"></a><span><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 6).'</a></span></li>';
				}
			} elseif ($modId == '_13') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="170" height="170"></a><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 6).'</a></p></li>';
					} else {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="170" height="170"></a><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 6).'</a></p></li>';
					}
				}
			} elseif ($modId == '_14') {
				$top3 = array_slice($arrMod, 0, 3);
				foreach ($top3 as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"></a>';
				}
			} elseif ($modId == '_15') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"><div><p>'.getTitle($v, 14).'</p></div></a>';
				}
			} elseif ($modId == '_16') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'"><p>'.getTitle($v, 6).'</p></a>';
				}
			} elseif ($modId == '_17') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_18') {
				foreach ($arrMod as $k => $v) {
					$ret[] = '<a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><p>'.getTitle($v, 14).'</p></a>';
				}
			} elseif ($modId == '_19') {
				foreach ($arrMod as $k => $v) {
					if ($k == '_1') {
						$ret[] = '<div class="show_t"><ul class="clearfix"><li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 10).'</a></p></a></li>';
					} elseif ($k == '_2' || $k == '_3' || $k == '_7') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 10).'</a></p></a></li>';
					} elseif ($k == '_4') {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="265" height="300"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 10).'</a></p></a></li></ul></div>';
					} elseif ($k == '_5') {
						$ret[] = '<div class="show_b"><ul class="clearfix"><li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 10).'</a></p></a></li>';
					} elseif ($k == '_6') {
						$ret[] = '<li><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="265" height="300"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 10).'</a></p></a></li></ul></div>';
					} elseif ($k == '_8') {
						$ret[] = '<li class="m_r1"><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'"><img src="'.getImg($v).'" width="225" height="300"><p><a href="'.getUrl($v).'" babyinfo="'.getInfo($v, $from).'">'.getTitle($v, 10).'</a></p></a></li></ul></div>';
					}
				}
			}
			
			return implode('',$ret);
		} else {
			return '';
		}
	}
	function getInfo($arr, $from) {
		$hash = MD5($arr['id'] . $arr['cmspositionid'] . $from);
		return 'pageid=1&amp;cmsid=' . $arr['id'] . '&amp;cmspositionid=' . $arr['cmspositionid'] . '&amp;f=' . $from .'&amp;h=' . $hash;
	}
	
	function getImg($arr) {
		return 'http://static.fhxckids.com/' . substr($arr['imgurl'], 8);
	}
	
	function getUrl($arr) {
		return $arr['link'];
	}
	
	function getTitle($arr, $n) {
		return mb_substr($arr['title'], 0, $n, 'utf-8');
	}
	
	function getContent($arr, $n) {
		return mb_substr($arr['content'], 0, $n, 'utf-8');
	}
	
	function getTag($arr, $n) {
		return mb_substr($arr['tag'], 0, $n, 'utf-8');
	}
?>