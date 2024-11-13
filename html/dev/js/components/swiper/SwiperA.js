import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';

export function SwiperA($el, options = {}) {
    if (!$el || !$el.length) {
        return false;
    }

    const swiper = {};

    swiper.options = {
        modules: [Navigation],
        navigation: {
            nextEl: $('.swiper-button-next', $el)[0],
            prevEl: $('.swiper-button-prev', $el)[0],
        },
        loop: false,
        slidesPerView: 3,
        spaceBetween: 16,
        speed: 400,
        breakpoints: options.breakpoints || {
            0: {
                slidesPerView: 2,
                spaceBetween: 12,
                speed: 200,
            },
            767: {
                slidesPerView: 3,
            },
            991: {
                slidesPerView: 3,
                speed: 400,
            },
            1280: {
                slidesPerView: 3,
            }
        },
    };

    swiper.instance = new Swiper($('.swiper', $el)[0], swiper.options);

}