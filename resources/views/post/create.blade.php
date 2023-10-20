<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-2">
                            <x-input-label value="Title" />
                            <x-text-input name="title" placeholder="Title" />
                            @error('title')
                                <x-input-error :messages='$message'></x-input-error>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Category" />
                            <select name="category_id"
                                class="flex items-centerrelative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6"
                                aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <x-input-error :messages='$message'></x-input-error>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Body" />
                            <x-textarea variants="grey" name="body" rows="5" cols="100" />
                            @error('body')
                                <x-input-error :messages='$message'></x-input-error>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Image" />
                            <x-text-input type="file" name="image" />
                            @error('image')
                                <x-input-error :messages='$message'></x-input-error>
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
