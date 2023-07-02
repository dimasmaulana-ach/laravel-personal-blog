@extends('layouts.dashboard')

@section('dashboard')
    <div class="">
        <h1 class="font-bold text-5xl dark:text-white">Dashboard</h1>
        <div class="gap-8 sm:grid sm:grid-cols-3 my-4">
            <div
                class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">my Blogs</dt>
                    <dd class="flex items-center mb-3">
                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                style="width: {{ $blogs->count() / 100 }}%">
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $blogs->count() }}/1000</span>
                    </dd>
                </dl>
            </div>
            <div
                class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">all Blogs</dt>
                    <dd class="flex items-center mb-3">
                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                style="width: {{ $allblogs->count() / 100 }}%">
                            </div>
                        </div>
                        <span
                            class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $allblogs->count() }}/1000</span>
                    </dd>
                </dl>
            </div>
            <div
                class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <dl>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Users</dt>
                    <dd class="flex items-center mb-3">
                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                style="width: {{ $allusers->count() / 100 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ $allusers->count() }}/1000</span>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="max-w-lg p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h1 class="mb-2 text-xl font-bold dark:text-white">Latest Create</h1>
            <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($users as $item)
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    {{ $item->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{ $item->email }}
                                </p>
                            </div>
                            {{-- <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    {{ $item->blogs->count() }}
                                </div> --}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
