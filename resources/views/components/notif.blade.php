<div class="notification-container">
    @if (session('success'))
    <div role="alert" data-dismissible="alert" class="relative flex w-full max-w-screen-md px-4 py-3 text-base text-white bg-gray-900 rounded-lg font-regular notification">
        <div class="shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd"></path>
            </svg>
        </div>
        <div class="ml-3 mr-12">
            <h5 class="block font-sans text-lg antialiased font-semibold leading-snug tracking-normal text-white">
                Information Success
            </h5>
            <p class="block mt-2 font-sans text-base antialiased font-normal leading-relaxed text-white">{{ session('success') }}</p>
        </div>
        <button data-dismissible-target="alert" class="absolute top-3 right-3 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-white transition-all hover:bg-white/10 active:bg-white/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" onclick="closeNotification()">
            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </span>
        </button>
    </div>
    @endif
    @if (session('error'))
    <div role="alert" data-dismissible="alert" class="relative flex w-full max-w-screen-md px-4 py-3 text-base text-white bg-gray-900 rounded-lg font-regular notification">
        <div class="shrink-0">
            <svg fill="currentColor" width="25px" height="25px" viewBox="0 0 256 256" id="Flat" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6">
                <path d="M128,24A104,104,0,1,0,232,128,104.12041,104.12041,0,0,0,128,24Zm37.65625,130.34375a7.99915,7.99915,0,1,1-11.3125,11.3125L128,139.3125l-26.34375,26.34375a7.99915,7.99915,0,0,1-11.3125-11.3125L116.6875,128,90.34375,101.65625a7.99915,7.99915,0,0,1,11.3125-11.3125L128,116.6875l26.34375-26.34375a7.99915,7.99915,0,0,1,11.3125,11.3125L139.3125,128Z"/>
            </svg>
        </div>
        <div class="ml-3 mr-12">
            <h5 class="block font-sans text-lg antialiased font-semibold leading-snug tracking-normal text-white">
                Information Error
            </h5>
            <p class="block mt-2 font-sans text-base antialiased font-normal leading-relaxed text-white">{{ session('error') }}</p>
        </div>
        <button data-dismissible-target="alert" class="absolute top-3 right-3 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-white transition-all hover:bg-white/10 active:bg-white/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" onclick="closeNotification()">
            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </span>
        </button>
    </div>    
    @endif
</div>

<style>

    .notification-container {
        position: fixed;
        top: 1rem;
        right: 1rem;
        z-index: 1000;
    }
    .notification {
        animation: slideInRight 0.5s ease-in-out forwards;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .notification.hide {
        animation: slideOutRight 0.5s ease-in-out forwards;
    }

    @keyframes slideOutRight {
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
    
</style>

<script>
    function closeNotification() {
        const notification = document.querySelector('.notification');
        notification.classList.add('hide');
        setTimeout(() => {
            notification.style.display = 'none';
            notification.classList.remove('hide');
        }, 500);
    }

    setTimeout(() => {
        const notification = document.querySelector('.notification');
        if (notification && !notification.classList.contains('hide')) {
            closeNotification();
        }
    }, 30000); // Timeout setelah 30 detik (30000 milidetik)
</script>
