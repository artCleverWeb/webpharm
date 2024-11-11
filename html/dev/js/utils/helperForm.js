
export function validate($form, { invalidOnly = false, highlight = true } = {}) {
    let valid = true,
        reEmail = /^[-._a-z0-9]+@(?:[a-z0-9][-a-z0-9]+\.)+[a-z]{2,6}$/i,
        $fieldsValidation = $('.validation:visible', $form);

    if (invalidOnly) {
        $fieldsValidation = $('.validation.invalid', $form);
    }

    $fieldsValidation.each(function(){
        let field = {
            $el: $(this),
            $input: $('input, select', this),
            valid: true,
        };

        field.type = field.$input.data('validation-type');
        field.value = field.$input.val();

        if (field.$el.hasClass('validation_checkbox') || field.$el.hasClass('validation_radio')) {
            if (!field.$input.filter(':checked').length) {
                field.valid = false;
            }
        } else if (field.type == 'select') {
            if (!field.value) {
                field.valid = false;
            }
        } else if (field.type == 'phone') {
            if (field.value.length < 18) {
                field.valid = false;
            }
        } else if (field.type == 'code') {
            if (field.value.length < 4) {
                field.valid = false;
            }
        } else if (field.type == 'date') {
            if (field.value.length < 10) {
                field.valid = false;
            }
        } else if (field.type == 'email') {
            if (field.value.search(reEmail) == -1) {
                field.valid = false;
            }
        } else if (field.type == 'text' || !field.type) {
            if (field.value.length < 2) {
                field.valid = false;
            }
        }

        if (!field.valid) {
            if (highlight) {
                field.$el.addClass('invalid');
            }

            valid = false;
        } else {
            if (highlight) {
                field.$el.removeClass('invalid');
            }
        }

    });

    return valid;
}