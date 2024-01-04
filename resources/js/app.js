import './bootstrap';

document.addEventListener("DOMContentLoaded", function() {
     const navbar = document.getElementById('navbar');
     let prevScrollPos = window.pageYOffset;
   
     window.onscroll = function() {
          const currentScrollPos = window.pageYOffset;
     
          if (prevScrollPos > currentScrollPos) {
          // Scroll up
          navbar.classList.remove('bg-gray-800');
          } else {
          // Scroll down
          navbar.classList.add('bg-orange-600');
          }
     
          prevScrollPos = currentScrollPos;
     };
});
   