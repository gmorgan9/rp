$(document).ready(function(){			
	// Toggle plus minus icon on show hide of collapse element
	$(".collapse").on('show.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").addClass("rotate");
	}).on('hide.bs.collapse', function(){
		$(this).parent(".card").find(".toggle").removeClass("rotate");
	});
});

// Get the container element
var btnContainer = document.getElementById("a1");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("list-unstyled");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");

    // If there's no active class
    if (current.length > 0) { 
      current[0].className = current[0].className.replace(" active", "");
    }

    // Add the active class to the current/clicked button
    this.className += " active";
  });
}