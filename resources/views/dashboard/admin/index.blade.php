@section('title', 'Administrator')
@extends('layouts.dashboard')
@section('admin')
<section id="admin" class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-orange-800">
            <div class=" p-4 shadow text-2xl text-white">
                <h1 class="font-bold pl-2">Administrator</h1>
            </div>
            <a href="{{ route('dashboard.admin.create') }}" class="flex items-center text-white mr-10">
                <i class="fa-solid fa-plus mr-2"></i> Add Admin
            </a>
        </div>
    </div>

    
    <!-- List Table Users -->
    <div class="px-2 my-2 md:px-10 max-h-screen w-full overflow-x-auto">
        <table id="usersTable" class="w-full table-auto text-left">
            <thead>
                <tr>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">ID</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Name</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Email</th>
                    <th class="p-2 md:p-4 border-b border-blue-gray-50">Level</th>
                    <th class="p-2 md:p-6  border-b border-blue-gray-50">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $user->id }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $user->name }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $user->email }}</td>
                    <td class="p-2 md:p-4 border-b border-blue-gray-50">{{ $user->level }}</td>

                    <td class="p-2 md:p-6 border-b border-blue-gray-50">
                        <a href="{{ route('dashboard.admin.edit', $user->id) }}">
                            <button class="relative align-middle select-none font-medium text-center uppercase transition-all w-10 h-10 md:w-12 md:h-12 rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button" disabled>
                                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4 md:h-5 md:w-5">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                    </svg>
                                </span>
                            </button>
                        </a>
                    
                        <button onclick="confirmDelete('{{ $user->id }}')" class="relative align-middle select-none font-medium text-center uppercase transition-all w-10 h-10 md:w-12 md:h-12 rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button" disabled>
                            <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z"/>
                                </svg>
                            </span>
                        </button>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('dashboard.admin.destroy', $user->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" id="confirmDeleteItemId" value="">
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-2 md:p-4 text-center">No users available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add any other modals or components as needed -->

    <script>
        $(document).ready(function () {
            $('#usersTable').DataTable();
        });
    </script>
</section>
@endsection
