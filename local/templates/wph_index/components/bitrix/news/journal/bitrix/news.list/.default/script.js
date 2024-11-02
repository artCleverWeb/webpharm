BX.journalTimer;
function loadAjaxJournal() {
    var journalBody = document.querySelector('[data-journal="body"');
    var journalNav  = document.querySelector('[data-journal="nav"');
    if (journalNav != null && !BX.hasClass(journalBody, "loading")) {
        if (BX.journalTimer) {
            clearTimeout(BX.journalTimer);
        }
        BX.journalTimer = setTimeout(() => {
            var windowScroll = BX.GetWindowScrollPos();
            var windowSize   = BX.GetWindowInnerSize();
            var pos          = BX.pos(journalBody);
            var posBody      = pos.top + BX.height(journalBody);
            var button       = windowScroll.scrollTop >= document.body.scrollHeight - windowSize.innerHeight;
            if (button || windowScroll.scrollTop > windowSize.innerHeight || windowSize.innerHeight > posBody) {
                BX.showWait();
                BX.addClass(journalBody, "loading");
                BX.ajax({
                    url: journalNav.href,
                    method: 'POST',
                    dataType: 'html',
                    emulateOnload: false,
                    processData: true,
                    scriptsRunFirst: false,
                    start: true,
                    cache: false,
                    data: {
                        sessid: BX.bitrix_sessid(),
                        AJAX_PAGE: 'Y'
                    },
                    onsuccess: function(data) {
                        data      = BX.processHTML(data);
                        var tmp   = BX.create("DIV", {html: data.HTML});
                        var body  = tmp.querySelector('[data-journal="body"]');
                        var nav   = tmp.querySelector('[data-journal="nav"]');
                        var last  = journalBody.lastElementChild.querySelector('[class*="post-mini-c__mark_bg-"]');
                        var index = 1;
                        if (last != null) {
                            var match = last.className.match(/post-mini-c__mark_bg-(\d{1})$/);
                            if (match && match[1]) {
                                index = Number(match[1]) + 1;
                            }
                        }
                        for (var i = 0; i < body.children.length; i++) {
                            if (body.children[i].className.includes('promo')) {
                                continue;
                            }
                            body.children[i].outerHTML = body.children[i].outerHTML.replace(/post-mini-c__mark_bg-/g, (match) => {
                                return 'post-mini-c__mark_bg-'+index+' _';
                            });
                            index++;
                            if (index > 3) {
                                index = 1;
                            }
                            journalBody.innerHTML += body.children[i].outerHTML;
                        }
                        BX.closeWait();
                        BX.removeClass(journalBody, "loading");
                        if (nav != null) {
                            BX.adjust(journalNav, {props: {href: nav.href}});
                        } else {
                            BX.remove(journalNav);
                        }
                    }
                });
            }
        }, 300);
    }
}
BX.ready(function(){
    var journalBody = document.querySelector('[data-journal="body"');
    var journalNav  = document.querySelector('[data-journal="nav"');
    BX.bind(window, 'scroll', function(){
        if (journalNav != null && !BX.hasClass(journalBody, "loading")) {
            loadAjaxJournal();
        }
    });
    loadAjaxJournal();
});