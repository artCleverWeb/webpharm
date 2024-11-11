import { SwiperA } from '../../components/swiper/SwiperA';

$(function() {

    $('.js-posts').each(function() {
        let posts = {
            $el: $(this),
        };

        posts.instance = new SwiperA(posts.$el);
    });

});