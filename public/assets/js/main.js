document.addEventListener('DOMContentLoaded', () => {
     const navbar = document.getElementById('navbar');

     window.addEventListener('scroll', () => {
          if (window.scrollY > 0) {
               navbar.classList.add('bg-white', 'shadow-md');
          } else {
               navbar.classList.remove('shadow-md');
          }
     });

     const sidebar = document.getElementById('sidebar');
     const sidebarOverlay = document.getElementById('sidebar-overlay');
     const sidebarToggle = document.getElementById('sidebar-toggle');
     const hamburgerTop = document.getElementById('hamburger-top');
     const hamburgerMiddle = document.getElementById('hamburger-middle');
     const hamburgerBottom = document.getElementById('hamburger-bottom');
     const body = document.body;

     if (!sidebar || !sidebarOverlay || !sidebarToggle) {
          console.error('Sidebar, overlay, or toggle button is missing!');
          return;
     }

     function openSidebar() {
          sidebar.classList.remove('-translate-x-full');
          sidebarOverlay.classList.remove('hidden');
          const scrollBarWidth = window.innerWidth - document.documentElement.clientWidth;
          body.style.paddingRight = `${scrollBarWidth}px`;
          body.classList.add('overflow-hidden');
          hamburgerTop.classList.add('group-focus:rotate-[42deg]');
          hamburgerMiddle.classList.add('group-focus:-translate-x-10');
          hamburgerBottom.classList.add('group-focus:-rotate-[42deg]');
     }

     function closeSidebar() {
          sidebar.classList.add('-translate-x-full');
          sidebarOverlay.classList.add('hidden');
          body.style.paddingRight = '';
          body.classList.remove('overflow-hidden');
          hamburgerTop.classList.remove('group-focus:rotate-[42deg]');
          hamburgerMiddle.classList.remove('group-focus:-translate-x-10');
          hamburgerBottom.classList.remove('group-focus:-rotate-[42deg]');
     }
     sidebarToggle.addEventListener('click', () => {
          if (sidebar.classList.contains('-translate-x-full')) {
               openSidebar();
          } else {
               closeSidebar();
          }
     });

     sidebarOverlay.addEventListener('click', closeSidebar);

     document.addEventListener('keydown', (event) => {
          if (event.key === 'Escape') {
               closeSidebar();
          }
     });

     function showSubMenu(event, menuId) {
          event.preventDefault();
          document.getElementById('main-menu').classList.add('hidden');
          document.getElementById(menuId).classList.remove('hidden');
     }

     function showMainMenu(event) {
          event.preventDefault();
          document.getElementById('main-menu').classList.remove('hidden');
          document.getElementById('kategori-menu').classList.add('hidden');
     }

     document.querySelector('[onclick*="showSubMenu"]').addEventListener('click', (event) => showSubMenu(event, 'kategori-menu'));
     document.querySelector('[onclick*="showMainMenu"]').addEventListener('click', showMainMenu);


     // Carousel
     let currentSlide = 0;
     const carousel = document.getElementById('carousel');
     const slides = carousel.children;
     const totalSlides = slides.length;

     // Auto slide for carousel
     function autoSlide() {
          currentSlide = (currentSlide + 1) % totalSlides;
          carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
     }

     let autoSlideInterval = setInterval(autoSlide, 3000);

     // Pause auto slide on hover
     carousel.addEventListener('mouseenter', () => {
          clearInterval(autoSlideInterval);
     });

     // Resume auto slide when not hovering
     carousel.addEventListener('mouseleave', () => {
          autoSlideInterval = setInterval(autoSlide, 3000);
     });

     // Update the countdown display
     function updateCountdownDisplay(days, hours, minutes, seconds) {
          document.querySelector('.countdown-element.days').textContent = days;
          document.querySelector('.countdown-element.hours').textContent = hours;
          document.querySelector('.countdown-element.minutes').textContent = minutes;
          document.querySelector('.countdown-element.seconds').textContent = seconds;
     }


     // Update the countdown every 1 second
     var x = setInterval(function () {
          // Get today's date and time
          var now = new Date().getTime();

          // Set the date we're counting down to
          var countDownDate = new Date("January 22, 2025 23:59:59").getTime();

          // Find the distance between now and the countdown date
          var distance = countDownDate - now;

          // Time calculations for days, hours, minutes, and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          // Time calculations for days, hours, minutes, and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Initial call to display the countdown immediately
          updateCountdownDisplay(days, hours, minutes, seconds);
          updateCountdownDisplay(days, hours, minutes, seconds);

          // If the countdown is over, write some text
          if (distance < 0) {
               clearInterval(x);
               updateCountdownDisplay(0, 0, 0, 0);
               document.querySelector('.countdown-element.days').textContent = "EXPIRED";
          }
     }, 1000);

});
