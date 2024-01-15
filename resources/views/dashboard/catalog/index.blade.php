@extends('layouts.dashboard')

@section('admin')
<section id="catalog" class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800">
            <div class=" p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Catalog</h1>
            </div>
            <a href="{{ route('dashboard.catalog.create') }}" class="flex items-center text-white mr-10">
                <i class="fa-solid fa-plus mr-2"></i> Add Catalog
            </a>
        </div>
    </div>

    <!-- List Table Catalog -->
    <div class="px-2 my-2 md:px-10 max-h-screen w-full overflow-x-auto">
        <table class="w-full table-auto text-left">
            <thead>
                <tr>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">ID</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Image</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Name</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Category</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Price</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Created</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Last Update</th>
                    <th class="p-2 md:p-6  border-b border-blue-gray-50">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($catalogs as $item)
                <tr>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $loop->iteration }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">
                        <a href="#" onclick="openLightbox('{{ $item->image_url }}')">
                            <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="inline-block w-12 h-12 md:w-16 md:h-16 object-cover rounded-lg border border-blue-gray-50 bg-blue-gray-50/50 p-1 cursor-pointer">
                        </a>
                    </td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $item->name }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50 uppercase">{{ $item->category }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ \Carbon\Carbon::parse($item->created_at)->format('l, d F Y') }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $item->updated_at->format('j F Y, H:i') }}</td>
                    <td class="p-2 md:p-6 border-b border-blue-gray-50">
                        <div class="flex space-x-2">
                            <a href="{{ route('dashboard.catalog.edit', $item->id) }}">
                                <button class="relative align-middle select-none font-medium text-center uppercase transition-all w-10 h-10 md:w-12 md:h-12 rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button">
                                    <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4 md:h-5 md:w-5">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </a>
                            <button onclick="confirmDelete('{{ $item->id }}')" class="relative align-middle select-none font-medium text-center uppercase transition-all w-10 h-10 md:w-12 md:h-12 rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button">
                                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/>
                                    </svg>
                                </span>
                            </button>
                            <form id="delete-form-{{ $item->id }}" action="{{ route('catalog.destroy', $item->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" id="confirmDeleteItemId" value="">
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="p-2 md:p-4 text-center">No data Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $catalogs->links() }}
    </div>

    <!-- Confirm Delete Modal -->
    <div id="confirmDeleteModal" class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-4 rounded-lg">
            <p class="text-xl font-semibold mb-4">Confirm Delete</p>
            <p class="text-gray-700">Are you sure you want to delete this catalog?</p>
            <div class="mt-4 flex justify-end">
                <button onclick="cancelDelete()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md mr-2 transition-all hover:bg-gray-400">Cancel</button>
                <button onclick="proceedDelete()" class="px-4 py-2 bg-red-600 text-white rounded-md transition-all hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>

    <div id="lightbox" class="hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-55 flex items-center justify-center z-30" onclick="closeLightbox()">
        <img id="lightbox-image" src="" alt="Lightbox Image" class="max-w-full max-h-full cursor-pointer">
    </div>

    <script>
        function confirmDelete(itemId) {
            document.getElementById('confirmDeleteModal').classList.remove('hidden');
            document.getElementById('confirmDeleteItemId').value = itemId;
        }

        function cancelDelete() {
            document.getElementById('confirmDeleteModal').classList.add('hidden');
        }

        function proceedDelete() {
            var itemId = document.getElementById('confirmDeleteItemId').value;
            document.getElementById('delete-form-' + itemId).submit();
        }

        function openLightbox(imageUrl) {
            var lightbox = document.getElementById('lightbox');
            var lightboxImage = document.getElementById('lightbox-image');

            lightboxImage.src = imageUrl;
            lightbox.classList.remove('hidden');
        }

        function closeLightbox() {
            var lightbox = document.getElementById('lightbox');
            lightbox.classList.add('hidden');
        }
    </script>
</section>
@endsection
