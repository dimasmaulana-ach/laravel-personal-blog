@extends('layouts.landing')

@section('landing')
    <div class="max-w-screen-xl pt-20 mx-auto px-4 pb-9 h-full">
        <div class="">
            <div class="my-5 flex">
                <a href="/blogs" class="p-2 mx-1 bg-blue-600 text-white rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </a>
                <h1 class="font-bold text-4xl">{{ $blogs->title }}</h1>
            </div>
            <div class="my-5">
                <h3 class="absolute px-3 py-2 bg-black text-white opacity-50 font-bold text-xl">{{ $blogs->category->name }}
                </h3>
                @if ($blogs->image)
                    <img src="{{ asset('storage/' . $blogs->image) }}" class="" alt="">
                @else
                    <img src="https://source.unsplash.com/1800x800?{{ $blogs->category->name }}" alt="">
                @endif
                {{-- <img src="https://source.unsplash.com/1800x800?{{ $blogs->category->name }}" alt=""> --}}
            </div>
            <p class="mb-3 text-gray-500 dark:text-gray-400">{!! $blogs->body !!}</p>
        </div>
    </div>
@endsection
