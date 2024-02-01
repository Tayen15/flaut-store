<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>@yield('title') - Flaut.</title>
     @vite('resources/css/app.css')
     <script src="https://kit.fontawesome.com/86a839d15c.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..."crossorigin="anonymous" />
     <link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/976824443743645696/1196355689422004234/f.png?ex=65b7540f&is=65a4df0f&hm=cf8b903098671bb47aa7c0e50528f804072389686434186a1f67555bf3d7ae23&}" />
     <style>
        .font-libre-baskerville {
            font-family: 'Libre Baskerville', serif;
        }
     </style>
     <script src="https://kit.fontawesome.com/86a839d15c.js" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="antialiased">
     <header>
          @include('components.header')
     </header>
     <main>
          @yield('content')

          <!-- Scroll to Top Button -->
          <button id="scrollToTopBtn" class="fixed bottom-4 right-4 bg-black p-2 rounded-full hidden hover:bg-orange-600 transition-all duration-500 ease-in-out">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="white" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
               </svg>
          </button>

     </main>
     <footer class="bg-white-500 text-center text-white-600 dark:bg-white-600 dark:text-white-200 lg:text-left">
          @include('components.footer')
     </footer>
     <script>
          document.addEventListener("DOMContentLoaded", function () {
              const specificColors = ['rgb(234, 88, 12)', '#FFFFFF', '#000000'];
              const charactersToColor = ['F', 'L', 'A', 'U', 'T', '.'];
      
              const navbar = document.getElementById("navbar");
              const mobNavdiv = document.getElementById("mobNavdiv");
              const ahref = document.getElementById("text-nav");
              const ahref2 = document.getElementById("text-nav-2");
              const ahref3 = document.getElementById("text-nav-3");
              const mobNav = document.getElementById("mob-nav");
              const mobNav2 = document.getElementById("mob-nav-2");
              const mobNav3 = document.getElementById("mob-nav-3");
              const logoImage = document.querySelector("#navbar img");
              const scrollToTopBtn = document.getElementById('scrollToTopBtn');
              const element = document.getElementById('flaut');
      
              function getRandomColor() {
                  return specificColors[Math.floor(Math.random() * specificColors.length)];
              }
      
              function changeColor(element, characters) {
                  const color = getRandomColor();
                  element.style.color = color;
              }
      
              function setNavbarColor(scrollPosition) {
                  const isCatalogPage = window.location.pathname.includes("/catalog");
                  const isAboutusgPage = window.location.pathname.includes("/about-us");
      
                  if (scrollPosition > 0 || isCatalogPage || isAboutusgPage) {
                      navbar.classList.remove("bg-transparent", "border-b-2", "border-gray-300");
                      navbar.classList.add("bg-black", "shadow-lg");
                      mobNavdiv.classList.remove("bg-transparent", "border-b-2", "border-gray-300");
                      mobNavdiv.classList.add("bg-black", "shadow-lg");
                      [ahref, ahref2, ahref3, mobNav, mobNav2, mobNav3].forEach(element => element.classList.add("text-white"));
                      logoImage.classList.add("mt-1");
                  } else {
                      navbar.classList.remove("bg-black", "shadow-lg");
                      navbar.classList.add("bg-transparent");
                      mobNavdiv.classList.remove("bg-black", "shadow-lg");
                      mobNavdiv.classList.add("bg-transparent");
                      [mobNav, mobNav2, mobNav3].forEach(element => element.classList.remove("text-white"));
                      logoImage.classList.remove("mt-1");
                  }
              }
      
              function handleScroll() {
                  setNavbarColor(window.scrollY);
                  scrollToTopBtn.classList.toggle('hidden', window.scrollY === 0);
              }
      
              function colorFlaut() {
                  changeColor(element, charactersToColor);
              }
      
              setNavbarColor(window.scrollY);
              window.addEventListener("scroll", handleScroll);
              setInterval(colorFlaut, 350);
      
              scrollToTopBtn.addEventListener('click', function () {
                  window.scrollTo({
                      top: 0,
                      behavior: 'smooth'
                  });
              });
          });
     </script>
</body>
</html>