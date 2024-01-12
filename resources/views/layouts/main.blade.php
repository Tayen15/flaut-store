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
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.tiny.cloud/1/z72nwuco4n4dl82wa73wr87z45kfsvdnlsiqaj14wwc004gc/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
     <script>
          tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            images_upload_base_path: 'storage/image/news/',
            mergetags_list: [
              { value: 'First.Name', title: 'First Name' },
              { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
          });
        </script>
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
     <footer class="bg-white-500 text-center text-white-600 dark:bg-white-600 dark:text-white-200 lg:text-left">
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
               const mobNavdiv = document.getElementById("mobNavdiv")
               const ahref = document.getElementById("text-nav");
               const ahref2 = document.getElementById("text-nav-2");
               const ahref3 = document.getElementById("text-nav-3");
               const mobNav = document.getElementById("mob-nav");
               const mobNav2 = document.getElementById("mob-nav-2");
               const mobNav3 = document.getElementById("mob-nav-3");
               

               const logoImage = document.querySelector("#navbar img");
               const scrollToTopBtn = document.getElementById('scrollToTopBtn');
               const element = document.getElementById('flaut');
               const charactersToColor = ['F', 'L', 'A', 'U', 'T', '.'];

               function setNavbarColor(scrollPosition) {
                    if (scrollPosition > 0 || window.location.pathname == "/catalog") {
                         navbar.classList.remove("bg-transparent");
                         navbar.classList.add("bg-black");
                         mobNavdiv.classList.remove("bg-transparent");
                         mobNavdiv.classList.add("bg-black");
                         ahref.classList.add("text-white");
                         ahref2.classList.add("text-white");
                         ahref3.classList.add("text-white");
                         mobNav.classList.add("text-white");
                         mobNav2.classList.add("text-white");
                         mobNav3.classList.add("text-white");
                         logoImage.classList.add("mt-1");
                         navbar.classList.add("shadow-lg");
                    } else {
                         navbar.classList.remove("bg-black");
                         navbar.classList.add("bg-transparent");
                         navbar.classList.remove("border-b-2");
                         navbar.classList.remove("border-gray-300");
                         navbar.classList.remove("shadow-lg");

                         mobNavdiv.classList.remove("bg-black");
                         mobNavdiv.classList.add("bg-transparent");
                         mobNavdiv.classList.remove("border-b-2");
                         mobNavdiv.classList.remove("border-gray-300");
                         mobNavdiv.classList.remove("shadow-lg");
                    }
               }

               function handleScroll() {
                    setNavbarColor(window.scrollY);

                    if (window.scrollY) {
                         scrollToTopBtn.classList.remove('hidden');
                    } else {
                         scrollToTopBtn.classList.add('hidden');
                    }
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
     <script>
          import { Carousel, initTE } from "tw-elements";
          initTE({ Carousel });
      </script>
</body>
</html>