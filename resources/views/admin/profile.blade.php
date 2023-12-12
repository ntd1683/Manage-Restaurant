<x-admin.layouts.app>
    @push("css")
        {!! RecaptchaV3::initJs() !!}
        <style>
            .grecaptcha-badge { display: none !important; }
        </style>
    @endpush
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

                        <form id="form-profile" class="lg:col-span-4" action="{{ route("admin.profile.save") }}"
                              method="post">
                            @csrf

                            {!! RecaptchaV3::field('register') !!}
                            <div class="grid lg:grid-cols-2 gap-6">
                                <div class="mb-1">
                                    <x-forms.inputs id="name" name="name" :title="trans('Name')"
                                                    :value="old('name', $user->name)"
                                                    :placeholder="trans('Enter Your Name')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs id="phone" name="phone" :title="trans('Phone')"
                                                    :value="old('phone', $user->phone)"
                                                    :placeholder="trans('Enter Your Phone')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs id="id-card" name="id_card" :title="trans('ID Card')"
                                                    :value="old('id_card', $user->id_card)"
                                                    :placeholder="trans('Enter Your ID Card')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs id="email" name="email" :title="trans('Email')"
                                                    :value="$user->email" disabled readonly
                                                    :placeholder="trans('Enter Your Email')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs.date id="birthday" name="birthday" :value="old('birthday', $user->birthday)" :title="trans('Birthday')" />
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs.label>{{ __("Gender") }}</x-forms.inputs.label>
                                    <div class="flex gap-x-12 mt-5">
                                        @php
                                        $checkedMale = false;
                                        if ($user->gender == 1 || old("gender") == 1)
                                            $checkedMale = true;

                                        $checkedFemale = false;
                                        if ($user->gender === 0 || old("gender") === 0)
                                            $checkedFemale = true;

                                        if($checkedFemale === false)
                                            $checkedMale = true;
                                        @endphp
                                        <x-forms.inputs.radio id="gender-male" :title="trans('Male')" name="gender" value="1" :checked="$checkedMale"/>
                                        <x-forms.inputs.radio id="gender-female" :title="trans('Female')" name="gender" value="0" :checked="$checkedFemale"/>
                                    </div>
                                </div>
                                <div>
                                    <x-forms.inputs.label class="!text-xl !font-medium">{{ __("Change Password") }}</x-forms.inputs.label>
                                </div>
                                <div></div>
                                <div class="mb-1">
                                    <x-forms.inputs.label for="old-password">{{ __("Old Password") }}</x-forms.inputs.label>
                                    <x-forms.inputs.password data-x-field="password" name="old_password" id="old-password"
                                                             :value="old('old_password')" :placeholder="trans('Enter your old password')"/>
                                </div>
                                <div class="mb-1">
                                    <x-forms.inputs.label for="new-password">{{ __("New password") }}</x-forms.inputs.label>
                                    <x-forms.inputs.password data-x-field="password" name="new_password" id="new-password"
                                                             :value="old('new_password')" :placeholder="trans('Enter your new password')"/>
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
        @vite("resources/js/profile.ts")
    @endpush
</x-admin.layouts.app>
