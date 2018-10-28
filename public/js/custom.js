// JavaScript Document





$(window).scroll(function(){
	  if($(this).scrollTop()>10){
		  $(".header").addClass("sticky");
	  }
	  else{
		  $(".header").removeClass("sticky");
	  }
});




$(document).ready(function(){
	
	
	 $("html").easeScroll({
        frameRate: 60,
        animationTime: 2000,
        stepSize: 120,
        pulseAlgorithm: 1,
        pulseScale: 8,
        pulseNormalize: 1,
        accelerationDelta: 20,
        accelerationMax: 1,
        keyboardSupport: true,
        arrowScroll: 50,
        touchpadSupport: true,
        fixedBackground: true
    });
	
	$(".header .main-menu ul li a").each(function() {   
		if (this.href === window.location.href) {
			$(".header .main-menu ul li a.active").removeClass("active");
			$(this).addClass("active");
		}
	});
	
	
	$(".scroll1").mCustomScrollbar({
		theme:"dark"
	});
	//main banner slider
	$('.main-slider').owlCarousel({
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		dots: false,
		nav:  false,
		loop: true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		items:1,
		margin:0,
		stagePadding:0,
	});
	
	//project slider
	
	$('.slider1').owlCarousel({
		loop:false,
		dots: true,
		margin:15,
		responsiveClass:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		stagePadding:0,

		responsive:{
			0:{
				items:1,
			},
			400:{
				items:1,
			},
			600:{
				items:2,
			},
			800:{
				items:3,
			},
			1000:{
				items:4,
			}
		}
	});
	
	//logo slider
	
	$('.slider2').owlCarousel({
		loop:false,
		dots: false,
		margin:0,
		responsiveClass:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		stagePadding:0,
		responsive:{
			0:{
				items:2,
			},
			600:{
				items:4,
			},
			1000:{
				items:6,
			}
		}
	});
	$('.slider3').owlCarousel({
		loop:false,
		dots: false,
		margin:0,
		responsiveClass:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		stagePadding:0,
		responsive:{
			0:{
				items:3,
			},
			400:{
				items:5,
			},
			600:{
				items:5,
			},
			1000:{
				items:5,
			}
		}
	});
	
	
	$('.slider4').owlCarousel({
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		dots: false,
		nav:  true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		items:1,
		margin:0,
		stagePadding:0,
		navText: ['<img src="images/left.png">','<img src="images/right.png">']
	});
	
	 $("[data-fancybox]").fancybox({
		// Options will go here
		animationEffect: "zoom-in-out",
		transitionEffect: "zoom-in-out",
		buttons: [
			'zoom',
			'close',
			'thumbs',
			'fullScreen'
		],
		thumbs: {
			autoStart: true,                  // Display thumbnails on opening
			hideOnClose: true,                   // Hide thumbnail grid when closing animation starts
			parentEl: '.fancybox-container',  // Container is injected into this element
			axis: 'y'                     // Vertical (y) or horizontal (x) scrolling
		},
	});
	
	
	var wow = new WOW(
	  {
		boxClass:     'wow',      // animated element css class (default is wow)
		animateClass: 'animated', // animation css class (default is animated)
		offset:       0,          // distance to the element when triggering the animation (default is 0)
		mobile:       true,       // trigger animations on mobile devices (default is true)
		live:         true,       // act on asynchronously loaded content (default is true)
		callback:     function(box) {
		  // the callback is fired every time an animation is started
		  // the argument that is passed in is the DOM node being animated
		},
		scrollContainer: null // optional scroll container selector, otherwise use window
	  }
	);
	wow.init();

	
});