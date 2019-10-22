jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/
jQuery(document).ready(function(){
ajaxFilterBlogs();
// Remove empty P tags created by WP inside of Accordion and Orbit
jQuery('.accordion p:empty, .orbit p:empty').remove();// Adds Flex Video to YouTube and Vimeo Embeds
jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function(){if(jQuery(this).innerWidth()/jQuery(this).innerHeight()>1.5){jQuery(this).wrap("<div class='widescreen responsive-embed'/>");}else{jQuery(this).wrap("<div class='responsive-embed'/>");}});});

/*
Insert Custom JS Below
*/

// Anchor Link Scroller Script
jQuery(function() {
	jQuery('a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[id=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});


jQuery(document).ready(function(){
	jQuery("#instagram-carousel").owlCarousel({
		//items:4,
		loop:true,
		margin:20,
		nav:true,
		responsiveClass:true,
		responsive:{
			0:{
				items:1,
				nav:true
			},
			600:{
				items:2,
				nav:true
			},
			1000:{
				items:4,
				nav:true
			}
		},
		//dots:true,
		autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:true,
		navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});

	jQuery("#aftercare-carousel").owlCarousel({
		items:1,
		loop:true,
		margin:20,
		nav:true,
		//dots:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});

	jQuery("#browcare-carousel").owlCarousel({
		items:1,
		loop:true,
		margin:20,
		nav:true,
		//dots:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});

	jQuery("#liftcare-carousel").owlCarousel({
		items:1,
		loop:true,
		margin:20,
		nav:true,
		//dots:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});

	jQuery("#microcare-carousel").owlCarousel({
		items:1,
		loop:true,
		margin:20,
		nav:true,
		//dots:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
	});	
});


function ajaxFilterBlogs(){
    jQuery('#filter-blogs').on('click',function(e){
        e.preventDefault();
    var indications = jQuery('#posttags-select').val();
    var $content    = jQuery('#archive-grid');
    var ajaxURL     = templateURL + '/ajax-filter-blogs.php';
    var currentURL  = location.href;
    var category;

    // if locations or indications is blank send alert and exit the function
    if (indications === null) {
        alert('You must select a type to filter by.');
        return false;
    }

    // Get category based on current URL
    if (currentURL.indexOf('blog') > -1) {
        category = 'blog';
    }else{
        category = 'blog';
    }
    // Show Loading Gif
    $content.html('<div class="small-12 cell text-center"><img class="loading" src="' + templateURL + '/assets/images/loading.gif" style="width:100px"></div>');

        jQuery.ajax({
            url: ajaxURL,
            type: 'POST',
            data: {
                posttags : indications,
                category    : category
            },
            success: function(response) {
                $content.html(response);
            }
        });
    });
}


function altajaxFilterBlogs(){
    jQuery('#posttags-select')
    	.change(function() {
		    var indications = jQuery('#posttags-select').val();
		    var $content    = jQuery('#archive-grid');
		    var ajaxURL     = templateURL + '/ajax-filter-blogs.php';
		    var currentURL  = location.href;
		    var category;
		    // if locations or indications is blank send alert and exit the function
		    if (indications === null) {
		        alert('You must select a type to filter by.');
		        return false;
		    }
		    // Get category based on current URL
		    if (currentURL.indexOf('blog') > -1) {
		        category = 'blog';
		    }else{
		        category = 'blog';
		    }
		    // Show Loading Gif
    		$content.html('<div class="small-12 cell text-center"><img class="loading" src="' + templateURL + '/assets/images/loading.gif" style="width:100px"></div>');
		    jQuery( "select option:selected" ).each(function() {
    	        jQuery.ajax({
		            url: ajaxURL,
		            type: 'POST',
		            data: {
		                posttags : indications,
		                category    : category
		            },
		            success: function(response) {
		                $content.html(response);
		            }
		        });
		    });
    	})
    .change();
}