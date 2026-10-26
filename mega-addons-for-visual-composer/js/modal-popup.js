(function () {
	'use strict';

	var fallbackStack = [];
	var savedAriaHidden = [];
	var usedIds = [];

	function removeElement(element) {
		if (element && element.parentNode) {
			element.parentNode.removeChild(element);
		}
	}

	function nextFrame(callback) {
		if (window.requestAnimationFrame) {
			window.requestAnimationFrame(callback);
		} else {
			window.setTimeout(callback, 16);
		}
	}

	function focusElement(element) {
		if (!element || typeof element.focus !== 'function') {
			return;
		}
		try {
			element.focus({ preventScroll: true });
		} catch (error) {
			element.focus();
		}
	}

	function reducedMotion() {
		return window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	}

	function supportsNativeDialog(dialog) {
		return typeof dialog.showModal === 'function' &&
			typeof dialog.close === 'function' &&
			window.CSS &&
			typeof window.CSS.supports === 'function' &&
			window.CSS.supports('color', 'var(--maw-dialog-support-check)');
	}

	function motionDelay() {
		return reducedMotion() ? 0 : 200;
	}

	function syncFallbackAria() {
		var activeOverlays = fallbackStack.map(function (instance) {
			return instance.overlay;
		});

		Array.prototype.forEach.call(document.body.children, function (child) {
			if (activeOverlays.indexOf(child) !== -1) {
				return;
			}
			var saved = false;
			var index;
			for (index = 0; index < savedAriaHidden.length; index += 1) {
				if (savedAriaHidden[index].element === child) {
					saved = true;
					break;
				}
			}
			if (!saved) {
				savedAriaHidden.push({
					element: child,
					value: child.hasAttribute('aria-hidden') ? child.getAttribute('aria-hidden') : null
				});
			}
			child.setAttribute('aria-hidden', 'true');
		});

		if (!fallbackStack.length) {
			var index;
			for (index = 0; index < savedAriaHidden.length; index += 1) {
				var saved = savedAriaHidden[index];
				if (!saved.element.parentNode) {
					continue;
				}
				if (saved.value === null) {
					saved.element.removeAttribute('aria-hidden');
				} else {
					saved.element.setAttribute('aria-hidden', saved.value);
				}
			}
			savedAriaHidden = [];
		}
	}

	function focusableElements(dialog) {
		return Array.prototype.filter.call(dialog.querySelectorAll(
			'a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), iframe, object, embed, [contenteditable="true"], [tabindex]:not([tabindex="-1"])'
		), function (element) {
			return !!(element.offsetWidth || element.offsetHeight || element.getClientRects().length);
		});
	}

	function updateDialogDimensions(instance) {
		var dialog = instance.dialog;
		var container = dialog.querySelector('.model-popup-container');
		var title = dialog.querySelector('h2');
		var viewportHeight = window.innerHeight || document.documentElement.clientHeight;
		var topOffset = 0;
		var dialogHeight;
		var topPosition;
		var availableHeight;
		var titleHeight = title ? title.getBoundingClientRect().height : 0;

		if (instance.nativeDialog) {
			topOffset = window.innerWidth <= 768 ? 0 : parseFloat(dialog.getAttribute('data-top'));
			if (!isFinite(topOffset)) {
				topOffset = 60;
			}
			dialog.style.marginTop = '0';
			dialog.style.marginBottom = '0';
			dialog.style.marginLeft = 'auto';
			dialog.style.marginRight = 'auto';
			dialog.style.left = '0';
			dialog.style.right = '0';
		}

		dialogHeight = dialog.getBoundingClientRect().height;
		topPosition = instance.nativeDialog ? Math.max(0, (viewportHeight - dialogHeight + topOffset) / 2 - 50) : 0;
		availableHeight = Math.max(80, viewportHeight - topPosition - 16);
		dialog.style.maxHeight = availableHeight + 'px';
		if (container) {
			container.style.maxHeight = Math.max(48, availableHeight - titleHeight - 4) + 'px';
		}

		if (instance.nativeDialog) {
			dialogHeight = dialog.getBoundingClientRect().height;
			topPosition = Math.max(0, (viewportHeight - dialogHeight + topOffset) / 2 - 50);
			dialog.style.top = topPosition + 'px';
		}
	}

	function resetIframes() {
		Array.prototype.forEach.call(document.querySelectorAll('iframe[src]'), function (frame) {
			var source = frame.getAttribute('src');
			if (source !== null) {
				frame.setAttribute('src', source);
			}
		});
	}

	function restoreDialogPosition(instance) {
		if (!instance.originalParent) {
			return;
		}
		if (instance.originalNextSibling && instance.originalNextSibling.parentNode === instance.originalParent) {
			instance.originalParent.insertBefore(instance.dialog, instance.originalNextSibling);
		} else {
			instance.originalParent.appendChild(instance.dialog);
		}
	}

	function finishClose(instance) {
		if (instance.closed) {
			return;
		}
		instance.closed = true;
		instance.closing = false;
		window.clearTimeout(instance.closeTimer);
		instance.dialog.classList.remove('maw-modal-opening', 'maw-modal-closing');

			if (!instance.nativeDialog) {
			instance.dialog.removeAttribute('open');
			instance.dialog.removeAttribute('role');
			instance.dialog.removeAttribute('aria-modal');
			removeElement(instance.overlay);
			fallbackStack = fallbackStack.filter(function (entry) {
				return entry !== instance;
			});
			syncFallbackAria();
			document.removeEventListener('keydown', instance.keydownHandler, true);
			instance.overlay.removeEventListener('click', instance.overlayHandler);
		}

		restoreDialogPosition(instance);
		instance.trigger.setAttribute('aria-expanded', 'false');
		resetIframes();
		focusElement(instance.trigger);
	}

	function closeInstance(instance) {
		if (instance.closed || instance.closing) {
			return;
		}
		instance.closing = true;
		instance.trigger.setAttribute('aria-expanded', 'false');
		instance.dialog.classList.add('maw-modal-closing');
		if (!instance.nativeDialog && instance.overlay) {
			instance.overlay.classList.add('is-closing');
			instance.backdrop.classList.add('is-closing');
		}
		instance.closeTimer = window.setTimeout(function () {
			if (instance.nativeDialog && instance.dialog.open) {
				instance.pendingCloseEvents += 1;
				instance.dialog.close();
				finishClose(instance);
			} else {
				finishClose(instance);
			}
		}, motionDelay());
	}

	function trapFallbackFocus(instance, event) {
		if (fallbackStack[fallbackStack.length - 1] !== instance) {
			return;
		}
		if (event.key === 'Escape') {
			event.preventDefault();
			event.stopPropagation();
			closeInstance(instance);
			return;
		}
		if (event.key !== 'Tab') {
			return;
		}
		var elements = focusableElements(instance.dialog);
		if (!elements.length) {
			event.preventDefault();
			focusElement(instance.dialog);
			return;
		}
		var first = elements[0];
		var last = elements[elements.length - 1];
		if (event.shiftKey && (document.activeElement === first || !instance.dialog.contains(document.activeElement))) {
			event.preventDefault();
			focusElement(last);
		} else if (!event.shiftKey && (document.activeElement === last || !instance.dialog.contains(document.activeElement))) {
			event.preventDefault();
			focusElement(first);
		}
	}

	function trapNativeDialogFocus(instance, event) {
		if (event.key !== 'Tab') {
			return;
		}
		var elements = focusableElements(instance.dialog);
		if (!elements.length) {
			event.preventDefault();
			focusElement(instance.dialog);
			return;
		}
		var first = elements[0];
		var last = elements[elements.length - 1];
		if (event.shiftKey && (document.activeElement === first || !instance.dialog.contains(document.activeElement))) {
			event.preventDefault();
			focusElement(last);
		} else if (!event.shiftKey && (document.activeElement === last || !instance.dialog.contains(document.activeElement))) {
			event.preventDefault();
			focusElement(first);
		}
	}

	function openInstance(instance) {
		if (instance.closing || (!instance.nativeDialog && instance.dialog.hasAttribute('open'))) {
			return;
		}
		instance.closed = false;
		instance.closing = false;
		instance.dialog.style.setProperty('--maw-modal-overlay-color', instance.overlayColor || '#1a94ad');
		instance.dialog.classList.add('maw-modal-opening');
		instance.trigger.setAttribute('aria-expanded', 'true');

		if (instance.nativeDialog) {
			try {
				instance.dialog.showModal();
				updateDialogDimensions(instance);
			} catch (error) {
				instance.dialog.classList.remove('maw-modal-opening');
				instance.nativeDialog = false;
				openFallback(instance);
				return;
			}
		} else {
			openFallback(instance);
			return;
		}

		nextFrame(function () {
			instance.dialog.classList.remove('maw-modal-opening');
		});
		focusElement(instance.closeButton || instance.dialog);
	}

	function openFallback(instance) {
		instance.overlay = document.createElement('div');
		instance.overlay.className = 'maw-modal-overlay';
		instance.backdrop = document.createElement('div');
		instance.backdrop.className = 'maw-modal-backdrop';
		instance.backdrop.setAttribute('aria-hidden', 'true');
		instance.backdrop.style.backgroundColor = instance.overlayColor || '#1a94ad';
		instance.backdrop.style.opacity = '0.8';
		instance.overlay.appendChild(instance.backdrop);
		instance.overlay.appendChild(instance.dialog);
		document.body.appendChild(instance.overlay);
		instance.dialog.setAttribute('role', 'dialog');
		instance.dialog.setAttribute('aria-modal', 'true');
		instance.dialog.setAttribute('open', '');
		instance.overlay.classList.add('is-open');
		updateDialogDimensions(instance);
		instance.overlayHandler = function (event) {
			if (event.target === instance.overlay || event.target === instance.backdrop) {
				closeInstance(instance);
			}
		};
		instance.keydownHandler = function (event) {
			trapFallbackFocus(instance, event);
		};
		instance.overlay.addEventListener('click', instance.overlayHandler);
		document.addEventListener('keydown', instance.keydownHandler, true);
		fallbackStack.push(instance);
		syncFallbackAria();
		nextFrame(function () {
			instance.dialog.classList.remove('maw-modal-opening');
		});
		focusElement(instance.closeButton || instance.dialog);
	}

	function uniqueId(dialog) {
		var original = dialog.id || 'maw-modal-popup';
		var candidate = original;
		var suffix = 2;
		while (usedIds.indexOf(candidate) !== -1 || (document.getElementById(candidate) && document.getElementById(candidate) !== dialog)) {
			candidate = original + '-' + suffix;
			suffix += 1;
		}
		usedIds.push(candidate);
		dialog.id = candidate;
		return candidate;
	}

	function initialize() {
		var wrappers = document.querySelectorAll('.maw__modal_popup_box');
		Array.prototype.forEach.call(wrappers, function (wrapper) {
			var trigger = wrapper.querySelector('.model-popup-btn');
			var dialog = wrapper.querySelector('.mega-model-popup');
			if (!trigger || !dialog) {
				return;
			}

			var id = uniqueId(dialog);
			var title = dialog.querySelector('h2');
			if (title) {
				var titleId = title.id || id + '-title';
				var existingTitle = document.getElementById(titleId);
				var titleSuffix = 2;
				if (usedIds.indexOf(titleId) !== -1 || (existingTitle && existingTitle !== title)) {
					titleId = id + '-title';
					while (usedIds.indexOf(titleId) !== -1 || (document.getElementById(titleId) && document.getElementById(titleId) !== title)) {
						titleId = id + '-title-' + titleSuffix;
						titleSuffix += 1;
					}
				}
				usedIds.push(titleId);
				title.id = titleId;
				dialog.setAttribute('aria-labelledby', titleId);
			}
			trigger.setAttribute('data-id', id);
			trigger.setAttribute('aria-controls', id);
			trigger.setAttribute('aria-haspopup', 'dialog');
			trigger.setAttribute('aria-expanded', 'false');

			var instance = {
				trigger: trigger,
				dialog: dialog,
				closeButton: dialog.querySelector('.b-close'),
				overlayColor: wrapper.getAttribute('data-bodybg'),
				originalParent: dialog.parentNode,
				originalNextSibling: dialog.nextSibling,
				nativeDialog: supportsNativeDialog(dialog),
				closed: true,
				closing: false,
				pendingCloseEvents: 0
			};

			// Keep popup nodes outside theme overflow/stacking contexts, as the old initializer did.
			document.body.appendChild(dialog);

			trigger.addEventListener('click', function (event) {
				event.preventDefault();
				openInstance(instance);
			});
			if (instance.closeButton) {
				instance.closeButton.addEventListener('click', function (event) {
					event.preventDefault();
					closeInstance(instance);
				});
			}
			window.addEventListener('resize', function () {
				if (dialog.open || (instance.overlay && instance.overlay.parentNode)) {
					updateDialogDimensions(instance);
				}
			});
			if (instance.nativeDialog) {
				dialog.addEventListener('keydown', function (event) {
					trapNativeDialogFocus(instance, event);
				});
				dialog.addEventListener('cancel', function (event) {
					event.preventDefault();
					closeInstance(instance);
				});
				dialog.addEventListener('close', function () {
					if (instance.pendingCloseEvents > 0) {
						instance.pendingCloseEvents -= 1;
						return;
					}
					finishClose(instance);
				});
				dialog.addEventListener('click', function (event) {
					if (event.target !== dialog) {
						return;
					}
					var bounds = dialog.getBoundingClientRect();
					if (event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom) {
						closeInstance(instance);
					}
				});
			}
		});
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', initialize);
	} else {
		initialize();
	}
}());
