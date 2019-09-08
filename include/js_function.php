<script src="../js/jquery-ui.min.js" type="text/javascript" ></script>
<script src="../js/jquery.touchSwipe.js" type="text/javascript" ></script>
<script src="../owl-carousel/owl.carousel.js"></script>
<script src="../owl-carousel/owl.navigation.js"></script>
<script src="../owl-carousel/owl.autoplay.js"></script>
<script src="../js/jquery.simplyscroll.js"></script>
<script type="text/javascript" src="../js/jquery.fancybox.pack.js"></script>

<script type="text/javascript">
var id=1;
var max_id;
function swapBanner(id_rel){
	var $activeBanner = $('#banner .banner_show .banner.active');
	var $nextBanner = ($activeBanner.next().length > 0) ? $activeBanner.next() : $('#banner .banner_show .banner:first');
	id = (id == max_id ? 1 : id+1);

	$activeBanner.fadeOut(800,function(){
		$activeBanner.removeClass("active");
		$nextBanner.fadeIn(800).addClass("active");
	});
}

$(document).ready(function(){
	$('#banner .banner_show .banner:first').addClass("active");
	max_id = $('#banner .banner_show .banner').length;

	var invBanner = setInterval("swapBanner()",4000);

	$('#menu li.lv1').hover(function(){
		$(this).children('ul.lv2').stop().slideDown(800);
	},function(){
		$(this).children('ul.lv2').stop().slideUp(800);
	});

	$('ul.scroller').simplyScroll({
		customClass: 'vert',
		orientation: 'vertical',
		auto: true,
		frameRate: 20,
		speed: 1
	});

	$('a.event_d').fancybox({
		autoCenter  : true,
		fitToView	: false,
		maxWidth	: 1200,
		width		: '90%',
		height      : 700,
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});

	$('a.speaker_d').fancybox({
		autoCenter  : true,
		fitToView	: false,
		maxWidth	: 1100,
		width		: '95%',
		height      : '80%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});
</script>
<?php $conn->close();?>