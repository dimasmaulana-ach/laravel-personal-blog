@extends('layouts.dashboard')


@section('dashboard')
    <div class="">
        <div class="my-3 flex">
            <h1 class="font-bold text-4xl dark:text-white">{{ $blogs->title }}</h1>
            <div class="px-3 flex">
                <button onclick="location.href='/dashboard/blogs'" class="p-2 mx-1 bg-blue-600 text-white rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
                <button onclick="location.href='/dashboard/blogs/{{ $blogs->slug }}/edit'"
                    class="p-2 mx-1 bg-yellow-400 text-white rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>
                <form action="/dashboard/blogs/{{ $blogs->slug }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 mx-1 rounded-xl bg-red-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                    </button>
                </form>
            </div>
        </div>
        @if ($blogs->image)
            <img src="{{ asset('storage/'.$blogs->image) }}" class="py-5" alt="">
        @else
            <img src="https://source.unsplash.com/1800x800?{{ $blogs->category->name }}" class="py-5" alt="">
        @endif
        <div class="py-3">
            <h1 class="font-medium text-xl dark:text-white">Category : {{ $blogs->category->name }}</h1>
            <h1 class="font-medium text-xl dark:text-white">Published : {{ $blogs->created_at->diffForHumans() }}</h1>
        </div>
        <div class="mb-3 text-gray-500 dark:text-gray-400 dark:text-white">{!! $blogs->body !!}</div>
    </div>
@endsection
