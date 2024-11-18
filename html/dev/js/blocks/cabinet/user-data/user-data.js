import { MaskInput } from '../../../components/forms/MaskInput';

$(function() {

    let $el = $('.js-user-data');

    if (!$el.length) {
        return false;
    }

    /*
        Masks
    */
    $('[data-mask]', $el).each(function() {
        let input = {
            $el: $(this),
        };

        input.mask = new MaskInput(input.$el);
    });

    /*
        Form
    */
    let $form = $('.user-data__form', $el);

    $form.on('submit', function(event) {

    });

    /*
        Avatar
    */
    let avatar = {
        $el: $('.form__avatar', $form),
    };

    avatar.$input = $('.form__avatar-picture-input', avatar.$el);
    avatar.$buttonChange = $('.form__avatar-button-change', avatar.$el);
    avatar.$img = $('.form__avatar-picture-img', avatar.$el);

    avatar.srcInitial = avatar.$img.attr('src');

    avatar.$buttonChange.on('click', function(event) {
        avatar.$input.click();
        event.preventDefault();
    });

    avatar.$input.on('change', function(event){
        var files = avatar.$input[0].files;

        if (FileReader && files && files.length) {
            var fr = new FileReader();

            fr.readAsDataURL(files[0]);
            fr.onloadend = function () {
                avatar.$img.attr('src', fr.result);
            }
        }
    });

});