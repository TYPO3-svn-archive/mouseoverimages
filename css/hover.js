function getElementsByClass(searchClass,node,tag) {

        var classElements = new Array();
        if (node == null)
                node = document;
        if (tag == null)
                tag = '*';
        var els = node.getElementsByTagName(tag);
        var elsLen = els.length;
        var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
        var j = 0;
        for (i = 0; i < elsLen; i++) {
                if (pattern.test(els[i].className) ) {
                        classElements[j] = els[i];
                        j++;
                }
        }
        return classElements;
}
hoverClass = function(object, targetClass, show, onoff) {
	var jsEls = getElementsByClass(targetClass, object, '*');
	for (var i=0; i<jsEls.length; i++) {
		if (show) {
			if (onoff) {jsEls[i].className+=" jsshow";}
			else {jsEls[i].className+=" jshide";}
		} else {
			if (onoff) {jsEls[i].className=jsEls[i].className.replace(new RegExp(" jsshow\\b"), "");}
			else {jsEls[i].className=jsEls[i].className.replace(new RegExp(" jshide\\b"), "");}
		}
	}
}
jsHover = function() {
	var jsEls = getElementsByClass('mousehover', document, '*');
	for (var i=0; i<jsEls.length; i++) {
		jsEls[i].onmouseover=function() {
			hoverClass(this, "hidemouse", true, false);
			hoverClass(this, "showmouse", true, true);
		}
		jsEls[i].onmouseout=function() {
			hoverClass(this, "hidemouse", false, false);
			hoverClass(this, "showmouse", false, true);
		}
	}
}
if (window.attachEvent) window.attachEvent("onload", jsHover);