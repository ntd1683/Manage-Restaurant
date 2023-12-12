@props(['id' => ""])
<label {{ $attributes->merge(["class" => "block text-sm font-semibold text-default-900 mb-2"]) }}>{{ $slot }}</label>
