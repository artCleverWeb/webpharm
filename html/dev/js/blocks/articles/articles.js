import { SwiperA } from '../../components/swiper/SwiperA';

$(function() {

    $('.js-articles').each(function() {
        let articles = {
            $el: $(this),
        };

        articles.$list = $('.articles__list', articles.$el);
        articles.autoload = articles.$list.data('autoload');

        articles.isEndOfList = function() {
            let list = {};
            let scrollTop = $(document).scrollTop();

            list.top = articles.$list.offset().top;
            list.height = articles.$list.height();

            if (scrollTop > list.top + list.height - $(window).height()) {
                return true;
            }

            return false;
        }

        articles.loadPosts = function() {
            articles.$el.addClass('loading');

            $.ajax({
                type: 'GET',
                url: 'loaded/articles-posts.html',
                // data: { category: 1 },
                cache: false,
                success: function(response){
                    articles.$list.append(response);
                }
            }).done(function() {
                articles.$el.removeClass('loading');
            });
        }

        if (articles.$list.length && articles.autoload && articles.isEndOfList() && !articles.$el.hasClass('loading')) {
            articles.loadPosts();
        }

        $(window).on('scroll', () => {
            if (articles.$list.length && articles.autoload && articles.isEndOfList() && !articles.$el.hasClass('loading')) {
                articles.loadPosts();
            }
        });

        articles.promo = {
            $el: $('.articles__part_promo', articles.$el),
        };

        articles.promo.instance = new SwiperA(articles.promo.$el);
    });

});