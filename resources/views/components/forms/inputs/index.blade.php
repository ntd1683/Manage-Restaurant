@props([
    "title" => "",
    "id" => "",
])
@if ($title !== "")
    <label class="block text-sm font-semibold text-default-900 mb-2" for="{{ $id }}">{{ $title }}</label>
@endif
<input id="{{ $id }}" {{ $attributes->merge(["class" => "block w-full rounded-full py-2.5 px-4 bg-white border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50"]) }}>
