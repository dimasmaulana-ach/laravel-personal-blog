@extends('layouts.landing')

{{-- {{ dd(request('category')) }} --}}

@section('landing')
    <div class="max-w-screen-xl pt-20 mx-auto px-4 pb-9">

        <div class="my-4">
            <form action="/blogs">
                @if (request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}">
                @endif
                <div class="gap-4 sm:grid sm:grid-cols-2 my-4">
                    <div class="">
                        <select id="large" name="category"
                            class="block h-full w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" selected="{{ request('category') ? false : true }}">All Category</option>
                            @foreach ($category as $item)
                                @if (request('category') === $item->name)
                                    <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
                                @else
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search ..." name="search" value="{{ request('search') }}">
                        <button type="submit"
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </div>
            </form>
        </div>

        @if ($blogs->count())
            <div class="max-w-xxl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @if ($blogs[0]->image)
                    <img src="{{ asset('storage/' . $blogs[0]->image) }}" class="rounded-t-lg"
                        style="object-fit: cover; width: 1500px; height: 800px;" alt="">
                @else
                    <img class="rounded-t-lg" src="https://source.unsplash.com/1500x800?{{ $blogs[0]->category->name }}"
                        style="object-fit: cover; width: 1500px; height: 800px;" alt="" />
                @endif
                {{-- <a href="#">
                <img class="rounded-t-lg" src="https://source.unsplash.com/1500x800?{{ $blogs[0]->category->name }}" alt="" />
            </a> --}}
                <div class="p-5">
                    <a href="/blogs/{{ $blogs[0]->slug }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $blogs[0]->title }}</h5>
                    </a>
                    {{-- <p class="mb-3 font-normal text-gray-700 truncate dark:text-white">{!! $blogs[0]->body !!}</p> --}}
                    <a href="/blogs/{{ $blogs[0]->slug }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @else
            <p class="text-center font-bold dark:text-white">Blog not found</p>
        @endif
        <div class="flex flex-wrap justify-between">
            @foreach ($blogs->skip(1) as $item)
                <div
                    class="mt-8 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="rounded-t-lg"
                            style="object-fit: cover; width: 700px; height: 300px;" alt="">
                    @else
                        <img class="rounded-t-lg" src="https://source.unsplash.com/700x300?{{ $item->category->name }}"
                            style="object-fit: cover; width: 700px; height: 300px;" alt="" />
                    @endif
                    {{-- <a href="#">
                        <img class="rounded-t-lg" src="https://source.unsplash.com/700x300?{{ $item->category->name }}"
                            alt="" />
                    </a> --}}
                    <div class="p-5">
                        <a href="/blogs/{{ $item->slug }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $item->title }}</h5>
                        </a>
                        {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 truncate">{{ $item->body }}</p> --}}
                        <a href="/blogs/{{ $item->slug }}"
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Read more
                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-9">
            {{ $blogs->links() }}
        </div>

    </div>
@endsection
