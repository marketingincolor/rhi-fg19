jQuery(document).foundation();
/*
These functions make sure WordPress
and Foundation play nice together.
*/
jQuery(document).ready(function(){// Remove empty P tags created by WP inside of Accordion and Orbit
jQuery('.accordion p:empty, .orbit p:empty').remove();// Adds Flex Video to YouTube and Vimeo Embeds
jQuery('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function(){if(jQuery(this).innerWidth()/jQuery(this).innerHeight()>1.5){jQuery(this).wrap("<div class='widescreen responsive-embed'/>");}else{jQuery(this).wrap("<div class='responsive-embed'/>");}});});

/*
Insert Custom JS Below
*/





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
});
