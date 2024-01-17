@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between border-t border-gray-200 px-4 sm:px-0">
        {{-- Pagination Previous --}}
        <div class="-mt-px flex w-0 flex-1">
            @if ($paginator->onFirstPage())
                <span class="p-3 inline-flex items-center border-t-2 border-transparent text-base font-bold text-gray-300">
                    <i data-lucide="arrow-left" class="mr-3 w-5 h-5"></i>
                    {{ __("Previous") }}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="p-3 inline-flex items-center border-t-2 border-transparent text-base font-medium text-gray-700 hover:border-primary-300 hover:text-primary-500">
                    <i data-lucide="arrow-left" class="mr-3 w-5 h-5"></i>
                    {{ __("Previous") }}
                </a>
            @endif
        </div>
        {{-- Pagination Elements --}}
        <div class="hidden md:-mt-px md:flex">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="inline-flex items-center border-t-2 border-transparent p-4 text-sm font-medium text-gray-500">...</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="inline-flex items-center border-t-2 border-primary-500 p-4 text-sm font-medium text-primary-500" aria-current="page">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}" class="inline-flex items-center border-t-2 border-transparent p-4 text-sm font-medium text-gray-500 hover:border-primary-300 hover:text-primary-500">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        {{-- Pagination Next--}}
        <div class="-mt-px flex w-0 flex-1 justify-end">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="p-3 inline-flex items-center border-t-2 border-transparent text-base font-medium text-gray-700 hover:border-primary-300 hover:text-primary-500">
                    {{ __("Next") }}
                    <i data-lucide="arrow-right" class="ml-3 w-5 h-5"></i>
                </a>
            @else
                <span class="p-3 inline-flex items-center border-t-2 border-transparent text-base font-bold text-gray-300">
                    {{ __("Next") }}
                    <i data-lucide="arrow-right" class="ml-3 w-5 h-5"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
