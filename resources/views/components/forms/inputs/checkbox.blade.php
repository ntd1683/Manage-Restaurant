@props([
    "title",
    "id"
])
<input type="checkbox"
       {{ $attributes->merge(["class" => "shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"]) }}
       id="{{ $id }}">
<label for="{{ $id }}" class="text-sm font-medium text-gray-500 ms-3 dark:text-gray-400">{{ $title }}</label>
