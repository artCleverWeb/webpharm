import PerfectScrollbar from 'perfect-scrollbar';

export function Select($el, options = {}) {
	if (!$el || !$el.length) {
		return false;
	}

	this.$el = $el;

	let dropdown = {
		$el: $('.select-b__dropdown', $el),
	};
	let caption = {
		$el: $('.select-b__caption', $el),
	};
	let items = {
		$els: $('.select-b__item', $el),
	};

	let settings = {
		onReset: options.onReset ? options.onReset : function() {},
		onChange: options.onChange ? options.onChange : function() {},
	}

	caption.$value = $('.select-b__caption-value', caption.$el);

	dropdown.show = function() {
		clearInterval(dropdown.timer);
		dropdown.$el.css({ display: 'flex' });

		setTimeout(() => {
			$el.addClass('expanded');

			if (dropdown.list.scroll) {
				dropdown.list.scroll.update();
			}
		});
	}

	dropdown.hide = function() {
		clearInterval(dropdown.timer);
		$el.removeClass('expanded');

		dropdown.timer = setTimeout(() => {
			dropdown.$el.hide(0);
		}, 500);
	}

	caption.$el.on('click', function(event) {
		if (!$el.hasClass('expanded')) {
			dropdown.show();
		} else {
			dropdown.hide();
		}

		event.preventDefault();
	});

	$(document).on('click', function(event) {
		if (!$(event.target).is($el) && !$el.find(event.target).length) {
			dropdown.hide();
		}
	});


	dropdown.list = {
		$el: $('.select-b__list', $el),
	};

	if (window.matchMedia('(min-width: 993px)').matches && dropdown.list.$el.length) {	
		dropdown.list.scroll = new PerfectScrollbar(dropdown.list.$el[0], {
		    wheelSpeed: 2,
		    wheelPropagation: false,
		    minScrollbarLength: 20,
		    swipeEasing: true,
		    useBothWheelAxes: true,
		});
	}

	/* Items */
	items.checkSelected = function() {
		let numberSelected = items.getNumberSelected();

		if (numberSelected > 0) {
			$el.addClass('selected');
		} else {
			$el.removeClass('selected');
		}
	}

	items.getNumberSelected = function() {
		let numberSelected = $('.select-b__item-input:checked', items.$els).length;

		return numberSelected;
	}

	items.reset = function() {
		items.$els.each(function() {
			let item = {
				$el: $(this),
			};

			item.$input = $('.select-b__item-input', item.$el);

			item.$input.prop('checked', false);
			item.$el.removeClass('selected');
		});

		$el.removeClass('selected expanded');
	}

	items.getItem = function(id) {
		let $item = items.$els.filter(function() {
			return $(this).data('item-id') === id;
		});

		return $item;
	}

	items.selectItem = function(id) {
		let item = {
			$el: items.getItem(id),
			id: id,
		};

		if (item.$el.data('unselect')) {
			items.reset();
			return false;
		}

		item.$input = $('.select-b__item-input', item.$el);
		item.$el.addClass('selected');
		item.$input.prop('checked', true);

		if (item.$input.prop('type') === 'radio') {
			item.text = $('.select-b__item-text', item.$el).text();
			caption.$value.text(item.text);

			items.$els.each(function() {
				let itemLocal = {
					$el: $(this),
				};

				itemLocal.id = itemLocal.$el.data('item-id');
				itemLocal.$input = $('.select-b__item-input', itemLocal.$el);

				if (!itemLocal.$input.prop('checked')) {
					items.unselectItem(itemLocal.id);
				}
			});
		}
	}

	items.unselectItem = function(id) {
		let item = {
			$el: items.getItem(id),
			id: id,
		};

		item.$input = $('.select-b__item-input', item.$el);

		item.$input.prop('checked', false);
		item.$el.removeClass('selected');
	}

	items.getValueSelected = function() {
		let value = [];

		items.$els.each(function() {
			let item = {
				$el: $(this),
			};

			item.$input = $('.select-b__item-input', item.$el);

			if (item.$input.prop('checked')) {
				value.push(item.$input.val());
			}
		});

		return value;
	}

	items.setValue = function(value = []) {
		if (!value.length) {
			return false;
		}

		items.reset();
		items.$els.each(function() {
			let item = {
				$el: $(this),
			};

			item.id = item.$el.data('item-id');
			item.$input = $('.select-b__item-input', item.$el);

			value.forEach((valueLocal) => {
				if (valueLocal == item.$input.val()) {
					items.selectItem(item.id);
				}
			});
		});
		items.checkSelected();
	}

	items.setItems = function(itemHtml = '') {
		dropdown.list.$el.html('');
		dropdown.list.$el.append(itemHtml);
		items.init();
	}

	items.init = function() {
		items.$els = $('.select-b__item', $el);
		items.$els.each(function(index) {
			let item = {
				$el: $(this),
			};

			item.$input = $('.select-b__item-input', item.$el);
			item.id = item.$el.data('item-id');

			if (!item.id) {
				item.id = index;
				item.$el.data('item-id', item.id);
			}

			if (item.$input.prop('checked')) {
				items.selectItem(item.id);
			} else {
				items.unselectItem(item.id);
			}

			item.$input.on('change', function() {
				if (item.$input.prop('checked')) {
					items.selectItem(item.id);
				} else {
					items.unselectItem(item.id);
				}

				items.checkSelected();
				settings.onChange(items.getValueSelected());
			});

			item.$el.on('click', function() {
				dropdown.hide();
			});
		});

		items.checkSelected();
	}

	items.init();


	/* Search */
	let search = {
		$el: $('.select-b__search', $el),
	};

	search.init = function() {
		search.$input = $('.select-b__search-input-text', $el);
		search.$empty = $('.select-b__search-empty', $el);

		search.start = function(value) {
			let term = value.toLowerCase();
			let itemsFound = [];

			$el.addClass('searching');

			items.$els.each(function() {
				let item = {
					$el: $(this),
				};

				item.text = $('.select-b__item-text', item.$el).text();

				if (item.text.toLowerCase().indexOf(term) > -1) {
					item.$el.addClass('found');
					itemsFound.push(item.$el);
				} else {
					item.$el.removeClass('found');
				}
			});

			if (!itemsFound.length) {
				search.$empty.addClass('shown');
			} else {
				search.$empty.removeClass('shown');
			}

			if (dropdown.list.scroll) {
				dropdown.list.scroll.update();
			}
		}

		search.reset = function() {
			$el.removeClass('searching');
			search.$empty.removeClass('shown');

			if (dropdown.list.scroll) {
				dropdown.list.scroll.update();
			}
		}

		search.$input.on('input', function() {
			if (this.value.length > 1) {
				search.start(this.value);
			} else {
				search.reset();
			}
		});
	}

	if (search.$el.length) {
		search.init();
	}

	$el.data('select-instance', this);

	/* Open methods */
	this.reset = function() {
		items.reset();
	};

	this.show = function() {
		dropdown.show();
	};

	this.hide = function() {
		dropdown.hide();
	};

	this.getSelectedValue = function() {
		return items.getValueSelected();
	};

	this.setValue = function(value) {
		items.setValue(value);
	};

	this.setItems = function(itemsHtml) {
		items.setItems(itemsHtml);
	};

}