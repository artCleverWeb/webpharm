import { popup } from './components/popup/popup';

window.$ = $;

$(function() {

    /*
        Попап, триггеры
    */
    $(document).on('click', '[data-popup-trigger="open"]', function(event){
        let popupTarget = {
            id: $(this).attr('href') || $(this).data('popup-target-id'),
        };

        popup.open(popupTarget.id);

        event.preventDefault();
    });

    $(document).on('click', '[data-popup-trigger="close"]', function(event){
        let popupTarget = {
            $el: $(this).closest('.popup'),
        };

        popupTarget.id = popupTarget.$el.data('popup-id');
        popup.close(popupTarget.$el);

        event.preventDefault();
    });


    /*
        Медиа попап
    */
    $('.js-popup-media-open').popupMedia();

});
