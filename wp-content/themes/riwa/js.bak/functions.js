jQuery(function ($) {
	'use strict';
 
	// Loader
	jQuery(window).on('load', function () {
		"use strict";
		jQuery('.loader').fadeOut(800);

		
	});

    // 	// WOW					  
	new WOW().init();
    
    jQuery("#wpadminbar").addClass("adminbar");
   
  
		
    // // scrolling animation

    
    //scroll sections on clicking Links
   
    $('.scroll').click(function(e){
        
        var link = $(this).attr("href");
        if(link.lastIndexOf('#') === 0){
            $('html, body').animate({
                scrollTop: $(link).offset().top
                }, 700);
            return 0;
        }  
        return true; 
        
    }); 
   

	$(window).on('scroll', function () {
		   	if ($(this).scrollTop() > 20) { 
				$('.navbar-brand> img').attr('src', riwa_params.url_logo_sticky);
			}
			else {
				$('.navbar-brand> img').attr('src', riwa_params.url_logo );
		}

	
	});

    //responsive Tabs
    var tabs = "#responsiveTabsDemo"; 
    var responsiveTabs = {
        callTabs: function () {
            $(tabs).responsiveTabs({
                animation: 'slide'
            }, {'activate': '0'});
        }
    };
    responsiveTabs.callTabs();
    
	// ======================================================
	//Toggle to open banner form
	// ======================================================

	// $(".form-containert").hide();
	$(".icon-chevron-thin-down").hide();
	$(".btn-slide").on('click', function () {
		$(this).toggleClass('active')
		$(this).find(".icon-chevron-thin-up, .icon-chevron-thin-down").toggle();
		$(".form-container").slideToggle({
			direction: "up"
		}, 300);
		e.preventdefault();
	});


	// ======================================================
	// Fact Counter
	// ======================================================	 
	$(".counters-item").appear(function () {
		$(".counters-item [data-to]").each(function () {
			var e = $(this).attr("data-to");
			$(this).delay(6e3).countTo({
				from: 50,
				to: e,
				speed: 3e3,
				refreshInterval: 50
			})
		})
	});


	// ======================================================
	// Filter Mix Gallery
	// ======================================================	 
	$(".zerogrid").mixItUp();


	// ======================================================
	// Push Menu
	// ======================================================	 


	// Push Menus 

	var $menuLeft = $(".pushmenu-left");
	var $menuRight = $(".pushmenu-right");
	var $toggleleft = $("#menu_bars.left");
	var $toggleright = $("#menu_bars.right");
	if ($("#menu_bars").length) {
		$("body").addClass("pushmenu-push");
		$toggleleft.on("click", function () {
			$(this).toggleClass("active");
			$(".pushmenu-push").toggleClass("pushmenu-push-toright");
			$menuLeft.toggleClass("pushmenu-open");
			return false;
		});
		$toggleright.on("click", function () {
			$(this).toggleClass("active");
			$(".pushmenu-push").toggleClass("pushmenu-push-toleft");
			$menuRight.toggleClass("pushmenu-open");
			return false;
		});
	}

	// Menu in sidebar				  
	$(function () {
		$('#dl-menu').dlmenu({
			animationClasses: {
				classin: 'dl-animate-in-2',
				classout: 'dl-animate-out-2'
			}
		});
	});

	// ======================================================
	//DropDown handler
	// ======================================================	  

	//For Nav Menu Toggle Transition 
	$('.nav-icon').on('click', function () {
		return $(this).toggleClass('open');
	}.call(this));

	$(".navbar-default .navbar-nav li.dropdown").on('click', function () {
		e.preventdefault();
		if ($(window).width() < 979) {
			$(this).next('.dropdown-menu').show();
			$(this).next.toggleClass('open');
		}

	});

	$(".navbar-default .navbar-nav li.dropdown").hover(function () {
		e.preventdefault();
		if ($(window).width() >= 979) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideToggle(500);
			$(this).toggleClass('open');
		}
	}, function () {
		e.preventdefault();
		if ($(window).width() >= 979) {
			$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
			$(this).removeClass('open');
		}
	});



	// ========================================================================= 
	//	Back to Top
	// ========================================================================= 

	if ($('#back-top').length) {
		var scrollTrigger = 600, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('#back-top').addClass('show');
				} else {
					$('#back-top').removeClass('show');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#back-top').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700, 'linear');
		});
	}


	// ======================================================
	// Sliders
	// ======================================================
	//Services & Specialist
	$("#service-slider , #specialist-slider").owlCarousel({
		autoPlay: false,
		items: 2,
		pagination: false,
		navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		navigation: true,
		itemsDesktop: [1199, 2],
		itemsDesktopSmall: [979, 2],
		itemsTablet: [768, 2],
		itemsMobile: [480, 1],
	});

	//  Blog Page
	$("#blog-slider").owlCarousel({
		autoPlay: false,
		singleItem: true,
		pagination: false,
		navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		navigation: true,
		itemsDesktop: [1199, 2],
		itemsDesktopSmall: [979, 2],
		itemsMobile: [480, 1],

	});

	//Our Specialist On About
	$("#our-specialist , #team-slider , #food-slider").owlCarousel({
		autoPlay: 4000,
		items: 2,
		pagination: false,
		navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
		navigation: true,
		itemsDesktop: [1199, 2],
		itemsDesktopSmall: [979, 2],
        itemsMobile: [480, 1]

	});

	  // Client Slide
    var clientSlider = {
        sliderCall: function () {
            $("#client-slider").owlCarousel({

                navigation: true, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                stopOnHover: true,
                pagination: false

                // "singleItem:true" is a shortcut for:
                // items : 1,
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false
            });
        }
    };
    //call client slider
    clientSlider.sliderCall();

 


	// ======================================================
	//FAQ's Accordions
	// ======================================================

	$(".items > li > a").on('click', function (e) {
		e.preventDefault();
		var $this = $(this);
		if ($this.hasClass("expanded")) {
			$this.removeClass("expanded");
		} else {
			$(".items a.expanded").removeClass("expanded");
			$this.addClass("expanded");
			$(".sub-items").filter(":visible").slideUp("normal");
		}
		$this.parent().children("ul").stop(true, true).slideToggle("normal");
		e.preventdefault();
	});



	// ====================================================== 
	// tabbed content On Sidebar 
	// ======================================================
	$(".tab_content").hide();
	$(".tab_content:first").show();

	/* if in tab mode */
	$("ul.tabs li").on('click', function () {
		$(".tab_content").hide();
		var activeTab = $(this).attr("rel");
		$("#" + activeTab).fadeIn();

		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");

		$(".tab_drawer_heading").removeClass("d_active");
		$(".tab_drawer_heading[rel^='" + activeTab + "']").addClass("d_active");

	});

	/* if in drawer mode on Mobile Version*/
	$(".tab_drawer_heading").on('click', function () {
		$(".tab_content").hide();
		var d_activeTab = $(this).attr("rel");
		$("#" + d_activeTab).fadeIn(1200);

		$(".tab_drawer_heading").removeClass("d_active");
		$(this).addClass("d_active");

		$("ul.tabs li").removeClass("active");
		$("ul.tabs li[rel^='" + d_activeTab + "']").addClass("active");
	});

	// ======================================================
	//Popup 	
	// ======================================================
	$(".fancybox").fancybox({
		openEffect: 'elastic',
		openSpeed: 650,
		closeEffect: 'elastic',
		closeSpeed: 550,
		closeClick: true,
		helpers: {
			overlay: {  
				locked: false
			}
		}
	});

	// video popoup
	$(".video").fancybox({
		fitToView: true,
		autoSize: true,
		closeClick: false,
		helpers: {
			overlay: {
				locked: false
			}
		} 
	}); 


	// ======================================================
	//For choose date on form field
	// ======================================================	 
	$('#datetimepicker').datetimepicker({
		format: "dd MM yyyy"
	});
    
    

});




