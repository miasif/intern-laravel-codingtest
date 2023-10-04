@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-400 dark:text-gray-800 focus:border-indigo-500 dark:focus:border-indigo-300 focus:ring-indigo-400 dark:focus:ring-indigo-300 rounded-md shadow-sm']) !!}>
