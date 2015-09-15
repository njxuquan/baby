(function() {
	var ad,
		prefix = 'baby_posid', //广告位id前缀
		safeNum = 100, //允许跳过的广告ID数目
		head = document.head || document.getElementsByTagName('head')[0] || document.documentElement;

	function id(id) {
		return document.getElementById(id);
	}

	// 封装jsonp请求
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
		if (e.button == 2) return; //修复火狐某些版本右击也产生点击事件的问题
		var srcElement = e.target || e.srcElement;
		// 防止点击图片时不产生点击
		while (srcElement && srcElement.tagName.toLowerCase() != "a") srcElement = srcElement.parentElement;
		//发送点击请求
		if (srcElement) {
			var babyinfo = srcElement.getAttribute("babyinfo");
			if (babyinfo) {
				var src = 'http://192.168.72.130:8080/click.php?' + babyinfo + "&time=" + (new Date()).getTime();
				jsonp(src);
			}
		}
	}
	
	//解析参数并注册点击事件,从1开始去找ID，允许跳过safeNum个数目，方便移除广告。
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