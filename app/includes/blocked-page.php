<br><br><br><br><br>
<div class="text-center">
    <span class="text-danger fs-3"><i class="bi bi-exclamation-octagon"></i>&nbsp; Blocked Page</span> <br>
    <span class="text-black fs-4">&nbsp; cacheup.morgancloud.us</span> <br>
    <span class="text-black">This site is only a <span class="text-info text-decoration-underline text-capitalize">desktop only</span> site!</span><br>
    <span class="text-black">Please visit this site with your laptop or computer!</span>
    <span class="text-black">Web developers are working hard to allow for this site to be used via mobile!</span>
    <p id="demo"></p>
</div>  

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>