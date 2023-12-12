@props([
    "id",
    "title" => "",
])
<label class="block text-sm font-semibold text-default-900 mb-2" for="{{ $id }}">{{ $title }}</label>
<input id="{{ $id }}" placeholder="dd/mm/yyyy" {{ $attributes->merge(["class" => "input-date block w-full rounded-full py-2.5 px-4 bg-white border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50"]) }}>
<div class="bg-white mt-3 hidden datepicker">
    <!-- Current date -->
    <p class="bg-gray-100 text-2xl tracking-widest p-4 text-center rounded-t-lg current-date"></p>

    <!-- Month selection -->
    <div class="flex justify-between border-x-[1px] border-solid border-gray-200">
        <button type="button" class="prev-month cursor-pointer bg-white hover:bg-gray-200 rounded-full w-12 pr-2">〈</button>
        <p class="month-selection p-3 text-center"></p>
        <button type="button" class="next-month cursor-pointer bg-white hover:bg-gray-200 rounded-full w-12 pl-2">〉</button>
    </div>

    <!-- Day selection -->
    <div class="day-selection flex flex-wrap rounded-b-lg border-gray-200 border-solid border-[1px] border-t-0"></div>
</div>

@push("js")
    @vite("resources/js/datepicker.ts")
@endpush
