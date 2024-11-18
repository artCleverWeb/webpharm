import { YANDEX_API_KEY } from '../constants/constants'

export function imageSrcSet($img) {
	const img = {};

	if ($img.data('src')) {
	    img.src = $img.data('src');

	    $img.prop('src', img.src);
	    $img.data('src', null);
	}

	if ($img.data('srcset')) {
	    img.src = $img.data('srcset');

	    $img.prop('srcset', img.src);
	    $img.data('srcset', null);
	}
}

export async function loadYandexMaps() {
	return new Promise((resolve, reject) => {
		let script = document.getElementById('yandex-maps-api');

		if (!script) {
			script = document.createElement('script');
			script.src = `//api-maps.yandex.ru/2.1/?apikey=${YANDEX_API_KEY}&lang=ru_RU`;
			script.async = true;
			script.id = 'yandex-maps-api';
			document.head.append(script);
		}

		let timerLoading = setInterval(function() {
			if (typeof(ymaps) !== 'undefined') {
				resolve({ loaded: true });
				clearInterval(timerLoading);
			}
		}, 100)
	});
}

export function getNumberFromString(value) {
    let valueTreated = Number(value.toString().replace(/[^0-9]/g, '') || 0);
    return valueTreated;
}

export function getStringNumberSplitted(value) {
    let valueTreated = value.toString().replace(/[^0-9]/g, '').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
    return valueTreated;
}

export function getProductNodesById(id) {
	let $productsFiltered = $('.product-mini, .product-mini-cart, .product-card, .view-product').filter(function() {
	    return $(this).data('product-id') == id;
	});

	return $productsFiltered;
}

// Выровнять элементы по высоте находящиеся в разных блоках но на одной горизонтальной линии
export function alignHeightElements($list) {
	if (!$list || !$list.length) {
		return false;
	}

	let getElements = function() {
		return $('[data-align-element]', $list);
	};

	let getMaxOrder = function() {
		let orderMax = 1;

		getElements().each(function() {
		    const order = $(this).data('align-order');

		    if (orderMax < order) {
		        orderMax = order;
		    }
		});

		return orderMax;
	};

	let orderMax = getMaxOrder();

	for (let order = 1; order <= orderMax; order++) {
	    let $items = getElements();
	    let topMax = 0;
	    let itemsByTop = [];
	    let itemsByHeight = [];

	    if (orderMax > 1) {
	        $items = getElements().filter(function () {
	            return $(this).data('align-order') == order;
	        });
	    }

	    $items.css({minHeight: ''});

	    $items.each(function(index) {
	        const item = {
	        	$el: $(this),
	        };

	        item.top = Math.round(item.$el.offset().top);
	        item.height = item.$el.height();
	        item.$el.data({alignTop: item.top, alignHeight: item.height});

	        if (item.top > topMax) {
	            topMax = item.top;
	            itemsByTop.push(topMax);
	        }
	    });

	    $.each(itemsByTop, (key, value) => {
	        let itemHeightMax = 0;

	        $items.each(function (index) {
	            const item = {
	            	$el: $(this),
	            };

	            item.topInitial = item.$el.data('align-top');
	            item.heightInitial = item.$el.data('align-height');

	            if (item.topInitial < value + 10 && item.topInitial > value - 10) {
	                if (item.heightInitial > itemHeightMax) {
	                    itemHeightMax = item.heightInitial;
	                }
	            }
	        });

	        itemsByHeight.push(itemHeightMax);
	    });

	    $.each(itemsByTop, (key, value) => {
	        $items.each(function () {
	            const item = {
	            	$el: $(this),
	            };

	            item.topInitial = item.$el.data('align-top');

	            if (item.topInitial < value + 10 && item.topInitial > value - 10) {
	                $(this).data('align-height-target', itemsByHeight[key]);
	            }
	        });
	    });

	    $items.each(function () {
	        const item = {
	            heightTarget: $(this).data('align-height-target'),
	        };

	        $(this).css({minHeight: item.heightTarget});
	    });
	}
}