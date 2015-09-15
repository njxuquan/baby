(function() {
	var ad,
		prefix = 'baby_posid', //���λidǰ׺
		safeNum = 100, //���������Ĺ��ID��Ŀ
		head = document.head || document.getElementsByTagName('head')[0] || document.documentElement;

	function id(id) {
		return document.getElementById(id);
	}

	// ��װjsonp����
	function jsonp(src, callback, variable) {
		var script = document.createElement("script");
		script.async = true;
		script.src = src;
		script.onload = script.onreadystatechange = function() {
			if (!script.readyState || /loaded|complete/.test(script.readyState)) {
				script.onload = script.onreadystatechange = null;
				if (script.parentNode) {
					script.parentNode.removeChild(script);
				}
				script = null;
				if (callback) callback(variable);
			}
		}
		head.insertBefore(script, head.firstChild);
	}

	function clickHandler(e) {
		e = e || window.event;
		if (e.button == 2) return; //�޸����ĳЩ�汾�һ�Ҳ��������¼�������
		var srcElement = e.target || e.srcElement;
		// ��ֹ���ͼƬʱ���������
		while (srcElement && srcElement.tagName.toLowerCase() != "a") srcElement = srcElement.parentElement;
		//���͵������
		if (srcElement) {
			var babyinfo = srcElement.getAttribute("babyinfo");
			if (babyinfo) {
				var src = 'http://192.168.72.130:8080/click.php?' + babyinfo + "&time=" + (new Date()).getTime();
				jsonp(src);
			}
		}
	}
	
	//����������ע�����¼�,��1��ʼȥ��ID����������safeNum����Ŀ�������Ƴ���档
	for (var i = 1, n = 0;;) {
		ad = id(prefix + i);
		if (ad) {
			addListener(ad, "click", clickHandler)
			++i;
			n = 0;
		} else {
			i = i + 1;
			n++;
			if (n >= safeNum) break;
		}
	}
	
	function loaded(){}

	function addListener(element, e, fn) {
		if (element.addEventListener) {
			element.addEventListener(e, fn, false);
		} else {
			element.attachEvent("on" + e, fn);
		}
	}
})();