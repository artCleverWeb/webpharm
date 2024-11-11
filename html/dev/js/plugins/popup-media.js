(function( $ ) {
 
    $.fn.popupMedia = function() {
    	return this.each(function() {
	    	var $element = $(this),
	    		popup = {
	    			$el: null,
	    			buttons: {},
	    		}, 
	    		$elementsGallery = null,
	    		indexCurrent = 0;

	    	popup.gallery = $element.data('gallery');

	    	popup.open = function() {
	    		$('body').append(`<div class="popup-media">
		    			<div class="popup-media__overlay"></div>
		    			<div class="popup-media__data"></div>
		    			<a href="#" class="popup-media__button popup-media__button_close"><svg class="icon popup-media__button-icon"><use xlink:href="images/icons/icons.svg#icon-cross"></use></svg></a>
		    			<div class="preloader popup-media__preloader"><div class="preloader__spinner popup-media__preloader-spinner"></dib></dib>
	    			</div>`);

	    		popup.$el = $('.popup-media');
	    		popup.$data = $('.popup-media__data', popup.$el);
	    		popup.buttons.$close = $('.popup-media__button_close', popup.$el);
	    		popup.$overlay = $('.popup-media__overlay', popup.$el);

	    		$elementsGallery = $('[data-gallery='+ popup.gallery +']');
	    		
	    		if ($elementsGallery.length > 1) {
	    			popup.$el.append(`<a href="#" class="popup-media__button popup-media__button_prev"><svg class="icon popup-media__button-icon"><use xlink:href="images/icons/icons.svg#icon-arrow-1"></use></svg></a>
	    				<a href="#" class="popup-media__button popup-media__button_next"><svg class="icon popup-media__button-icon"><use xlink:href="images/icons/icons.svg#icon-arrow-1"></use></svg></a>`);
	    			popup.buttons.$prev = $('.popup-media__button_prev', popup.$el);
	    			popup.buttons.$next = $('.popup-media__button_next', popup.$el);

	    			popup.buttons.$prev.on('click', function(){
	    				popup.toPrev();
	    				event.preventDefault();
	    			});
	    			popup.buttons.$next.on('click', function(){
	    				popup.toNext();
	    				event.preventDefault();
	    			});
	    		}

	    		popup.elementInsert($element);

	    		setTimeout(function(){
	    			popup.$el.addClass('popup-media_shown');
	    		}, 0);

	    		popup.$overlay.on('click', function(){
	    			popup.close();
	    		});

	    		popup.buttons.$close.on('click', function(){
	    			popup.close();
	    			event.preventDefault();
	    		});
	    	}

	    	popup.close = function() {
	    		popup.$el.removeClass('popup-media_shown');

	    		setTimeout(function(){
	    			popup.$el.remove();
	    		}, 1000);
	    	}

	    	popup.toPrev = function() {
	    		indexCurrent = indexCurrent - 1;

	    		if (indexCurrent < 0) {
	    			indexCurrent = $elementsGallery.length - 1;
	    		}

	    		popup.elementInsert($elementsGallery.eq(indexCurrent));
	    	}

	    	popup.toNext = function() {
	    		indexCurrent = indexCurrent + 1;

	    		if (indexCurrent > $elementsGallery.length - 1) {
	    			indexCurrent = 0;
	    		}

	    		popup.elementInsert($elementsGallery.eq(indexCurrent));
	    	}

	    	popup.elementInsert = function($element) {
	    		var element = {
	    			src: $element.prop('href'),
	    			type: $element.data('popup-type'),
	    			$description: $('.popup-media-description', $element),
	    		};

	    		popup.preloaderShow();

	    		if (element.type == 'video') {
	    			if (element.src.search('youtube') > -1) {
	    				popup.$data.html('<div class="popup-media__video popup-media__video_iframe"><div class="popup-media__video-inner"><iframe class="popup-media__video-canvas" src="'+ element.src +'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen"></iframe></div></div>');
	    				$('.popup-media__video-canvas', popup.$data).one("load", function() {
	    					popup.preloaderHide();
	    				});
	    			} else {
	    				popup.$data.html('<div class="popup-media__video popup-media__video_iframe"><div class="popup-media__video-inner"><video poster="" playsinline="" preload="auto" controls loop class="popup-media__video-canvas"><source src="'+ element.src +'" type="video/mp4"></video></div></div>');
	    				$('video', popup.$data).each(function(){
	    					this.load();
	    					this.play();

	    					$(this).on('loadstart', function(){
	    						popup.preloaderHide();
	    					});
	    				});
	    			}
	    		} else {
	    			popup.$data.html('<div class="popup-media__picture"><img src="'+ element.src +'" alt="" class="popup-media__picture-img"/></div>');
	    			$('.popup-media__picture-img', popup.$data).one("load", function() {
	    				popup.preloaderHide();
	    			}).each(function() {
	    				if(this.complete) $(this).trigger('load');
	    			});
	    		}

	    		popup.$el.css({'--description-height': '0px'});

	    		if (element.$description.length) {
	    			popup.$data.append('<div class="popup-media__description">' + element.$description.html() + '</div>');
	    			popup.$description = $('.popup-media__description', popup.$el);
	    			popup.$el.css({'--description-height': popup.$description.height() + 'px'});
	    		}

	    		$elementsGallery.each(function(index){
	    			if ($(this).is($element)) {
	    				indexCurrent = index;
	    			}
	    		});
	    	}

	    	popup.preloaderShow = function() {
	    		popup.$el.addClass('popup-media_loading');
	    	}

	    	popup.preloaderHide = function() {
	    		popup.$el.removeClass('popup-media_loading');
	    	}

	    	$element.on('click', function(event) {
	    		popup.open();

	    		event.preventDefault();
	    	});
    	});
    };
 
}( jQuery ));