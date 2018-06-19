<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery/jquery.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.4.1.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/popper.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/bootstrap/bootstrap.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/appear.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/slick-carousel/slick/slick.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/master-slider/source/assets/js/masterslider.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/gmaps/gmaps.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/widget.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/version.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/keycode.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/position.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/unique-id.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/safe-active-element.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/widgets/menu.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/widgets/mouse.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/jquery-ui/ui/widgets/datepicker.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/chosen/chosen.jquery.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/image-select/src/ImageSelect.jquery.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/hs.core.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/components/hs.header.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/helpers/hs.hamburgers.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/components/hs.scroll-nav.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/components/hs.rating.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/components/hs.datepicker.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/components/hs.select.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/components/hs.carousel.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/custom.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/isotope/isotope.min.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/isotope/jquery.fancybox.pack.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/vendor/isotope/isotope-triger.js"></script>
	<script src="<?php echo FRONT_END_LAYOUT ?>/assets/js/owl-crousel.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script><script>new WOW().init();</script>			<style>		.msg_alert{display:none}		div#sub_mess {    margin-top: 6px;    padding: 10px;	}			</style>	<script>	$(document).ready(function(){		$("#subscription").on('click',function(){			var email = $(sub_id).val();			var txt = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;			if (!txt.test(email)) {				$('#sub_mess').addClass('alert-danger gp_live');				$('#sub_mess').removeClass('msg_alert');				$("#sub_mess").html('<strong>Email Not Valid !</strong>');			} else {				$.ajax({url: "/blog/subscription/", data:{email:email}, type:'post', success: function(result){					$('#sub_mess').removeClass('msg_alert');					$('#sub_mess').removeClass('alert-danger');					$("#sub_mess").html(result);				}});			}			});		});		</script>
	
	<script>

//Date picker
    $('.umrah_starting_date').datepicker({
      autoclose: true
    });
	$('.umrah_end_date').datepicker({
		autoclose: true
	});
	
	jQuery(document).ready(function() {
  // Calculate number of Slides
  var totalItems = $('.item').length;

//alert(totalItems);
  // If there is only three slides
  if (totalItems < 4) {
   
   $('.owl-controls').hide();
  } 
  else {
     $('.owl-controls').show();
  }


});
	</script>