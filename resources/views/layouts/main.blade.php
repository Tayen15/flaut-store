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
     </main>
     <footer class="bg-white-500 text-center text-white-600 dark:bg-white-600 dark:text-white-200 lg:text-left px-20">
          @include('components.footer')
     </footer>
     <script>
          document.addEventListener("DOMContentLoaded", function () {
               const navbar = document.getElementById("navbar");
               const ahref = document.getElementById("text-nav");
               const ahref2 = document.getElementById("text-nav-2");
               const ahref3 = document.getElementById("text-nav-3");
               const logoImage = document.querySelector("#navbar img");
          
               window.addEventListener("scroll", function () {
                    if (window.scrollY > 0) {
                         navbar.classList.remove("bg-transparent");
                         navbar.classList.add("bg-white");
               
                         ahref.classList.remove("text-white");
                         ahref2.classList.remove("text-white");
                         ahref3.classList.remove("text-white");

                         logoImage.classList.add("h-16");
                         logoImage.classList.add("mt-2");
                    } else {
                         navbar.classList.remove("bg-white");
                         navbar.classList.add("bg-transparent");
               
                         ahref.classList.add("text-white");
                         ahref2.classList.add("text-white");
                         ahref3.classList.add("text-white");

                         logoImage.classList.remove("h-16");
                    }
               });
          });
     </script>
        
        
</body>
</html>