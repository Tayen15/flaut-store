<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title') - Admin Flaut.</title>
    <script src="https://kit.fontawesome.com/86a839d15c.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn.discordapp.com/attachments/976824443743645696/1196355689422004234/f.png?ex=65b7540f&is=65a4df0f&hm=cf8b903098671bb47aa7c0e50528f804072389686434186a1f67555bf3d7ae23&}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/z72nwuco4n4dl82wa73wr87z45kfsvdnlsiqaj14wwc004gc/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">
    <header>
        <nav aria-label="menu nav" class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
            <div class="flex flex-wrap items-center">
                <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white mr-4">
                    <a href="{{ route('dashboard.index') }}" aria-label="Home" class="ml-10 h-12 md:h-6 w-full">
                        <img src="../assets/images/logo.png" alt="Flaut Logo" class="h-full md:h-12">
                    </a>
                </div>
                
                <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2 mx-3">
                    <span class="relative w-full">
                        <form action="{{ route('dashboard.index') }}" method="get">
                            <input aria-label="search" type="text" id="search" name="search" placeholder="Search" class="w-full md:max-w-md lg:max-w-xl bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal">
                            <div class="absolute search-icon" style="top: 1rem; left: .8rem;">
                                <svg class="fill-current pointer-events-none text-white w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                                </svg>
                            </div>
                        </form>
                    </span>
                </div>
                
                <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                    <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                        <li class="flex-1 md:flex-none md:mr-3">
                            @if (auth()->user()->level > 1)
                                <a class="inline-block py-2 px-4 text-white no-underline hover:text-white/85" href="{{ route('dashboard.admin.index') }}">Admin</a>
                            @endif
                        </li>
                        <li class="flex-2 md:flex-none md:mr-3">
                            <div class="relative inline-block">
                                <button onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2 hover:text-white/85">
                                    <span class="pr-2"><i class="em em-robot_face"></i></span>
                                    Hi, {{ Auth::user()->name }}
                                    <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>

                                {{-- Dropdown for setting --}}
                                <div id="myDropdown" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-gray-100 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none invisible ">
                                    <div class="px-4 py-2 text-gray-500 text-sm font-semibold">Login as <span class="font-bold">{{ Auth::user()->name }}</span></div>
                                    <div class="border border-gray-200"></div>
                                    <div class="py-1" role="none">
                                        <a href="{{ route('dashboard.profile.index') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa fa-user fa-fw"></i> Profile</a>
                                        {{-- <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-1"><i class="fa fa-cog fa-fw"></i> Settings</a> --}}
                                        <a href="{{ route('logout') }}" class="text-gray-700 block w-full px-4 py-2 text-left text-sm hover:bg-gray-100 hover:text-gray-900" role="menuitem" tabindex="-1" id="menu-item-2"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                                    </div>
                                </div>
                            </div>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <main>
        <div class="flex flex-col md:flex-row">
            <!-- Navigation Sidebar -->
            <nav aria-label="alternative nav bg-gray-800">
                <div class="bg-gray-800 shadow-xl h-max fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">
                    <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                        <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.index') }}" id="dashboard-link" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-pink-500 transition duration-300 ease-in-out">
                                    <i class="fas fa-tasks pr-0 md:pr-3" id="dashboard-icon"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Dashboard</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.news.index') }}" id="news-link" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500 transition duration-300 ease-in-out">
                                    <i class="fa-regular fa-newspaper pr-0 md:pr-3" id="news-icon"></i><span class="pb-1 md:pb-0 text-xs ml-1 md:text-base text-gray-400 md:text-gray-200 block md:inline-block">News</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.catalog.index') }}" id="catalog-link" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-yellow-500 transition duration-300 ease-in-out">
                                    <i class="fa-solid fa-shirt pr-0 md:pr-3" id="catalog-icon"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Catalog</span>
                                </a>
                            </li>
                            <li class="mr-3 flex-1">
                                <a href="{{ route('dashboard.carousel.index') }}" id="banner-link" class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-green-500 transition duration-300 ease-in-out">
                                    <i class="fa-regular fa-image pr-0 md:pr-3" id="banner-icon"></i><span class="pb-1 md:pb-0 text-xs ml-1 md:text-base text-gray-400 md:text-gray-200 block md:inline-block">Banner</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            {{-- Content --}}
            @yield('admin')
        </div>
    </main>
    <script>
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }

        var routeMap = {
            'dashboard.index': { link: 'dashboard-link', icon: 'dashboard-icon', borderClass: 'border-pink-500', textClass: 'text-pink-500' },
            'dashboard.news.index': { link: 'news-link', icon: 'news-icon', borderClass: 'border-purple-500', textClass: 'text-purple-500' },
            'dashboard.catalog.index': { link: 'catalog-link', icon: 'catalog-icon', borderClass: 'border-yellow-500', textClass: 'text-yellow-500' },
            'dashboard.carousel.index': { link: 'banner-link', icon: 'banner-icon', borderClass: 'border-green-500', textClass: 'text-green-500' }
        };

        var currentRoute = "{{ Route::currentRouteName() }}";

        if (routeMap[currentRoute]) {
            var routeInfo = routeMap[currentRoute];
            document.getElementById(routeInfo.link).classList.add(routeInfo.borderClass);
            document.getElementById(routeInfo.icon).classList.add(routeInfo.textClass);
        }

    </script>
</body>
@include('components.notif')
</html>