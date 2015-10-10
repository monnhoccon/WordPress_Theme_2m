var click_num_caidan = 1;
document.getElementById("btn-caidan").onclick = function() {
	if (click_num_caidan == 1) {
		document.getElementById("nav-bar").style.visibility = "visible";
		var b = document.getElementsByClassName("sub-menu");
		for (var a = 0; a < b.length; a++) {
			b[a].style.visibility = "visible"
		}
		click_num_caidan = 0;
		document.getElementById("caidan-icon").innerHTML = "&#xe601"
	} else {
		document.getElementById("nav-bar").style.visibility = "hidden";
		var b = document.getElementsByClassName("sub-menu");
		for (var a = 0; a < b.length; a++) {
			b[a].style.visibility = "hidden"
		}
		click_num_caidan = 1;
		document.getElementById("caidan-icon").innerHTML = "&#xe600"
	}
};
var click_num_search = 1;
document.getElementById("btn-search").onclick = function() {
	if (click_num_search == 1) {
		document.getElementById("search-header").style.visibility = "visible";
		click_num_search = 0;
		document.getElementById("search-icon").innerHTML = "&#xe601"
	} else {
		document.getElementById("search-header").style.visibility = "hidden";
		click_num_search = 1;
		document.getElementById("search-icon").innerHTML = "&#xe602"
	}
};
var click_num_guanzhu = 1;
document.getElementById("btn-guanzhu").onclick = function() {
	if (click_num_guanzhu == 1) {
		document.getElementById("guanzhu-nav").style.visibility = "visible";
		click_num_guanzhu = 0;
		document.getElementById("guanzhu-icon").innerHTML = "&#xe601"
	} else {
		document.getElementById("guanzhu-nav").style.visibility = "hidden";
		click_num_guanzhu = 1;
		document.getElementById("guanzhu-icon").innerHTML = "&#xe619"
	}
};
gethref("guanzhu-small-sina", "guanzhu-sina");
gethref("guanzhu-small-github", "guanzhu-github");
gethref("guanzhu-small-rss", "guanzhu-RSS");
gethref("guanzhu-small-email", "guanzhu-email");
gethref("guanzhu-small-zhihu", "guanzhu-zhihu");
if (document.getElementById("biaoqing")) {
	var click_num_biaoqing = 0;
	document.getElementById("biaoqing").onclick = function() {
		if (click_num_biaoqing == 0) {
			document.getElementById("mm-arrow").style.display = "block";
			document.getElementById("all-biaoqings").style.display = "block";
			click_num_biaoqing = 1
		} else {
			document.getElementById("mm-arrow").style.display = "none";
			document.getElementById("all-biaoqings").style.display = "none";
			click_num_biaoqing = 0
		}
	};
	biaoqing()
}
document.getElementById("roolbar-up").onclick = function() {
	window.scrollTo(0, 0)
};
document.getElementById("roolbar-down").onclick = function() {
	window.scrollTo(0, document.body.scrollHeight)
};
window._bd_share_config = {
	common: {
		bdSnsKey: {},
		bdText: "分享来自于二梦博客",
		bdMini: "2",
		bdMiniList: false,
		bdPic: "",
		bdStyle: "0",
		bdSize: "24"
	},
	share: {}
};
with(document) {
	0[(getElementsByTagName("head")[0] || body).appendChild(createElement("script")).src = "http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=" + ~(-new Date() / 3600000)]
}

function biaoqing() {
	var a = document.getElementById("all-biaoqing").getElementsByTagName("li");
	for (x in a) {
		a[x].onclick = function() {
			var b = document.getElementById("comment-textarea").value;
			document.getElementById("comment-textarea").value = b + this.textContent
		}
	}
}

function gethref(c, a) {
	var b = c;
	var d = a;
	document.getElementById(b).href = document.getElementById(d).href
};