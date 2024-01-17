<!-- resources/views/components/header.blade.php -->

<nav class="fixed w-full top-0 transition-all ease-in-out duration-300 bg-transparent z-50" id="navbar">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex-shrink-0 flex w-10">
                <img src="https://cdn.discordapp.com/attachments/976824443743645696/1192365071083503636/flaut.1_2.png?ex=65a8cf82&is=65965a82&hm=f9183fea4ca358dcf057572f73030e26994e91bf27d7617cf0487ea80d910438&" alt="Logo" class="h-14 w-14 lg:h-auto lg:w-auto">
            </a>

            <!-- Desktop navigation links -->
            <div class="hidden sm:flex space-x-4">
                <a id="text-nav" href="{{ route('home') }}" class="text-white hover:bg-orange-600 hover:text-white rounded-md px-3 py-2 text-xl font-medium" aria-current="page">Home</a>
                <a id="text-nav-2" href="{{ route('catalog.index') }}" class="text-white hover:bg-orange-600 hover:text-white rounded-md px-3 py-2 text-xl font-medium">Catalog</a>
                <a id="text-nav-3" href="{{ route('news.index') }}" class="text-white hover:bg-orange-600 hover:text-white rounded-md px-3 py-2 text-xl font-medium">News</a>
            </div>

            <!-- Mobile menu button -->
            <button id="mobile-menu-btn" class="absolute inset-y-0 right-0 flex items-center sm:hidden text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Toggle menu</span>
                <!-- Icon when menu is closed -->
                <svg class="block h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                </svg>
                <!-- Icon when menu is open -->
                <svg class="hidden h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden fixed w-full top-16" id="mobile-menu">
        <div class="bg-black" id="mobNavdiv">
            <a id="mob-nav" href="{{ route('home') }}" class="block text-white rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
            <a id="mob-nav-2"  href="{{ route('catalog.index') }}" class="block text-gray-300 hover:bg-orange-600 hover:text-white rounded-md px-3 py-2 text-base font-medium">Catalog</a>
            <a id="mob-nav-3" href="{{ route('news.index') }}" class="block text-gray-300 hover:bg-orange-600 hover:text-white rounded-md px-3 py-2 text-base font-medium">News</a>
        </div>
    </div>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const mobileMenuBtn = document.getElementById("mobile-menu-btn");
        const mobileMenu = document.getElementById("mobile-menu");
        mobileMenu.classList.toggle("hidden");

        mobileMenuBtn.addEventListener("click", function () {
            mobileMenu.classList.toggle("hidden");
        });
    });
</script>
