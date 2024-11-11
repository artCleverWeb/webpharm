export const popup = {
    getEl: function(data) {
        let popup = {};

        if (typeof data == 'object') {
            popup.$el = data;
        } else if (data) {
            popup.id = data.replace('#', '');

            popup.$el = $('.popup').filter(function() {
                return $(this).data('popup-id') === popup.id;
            });
        }

        return popup;
    },
    open: function(data, options = {}) {
        if (!data) {
            return false;
        }

        let popup = this.getEl(data);

        // $('body').addClass('u-scroll-lock');

        $('.popup.shown').each(function() {
            let popupLocal = {
                $el: $(this),
                closeAuto: $(this).data('popup-close-auto'),
            };

            if (popupLocal.closeAuto != 0) {
                $(this).removeClass('shown');
            }
        });

        if (popup.$el && popup.$el.length) {
            popup.$el.css({display: 'flex'});

            setTimeout(() => {
                popup.$el.addClass('shown');
            });

            popup.$el.trigger("popupOpen");
        }
    },
    close: function(data, options = {}) {
        if (!data) {
            $('.popup.shown').each(function() {
                $(this).removeClass('shown');
            });
        }

        let popup = this.getEl(data);

        // $('body').removeClass('u-scroll-lock');

        if (popup.$el && popup.$el.length) {
            popup.$el.removeClass('shown');
            popup.$el.trigger("popupClose");
        }
    },
};
