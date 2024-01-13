@extends('layouts.dashboard')

@section('admin')
<section id="news" class="flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
    <!-- Page Header -->
    <div class="bg-gray-800 pt-3">
        <div class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white">
            <h1 class="font-bold pl-2">News</h1>
        </div>
    </div>

    <!-- List Table News -->
    <div class="px-10 my-2 max-h-screen w-full items-center justify-center">
        <table class="w-full min-w-max table-auto text-left">
            <thead>
                <tr>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">ID</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Image</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Title</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Content</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Author</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Created</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70">Last Update</p>
                    </th>
                    <th class="border-y border-blue-gray-100 bg-blue-gray-50/50 p-4">
                        <p class="block antialiased font-sans text-sm text-blue-gray-900 font-normal leading-none opacity-70"></p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                <tr>
                    <td class="p-4 border-b border-blue-gray-50">{{ $item->id }}</td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="{{ route('news.show', $item->id) }}">
                        <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="inline-block relative object-center w-12 h-12 rounded-lg border border-blue-gray-50 bg-blue-gray-50/50 object-contain p-1">
                        </a>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">{{ $item->title }}</td>
                    <td class="p-4 border-b border-blue-gray-50">{!! substr($item->content, 0, 10) !!}</td>
                    <td class="p-4 border-b border-blue-gray-50">{{ $item->author }}</td>
                    <td class="p-4 border-b border-blue-gray-50">{{ \Carbon\Carbon::parse($item->created_at)->format('l, d F Y') }}</td>
                    <td class="p-4 border-b border-blue-gray-50">{{ $item->updated_at->format('j F Y, H:i') }}</td>
                    <td class="p-4 border-b border-blue-gray-50">
                        <a href="{{ route('dashboard.news.edit', $item->id) }}">
                            <button class="relative align-middle select-none font-sans font-medium text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none w-10 max-w-[40px] h-10 max-h-[40px] rounded-lg text-xs text-gray-900 hover:bg-gray-900/10 active:bg-gray-900/20" type="button">
                                <span class="absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-4 w-4">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                    </svg>
                                </span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $news->links() }}
    </div>
</section>
@endsection
