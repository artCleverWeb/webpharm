import PerfectScrollbar from 'perfect-scrollbar';

export function Notices($el, options = {}) {
    if (!$el || !$el.length) {
        return false;
    }

    let dropdown = {
        $el: $('.notices__dropdown', $el),
    };

    dropdown.$icon = $('.notices__icon', $el);

    dropdown.show = function() {
        $el.addClass('expanded');
    }

    dropdown.hide = function() {
        $el.removeClass('expanded');
    }

    dropdown.isShown = function() {
        if ($el.hasClass('expanded')) {
            return true;
        }

        return false;
    }

    if (dropdown.$el.length && window.matchMedia("(min-width: 992px)").matches) {
        dropdown.scroll = new PerfectScrollbar(dropdown.$el[0], {
            wheelSpeed: 2,
            wheelPropagation: false,
            minScrollbarLength: 20,
            swipeEasing: true,
        });
    }

    $el.on('mouseenter mouseleave', function(event) {
        if (window.matchMedia("(min-width: 992px)").matches) {
            if (event.type === 'mouseenter') {
                dropdown.show();
            } else {
                dropdown.hide();
            }
        }
    });

    dropdown.$icon.on('click', function(event) {
        if (window.matchMedia("(max-width: 991px)").matches) {
            if (dropdown.isShown()) {
                dropdown.hide();
            } else {
                dropdown.show();
            }
        }
    });

    $(document).on('click', function(event) {
        if (!$(event.target).is(dropdown.$icon) && !$el[0].contains(event.target)) {
            dropdown.hide();
        }
    });

}