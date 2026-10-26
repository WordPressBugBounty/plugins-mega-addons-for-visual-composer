/* Mega Addons Filterable Gallery adapter. GPL-2.0-or-later. */
(function (window, document) {
    'use strict';

    function getGutter(grid) {
        var first = grid.querySelector('.filtr-item');
        if (!first || !grid.clientWidth) {
            return 0;
        }
        var width = grid.clientWidth;
        var itemWidth = first.getBoundingClientRect().width;
        var columns = Math.max(1, Math.round((width + 16) / (itemWidth + 16)));
        var columnWidth = Math.round((width - 16 * (columns - 1)) / columns);
        var gutter = Math.max(0, Math.min(16 * (columns - 1) / columns, width / columns - columnWidth - 0.5));
        grid.style.setProperty('--maw-gallery-row-gap', Math.max(0, 16 - gutter) + 'px');
        return gutter;
    }

    function initialize(root) {
        var grid = root.querySelector('.filter-container');
        var items = grid ? grid.querySelectorAll('.filtr-item') : [];
        if (!grid || !items.length || typeof window.Filterizr !== 'function' || root._mawFilterizr) {
            return;
        }

        var controls = Array.prototype.slice.call(root.querySelectorAll('.maw_simplefilters_ul [data-filter]'));
        var shuffle = root.querySelector('.maw_simplefilters_ul [data-shuffle]');
        var motion = window.matchMedia ? window.matchMedia('(prefers-reduced-motion: reduce)') : null;
        var engine;

        try {
            engine = new window.Filterizr(grid, {
                setupControls: false,
                animationDuration: motion && motion.matches ? 0 : 0.3,
                gutterPixels: getGutter(grid)
            });
        } catch (error) {
            return;
        }

        root._mawFilterizr = engine;
        root.addEventListener('click', function (event) {
            var control = event.target.closest('.maw_simplefilters_ul [data-filter], .maw_simplefilters_ul [data-shuffle]');
            if (!control || !root.contains(control)) {
                return;
            }

            if (control.hasAttribute('data-filter')) {
                var filter = control.getAttribute('data-filter');
                engine.filter(filter);
                controls.forEach(function (item) {
                    item.classList.toggle('active', item === control);
                });
            } else if (control.hasAttribute('data-shuffle') && shuffle) {
                engine.shuffle();
            }
        });

        var previousWidth = root.clientWidth;
        var resizeTimer;
        function resize() {
            window.clearTimeout(resizeTimer);
            resizeTimer = window.setTimeout(function () {
                if (root._mawFilterizr && previousWidth !== root.clientWidth) {
                    previousWidth = root.clientWidth;
                    engine.setOptions({ gutterPixels: getGutter(grid) });
                }
            }, 100);
        }
        window.addEventListener('resize', resize);
        if (window.ResizeObserver) {
            var observer = new window.ResizeObserver(resize);
            observer.observe(root);
        }
    }

    function bindLightboxAccessibility() {
        var instances = window.fsLightboxInstances || {};
        Object.keys(instances).forEach(function (group) {
            var box = instances[group];
            if (!box || box._mawA11yBound) {
                return;
            }
            box._mawA11yBound = true;
            var opener = null;
            var dialog = null;
            var links = box.elements && box.elements.a ? box.elements.a : [];

            links.forEach(function (link) {
                link.addEventListener('click', function () {
                    opener = link;
                }, true);
            });

            function trapTab(event) {
                if (event.key !== 'Tab' || !dialog) {
                    return;
                }
                var buttons = Array.prototype.slice.call(dialog.querySelectorAll('button, [href], [tabindex="0"]'))
                    .filter(function (node) { return node.getClientRects().length > 0; });
                if (!buttons.length) {
                    event.preventDefault();
                    dialog.focus();
                    return;
                }
                var index = buttons.indexOf(document.activeElement);
                if (event.shiftKey && index <= 0) {
                    event.preventDefault();
                    buttons[buttons.length - 1].focus();
                } else if (!event.shiftKey && (index < 0 || index === buttons.length - 1)) {
                    event.preventDefault();
                    buttons[0].focus();
                }
            }

            box.props.onOpen = function () {
                dialog = box.elements.container;
                dialog.setAttribute('role', 'dialog');
                dialog.setAttribute('aria-modal', 'true');
                dialog.setAttribute('aria-label', 'Image gallery');
                dialog.setAttribute('tabindex', '-1');
                var toolbar = Array.prototype.slice.call(dialog.querySelectorAll('.fslightbox-toolbar-button'));
                toolbar.forEach(function (button, index) {
                    button.setAttribute('aria-label', index === toolbar.length - 1 ? 'Close image gallery' : 'Toggle fullscreen');
                });
                Array.prototype.forEach.call(dialog.querySelectorAll('.fslightbox-slide-btn'), function (button, index) {
                    button.setAttribute('aria-label', index ? 'Next image' : 'Previous image');
                });
                document.addEventListener('keydown', trapTab, true);
                if (toolbar.length) {
                    toolbar[toolbar.length - 1].focus();
                } else {
                    dialog.focus();
                }
            };
            box.props.onClose = function () {
                document.removeEventListener('keydown', trapTab, true);
                dialog = null;
                if (opener && document.documentElement.contains(opener)) {
                    opener.focus();
                }
            };
        });
    }

    function start() {
        bindLightboxAccessibility();
        Array.prototype.forEach.call(document.querySelectorAll('.maw_portfolioGallery_container'), initialize);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', start);
    } else {
        start();
    }
}(window, document));
