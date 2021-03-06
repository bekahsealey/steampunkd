jQuery(document).ready(function($) { /* For more info on why this looks this way go to http://wdgwp.com/jquery_noconflict */
	
	/* activate slicknav */
	$( function() {
		$( '#main' ).slicknav();
	});
	
});

addLoadEvent(function() {
	removeTrailingSeparator( "breadcrumbs", "&nbsp;&gt;&nbsp;" );
	resizeWidgets("sidebar", "aside");
});

function removeTrailingSeparator( elem, text ) {
	if ( !document.getElementById || !document.getElementsByTagName) return false;
	if ( !document.getElementById( elem ) ) return false;
	
	var breadcrumbs = document.getElementById( elem );
	var items = breadcrumbs.getElementsByTagName( "li" );
	for (e=0; e<items.length; e++) {
		if ( items[e].innerHTML == "" ) {
			breadcrumbs.removeChild(items[e]);
		}
	}
	var last = items[items.length - 1];
	var match = items[items.length - 1].innerHTML;
	if ( match == text) {
			breadcrumbs.removeChild(last);
	}
}

function resizeWidgets(element, tag) {
	if (!document.getElementsByClassName || !document.getElementsByTagName) return false;
	
	var sidebars = document.getElementsByClassName(element);
	for ( s=0; s<sidebars.length; s++ ) {
		var sidebar = sidebars[s]
		var widgets = sidebar.getElementsByTagName(tag);
		if (widgets.length > 1) {
			// create class names if more than one widget in array
			var numWidgets = convertToWord(widgets.length);
			//var children = sidebar.childNodes;
		} else { continue; }
	
		for (var i=0; i<widgets.length; i++) {
			//add class names if more than one widget
			//alert(children[i].className);
			addClass(widgets[i],numWidgets);
		}
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
	//convert array length to a class name
	//alert (num);
	if (num < 2) {
		return;
	}
	if (num == 2) {
		return "col-1-2";
	} else if (num == 3) {
		return "col-1-3";
	} else if (num >= 4) {
		return "col-1-4";
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