import './bootstrap';

const specificColors = ['rgb(234, 88, 12)', '#FFFFFF', '#000000'];

function getRandomColor() {
return specificColors[Math.floor(Math.random() * specificColors.length)];
}

function changeColor(element, characters) {
     const color = getRandomColor();
     element.style.color = color;
}

document.addEventListener("DOMContentLoaded", function () {
     const navbar = document.getElementById("navbar");
     const ahref = document.getElementById("text-nav");
     const ahref2 = document.getElementById("text-nav-2");
     const ahref3 = document.getElementById("text-nav-3");
     const logoImage = document.querySelector("#navbar img");

     const scrollToTopBtn = document.getElementById('scrollToTopBtn');

     function setNavbarColor(scrollPosition) {
          if (scrollPosition > 0 || window.location.pathname !== "/") {
               navbar.classList.remove("bg-transparent");
               navbar.classList.add("bg-black");
               ahref.classList.add("text-white");
               ahref2.classList.add("text-white");
               ahref3.classList.add("text-white");
               logoImage.classList.add("mt-1");
               navbar.classList.add("shadow-lg");

          } else {
               navbar.classList.remove("bg-black");
               navbar.classList.add("bg-transparent");
               navbar.classList.remove("border-b-2");
               navbar.classList.remove("border-gray-300");
               navbar.classList.remove("shadow-lg");
          }
     }

     scrollToTopBtn.addEventListener('click', function () {
          window.scrollTo({
               top: 0,
               behavior: 'smooth'
          });
     });               

     function handleScroll() {
          setNavbarColor(window.scrollY);

          if (window.scrollY) {
               scrollToTopBtn.classList.remove('hidden');
               
          } else {
               scrollToTopBtn.classList.add('hidden');

          }

     }

     setNavbarColor(window.scrollY);

     window.addEventListener("scroll", handleScroll);

     const element = document.getElementById('flaut');
     const charactersToColor = ['F', 'L', 'A', 'U', 'T', '.'];

     setInterval(function () {
          changeColor(element, charactersToColor);
     }, 350);
});
