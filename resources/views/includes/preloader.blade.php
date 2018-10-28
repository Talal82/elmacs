<div class="preloader">
	 <div class="left"></div>
	  <div class="avc"></div>
	  <div class="right"></div>
	</div>
	<script>
		
$(window).on('load', function() {
	$('.preloader').delay(2000).fadeOut('fast');
	$('.preloader .avc').delay(100).fadeOut('fast');
	$('.preloader>.left').animate({width:'toggle'},1000);
	$('.preloader>.right').animate({width:'toggle'},1000);
});

</script>