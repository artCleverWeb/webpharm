import { Progress } from './components/Progress';
import { User } from './components/User';
import { Notices } from '../../components/notices/Notices';

$(function() {

    let $el = $('.js-sidebar');

    if (!$el.length) {
        return false;
    }

    let sidebar = {
        calculateBackgroundWidth: function() {
            let backgound = {
                width: 0,
            };

            backgound.width = $(window).width() - $el.offset().left;
            $el.css({ '--background-width': `${Math.floor(backgound.width)}px` });
        },
    };

    sidebar.calculateBackgroundWidth();

    $(window).on('resize', function() {
        sidebar.calculateBackgroundWidth();
    });

    /*
        Progress
    */
    let progress = {
        $el: $('.sidebar__progress', $el),
    };

    progress.instance = new Progress(progress.$el);

    /*
        User
    */
    let user = {
        $el: $('.sidebar__user', $el),
    };

    user.instance = new User(user.$el);

    /*
        Notices
    */
    let notices = {
        $el: $('.sidebar__notices', $el),
    };

    notices.instance = new Notices(notices.$el);
});