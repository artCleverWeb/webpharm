export let preloaderGlobal = {
    $el: $('.preloader_global'),
    show: function() {
        let $el = this.$el;

        $el.css({ display: 'flex' });

        setTimeout(() => {
            $el.addClass('preloader_shown');
        });
    },
    hide: function() {
        let $el = this.$el;

        $el.removeClass('preloader_shown');
    },
}