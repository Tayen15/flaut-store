<!-- Sidebar -->
<div id="sidebar"
    class="fixed top-20 left-0 w-64 h-full bg-white text-black transform -translate-x-full transition-transform z-50 focus:outline-none">
    <div class="p-4 flex justify-between items-center">
        <h2 class="text-lg font-bold">Menu</h2>
    </div>
    <ul id="main-menu" class="space-y-4 p-4">
        <li><a href="/" class="block hover:text-orange-600">Home</a></li>
        <li>
            <a href="#" class="hover:text-orange-600 flex justify-between items-center"
                onclick="toggleMenu('kategori-menu')">
                <span>Kategori</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M13.2328 16.4569C12.9328 16.7426 12.9212 17.2173 13.2069 17.5172C13.4926 17.8172 13.9673 17.8288 14.2672 17.5431L13.2328 16.4569ZM19.5172 12.5431C19.8172 12.2574 19.8288 11.7827 19.5431 11.4828C19.2574 11.1828 18.7827 11.1712 18.4828 11.4569L19.5172 12.5431ZM18.4828 12.5431C18.7827 12.8288 19.2574 12.8172 19.5431 12.5172C19.8288 12.2173 19.8172 11.7426 19.5172 11.4569L18.4828 12.5431ZM14.2672 6.4569C13.9673 6.17123 13.4926 6.18281 13.2069 6.48276C12.9212 6.78271 12.9328 7.25744 13.2328 7.5431L14.2672 6.4569ZM19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25V12.75ZM5 11.25C4.58579 11.25 4.25 11.5858 4.25 12C4.25 12.4142 4.58579 12.75 5 12.75V11.25ZM14.2672 17.5431L19.5172 12.5431L18.4828 11.4569L13.2328 16.4569L14.2672 17.5431ZM19.5172 11.4569L14.2672 6.4569L13.2328 7.5431L18.4828 12.5431L19.5172 11.4569ZM19 11.25L5 11.25V12.75L19 12.75V11.25Z" />
                </svg>
            </a>
        </li>
        <li><a href="#" class="block hover:text-orange-600">Promo</a></li>
    </ul>
    <ul id="kategori-menu" class="hidden space-y-4 p-4">
        <li>
            <a href="#" class="flex justify-start gap-2 items-center hover:text-orange-600"
                onclick="toggleMenu('main-menu')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M10.7672 7.5431C11.0672 7.25744 11.0788 6.78271 10.7931 6.48276C10.5074 6.18281 10.0327 6.17123 9.73276 6.4569L10.7672 7.5431ZM4.48276 11.4569C4.18281 11.7426 4.17123 12.2173 4.4569 12.5172C4.74256 12.8172 5.21729 12.8288 5.51724 12.5431L4.48276 11.4569ZM5.51724 11.4569C5.21729 11.1712 4.74256 11.1828 4.4569 11.4828C4.17123 11.7827 4.18281 12.2574 4.48276 12.5431L5.51724 11.4569ZM9.73276 17.5431C10.0327 17.8288 10.5074 17.8172 10.7931 17.5172C11.0788 17.2173 11.0672 16.7426 10.7672 16.4569L9.73276 17.5431ZM5 11.25C4.58579 11.25 4.25 11.5858 4.25 12C4.25 12.4142 4.58579 12.75 5 12.75V11.25ZM19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25V12.75ZM9.73276 6.4569L4.48276 11.4569L5.51724 12.5431L10.7672 7.5431L9.73276 6.4569ZM4.48276 12.5431L9.73276 17.5431L10.7672 16.4569L5.51724 11.4569L4.48276 12.5431ZM5 12.75H19V11.25H5V12.75Z" />
                </svg>
                <span>Back</span>
            </a>
        </li>
        <li>
            <a href="#" class="hover:text-orange-600 flex justify-between items-center"
                onclick="toggleMenu('fashion-pria-menu')">Fashion Pria</a>
        </li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Fashion Wanita</a></li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Sepatu</a></li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Tas</a></li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Aksesoris</a></li>
    </ul>

    <ul id="fashion-pria-menu" class="hidden space-y-4 p-4">
        <li>
            <a href="#" class="flex justify-start gap-2 items-center hover:text-orange-600"
                onclick="toggleMenu('kategori-menu')">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path
                        d="M10.7672 7.5431C11.0672 7.25744 11.0788 6.78271 10.7931 6.48276C10.5074 6.18281 10.0327 6.17123 9.73276 6.4569L10.7672 7.5431ZM4.48276 11.4569C4.18281 11.7426 4.17123 12.2173 4.4569 12.5172C4.74256 12.8172 5.21729 12.8288 5.51724 12.5431L4.48276 11.4569ZM5.51724 11.4569C5.21729 11.1712 4.74256 11.1828 4.4569 11.4828C4.17123 11.7827 4.18281 12.2574 4.48276 12.5431L5.51724 11.4569ZM9.73276 17.5431C10.0327 17.8288 10.5074 17.8172 10.7931 17.5172C11.0788 17.2173 11.0672 16.7426 10.7672 16.4569L9.73276 17.5431ZM5 11.25C4.58579 11.25 4.25 11.5858 4.25 12C4.25 12.4142 4.58579 12.75 5 12.75V11.25ZM19 12.75C19.4142 12.75 19.75 12.4142 19.75 12C19.75 11.5858 19.4142 11.25 19 11.25V12.75ZM9.73276 6.4569L4.48276 11.4569L5.51724 12.5431L10.7672 7.5431L9.73276 6.4569ZM4.48276 12.5431L9.73276 17.5431L10.7672 16.4569L5.51724 11.4569L4.48276 12.5431ZM5 12.75H19V11.25H5V12.75Z" />
                </svg>
                <span>Back</span>
            </a>
        </li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Baju</a></li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Celana</a></li>
        <li><a href="#" class="hover:text-orange-600 flex justify-between items-center">Aksesoris</a></li>
    </ul>
</div>

<script>
    function toggleMenu(menuId) {
        const menus = document.querySelectorAll('#sidebar ul');
        menus.forEach(menu => {
            if (menu.id === menuId) {
                menu.classList.toggle('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    }
</script>
