<x-admin.layouts.app>
    <div class="w-full lg:ps-64">
        <div class="p-6 page-content">

            <div class="flex items-center justify-between w-full mb-6">
                <h4 class="text-xl font-medium">
                    {{ __("Customers List") }}
                </h4>

                {{ Breadcrumbs::render('admin.customers') }}
            </div>
            <div class="rounded-lg border border-default-200">
                <div class="p-6">
                    <div class="flex flex-wrap justify-between items-center gap-4">
                        <div class="relative lg:flex ">
                            <input type="search" name="search" class="ps-12 pe-4 py-2.5 block w-64 bg-default-50/0 text-default-600 border-default-200 rounded-lg text-sm focus:border-primary focus:ring-primary" placeholder="Search...">
                            <span class="absolute start-4 top-2.5">
                                <i data-lucide="search" class="w-5 h-5 text-default-600"></i>
                            </span>
                        </div>

                        <div class="flex flex-wrap items-center gap-2">

                            <a href="admin-customers-add.html" class="px-6 py-2.5 inline-flex text-white text-sm rounded-md bg-primary ">
                                <i data-lucide="plus" class="w-5 h-5 inline-flex align-middle me-2"></i>
                                {{ __("Add a New Customer") }}
                            </a>

                            <div class="relative">
                                <span class="absolute top-1/2 start-2.5 -translate-y-1/2"><i data-lucide="calendar-days" class="h-4 w-4 text-default-700"></i></span>
                                <span class="absolute top-1/2 end-2.5 -translate-y-1/2"><i data-lucide="chevron-down" class="h-4 w-4 text-default-700"></i></span>
                                <input type="text" name="date_join" class="py-2.5 w-40 px-9 block bg-default-100 rounded-md border-0 text-sm text-default-700 font-medium focus:border-default-200 focus:ring-0" id="datepicker-basic">
                            </div><!-- end relative -->


                            <div class="hs-dropdown relative inline-flex md:hidden">
                                <button type="button" id="button_select_level" class="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-700 text-sm py-2.5 px-4 xl:px-5 rounded-md bg-default-100 transition-all">
                                    {{ __("Select Level") }} <i data-lucide="chevron-down" class="h-4 w-4"></i>
                                </button><!-- end dropdown button -->

                                <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                    <ul class="flex flex-col gap-1">
                                        <li><a class="select-level flex items-center gap-3 font-normal py-2 px-3 transition-all text-default-700 bg-default-100 rounded" data-value="-1">{{ __("All") }}</a></li>
                                        @foreach($levels as $level => $value)
                                            <li><a class="select-level flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" data-value="{{ $value }}">{{ $level }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hs-dropdown relative inline-flex top-3 w-full justify-end hidden md:flex">
                        <div class="ml-3 flex items-center gap-6">
                            @foreach($levels as $level => $value)
                                <x-forms.inputs.radio name="level" :title="$level" :value="$value"/>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto border-t border-default-200">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden" id="table_html">
                            {!! $table !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("js")
        @vite("resources/js/staff.ts")
        @vite("resources/js/table.ts")
    @endpush
</x-admin.layouts.app>
