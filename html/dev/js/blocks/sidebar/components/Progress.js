import tippy from 'tippy.js';

export function Progress($el, options = {}) {
    if (!$el || !$el.length) {
        return false;
    }

    let tooltip = {
        $el: $('.progress__title-tooltip', $el),
    };

    if (tooltip.$el.length) {
        tippy(tooltip.$el[0], {
            // content: '', // контент указывается тут или в атрибуте data-tippy-content
        });
    }

}