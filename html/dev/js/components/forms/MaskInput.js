import IMask from 'imask';

export function MaskInput($el, options = {}) {
	if (!$el || !$el.length) {
		return false;
	}

	this.$el = $el;

	let mask = {
	    pattern: $el.data('mask'),
	};

	if (!mask.pattern) {
		return false;
	}

	this.instance = IMask($el[0], {
	    mask: mask.pattern,
	});

	$el.data('mask-instance', this.instance);
}