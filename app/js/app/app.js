(function() {

	// var -------------------------------------------------------------------------------------------- //
	var _body = $('body');

	// check device
	var isMobile = false;
	if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		isMobile = true;
		_body.addClass('mobile');
	} else {
		_body.addClass('full-version');
	}


	// start! ----------------------------------------------------------------------------------------- //
	window.addEventListener && window.addEventListener('DOMContentLoaded', function(){
		document.body.className += ' dom-loaded';
	}); 

	// show site -------------------------------------------------------------------------------------- //
	window.addEventListener && window.addEventListener('load', function(){
		document.body.className += ' loaded';

		$('.category .items-wrapper > div').masonry({
			columnWidth: '.item'
		});
		$('.project .items-wrapper > div').masonry({
			columnWidth: '.item'
		});

		// PROJECT PAGE
		if($('body').hasClass('project-page')) {
			closeScroll(); 		// блокувати скрол
			openMaterial();		// відкрити лист матеріалів
			numColorsElem();
			chooseSize(); 		// вибір розміру
			chooser(); 			// 
			if(!isMobile) {
				elevateZoom(); 	// активація зуму
				parralaxMaterial(); // активація паралаксу листа матеріалів
			} else {
				$('.owl-materials').owlCarousel({
					loop: false,
					nav: true,
					responsiveClass: true,
					responsive: {
						0: { items: 1 },
						461: { items: 2 },
						641: { items: 3 },
						854: { items: 4 },
						1025: { items: 5 }
					}
				});
				$('.owl-colors').owlCarousel({
					loop: false,
					nav: true,
					responsiveClass: true,
					responsive:{
						0: { items: 3 },
						461: { items: 4 },
						641: { items: 5 },
						854: { items: 7 },
						1025: { items: 9 }
					}
				})
			}

			// parralax
			var sceneHomePage = document.getElementById('waves');
			var parallax = new Parallax(waves, {
				scalarY: 20
			});
		}






	});

































	// PROJECT PAGE ------------------------------------------------------------------------------ //

	function closeScroll() {
		var scrollCloseBlock = document.querySelector('.materials-wrapper');
		function handler(event, delta, deltaX, deltaY) {
			event.preventDefault();
		};
		Hamster(scrollCloseBlock).wheel(handler,false);
	};

	function elevateZoom() {
		$('#zoom-project').elevateZoom({
			zoomType: 'lens',
			lensShape: 'round',
			lensSize: 200
		});
	};

	function parralaxMaterial() {
		// визначаю ширину кожного елемента ТКАНИНА
		var item = $('.materials-wrapper .materials .wrapper > div');
		var num = item.length;
		item.css({
			'width': 100/num + '%',
			'padding-top': 100/num + '%'
		});
		// визначаю ширину кожного елемента КОЛІР
		var item = $('.materials-wrapper .colors .wrapper > div');
		var num = item.length;
		item.css({
			'width': 100/num + '%',
			'padding-top': 100/num + '%'
		});

		// go parralax materials
		$('.materials-wrapper .materials .wrapper').parallax({
			mouseport: $('.materials-wrapper .materials'),
			yparallax: false,
			xparallax: '100%'
		});
		// go parralax colors
		$('.materials-wrapper .colors .wrapper').parallax({
			mouseport: $('.materials-wrapper .colors'),
			yparallax: false,
			xparallax: '100%'
		});
	};

	function openMaterial() {
		$('.choice-material .elect-materials').on('click', function() {
			if(!isMobile) {
				$('body').toggleClass('show-materials');
			} else {
				$('body').toggleClass('show-materials');
			};
		});
	};

	function chooseSize() {
		$('.project .small-sizes .size-1 span').on('click', function() {
			$('.project .small-sizes .size-1 span').removeClass('active');
			$(this).addClass('active');
		});
	};

	// позиціонування колір малий
	function numColorsElem() {
		var i,
			elem = $('.project .choice-material .colors-wrapper > div'),
			num = elem.length,
			calc = 180/num*2;
		var fixedNum = calc;
		for (i=0; i<num; i++) {
			elem[i].style.webkitTransform = 'rotate(' + calc + 'deg' + ')';
			elem[i].style.MozTransform = 'rotate(' + calc + 'deg' + ')';
			elem[i].style.msTransform = 'rotate(' + calc + 'deg' + ')';
			elem[i].style.OTransform = 'rotate(' + calc + 'deg' + ')';
			elem[i].style.transform = 'rotate(' + calc + 'deg' + ')';
			calc+=fixedNum;
		};
	};

	function chooser() {

		// вибір вигляду крісла
		$('.project .small-images .item').on('click', function() {
			var bigImage = $(this).attr('data-img');
			$('.project .home-image img').attr('src', bigImage);
			$('.project .home-image img').attr('data-zoom-image', bigImage);

			// active class
			$('.project .small-images > div > div').removeClass('active');
			$(this).parent().addClass('active');

			// re-initialize
			if(!isMobile) {
				$('#zoom-project').data('zoom-image', bigImage).elevateZoom({
					zoomType: 'lens',
					lensShape: 'round',
					lensSize: 200
				});
			};
		});

		// вибір матеріалу та кольору в попапі
		$('.materials-wrapper .wrapper .item').on('click', function() {
			$(this).parents('.wrapper').find('.item').removeClass('active');
			//$('.materials-wrapper .materials .item').removeClass('active');
			$(this).addClass('active');
			var material = $(this).attr('data-img');
			$('.project .elect-materials').css('background', 'url(' + material + ')');
		});

		// синхронізація вибору кольору
		$('.materials-wrapper .colors .item, .project .choice-material .colors-wrapper div span').on('click', function() {
			var dataItem =  $(this).attr('data-item');
			$('.project .choice-material .colors-wrapper div span').removeClass('active');
			$('.materials-wrapper .colors .item').removeClass('active');
			$('.project .choice-material .colors-wrapper div span[data-item=' + dataItem + ']').addClass('active');
			$('.materials-wrapper .colors .item[data-item=' + dataItem + ']').addClass('active');
		});

		// закрити попап
		$('.materials-wrapper .close').on('click', function() {
			$('body').removeClass('show-materials');
		});
	}








})();