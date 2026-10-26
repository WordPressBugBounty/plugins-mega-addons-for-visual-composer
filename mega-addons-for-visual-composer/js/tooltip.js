jQuery(document).ready(function($) {
	var $triggers = $('.tooltip-trigger');
	var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	$triggers.each(function() {
		var $trigger = $(this);
		$trigger.tooltipster({
			contentAsHTML: false,
			trigger: 'custom',
			triggerOpen: { mouseenter: false, click: false, tap: false, touchstart: false },
			triggerClose: { mouseleave: false, click: false, originClick: false, tap: false, touchleave: false },
			delay: 0,
			theme: $trigger.data('theme'),
			animation: $trigger.data('anim'),
			animationDuration: reduceMotion ? 0 : $trigger.data('speed'),
			side: $trigger.data('position'),
			interactive: $trigger.data('interactive') === 'true'
		});
	});

	function closeOtherTooltips(current) {
		$triggers.not(current).each(function() {
			var $trigger = $(this);
			if ($trigger.hasClass('tooltipstered')) {
				$trigger.tooltipster('close');
			}
		});
	}

	$triggers.on('mouseenter.tooltipAccess', function() {
		if (!window.matchMedia || window.matchMedia('(hover: hover)').matches) {
			closeOtherTooltips(this);
			$(this).tooltipster('open');
		}
	}).on('mouseleave.tooltipAccess', function() {
		if (!this.matches(':focus')) {
			$(this).tooltipster('close');
		}
	}).on('focusin.tooltipAccess', function() {
		closeOtherTooltips(this);
		$(this).tooltipster('open');
	}).on('focusout.tooltipAccess', function() {
		var trigger = this;
		window.setTimeout(function() {
			if (!trigger.matches(':focus') && !trigger.matches(':hover')) {
				$(trigger).tooltipster('close');
			}
		}, 0);
	}).on('click.tooltipAccess', function(event) {
		event.preventDefault();
		var $trigger = $(this);
		closeOtherTooltips(this);
		if (event.detail === 0) {
			$trigger.tooltipster('open');
			return;
		}
		if ($trigger.tooltipster('status').open) {
			$trigger.tooltipster('close');
		} else {
			$trigger.tooltipster('open');
		}
	});

	$(document).on('keydown.tooltipAccess', function(event) {
		if (event.key !== 'Escape') {
			return;
		}
		event.preventDefault();
		$triggers.each(function() {
			var $trigger = $(this);
			if ($trigger.hasClass('tooltipstered') && $trigger.tooltipster('status').open) {
				$trigger.tooltipster('close');
				this.focus();
			}
		});
	}).on('click.tooltipAccessOutside', function(event) {
		if ($(event.target).closest('.tooltip-trigger, .tooltipster-base').length) {
			return;
		}
		$triggers.each(function() {
			var $trigger = $(this);
			if ($trigger.hasClass('tooltipstered')) {
				$trigger.tooltipster('close');
			}
		});
	});
});
