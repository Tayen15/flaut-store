<nav class="">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <a href="#">
              <img src="https://cdn.discordapp.com/attachments/976824443743645696/1192123790822490143/flaut.1.png?ex=65a7eecc&is=659579cc&hm=8ce619c9ba0bd01ad13f7dcadd620337a7599a51cfd47b09c7f7de218a33328a&" alt="" class="h-10 w-auto">
          </a>
      </div>
        <div class="hidden sm:ml-10 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ route('home') }}" class="text-cyan-800 rounded-md px-3 py-2 text-xl font-medium" aria-current="page">Home</a>
            <a href="{{ route('catalog.index') }}" class="text-cyan-800 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xl font-medium">Catalog</a>
            <a href="{{ route('news.index') }}" class="text-cyan-800 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xl font-medium">News</a>
            {{-- <a href="{{ route('contact') }}" class="text-cyan-800 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-xl font-medium">Contact Us</a> --}}
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="{{ route('home') }}" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Home</a>
      <a href="{{ route('catalog.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Catalog</a>
      <a href="{{ route('news.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">News</a>
    </div>
  </div>  
</nav>
