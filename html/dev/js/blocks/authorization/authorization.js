import { MaskInput } from '../../components/forms/MaskInput';

$(function() {

    let $el = $('.js-authorization');

    if (!$el.length) {
        return false;
    }

    $('[data-mask]', $el).each(function() {
        let input = {
            $el: $(this),
        };

        input.mask = new MaskInput(input.$el);
    });

    let $form = $('.authorization__form', $el);

    $form.on('submit', function(event) {

    });

});