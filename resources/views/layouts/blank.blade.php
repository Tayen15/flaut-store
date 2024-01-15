<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     <title>@yield('title')</title>
     <link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/976824443743645696/1196355689422004234/f.png?ex=65b7540f&is=65a4df0f&hm=cf8b903098671bb47aa7c0e50528f804072389686434186a1f67555bf3d7ae23&}" />
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap">
     <style>
          .font-libre-baskerville {
              font-family: 'Libre Baskerville', serif;
              
          }
     </style>

</head>
<body class="antialiased">
     <main>
          @yield('auth')
     </main>
</body>
</html>