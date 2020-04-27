// Get the container element
var navContainer = document.getElementById("header");

// Get all buttons with class="btn" inside the container
var navs = navContainer.getElementsByClassName("header");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < navs.length; i++) {
  navs[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
