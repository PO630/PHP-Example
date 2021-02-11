/*
//===============================================================//

  Type    : Js
  Auteur  : Marcheix François-Xavier
  Date    : 11/02/2021

                          ^ ^
                        (=o o=)
                          \_/

//===============================================================//
*/

// Get all elements with class="closebtn"
var closebtnAlert = document.getElementsByClassName("closebtnAlertBox");
var i;

// Loop through all close buttons
for (i = 0; i < closebtnAlert.length; i++) {
  // When someone clicks on a close button
  closebtnAlert[i].onclick = function()
  {
    // Get the parent of <span class="closebtn"> (<div class="alert">)
    var div = this.parentElement;
    // Set the opacity of div to 0 (transparent)
    div.style.opacity = "0";
    // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
