<x-admin.layouts.app>
    <div class="w-full lg:ps-64">
        <div class="p-6 page-content">

            <div class="flex items-center justify-between w-full mb-6">
                <h4 class="text-xl font-medium">
                    {{ __("Settings") }}
                </h4>


                {{ Breadcrumbs::render('admin.setting') }}
            </div>
            <div class="p-6 border rounded-lg border-default-200 mb-6">
                <div>
                    <h4 class="text-xl font-medium text-default-900 mb-4">{{ __("Information Website") }}</h4>

                    <div class="grid lg:grid-cols-4 gap-6">

                        <form id="form-setting" class="lg:col-span-4" action="{{ route("admin.setting.save") }}"
                              method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="grid lg:grid-cols-2 gap-6">
                                <div class="mb-1">
                                    <x-forms.inputs id="name" name="site_name" :title="trans('Name')"
                                                    :value="old('site_name', option('app.name', config('app.name')))"
                                                    :placeholder="trans('Enter Your Name')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs id="slogan" name="slogan" :title="trans('Slogan')"
                                                    :value="old('slogan', option('slogan'))"
                                                    :placeholder="trans('Enter Your Slogan')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs.file name="logo_dark" :title="trans('Logo Dark')" maxSize="3"
                                                         :src="old('logo_dark', option('logo_dark'))"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs.file name="logo_light" :title="trans('Logo Light')" maxSize="3"
                                                         :src="old('logo_light', option('logo_light'))"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs :title="trans('address')" type="text" id="address"
                                                    name="site_address"
                                                    :value="old('site_address', option('site_address'))"
                                                    placeholder="xxx Điện Biên Phủ, P21 Quận Bình Thạnh,..."/>
                                    <div class="text-red-500 font-semibold mt-3 flex">
                                        <i class="fas fa-exclamation-triangle mt-[3.1px] mr-0.5"></i>
                                        <p>{{ __("The field address turns green to confirm") }}</p>
                                    </div>
                                    <input class="hidden" id="lat" name="lat" value="{{ old("lat", option("lat")) }}">
                                    <input class="hidden" id="lng" name="lng" value="{{ old("lng", option("lng")) }}">
                                    @push("css")
                                        <style>
                                            .map-canvas {
                                                width: 90%;
                                                border: 1px solid #CCC;
                                                height: 400px;
                                                margin: 10px 0;
                                                padding: 4px;
                                            }
                                        </style>
                                    @endpush
                                </div>
                                <div id="map" class="map-canvas">

                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs id="email" name="email" type="email" title="email"
                                                    :value="old('email', option('email'))" placeholder="xxxx@xxx.xxx"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs id="phone" name="phone" title="phone" type="tel"
                                                    :value="old('phone', option('phone'))" placeholder="0123456789"/>
                                </div>
                                <div class="lg:w-[200%] w-full flex justify-center">
                                    <x-forms.buttons type="submit" class="lg:!w-1/2 w-full flex h-10"
                                                     id="btn-submit">{{ __("Save Changes") }}</x-forms.buttons>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="text-center w-full mt-3">
                        <p class="text-red-500 font-semibold" id="error-message"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push("js")
        @vite("resources/js/setting.js")
    @endpush
</x-admin.layouts.app>
