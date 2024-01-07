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
     <main>
          @yield('admin')
     </main>
</body>
</html>