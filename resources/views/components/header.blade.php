<!-- Navigation Bar -->
<nav id="navbar" class="bg-white text-black py-4 px-6 flex items-center justify-between fixed top-0 w-full z-50 transition-all duration-300">
    <div class="flex items-center gap-4">
        <!-- Sidebar Toggle -->
        <button id="sidebar-toggle" class="relative group pointer-events-auto">
            <div
                class="relative flex overflow-hidden items-center justify-center rounded-full w-[50px] h-[50px] transform transition-all">
                <div
                    class="flex flex-col justify-between w-[20px] h-[20px] transform transition-all duration-300 origin-center overflow-hidden">
                    <div id="hamburger-top"
                        class="bg-orange-600 h-[3px] w-7 transform transition-all duration-300 origin-left">
                    </div>
                    <div id="hamburger-middle"
                        class="bg-orange-600 h-[3px] w-1/2 rounded transform transition-all duration-300">
                    </div>
                    <div id="hamburger-bottom"
                        class="bg-orange-600 h-[3px] w-7 transform transition-all duration-300 origin-left">
                    </div>
                </div>
            </div>
        </button>

        <!-- Brand Logo -->
        <a href="/">
            <img src="{{ asset('assets/images/brand.png') }}" alt="Flaut" class="h-10 text-orange-600">
        </a>
    </div>

    <!-- Search Bar -->
    <div class="flex-1 mx-4">
        <div class="relative">
            <input type="text" placeholder="Cari"
                class="w-full p-2 font-semibold text-gray-600 border rounded-md focus:outline-none focus:ring-2 focus:ring-orange-600 hidden md:block">
            <button class="md:hidden absolute inset-y-0 right-0 flex items-center pr-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="h-6 w-6">
                    <path
                        d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Cart & Login -->
    <div class="flex items-center gap-4">
        <a href="/cart" class="flex items-center gap-1 text-black hover:text-orange-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path
                    d="M9 11V6C9 4.34315 10.3431 3 12 3C13.6569 3 15 4.34315 15 6V10.9673M10.4 21H13.6C15.8402 21 16.9603 21 17.816 20.564C18.5686 20.1805 19.1805 19.5686 19.564 18.816C20 17.9603 20 16.8402 20 14.6V12.2C20 11.0799 20 10.5198 19.782 10.092C19.5903 9.71569 19.2843 9.40973 18.908 9.21799C18.4802 9 17.9201 9 16.8 9H7.2C6.0799 9 5.51984 9 5.09202 9.21799C4.71569 9.40973 4.40973 9.71569 4.21799 10.092C4 10.5198 4 11.0799 4 12.2V14.6C4 16.8402 4 17.9603 4.43597 18.816C4.81947 19.5686 5.43139 20.1805 6.18404 20.564C7.03968 21 8.15979 21 10.4 21Z"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="hidden md:inline">Keranjang</span>
        </a>
        <a href="/admin/login" class="flex items-center gap-1 text-black hover:text-orange-600">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="h-6 w-6" stroke="currentColor">
                <path
                    d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="hidden md:inline">Login</span>
        </a>
    </div>
</nav>
