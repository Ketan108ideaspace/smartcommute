jQuery(function() {
// aria navigation
    jQuery('.nav, .nav2, .nav-sec ').setup_navigation();
// aria navigation  ends
//// Font resizing initializer
            jQuery("#textsizer li a").textresizer({
                target: "body",
				sizes: [".875em", "1em", "1.125em", "1.25em", "1.375em", "1.5em", "1.625em", "1.75em", "1.875em"]
            });
//
//// Font resizing initializer ends
	

	
//banner slider
jQuery('.flexslider').flexslider({
	controlNav: true,
	directionNav: true,
	keyboard: true,
	slideshow: true	,
	animation: "fade",
	pausePlay: true

	});

jQuery('.testimonial-slider,.mobile-slider').flexslider({
	controlNav: false,
	directionNav: true,
	keyboard: true,
	slideshow: true	,
	animation: "slide"

	});
jQuery('.stats-slider').flexslider({
	controlNav: false,
	directionNav: true,
	keyboard: true,
	slideshow: true	,
	animation: "fade"

	});
jQuery('.content-inside-box .flexslider').flexslider({
	controlNav: false,
	directionNav: true,
	keyboard: true,
	slideshow: true	,
	animation: "slide",
	pausePlay: false

	});
//banner slider ends


// mobile menu functioning
    jQuery("a#trigger").on("click", function() {
        jQuery("body").addClass("disabled");
    });
    jQuery("#page").on("click", function() {
        jQuery("body").removeClass("disabled");
    });
// mobile menu functioning ends



// skip content / back to top buttons
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.skip-content').fadeOut();
            jQuery('.back-to-top').fadeIn();

        } else {
            jQuery('.skip-content').fadeIn();
            jQuery('.back-to-top').fadeOut();

        }
    });

	jQuery('.back-to-top').click(function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
// skip content / back to top buttons ends



// sticky nav functioning for home / inside pages
jQuery('header').css('position', 'fixed').css('z-index', '9');

jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > 1) {
        jQuery('header').addClass("sticky");
        jQuery('header').css('position', 'fixed');
		jQuery('.admin-bar header').css('position', 'fixed').css('z-index', '9').css('top', 32);

	/*	jQuery('body').css('padding-top', 0);*/
    } else {
        jQuery('header').removeClass("sticky");
        jQuery('header').css('position', 'fixed').css('z-index', '19');
	/*	jQuery('body').css('padding-top', 0);*/
    }
});

