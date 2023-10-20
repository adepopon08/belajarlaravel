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
