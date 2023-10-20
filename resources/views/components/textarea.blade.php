@props([
    'variants' => 'red',
])

@if ($variants == 'red')
<textarea {!! $attributes->merge(['class' => 'border-red-300 dark:border-red-700 dark:bg-red-900 dark:text-red-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}></textarea>
@endif

@if ($variants == 'grey')
<textarea {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}></textarea>
@endif
