addLoadEvent(function() {
	resizeWidgets("upper-footer", "aside");
});

function resizeWidgets(element, tag) {
	if (!document.getElementById || !document.getElementsByTagName) return false;
	
	var sidebar = document.getElementById(element);
	var widgets = sidebar.getElementsByTagName(tag);
	var numWidgets = convertToWord(widgets.length);
	//var children = sidebar.childNodes;
	
	for (var i=0; i<widgets.length; i++) {
		//alert(children[i].className);
		addClass(widgets[i],numWidgets);
	}
}

function addClass(elem,value) {
	if (!elem.className) {
		elem.className = value;
	} else {
		newClassName = elem.className;
		newClassName+= " ";
		newClassName+= value;
		elem.className = newClassName;
	}
}

function convertToWord(num) {
	//alert (num);
	if (num <= 2) {
		return "two";
	} else if (num == 3) {
		return "three";
	} else if (num >= 4) {
		return "four";
	}
}

function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			oldonload();
			func();
		}
	}
}