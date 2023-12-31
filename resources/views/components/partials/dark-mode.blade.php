<!-- Back to Top & Light/Dark Toggle -->
<div class="fixed lg:bottom-5 end-5 bottom-20 flex flex-col items-center bg-primary/25 rounded-full z-10">
    <button class="h-0 w-8 opacity-0 flex justify-center items-center transition-all duration-500 translate-y-5 z-10" data-toggle="back-to-top">
        <i class="h-5 w-5 text-primary-500 mt-1" data-lucide="chevron-up"></i>
    </button>
    <button class="rounded-full h-10 w-10 bg-primary text-white flex justify-center items-center z-20" id="change-theme">
        <i class="h-5 w-5 hidden" data-lucide="sun" id="light-theme"></i>
        <i class="h-5 w-5 hidden" data-lucide="moon" id="dark-theme"></i>
    </button>
</div>
@push("js")
    @vite('resources/js/theme.ts')
@endpush