var h_header = jQuery("header").height();
var h_header_logged = jQuery("header").height() + 32;
var l_pad = 0;
jQuery('.inside #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header);
jQuery('.inside .admin-bar #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header_logged);
/*jQuery('.inside body').css('padding-top', l_pad);*/
jQuery(window).scroll(function() {
	var h_top = jQuery("#banner").height() - 133;
	var h_top_logged = jQuery("#banner").height() - 165;


	var new_top = h_top ;

    if (jQuery(this).scrollTop() > new_top && screen.width > 767) {
        jQuery('#nav-2').addClass('sticky');
    }
	else if(jQuery(this).scrollTop() > h_top_logged && screen.width > 767){
		jQuery('.admin-bar #nav-2').addClass('sticky');
		}
	else if (jQuery(this).scrollTop() > 0 && screen.width > 767) {
        jQuery('#nav-2').removeClass('sticky');
    }
    if (jQuery(this).scrollTop() > 1 && screen.width > 767) {
        jQuery('.inside #nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').addClass('stickyy');
        jQuery('.inside #nav-2').css('position', 'fixed').css('top',h_header);
		//jQuery('.logged-in #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_top_logged);
		jQuery('.inside .admin-bar #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header_logged);
	/*	jQuery('.inside body').css('padding-top', l_pad);*/

    } else if (jQuery(this).scrollTop() <= 0 && screen.width > 767) {
        jQuery('.inside #nav-2').removeClass('stickyy');
		jQuery('.inside #nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header);
		//jQuery('.logged-in #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_top_logged);
		jQuery('.inside .admin-bar #nav-2').css('position', 'fixed').css('z-index', '1').css('top',h_header_logged);
		/*jQuery('.inside body').css('padding-top', l_pad);*/

    }

});


jQuery(window).resize(function() {

    if (jQuery(this).scrollTop() > 0 && jQuery(this).width() <= 767 ) {
		jQuery('#nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').removeClass('stickyy');
    }

});
jQuery(document).ready(function() {
    if (jQuery(this).scrollTop() > 0 && jQuery(this).width() <= 767 ) {
		jQuery('#nav-2').removeClass('sticky');
        jQuery('.inside #nav-2').removeClass('stickyy');
    }

});
// sticky nav functioning for home / inside pages ends

// select drop down
/*jQuery(function () {

        var $win = jQuery(window); // or $box parent container
        var $box = jQuery(".dropcontainer");
        //  var $log = jQuery(".log");

        $win.on("click.Bst", function (event) {
            if (
                $box.has(event.target).length == 0 //checks if descendants of $box was clicked
                    && !$box.is(event.target) && !jQuery('.trigger').is(event.target)//checks if the $box itself was clicked
                ) {
                if (jQuery(".dropcontainer ul").hasClass('dropdownvisible')) {
                    jQuery(".dropcontainer ul").removeClass('dropdownvisible');
                    jQuery(".dropcontainer ul").addClass('dropdownhidden');

                }
                if (jQuery(".dropcontainer ul").hasClass('dropdownhidden')) {
                    jQuery(".dropcontainer ul").removeClass('dropdownhhidden');
                    jQuery(".dropcontainer ul").addClass('dropdownvisible');

                }
            }
        });



    });
//function test(i) {
    switch (i) {
        case 1:
            if (jQuery("#cat-dropdown ul").hasClass('dropdownhidden')) {
                jQuery("#cat-dropdown ul").removeClass('dropdownhidden');
                jQuery("#cat-dropdown ul").addClass('dropdownvisible');
            } else if (jQuery("#cat-dropdown ul").hasClass('dropdownvisible')) {
                jQuery("#cat-dropdown ul").removeClass('dropdownvisible');
                jQuery("#cat-dropdown ul").addClass('dropdownhidden');
            }
            break;
        case 2:
            if (jQuery("#arc-dropdown ul").hasClass('dropdownhidden')) {
                jQuery("#arc-dropdown ul").removeClass('dropdownhidden');
                jQuery("#arc-dropdown ul").addClass('dropdownvisible');
            } else if (jQuery("#arc-dropdown ul").hasClass('dropdownvisible')) {
                jQuery("#arc-dropdown ul").removeClass('dropdownvisible');
                jQuery("#arc-dropdown ul").addClass('dropdownhidden');
            }

            break;


    }
}*/

	function DropDown(el)
    {
		this.dd = el;
		this.initEvents();
	}
	DropDown.prototype = {
		initEvents : function() {
			var obj = this;
            obj.dd.on('click', function(event){
				jQuery(this).toggleClass('active');
				event.stopPropagation();
            });
		}
	}
    jQuery(function() {
        var dd = new DropDown( jQuery('#resource-type') );
		var dd = new DropDown( jQuery('#resource-country') );
        jQuery(document).click(function() {jQuery('.wrapper-dropdown-2').removeClass('active');});
    });

    jQuery('#resource-type ul li').click(function(e){
        e.preventDefault();
        var type_name = jQuery(this).find('a').html();
        var type_id = jQuery(this).find('a').attr('data-resource-id');
        jQuery('#resource-type-name').html(type_name);
        jQuery('#resource_type_id').val(type_id);

    })

    jQuery('#resource-country ul li').click(function(e){
        e.preventDefault();
        var type_name = jQuery(this).find('a').html();
        var type_id = jQuery(this).find('a').attr('data-resource-id');
        jQuery('#resource-country-name').html(type_name);
        jQuery('#resource_country_id').val(type_id);
    })

// select drop down ends

// accrodions for inside pages and side bar
if (jQuery.fn.accordion) {

jQuery('.news-box-mobile, .events-box-mobile, .board-member-mobile, .country-section-mobile')
  .accordion({
    autoheight: false,
    collapsible: true,
    active: false
  });
}
// accrodions for member dashboard page ends
//jquery MAP
if (jQuery.fn.vectorMap) {

jQuery('#vmap').vectorMap({

    map: 'world_en',
      backgroundColor: 'null',
      color: '#8e0b56',
	  colors: {gl: '#eeeeee',pe: '#eeeeee',bo: '#eeeeee'},
      hoverColor: '#eeeeee',
      hoverColors: {},
      selectedColor: '#eeeeee',
      scaleColors: ['#eeeeee', '#eeeeee'],
      normalizeFunction: 'polynomial',
      enableZoom: true,
	  borderColor: '#ffffff',
      borderWidth: 1,
      borderOpacity: 0.25,

});
}
// MAP ends
});
// window width specific
jQuery(function() {
    if (screen.width < 768) {

	}
	else{
	//jQuery(".facebook-box > div").removeClass("facebook-slider");
	//jQuery(".facebook-box > div ul").removeClass("slides");
		}
	return false;
});
jQuery(window).load(function() {
    if (screen.width > 768) {
	}
	return false;
});
jQuery(window).resize(function() {
    if (screen.width < 768) {

	}

	return false;
});

jQuery(function() {
    if (screen.width < 767) {
	}
	return false;
});
jQuery(window).load(function() {
    if (screen.width < 767) {

	}
	return false;
});
jQuery(window).resize(function() {
    if (screen.width < 767) {

	}
	return false;
});




// equal heigt container creates

equalheight = function(container) {

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    jQuery(container).each(function() {

        $el = jQuery(this);
        jQuery($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

jQuery(function() {
    if (screen.width < 1024) {
        jQuery(".content-area-inside, .sidebar-right").removeClass("eq-height");
        jQuery(".content-area-inside, .sidebar-right").css('height', 'auto');
		jQuery(".e-bulletin-list .entry-box").css('height', 'auto');
    } else if (screen.width > 1024) {
        equalheight('.content-area-wrap > .eq-height');
		 equalheight('.e-bulletin-list .entry-box');

        return false;
    }

});

jQuery(window).load(function() {
    if (screen.width < 1024) {
        jQuery(".content-area-inside, .sidebar-right").removeClass("eq-height");
        jQuery(".content-area-inside, .sidebar-right").css('height', 'auto');
		jQuery(".e-bulletin-list .entry-box").css('height', 'auto');

    } else if (screen.width > 1024) {
        equalheight('.content-area-wrap > .eq-height');
		equalheight('.e-bulletin-list .entry-box');


        return false;
    }


});

jQuery(window).resize(function() {
    if (screen.width < 1024) {
        jQuery(".content-area-inside, .sidebar-right").removeClass("eq-height");
        jQuery(".content-area-inside, .sidebar-right").css('height', 'auto');
		jQuery(".e-bulletin-list .entry-box").css('height', 'auto');

    } else if (screen.width > 1024) {
        equalheight('.content-area-wrap > .eq-height');
		equalheight('.e-bulletin-list .entry-box');

    }



});

jQuery(window).load(function() {
    if (screen.width > 767) {

	equalHeightOnHomeSection();


 equalheight('#speak-topic .content-box ul li');
  equalheight('#with-randall .content-box ul li');
equalheight('#blog-content .content-box ul li');
    } else {

 jQuery("#speak-topic .content-box ul li").css('height', 'auto');
 jQuery('#with-randall .content-box ul li').css('height', 'auto');
 jQuery(".resorces-box ul li").css('height', 'auto');
	jQuery('#blog-content .content-box ul li').css('height', 'auto');
    }
});
jQuery(function() {

    if (screen.width > 767) {
		 equalheight('#speak-topic .content-box ul li');
  equalheight('#with-randall .content-box ul li');
			equalheight('#blog-content .content-box ul li');
    } else {

 jQuery("#speak-topic .content-box ul li").css('height', 'auto');
 jQuery('#with-randall .content-box ul li').css('height', 'auto');
jQuery('#blog-content .content-box ul li').css('height', 'auto');
    }
});

jQuery(window).resize(function() {
    if (screen.width > 767) {
		
				 equalheight('#speak-topic .content-box ul li');
  equalheight('#with-randall .content-box ul li');
			equalheight('#blog-content .content-box ul li');
    } else {

 jQuery("#speak-topic .content-box ul li").css('height', 'auto');
 jQuery('#with-randall .content-box ul li').css('height', 'auto');
 jQuery(".resorces-box ul li").css('height', 'auto');
 jQuery('#blog-content .content-box ul li').css('height', 'auto');		
    }
});

// equal heigt container ends




//member sidebar expand / collaps supporting functionality
/*jQuery(document).ready(function() {

	jQuery("li.current_page_item").parent("ul").addClass("current_ancestor_item");
	jQuery("li.current_page_item").parent("ul").parent("li").parent("ul").parent("li").siblings("li").addClass("non_current_ancestor_item");
		jQuery("li.current_page_item").parent("ul").parent("li").parent("ul").parent("li").addClass("current_ancestor_item_li");
		jQuery("ul.current_ancestor_item").parent("li").siblings("li").children("ul").css('display', 'none');
jQuery("li.current_page_item").siblings("li").children("ul").css('display', 'none');

});*/
//member sidebar expand / collaps supporting functionality ends


//anchor link for sticky menu
    jQuery(function(){
        setTimeout(function(){
            var shiftWindow = function() {
                var hash = "#" + location.hash.replace(/[^A-Za-z0-9_\-]/g, "");
                if (hash && jQuery(hash).offset()) {
                    var pos = jQuery(hash).offset().top - 210;
                    jQuery(window).scrollTop(pos);
                }
             };
            if (location.hash) shiftWindow();
            window.addEventListener("hashchange", shiftWindow);
        },10);
    });
//anchor link for sticky menu ends
//image mask code

//image mask code end
//equal Height On Home Section FB , Resources
function equalHeightOnHomeSection() {
		var firstBlockFbHeight = jQuery(".wff-fb-item:nth-of-type(1)").height();
		var firstBlockLiHeight = jQuery(".resorces-box ul li:nth-child(1)").height();
		var firstBlockFbHeight2 = jQuery(".wff-fb-item:nth-of-type(2)").height();
		var firstBlockLiHeight2 = jQuery(".resorces-box ul li:nth-child(2)").height();
		var firstBlockFbHeight3 = jQuery(".wff-fb-item:nth-of-type(3)").height();
		var firstBlockLiHeight3 = jQuery(".resorces-box ul li:nth-child(3)").height();

		if(firstBlockFbHeight > firstBlockLiHeight){
		jQuery(".resorces-box ul li:nth-child(1)").height(firstBlockFbHeight);
		}else{
		jQuery(".wff-fb-item:nth-of-type(1)").height(firstBlockLiHeight);
		//return false;
		}
		if(firstBlockFbHeight2 > firstBlockLiHeight2){
		jQuery(".resorces-box ul li:nth-child(2)").height(firstBlockFbHeight2);
		}else{
		jQuery(".wff-fb-item:nth-of-type(2)").height(firstBlockLiHeight2);
		//return false;
		}
		if(firstBlockFbHeight3 > firstBlockLiHeight3 ){
		jQuery(".resorces-box ul li:nth-child(3)").height(firstBlockFbHeight3);
		}else{
		jQuery(".wff-fb-item:nth-of-type(3)").height(firstBlockLiHeight3);
		// return false;
		}

}
//equal Height On Home Section FB , Resources


//thought leader ship books slider
    jQuery(function(){	
//			 if (screen.width > 767) {
//				 jQuery('#slider').movingBoxes({
//					     reducedSize: 0.35
//					 
//				 });
//			 }else if (screen.width > 991) {
//				 jQuery('#slider').movingBoxes({
//					     reducedSize: 0.45
//					 
//				 });
//			 }else if (screen.width > 1199) {
//				 jQuery('#slider').movingBoxes({
//					     reducedSize: 0.65
//					 
//				 });
//			 }			
	jQuery('#slider').movingBoxes({

    // **** Appearance ****
    // start with this panel
    startPanel: 3,
    // non-current panel size: 80% of panel size
reducedSize: 0.45,
    // if true, slider height set to max panel height; 
    // if false, height will auto adjust.
    fixedHeight: false,

    // **** Behaviour ****
    // if true, movingBoxes will initialize, then animate into the
    // starting slide (if not the first slide)
    initAnimation: false,
    // if true, movingBoxes will force the animation to complete
    // immediately, if the user selects the next panel
    stopAnimation: true,
    // if true, hash tags are enabled
    hashTags: true,
    // if true, the panel will loop through the panels infinitely
    wrap: true,
    // if true, navigation links will be added
    buildNav: true,
    // function which returns the navigation text for each panel
    navFormatter: function(index, panel) {
        return "&#9679;" // bullets
    },
    // anything other than "linear" or "swing" requires the easing plugin
    easing: 'swing',

    // **** Times ****
    // animation time in milliseconds
    speed: 500,
    // time to delay in milliseconds before MovingBoxes animates
    // to the selected panel
    delayBeforeAnimate: 0,

    // **** Selectors & classes ****
    // current panel class
    currentPanel: 'current',
    // added to the navigation, but the title attribute is blank unless
    // the link text-indent is negative
    tooltipClass: 'tooltip',
    // class added to arrows that are disabled (left arrow when on first
    // panel, right arrow on last panel)
    disabled: 'disabled',

    // **** Callbacks ****
    // e = event, slider = MovingBoxes Object, tar = current panel #
    // callback after the basic MovingBoxes structure has been built;
    // before "initialized"
    preinit: function(e, slider, tar) {},
    // callback when MovingBoxes has completed initialization
    initialized: function(e, slider, tar) {},
    // callback upon change panel initialization
    initChange: function(e, slider, tar) {
        // alert( 'Changing panels to #' + tar );
    },
    // callback before any animation occurs
    beforeAnimation: function(e, slider, tar) {},
    // callback after animation completes
    completed: function(e, slider, tar) {
        // get name from title
        // var name = slider.$panels.eq(tar-1).find('h2').text().split(' ')[0]; 
        // alert( "Now on " + name + "'s panel" );
    }

    // **** Deprecated options ****
    // overall width of movingBoxes
    // width: 300, // Deprecated, but still works in v2.2.2+
    // current panel width adjusted to 50% of overall width
    // panelWidth: 0.5, // Deprecated, but still works in v2.2.2+   
});

});
//thought leader ship books slider ends