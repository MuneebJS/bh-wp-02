/**
 * BH Modern — mobile navigation.
 */
(function () {
	'use strict';

	var toggle = document.querySelector('.nav-toggle');
	var nav = document.querySelector('#primary-navigation');
	if (!toggle || !nav) {
		return;
	}

	var body = document.body;

	function setOpen(open) {
		toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		toggle.setAttribute(
			'aria-label',
			open
				? (window.bhModernStrings && bhModernStrings.closeMenu) || 'Close menu'
				: (window.bhModernStrings && bhModernStrings.openMenu) || 'Open menu'
		);
		nav.classList.toggle('is-open', open);
		body.classList.toggle('nav-open', open);
	}

	toggle.addEventListener('click', function () {
		var open = toggle.getAttribute('aria-expanded') === 'true';
		setOpen(!open);
	});

	document.addEventListener('keydown', function (e) {
		if (e.key === 'Escape') {
			setOpen(false);
		}
	});

	window.addEventListener('resize', function () {
		if (window.matchMedia('(min-width: 769px)').matches) {
			setOpen(false);
		}
	});
})();
