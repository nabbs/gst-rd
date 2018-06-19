		// initialization of master slider
		var promoSlider = new MasterSlider();
		promoSlider.setup('masterslider', {
		 width: 1400,
		 height: 580,
		 speed: 70,
		 layout: 'fullscreen',
		 loop: true,
		 preload: 0,
		 autoplay: true
		});
		promoSlider.control('thumblist', {
		 autohide: false,
		 dir: 'h',
		 align: 'bottom',
		 width: 200,
		 height: 120,
		 margin: 0,
		 space: 0,
		 hideUnder: 767
		});
		$(document).on('ready', function() {
		 // initialization of carousel
		 $.HSCore.components.HSCarousel.init(
		  '.js-carousel');
		 // initialization of header
		 $.HSCore.components.HSHeader.init(
		  $('#js-header'));
		 $.HSCore.helpers.HSHamburgers.init(
		  '.hamburger');
		 // initialization of datepicker
		 $.HSCore.components.HSDatepicker.init(
		  '.js-datepicker');
		 // initialization of custom select
		 $.HSCore.components.HSSelect.init(
		  '.js-custom-select');
		 // initialization of rating
		 $.HSCore.components.HSRating.init(
		  $('.js-rating'), {
		   spacing: 4
		  });
		 // initialization of go to section
		 $.HSCore.components.HSGoTo.init(
		  '.js-go-to');
		});
		$(window).on('load', function() {
		 // initialization of HSScrollNav
		 $.HSCore.components.HSScrollNav.init(
		  $('#js-scroll-nav'), {
		   duration: 700
		  });
		 // initialization of cubeportfolio
		 //$.HSCore.components.HSCubeportfolio
		  //.init('.cbp');
		});
		/* Javascript */
		$(function() {
		 $(".rateYo").rateYo({
		  ratedFill: "#E74C3C",
		  maxValue: 4,
		  numStars: 5,
		  starWidth: "20px",
		  rating: 3.2,
		  halfStar: true,
		 });
		 $('.owl-carousel').owlCarousel({
		 loop: true,
		 margin: 30,
		 autoplay: false,
		 autoplayTimeout: 3000,
		 autoplayHoverPause: true,
		 nav: true,
		 responsive: {
		  0: {
		   items: 1
		  },
		  768: {
		   items: 2
		  },
		  1024: {
		   items: 3
		  }
		 }
		});
		});
		
		/*--------------Nav bar active deactive-------------*/
		jQuery(document).ready(function() {
		  jQuery(".navbar-nav .nav-item").click(function() {
		    jQuery(".navbar-nav .nav-item").removeClass('active');
		    jQuery(this).addClass('active');
		   });
		  var loc = window.location.href;
		  jQuery(".navbar-nav .nav-item").removeClass('active');
		  jQuery(".navbar-nav .nav-item a").each(function() {
		    if (loc.indexOf(jQuery(this).attr("href")) != -1) {
		     jQuery(this).closest('.nav-item').addClass("active");
		    }
		   });
		 });
		/* change search box heading on selection of tab */
		$('.nav-tabs a').click(function (){
			$('#tab-heading').text($(this).attr('data-tabname'));
			
		})
		/*---------------end-------------*/

		
/* scroll to search box on homepage */
		
$(document).ready(function(){
	var winHeight = $(window).height() - 190;
    $("html, body").delay(2000).animate({
        scrollTop: $('#searchBox').offset().top - winHeight
    }, 1000);
});