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
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Body" />
                            <x-textarea variants="grey" name="body" rows="5" cols="100" />
                        </div>
                        <div class="mb-2">
                            <x-input-label value="Image" />
                            <x-text-input type="file" name="image" />
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
