$(document).ready(function(){			
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").addClass("rotate");
	}).on('hide.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").removeClass("rotate");
	});
});

$(document).ready(function() {
	$('li.active').removeClass('active');
	$('a[href$="' + location.pathname.match(/[^\\/]+$/)[0] + '"]').closest('li').addClass('active'); 
  });