$(function() {

    let $el = $('.js-wallet');

    if (!$el.length) {
        return false;
    }

    $('.wallet__tabs', $el).each(function() {
        let tabs = {
            $el: $(this),
        };

        tabs.nav = {
            $items: $('.wallet__tabs-nav-item', tabs.$el),
        };
        tabs.content = {
            $items: $('.wallet__tabs-content-item', tabs.$el),
        };

        tabs.nav.$items.on('click', function(event) {
            let item = {
                $el: $(this),
            };

            item.index = item.$el.index();
            item.$el.addClass('active').siblings().removeClass('active');
            tabs.content.$items.eq(item.index).addClass('active').siblings().removeClass('active');
        });
    });

    $('.wallet__transactions', $el).each(function() {
        let transactions = {
            $el: $(this),
        };
        let tab = {
            $el: $(this).closest('.wallet__tabs-content-item'),
        };

        transactions.$list = $('.transactions__list', transactions.$el);
        transactions.autoload = transactions.$el.data('autoload');

        transactions.isEndOfList = function() {
            let list = {};
            let scrollTop = $(document).scrollTop();

            list.top = transactions.$list.offset().top;
            list.height = transactions.$list.height();

            if (scrollTop > list.top + list.height - $(window).height()) {
                return true;
            }

            return false;
        }

        transactions.loadTransactions = function() {
            transactions.$el.addClass('loading');

            $.ajax({
                type: 'GET',
                url: 'loaded/transactions.html',
                // data: { category: 1 },
                cache: false,
                success: function(response){
                    transactions.$list.append(response);
                }
            }).done(function() {
                transactions.$el.removeClass('loading');
            });
        }

        transactions.canLoadTransactions = function() {
            return tab.$el.hasClass('active') && transactions.autoload && transactions.isEndOfList() && !transactions.$el.hasClass('loading') && !transactions.$el.data('loaded-all');
        }

        if (transactions.canLoadTransactions()) {
            transactions.loadTransactions();
        }

        $(window).on('scroll mousewheel', (event) => {
            if (transactions.canLoadTransactions()) {
                transactions.loadTransactions();
            }
        });

    });

});