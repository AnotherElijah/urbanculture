(function($){
	"use strict"; 

	/**
	* Header Area start
	*/
	$("body.header-sticky header").addClass("animated");
	$(window).on('scroll',function() {    
		var scroll = $(window).scrollTop();
		if (scroll < 245) {
			$("body.header-sticky header").removeClass("is-sticky");
		}else{
			$("body.header-sticky header").addClass("is-sticky");
		}
	}); 

	$("header.header-sticky").addClass("animated");
	$(window).on('scroll',function() {    
		var scroll = $(window).scrollTop();
		if (scroll < 245) {
			$("header.header-sticky").removeClass("is-sticky");
		}else{
			$("header.header-sticky").addClass("is-sticky");
		}
	}); 


	if ( $('body').hasClass('logged-in') ) {
		var top_offset = $('.header-area').height() + 32;
	} else {
		var top_offset = $('.header-area').height() - 0;
	}

	$('.primary-nav-one-page nav').onePageNav({
	     scrollOffset: top_offset,
		 scrollSpeed: 750,
		 easing: 'swing',
		 currentClass: 'active',
	});

	$('body').scrollspy({target: ".primary-nav-wrap nav"});

	$(".primary-nav-one-page nav ul li:first-child").addClass("active"); 

	$('.primary-nav-wrap > nav > ul > li').slice(-2).addClass('last-elements');
	
    /*-- Mobile Menu --*/

    $('.primary-nav-wrap nav').meanmenu({
        meanScreenWidth: mobile_menu_data.menu_width,
        meanMenuContainer: '.mobile-menu',
        meanMenuClose: '<i class="fa fa-times"></i>',
        meanMenuOpen: '<i class="fa fa-bars"></i>',
        meanRevealPosition: 'right',
        meanMenuCloseSize: '25px',
    });
    
	/*
    * Header Transparent 
    */
    function headerTransparentTopbar(){
    	var headerTopbarHeight = $('.header-top-area').innerHeight(),
    		trigger = $('.main-header.header-transparent'),
    		bodyTrigger = $('body.logged-in .main-header.header-transparent');
    	if( trigger.parents().find('.header-top-area') ){
    		trigger.css('top', headerTopbarHeight + 'px');
    	}
    	if( bodyTrigger.parents().find('.header-top-area') ){
    		bodyTrigger.css('top', (headerTopbarHeight + 32) + 'px' );
    	}
    }
    headerTransparentTopbar();

    /**
    * ScrollUp
    */
	function backToTop(){

		var didScroll = false,
			scrollTrigger = $('#back-to-top');
		
		scrollTrigger.on('click',function(e) {
			$('body,html').animate({ scrollTop: "0" });
			e.preventDefault();
		});
		
		$(window).scroll(function() {
			didScroll = true;
		});

		setInterval(function() {
			if( didScroll ) {
				didScroll = false;
		
				if( $(window).scrollTop() > 250 ) {
					scrollTrigger.css('right',20);
				} else {
					scrollTrigger.css('right','-50px');
				}
			}
		}, 250);
	}
	backToTop();

	/**
	* Wow init
	*/
	new WOW().init();


	/**
	* Magnific Popup video popup 
	*/
	$('a.video-popup').magnificPopup({
		type: 'iframe',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: false
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});
    // $('.popup-gallery').magnificPopup({
    //     type: 'image'
    // });

	$(".popup-gallery").fancybox();



	/**
	* Blog Gallery Post
	*/
	$('.blog-gallery').owlCarousel({
	    loop:true,
	    nav:true,
	    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})

	/**
	* Enable Footer Fixed effect
	*/
	function fixedFooter(){
		var fooCheck = $('footer').hasClass('fixed-footer-enable');
		if(fooCheck){
			$('.site-wrapper').addClass('fixed-footer-active'); 
		}
		var FooterHeight = $('footer.fixed-footer-enable').height(),
			winWidth = $(window).width();
		if( winWidth > 991 ){
			$('.fixed-footer-active').css({'margin-bottom': FooterHeight});
			$('.fixed-footer-active .site-content').css({'background': '#ffffff'});
		} else{
			$('footer').removeClass('fixed-footer-enable');
		}
	}
	fixedFooter();

	/**
	* Page Preloading Effects
	*/
	$(window).on('load', function(){
		$(".loading-init").fadeOut(500);
	});


	/**
	* Blog Masonry
	*/
	$('.blog-masonry').imagesLoaded( function() {
		// init Isotope
		var $grid = $('.blog-masonry').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		  masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		  }
		});

	});


	/*------ 12. Magnific Popup For Video ------*/
	$('.popup-youtube').magnificPopup({
		type: 'iframe'
	});
	
	$('.popup-gallery').magnificPopup({
		type: 'image'
	});

	/*------ 03. Counter Up ------*/
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});


	$('.others_service_active').owlCarousel({
	    loop:true,
	    nav:true,
	    dots:false,
	    navText:['<i class="icofont icofont-long-arrow-left"></i>','<i class="icofont icofont-long-arrow-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:2
	        },
	        1000:{
	            items:2
	        }
	    }
	})
// Video Background Js
	$('.youtube-bg').YTPlayer();


// Actor Home Page
	/*------ 17. Trigger Menu ------*/
    var slideMenu = function (container, trigger) {
        var slideMenuContainer = container;
        var slideMenutrigger = trigger;
        $(slideMenutrigger).on('click', function () {
            $(this).toggleClass('is-active')
                .siblings(slideMenuContainer).toggleClass('is-visible');
        });
    };
    var slidemenu1 = new slideMenu('.menu_style2', '.header-style-2 .trigger-menu-icon');



	$('.ftagementor_js_ripples').ripples({
        resolution: 512,
        dropRadius: 20,
        perturbance: 0.04
    });

/*--------------------------
Countdown
---------------------------- */ 
$('[data-countdown]').each(function() {
  var $this = $(this), finalDate = $(this).data('countdown');
  $this.countdown(finalDate, function(event) {
  $this.html(event.strftime('<div class="sldr_cnt_box"><span>%-D</span>Days</div><div class="sldr_cnt_box"><span>%-H</span>Hours</div><div class="sldr_cnt_box"><span>%M</span>Mins</div><div class="sldr_cnt_box"><span>%S</span>Secs</div>'));

  });
}); 



})(jQuery);
