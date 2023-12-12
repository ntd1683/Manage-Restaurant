@props([
    "type" => "button",
])

<button type="submit"
        {{ $attributes->merge(["class" => "w-full items-center justify-center rounded-full text-base bg-primary text-white capitalize transition-all hover:bg-primary-500"]) }}>
    {{ $slot }}
</button>
