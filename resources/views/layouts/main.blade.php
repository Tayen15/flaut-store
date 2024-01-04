<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">
     <style>
          .font-libre-baskerville {
              font-family: 'Libre Baskerville', serif;
              
          }
     </style>

</head>
<body class="antialiased">
     <header>
          @include('components.header')
     </header>
     <main>
          @yield('content')

          <!-- Scroll to Top Button -->
          <button id="scrollToTopBtn" class="fixed bottom-4 right-4 bg-black p-2 rounded-full hidden hover:bg-orange-600 transition-all duration-400 ease-in-out">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
               </svg>
          </button>

     </main>
     <footer class="bg-white-500 text-center text-white-600 dark:bg-white-600 dark:text-white-200 lg:text-left px-20">
          @include('components.footer')
     </footer>
     <script>

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

                    } else {
                         navbar.classList.remove("bg-black");
                         navbar.classList.add("bg-transparent");
                    }
               }

               scrollToTopBtn.addEventListener('click', function () {
                    // Scroll to the top of the page
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

     </script>
        
        
</body>
</html>