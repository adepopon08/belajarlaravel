<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('post.create') }}"
                class="inline-flex itemscenter px-4 py-2 bg-gray-800 border border-transparent rounded-md fontsemibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 mb-4">Create
                Post</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:- mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 mb-2">
                            <div class="shadow overflow-hidden border-b  border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y  divide-gray-200 mt-2">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Title
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Body
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Image
                                            </th>
                                            <th scope="col" class="relative  px-6 py-3">
                                                <span class="sronly">Aksi</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y  divide-gray-200">
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex itemscenter">
                                                        <div class="ml-4">
                                                            <div class="textsm font-medium text-gray-900">
                                                                {{ $post->title }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4  whitespace-nowrap">
                                                    <div class="text-sm  text-gray-900">
                                                        {{ $post->body }}</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <img src="{{ asset('storage/' . $post->image) }}" alt=""
                                                        class="h-16 w-16">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                                    <x-link href="{{ route('post.edit', $post) }}">Edit</x-link>
                                                    <form action="{{ route('post.destroy', $post) }}" method="POST"
                                                        class="mt-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-danger-button
                                                            onclick="return confirm('Are you sure delete this data?')">Delete</x-danger-button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
