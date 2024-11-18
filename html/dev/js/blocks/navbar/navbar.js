import { Notices } from '../../components/notices/Notices';

$(function() {

    let $el = $('.js-navbar');

    if (!$el.length) {
        return false;
    }

    let navbar = {};

    navbar.expand = function() {
        $el.addClass('expanded');

        if (window.matchMedia("(max-width: 991px)").matches) {
            $('body').addClass('u-scroll-lock');
        }
    };

    navbar.reduce = function() {
        $el.removeClass('expanded');

        if (window.matchMedia("(max-width: 991px)").matches) {
            $('body').removeClass('u-scroll-lock');
        }
    };

    navbar.$buttonToggle = $('.navbar__button-toggle', $el);

    $el.on('mouseenter mouseleave', function(event) {
        if (window.matchMedia("(min-width: 992px)").matches) {
            if (event.type == 'mouseenter') {
                navbar.expand();
            } else {
                navbar.reduce();
            }
        }
    });

    navbar.$buttonToggle.on('click', function() {
        if ($el.hasClass('expanded')) {
            navbar.reduce();
        } else {
            navbar.expand();
        }
    });

    /*
        Notices
    */
    let notices = {
        $el: $('.navbar__notices', $el),
    };

    notices.instance = new Notices(notices.$el);
});