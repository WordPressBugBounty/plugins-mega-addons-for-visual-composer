/* Plugin-owned feature test for the CSS gates used by Creative Link. */
(function (window, document) {
	'use strict';

	var root = document.documentElement;
	var style = document.createElement('div').style;
	var supported = false;
	var css = window.CSS;

	if (css && typeof css.supports === 'function') {
		supported = css.supports('perspective', '1px') &&
			css.supports('transform', 'translate3d(1px, 1px, 1px)');
	} else {
		/* Property/value parsing fallback; supported 4.4.0 browsers provide CSS.supports. */
		style.perspective = '1px';
		style.transform = 'translate3d(1px, 1px, 1px)';
		style.webkitPerspective = '1px';
		style.webkitTransform = 'translate3d(1px, 1px, 1px)';
		supported = !!(style.perspective && style.transform) ||
			!!(style.webkitPerspective && style.webkitTransform);
	}

	root.className = root.className.replace(/(^|\s)no-js(?=\s|$)/g, '$1').trim();
	root.className = root.className.replace(/(^|\s)(?:csstransforms3d|no-csstransforms3d)(?=\s|$)/g, ' ').trim();
	if ((' ' + root.className + ' ').indexOf(' js ') === -1) {
		root.className += (root.className ? ' ' : '') + 'js';
	}
	root.className += ' ' + (supported ? 'csstransforms3d' : 'no-csstransforms3d');
}(window, document));
