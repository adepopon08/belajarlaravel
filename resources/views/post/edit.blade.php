<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <x-input-label value="Title" />
                            <x-text-input name="title" placeholder="Title"
                                value="{{ old('title') ?? $post->title }}" />
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Title" />
                            <select name="category_id"
                                class="flex items-centerrelative cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                @foreach ($categories as $category)
                                    <option @selected($category->id == $post->category_id) value="{{ $category->id }}">
                                        {{ $category->category }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <x-input-error :messages='$message'></x-input-error>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Image" />
                            <input type="file" name="image"
                                class="w-full form-input rounded-md
                            shadow-sm @error('image') border border-red-500 @enderror">
                            @error('image')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Body" />
                            <textarea name="body" id="body" rows="4"
                                class="form-input rounded-md
                            shadow-sm w-full @error('body')
                            border border-red-500
                            @enderror"
                                placeholder="enter blog body">{{ old('body') ?? $post->body }}</textarea>
                            @error('body')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-primary-button type="submit">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
