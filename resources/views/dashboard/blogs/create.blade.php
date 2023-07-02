@extends('layouts.dashboard')

@section('dashboard')
    <div class="">
        <div class="flex">
            <h1 class="font-bold text-5xl dark:text-white">Create Blogs</h1>
        </div>
        <div class="mt-5 w-full ">
            <form action="/dashboard/blogs" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="gap-8 sm:grid sm:grid-cols-2 my-4">
                    <div class="">
                        <div class="mb-6">
                            <label for="title"
                                class="block mb-2 text-md font-bold text-gray-900 dark:text-white">Title</label>
                            <input type="text" id="title" placeholder="Title" name="title"
                                value="{{ old('title') }}"
                                class="bg-white border border-gray-300 @error('title')
                                border-red-500
                                @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, Error!
                                    </span>{{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="slug"
                                class="block mb-2 text-md font-bold text-gray-900 dark:text-white">Slug</label>
                            <input type="text" id="slug" placeholder="Slug" name="slug"
                                class="bg-gray-50 border border-gray-300 @error('slug')
                                border-red-500
                                @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, Error!
                                    </span>{{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="category"
                                class="block mb-2 text-md font-bold text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category_id"
                                class="bg-white border border-gray-300 @error('category_id')
                                border-red-500
                                @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($category as $item)
                                    @if (old('category_id') == $item->id)
                                        <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                    @else
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, Error!
                                    </span>{{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="image">Upload Image</label>
                            <input
                                class="block w-full text-sm text-gray-900 @error('image')
                                border-red-500
                                @enderror border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="image" type="file" name="image" onchange="previewImage()">
                            @error('image')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, Error!
                                    </span>{{ $message }}.</p>
                            @enderror
                            <img src="" class="h-auto max-w-xs image-preview" alt="">
                        </div>
                    </div>
                    <div class="">
                        <div class="mb-6">
                            <label for="body"
                                class="block mb-2 text-md font-bold text-gray-900 dark:text-white">Body</label>
                            <input id="body" type="hidden" name="body" class="dark:text-white">
                            <trix-editor input="body"
                                class="bg-white rounded-lg h-80 overflow-y-auto dark:text-white dark:bg-gray-700 dark:border-gray-600 @error('body')
                            border-red-500
                            @enderror">
                            </trix-editor>
                            @error('body')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, Error!
                                    </span>{{ $message }}.</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                    Blogs</button>
            </form>
        </div>
    </div>

    <script>
        const title = document.querySelector('#title')
        const slug = document.querySelector('#slug')

        title.addEventListener('change', function() {
            fetch('/dashboard/blogs/generateSlug/' + title.value)
                .then(res => res.json())
                .then(data => slug.value = data.slug)
        })

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.image-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader()
            oFReader.readAsDataURL(image.files[0])
            oFReader.onload = function(oFREvent){
                imgPreview.src = oFREvent.target.result
            }
        }

    </script>
@endsection
