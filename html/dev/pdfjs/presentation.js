let { pdfjsLib } = globalThis;

pdfjsLib.GlobalWorkerOptions.workerSrc = 'pdfjs/build/pdf.worker.min.js';

let timerJQueryLoading = setInterval(function() {
    if (typeof($) !== 'undefined') {
        init();
        clearInterval(timerJQueryLoading);
    }
}, 100);

function init() {
    $(function() {
        $('.js-presentation').each(function() {
            let presentation = {
                $el: $(this),
            };

            presentation.instance = new Presentation(presentation.$el);
        });
    });
}

function Presentation($el, options = {}) {
    if (!$el || !$el.length) {
        return false;
    }

    let $canvas = $('.presentation__canvas', $el);
    let fileUrl = $el.data('pdf');
    let pdf = null;
    let pageNumberCurrent = 0;

    let nav = {};

    nav.$prev = $('.presentation__nav-button_prev', $el);
    nav.$next = $('.presentation__nav-button_next', $el);

    let pageRender = async function(pageNumber = 1) {
        $el.addClass('presentation_rendering');

        const page = await pdf.getPage(pageNumber);
        let viewport = page.getViewport({ scale: 1, });
        viewport = page.getViewport({ scale: $el.width() / viewport.width, });

        // Support HiDPI-screens.
        let outputScale = window.devicePixelRatio || 1;
        let context = $canvas[0].getContext('2d');

        $canvas[0].width = Math.floor(viewport.width * outputScale);
        $canvas[0].height = Math.floor(viewport.height * outputScale);
        $canvas[0].style.width = Math.floor(viewport.width) + "px";
        $canvas[0].style.height =  Math.floor(viewport.height) + "px";

        let transform = outputScale !== 1
          ? [outputScale, 0, 0, outputScale, 0, 0]
          : null;

        let renderContext = {
            canvasContext: context,
            transform: transform,
            viewport: viewport
        };
        
        await page.render(renderContext).promise;
        $el.removeClass('presentation_rendering');
        $el.addClass('presentation_ready');
        pageNumberCurrent = pageNumber;
        updateNav();
    }

    let resizePdf = function() {
        pageRender(pageNumberCurrent);
    }

    let loadPdf = async function() {
        $el.addClass('presentation_loading');
        pdf = await pdfjsLib.getDocument(fileUrl).promise;
        pageRender(1);
        $el.removeClass('presentation_loading');
    }

    let updateNav = function() {
        let pages = {};

        pages.$current = $('.presentation__pages-number_current', $el)
        pages.$total = $('.presentation__pages-number_total', $el)

        pages.$current.text(pageNumberCurrent);
        pages.$total.text(pdf.numPages);

        if (pageNumberCurrent === 1) {
            nav.$prev.addClass('disabled');
        } else {
            nav.$prev.removeClass('disabled');
        }

        if (pageNumberCurrent === pdf.numPages) {
            nav.$next.addClass('disabled');
        } else {
            nav.$next.removeClass('disabled');
        }
    }

    let toPrevPage = function() {
        let pageNumberTarget = pageNumberCurrent - 1;

        if (pageNumberTarget < 1) {
            pageNumberTarget = 1;
        }

        pageRender(pageNumberTarget);
    }

    let toNextPage = function() {
        let pageNumberTarget = pageNumberCurrent + 1;

        if (pageNumberTarget > pdf.numPages) {
            pageNumberTarget = pdf.numPages;
        }

        pageRender(pageNumberTarget);
    }

    if (fileUrl && $canvas.length) {
        loadPdf();

        $(window).on('resize', () => {
            resizePdf();
        });

        nav.$prev.on('click', function() {
            toPrevPage();
        });

        nav.$next.on('click', function() {
            toNextPage();
        });
    }
}