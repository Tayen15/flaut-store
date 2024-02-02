
@section('title', 'Edit ' . $user->title)
@extends('layouts.dashboard')
@section('admin')
<section class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="flex items-center justify-between rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">Edit User</h1>
        </div>
    </div>

    {{-- Form Edit Admin --}}
    <div class="max-w-7xl p-6 mx-auto rounded-md shadow-md mt-2">
        <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-black font-medium" for="name">Name <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <input id="name" name="name" value="{{ $user->name }}" type="text" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                </div>
                <div>
                    <label class="text-black font-medium" for="email">Email <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <input id="email" name="email" value="{{ $user->email }}" type="email" autocomplete="additional-name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" required>
                </div>
                {{-- <div>
                    <label class="text-black font-medium" for="image">Image <span class="font-light ml-2 text-xs text-red-600 ">Optional</span></label>
                    <input id="image" name="image" type="file" accept="image/jpg, image/png, image/jpeg" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border rounded-md focus:outline-none focus:ring">
                </div> --}}
            </div>
            <div class="my-6">
                <div>
                    <label class="text-black font-medium" for="level">Level <span class="font-light ml-2 text-xs text-red-600">Required</span></label>
                    <select id="level" name="level" class="block w-full px-4 py-2 mt-2 capitalize text-gray-700 bg-white border rounded-md focus:outline-none focus:ring appearance-none" required>
                        <option value=""></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if($role->id == (old('level') ? old('level') : $user->level)) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button class="px-6 py-2 leading-5 mx-5 text-white transition-colors duration-200 transform bg-green-500 rounded-md hover:bg-green-600 focus:outline-none focus:bg-gray-600" type="submit">Save</button>
                <a href="{{ route('dashboard.admin.index') }}" class="px-4 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-400 rounded-md hover:bg-gray-500 cursor-pointer focus:outline-none focus:bg-gray-600" type="submit">Cancel</a>
            </div>
        </form>
    </div>
</section>
@endsection
