import { SwiperA } from '../../components/swiper/SwiperA';

$(function() {

    $('.js-events').each(function() {
        let events = {
            $el: $(this),
        };

        events.$list = $('.events__list', events.$el);
        events.autoload = events.$list.data('autoload');

        events.isEndOfList = function() {
            let list = {};
            let scrollTop = $(document).scrollTop();

            list.top = events.$list.offset().top;
            list.height = events.$list.height();

            if (scrollTop > list.top + list.height - $(window).height()) {
                return true;
            }

            return false;
        }

        events.loadPosts = function() {
            events.$el.addClass('loading');

            $.ajax({
                type: 'GET',
                url: 'loaded/events-posts.html',
                // data: { category: 1 },
                cache: false,
                success: function(response){
                    events.$list.append(response);
                }
            }).done(function() {
                events.$el.removeClass('loading');
            });
        }

        if (events.$list.length && events.autoload && events.isEndOfList() && !events.$el.hasClass('loading')) {
            events.loadPosts();
        }

        $(window).on('scroll mousewheel', () => {
            if (events.$list.length && events.autoload && events.isEndOfList() && !events.$el.hasClass('loading')) {
                events.loadPosts();
            }
        });

        events.promo = {
            $el: $('.events__part_promo', events.$el),
        };

        events.promo.instance = new SwiperA(events.promo.$el);
    });

});