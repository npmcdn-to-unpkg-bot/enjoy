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

		// gallery
		$('.offer-items .items-wrapper > div, .gallery-items .items-wrapper > div').masonry({
			columnWidth: '.item'
		});
	}); 

	// show site -------------------------------------------------------------------------------------- //
	window.addEventListener && window.addEventListener('load', function(){
		document.body.className += ' loaded';

		menuOpen()

		// PROJECT PAGE
		if($('body').hasClass('project-page')) {
			closeScroll();
			openMaterial();
			numMaterialsElem();
			numColorElem();
			chooseSize();
			chooser();
			if(!isMobile) {
				elevateZoom(); // активація зуму
				parallaxMaterial(); // активація паралаксу листа матеріалів
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




















	function menuOpen() {
		$('header .open-menu-button').on('click', function() {
			_body.toggleClass('open-menu')
		})
	}











	// PROJECT PAGE ------------------------------------------------------------------------------ //

	// блокувати скрол, коли відкритий лист матеріалів
	function closeScroll() {
		var scrollCloseBlock = document.querySelector('.elements-wrapper');
		function handler(event, delta, deltaX, deltaY) {
			event.preventDefault();
		};
		Hamster(scrollCloseBlock).wheel(handler,false);
	};

	// zoom image
	function elevateZoom() {
		$('#zoom-project').elevateZoom({
			zoomType: 'lens',
			lensShape: 'round',
			lensSize: 200
		});
	};

	// паралакс на листі матеріалів
	function parallaxMaterial() {
		// визначаю ширину кожного елемента МАТЕРІАЛ
		var item = $('.elements-wrapper .materials .wrapper > div'),
			num = item.length,
			sizer = 1;
		item.css({
			'width': (100/num)*sizer + '%',
			'padding-top': (100/num)*sizer + '%'
		});
		// визначаю ширину кожного елемента КОЛІР
		var item = $('.elements-wrapper .colors .wrapper > div');
		var num = item.length;
		item.css({
			'width': (100/num)*sizer + '%',
			'padding-top': (100/num)*sizer + '%'
		});

		// go parralax materials
		$('.elements-wrapper .materials .wrapper').parallax({
			mouseport: $('.elements-wrapper .materials'),
			yparallax: false,
			xparallax: '100%'
		});
		// go parralax colors
		$('.elements-wrapper .colors .wrapper').parallax({
			mouseport: $('.elements-wrapper .colors'),
			yparallax: false,
			xparallax: '100%'
		});
	};
	
	// створення списку матеріалів		
	function matList(options){
		var div = '';
		var i = 1;
		options.each(
			function(){
				t = $(this).text();
				v = $(this).val();
				img = "http://bamb.loc/enjoy/app/wp/wp-content/themes/enjoy/pictures/materials/1.jpg";
				if(v!=''){
					div = div+'<div><span class="item" style="background:url('+img+') no-repeat center" data-img="'+img+'" data-select="'+v+'" data-item="item-'+i+'"></span><p>'+t+'</p></div>';					
				}
				i++;
			});
			$('.rainbow-materials').html(div);
		}
	matList($("#pa_material option"));
	
	// створення списку кольорів		
	function colorList(options){
		var div ='';
		var i = 1;
		options.each(
			function(){
				t = $(this).text();
				v = $(this).val();
				img = "http://bamb.loc/enjoy/app/wp/wp-content/themes/enjoy/pictures/materials/2.jpg";
				if(v!=''){
					div = div+'<div><span class="item" style="background:url('+img+') no-repeat center" data-img="'+img+'" data-item="item-'+i+'" data-select="'+v+'"></span><p>'+t+'</p></div>';
				}
				i++;
			});
			$('.rainbow-colors').html(div);
		}
	colorList($("#pa_kolory option"));
	
	// створення списку розмірів		
	function rozmirList(options){
		var div ='';
		var i = 1;
		options.each(
			function(){
				t = $(this).text();
				v = $(this).val();
				if(v!=''){
					div = div+'<span data-select="'+v+'">'+t+'</span>';
				}
				i++;
			});
			$('.size-1').html(div);
		}
	rozmirList($("#pa_rozmiry option"));

	// відкрити лист матеріалів чи кольору
	function openMaterial() {
		$('.constructor .choice-wrapper .elect').on('click', function() {
			if($(this).hasClass('elect-materials')) {
				if(!isMobile) {
					$('body').toggleClass('show-materials');
				} else {
					$('body').toggleClass('show-materials');
				};
			} else {
				if(!isMobile) {
					$('body').toggleClass('show-colors');
				} else {
					$('body').toggleClass('show-colors');
				};
			}
		})
	};

	// обрати розмір
	function chooseSize() {
		$('.project .small-sizes .size-1 span').on('click', function() {	
			$('.project .small-sizes .size-1 span').removeClass('active');
			$(this).addClass('active');
			
			var select = $(this).attr('data-select');
			$("#pa_rozmiry").val(select).change();
			//matList($("#pa_rozmiry option"));
		});
	};

	// позиціонування матеріал на превюшці
	function numMaterialsElem() {
		var i,
			elem = $('.project .choice-material .rainbow > div'),
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
	// позиціонування колір на превюшці
	function numColorElem() {
		var i,
			elem = $('.project .choice-color .rainbow > div'),
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

		// вибір матеріалу
		// (при кліку на превюшку)
		$('.rainbow-materials div .item').on('click', function() {
			var dataItem =  $(this).attr('data-item');
			// зміна позиції на превюшці
			$('.rainbow-materials div .item').removeClass('active');
			$('.rainbow-materials div .item[data-item=' + dataItem + ']').addClass('active');
			// синхронізація з листом
			$('.elements-wrapper .materials .item').removeClass('active');
			$('.elements-wrapper .materials .item[data-item=' + dataItem + ']').addClass('active');
			// заміна картинки
			var material = $(this).attr('data-img');
			$('.project .elect-materials').css('background', 'url(' + material + ')');
			
			var select = $(this).attr('data-select');
			$("#pa_material").val(select).change();
			//matList($("#pa_material option"));
		});
		// (при кліку на лист)
		$('.elements-wrapper .materials .item').on('click', function() {
			var dataItem =  $(this).attr('data-item');
			// зміна позиції на листі
			$('.elements-wrapper .materials .item').removeClass('active');
			$('.elements-wrapper .materials .item[data-item=' + dataItem + ']').addClass('active');
		});

		// вибір кольору
		// (при кліку на превюшку)
		$('.rainbow-colors div .item').on('click', function() {
			var dataItem =  $(this).attr('data-item');
			// зміна позиції на превюшці
			$('.rainbow-colors div .item').removeClass('active');
			$('.rainbow-colors div .item[data-item=' + dataItem + ']').addClass('active');
			// синхронізація з листом
			$('.elements-wrapper .colors .item').removeClass('active');
			$('.elements-wrapper .colors .item[data-item=' + dataItem + ']').addClass('active');
			// заміна картинки
			var material = $(this).attr('data-img');
			$('.project .elect-colors').css('background', 'url(' + material + ')');
			
			var select = $(this).attr('data-select');
			$("#pa_kolory").val(select).change();
			//colorList($("#pa_kolory option"));
		});
		// (при кліку на лист)
		$('.elements-wrapper .colors .item').on('click', function() {
			var dataItem =  $(this).attr('data-item');
			// зміна позиції на листі
			$('.elements-wrapper .colors .item').removeClass('active');
			$('.elements-wrapper .colors .item[data-item=' + dataItem + ']').addClass('active');
		});

		// застосувати обраний матеріал
		$('.elements-wrapper .add').on('click', function() {

			// матеріал
			// внести зміни
			var dataItem = $('.elements-wrapper .materials .wrapper span.item.active').attr('data-item');
			// синхронізація з превюшкою
			$('.rainbow-materials div .item').removeClass('active');
			$('.rainbow-materials div .item[data-item=' + dataItem + ']').addClass('active');
			// заміна картинки
			var material = $('.elements-wrapper .materials .wrapper span.item.active').attr('data-img');
			$('.project .elect-materials').css('background', 'url(' + material + ')');

			// колір
			// внести зміни
			var dataItem = $('.elements-wrapper .colors .wrapper span.item.active').attr('data-item');
			// синхронізація з превюшкою
			$('.rainbow-colors div .item').removeClass('active');
			$('.rainbow-colors div .item[data-item=' + dataItem + ']').addClass('active');
			// заміна картинки
			var material = $('.elements-wrapper .colors .wrapper span.item.active').attr('data-img');
			$('.project .elect-colors').css('background', 'url(' + material + ')');

			// закрити попап
			$('body').removeClass('show-materials show-colors');
		});

		// закрити попап
		$('.elements-wrapper .close').on('click', function() {

			// синхронізувати лист з превюшкою

			// матеріал
			var dataItem = $('.rainbow-materials > div > span.active').attr('data-item');
			// зміна позиції на листі
			$('.elements-wrapper .materials .item').removeClass('active');
			$('.elements-wrapper .materials .item[data-item=' + dataItem + ']').addClass('active');

			// колір
			var dataItem = $('.rainbow-colors > div > span.active').attr('data-item');
			// зміна позиції на листі
			$('.elements-wrapper .colors .item').removeClass('active');
			$('.elements-wrapper .colors .item[data-item=' + dataItem + ']').addClass('active');

			// закрити попап
			$('body').removeClass('show-materials show-colors');
		});
	}

	// END --------------------------------------------------------------------------------------- //



	$( 'form.variations_form' ).trigger(function(){ 
		alert(1);
	});


})();