@unless ($breadcrumbs->isEmpty())
    <ol aria-label="Breadcrumb" class="flex items-center whitespace-nowrap min-w-0 gap-2">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="text-base">
                    <a href="{{ $breadcrumb->url }}"
                       class="flex items-center gap-2 align-middle text-default-800 transition-all leading-none hover:text-primary-500">
                        <i class="w-4 h-4" data-lucide="{{ $breadcrumb->icon }}"></i>
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @else
                <li class="text-base font-semibold text-primary truncate leading-none hover:text-primary-500">{{ $breadcrumb->title }}</li>
            @endif

            @unless($loop->last)
                <i class="w-4 h-4" data-lucide="chevron-right"></i>
            @endif

        @endforeach
    </ol>
@endunless
