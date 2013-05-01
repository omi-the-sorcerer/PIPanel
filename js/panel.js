$(document).ready(function() {
	$('.parent').hover(function(e) {
		 $('nav ul').css({display: "none"});
         $(this).find('ul').css({display: "block"});
      });
	$('.sub').click(function (e) {
		$('.sub a').removeClass("sel");
		$(this).find("a").addClass("sel");
	});
});
