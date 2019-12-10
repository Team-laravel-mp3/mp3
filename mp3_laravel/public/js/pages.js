var owl = $('.owl-carousel');
owl.owlCarousel({
    items:5,
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    navText: ['<i class="fas fa-angle-left" ></i>','<i class="fas fa-angle-right"></i>'],
    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
function myFunction() {
    document.getElementById("myMenutab").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.menubtn')) {
      var dropdowns = document.getElementsByClassName("menu-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }