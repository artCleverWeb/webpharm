import PerfectScrollbar from 'perfect-scrollbar';

export function User($el, options = {}) {
    if (!$el || !$el.length) {
        return false;
    }

    let dropdown = {
        $el: $('.user-mini__dropdown', $el),
    };

    if (dropdown.$el.length && window.matchMedia("(min-width: 992px)").matches) {
        dropdown.scroll = new PerfectScrollbar(dropdown.$el[0], {
            wheelSpeed: 2,
            wheelPropagation: false,
            minScrollbarLength: 20,
            swipeEasing: true,
        });
    }
}