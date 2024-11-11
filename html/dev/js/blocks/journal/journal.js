$(function() {

    $('.js-journal').each(function() {
        let journal = {
            $el: $(this),
        };

        journal.$list = $('.journal__list', journal.$el);
        journal.autoload = journal.$list.data('autoload');

        journal.isEndOfList = function() {
            let list = {};
            let scrollTop = $(document).scrollTop();

            list.top = journal.$list.offset().top;
            list.height = journal.$list.height();

            if (scrollTop > list.top + list.height - $(window).height()) {
                return true;
            }

            return false;
        }

        journal.loadPosts = function() {
            journal.$el.addClass('loading');

            $.ajax({
                type: 'GET',
                url: 'loaded/journal-posts.html',
                // data: { category: 1 },
                cache: false,
                success: function(response){
                    journal.$list.append(response);
                }
            }).done(function() {
                journal.$el.removeClass('loading');
            });
        }

        if (journal.$list.length && journal.autoload && journal.isEndOfList() && !journal.$el.hasClass('loading')) {
            journal.loadPosts();
        }

        $(window).on('scroll mousewheel', () => {
            if (journal.$list.length && journal.autoload && journal.isEndOfList() && !journal.$el.hasClass('loading')) {
                journal.loadPosts();
            }
        });

    });

});