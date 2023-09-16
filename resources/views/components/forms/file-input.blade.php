@php
    $classes = $errors->has($attributes->get('name'))
        ? 'block w-full text-sm text-gray-900 border border-red-700 rounded-lg cursor-pointer
                        bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600
                        dark:placeholder-gray-400'
        : 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer
                        bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600
                        dark:placeholder-gray-400';
    
@endphp

<input type="file" {{ $attributes->merge(['class' => $classes]) }}>
