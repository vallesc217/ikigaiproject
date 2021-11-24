( function(jquery) {
  'use strict';



  	/*-------------------------------------------------------------------------------
	  Detect mobile device 
	-------------------------------------------------------------------------------*/



	var mobileDevice = false; 

	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	  	jquery('html').addClass('mobile');
	  	mobileDevice = true;
	}

	else{
		jquery('html').addClass('no-mobile');
		mobileDevice = false;
	}



    /*-------------------------------------------------------------------------------
	  Window load
	-------------------------------------------------------------------------------*/



	jquery(window).load(function(){

		jquery('.loader').fadeOut();

    	var wow = new WOW({
		    offset: 150,          
		    mobile: false
		  }
		);
		wow.init();
	});

	var navbar=jquery('.js-navbar-affix');
	var navbarAffixHeight=59;




	/*-------------------------------------------------------------------------------
	  Smooth scroll to anchor
	-------------------------------------------------------------------------------*/



    jquery('.js-target-scroll, .navbar-nav li a[href^="#"]').on('click', function() {
        var target = jquery(this.hash);
        if (target.length) {
            jquery('html,body').animate({
                scrollTop: (target.offset().top - navbarAffixHeight + 1)
            }, 1000);
            return false;
        }
    });



    /*-------------------------------------------------------------------------------
	  Affix
	-------------------------------------------------------------------------------*/



	navbar.affix({
	  offset: {
	    top: 12
	  }
	});

	navbar.on('affix.bs.affix', function() {
		if (!navbar.hasClass('affix')){
			navbar.addClass('animated slideInDown');
		}
	});

	navbar.on('affixed-top.bs.affix', function() {
	  	navbar.removeClass('animated slideInDown');
	  	jquery('.navbar-collapse').collapse('hide');
	});



	/*-------------------------------------------------------------------------------
	 Navbar collapse
	-------------------------------------------------------------------------------*/



	jquery('.navbar-collapse').on('show.bs.collapse', function () {
	 	navbar.addClass('affix');
	});

	jquery('.navbar-collapse').on('hidden.bs.collapse', function () {
		if (navbar.hasClass('affix-top')){
			navbar.removeClass('affix');
		}
	});

	jquery(".navbar-nav > li > a").on('click', function() {
	    jquery(".navbar-collapse").collapse('hide');
	});



	/*-------------------------------------------------------------------------------
	 Scrollspy
	-------------------------------------------------------------------------------*/



	jquery('body').scrollspy({
		offset:  navbarAffixHeight + 1
	});

	jquery(".partners-carousel").owlCarousel({
		itemsMobile:[479,1],
		itemsTablet:[768,2],
		itemsDesktopSmall:[979,3],
		items:5,
		responsiveRefreshRate:0,
	 	autoHeight : true
	});




	/*-------------------------------------------------------------------------------
	  Parallax
	-------------------------------------------------------------------------------*/



	if(!mobileDevice){
		jquery(window).stellar({
		  	responsive: true,
		  	horizontalScrolling: false,
		  	hideDistantElements: false,
		  	horizontalOffset: 0,
		  	verticalOffset: 0
		});
	}



	/*-------------------------------------------------------------------------------
	  Pie charts
	-------------------------------------------------------------------------------*/



    jQuery(window).scroll( function(){

	    jQuery('.chart').each( function(i){
	        var bottom_of_object = jquery(this).offset().top + jquery(this).outerHeight();
	        var bottom_of_window = jquery(window).scrollTop() + jquery(window).height();
	        if( bottom_of_window > bottom_of_object ){
		        jquery('.chart').easyPieChart({
		          scaleColor:false,
		          trackColor:'#ebedee',
		          barColor: function(percent) {
				    var ctx = this.renderer.getCtx();
				    var canvas = this.renderer.getCanvas();
				    var gradient = ctx.createLinearGradient(0,0,canvas.width,0);
				        gradient.addColorStop(0, "#e35e5b");
				        gradient.addColorStop(1, "#febf28");
				    return gradient;
				  },
			      lineWidth:6,
			      lineCap: false,
			      rotate:180,
			      size:180,
		          animate:1000
		        });
	        }
	    }); 
	});



	/*-------------------------------------------------------------------------------
	  Video pop-up
	-------------------------------------------------------------------------------*/



	jQuery('.js-play').magnificPopup({
	    type: 'iframe',
	    removalDelay: 300
    });



	/*-------------------------------------------------------------------------------
	  Reviews carousel
	-------------------------------------------------------------------------------*/



	jQuery(".review-carousel").owlCarousel({
		itemsTablet:[768,1],
		itemsDesktopSmall:[979,2],
		itemsDesktop:[1199,3],
		items:3,
		responsiveRefreshRate:0,
	 	autoHeight : true
	});



	/*-------------------------------------------------------------------------------
	  Subscribe Form
	-------------------------------------------------------------------------------*/
	//Subscribe


    if (jQuery('#mc-form').length) {
       jQuery('#mc-form').each(function () {
            jQuery(this).validate({
                errorClass: 'error wobble-error',
                submitHandler: function (form) {
                    jQuery('#mc-form .btn').attr('disabled', true);
                    jQuery.ajax({
                        type: "POST",
                        url: felix_obj.ajaxurl,
                        data: 'action=felix_mailchimp_send&' + jQuery(form).serialize(),
                        success: function (res) {
                            jQuery('#mc-notification').html(res);

                            jQuery('#mc-form .btn').attr('disabled', false);

                        },


                        error: function (res) {

                            jQuery('#mc-notification').html(res);
                            jQuery('#mc-form .btn').attr('disabled', false);

                        }
                    });
                }
            });
        });
    }

// });


	/*-------------------------------------------------------------------------------
	  Ajax Form
	-------------------------------------------------------------------------------*/



	if (jQuery('.js-ajax-form').length) {
        jQuery('.js-ajax-form').each(function () {
            jQuery(this).validate({
                errorClass: 'error wobble-error',
                submitHandler: function (form) {
                    jquery.ajax({
                        type: "POST",
                        url: felix_obj.ajaxurl,
                        data: 'action=felix_mail_send&' + jquery(form).serialize(),
                        success: function (res) {
                            if (res == '1') {
                                jquery('.modal').modal('hide');
                                jquery('#success').modal('show');
                            } else {
                                jquery('.modal').modal('hide');
                                jquery('#error').modal('show');
                            }
                        },

                        error: function () {
                            jquery('.modal').modal('hide');
                            jquery('#error').modal('show');
                        }
                    });
                }
            });
        });
    }
})(jQuery);



if (typeof  initialize_map == undefined) {
    function initialize_map() {

    }
}
