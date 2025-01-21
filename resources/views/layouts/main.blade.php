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
    <link rel="icon" type="image/x-icon" href="assets/images/brand.png" />
    <style>
    .font-libre-baskerville {
        font-family: 'Libre Baskerville', serif;
    }
    </style>
    <script src="https://kit.fontawesome.com/86a839d15c.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Flaut Store. Discover many amazing fashions and more')">
    <meta name="keywords" content="@yield('meta_keywords', 'Flaut, Toko Baju, Fashion Store, Toko Fashion, Toko Pakaian, Toko Baju Online, Toko Fashion Online')">
    <meta name="author" content="Firtiansyah Okta Resama">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title') - Flaut.">
    <meta property="og:description" content="@yield('meta_description', 'Default description')">
    <meta property="og:image" content="@yield('meta_image', asset('assets/image/logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title') - Flaut.">
    <meta name="twitter:description" content="@yield('meta_description', 'Default description')">
    <meta name="twitter:image" content="@yield('meta_image', asset('assets/image/logo.png'))">
    <meta name="twitter:site" content="@your_twitter_handle">
</head>
<body class="antialiased">
     <header>
          @include('components.header')
     </header>

     <main>
          @yield('content')
     </main>

     <footer>
        @include('components.newsletter')

        @include('components.footer')

        @include('components.copyright')
     </footer>
     <script src="{{ asset('assets/js/main.js') }}?v={{ time() }}"></script>
</body>
</html>