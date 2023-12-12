<div class="flex w-full" data-x-password>
    <input type="password" {{ $attributes->merge(["class" => "form-password block w-full rounded-s-full py-2.5 px-4 bg-white border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50"]) }} />
    <button type="button" class="password-toggle inline-flex items-center justify-center py-2.5 px-4 border rounded-e-full bg-white -ms-px border-default-200 dark:bg-default-50">
        <i class="password-eye-on h-5 w-5 text-default-600" data-lucide="eye"></i>
        <i class="password-eye-off h-5 w-5 text-default-600" data-lucide="eye-off"></i>
    </button>
</div>

@push("js")
    <script>
        document.querySelectorAll("[data-x-password]").forEach(password => {
            const inputPassword = password.querySelector(".form-password"),
                btnPassword = password.querySelector(".password-toggle") ,
                iconPasswordOn = password.querySelector(".password-eye-on") ,
                iconPasswordOff = password.querySelector(".password-eye-off") ;

            if (!inputPassword || !iconPasswordOn || !iconPasswordOff) return;

            iconPasswordOff.classList.add("hidden");
            let isShowPassword = false;

            btnPassword.addEventListener("click", () => {
                if(! isShowPassword) {
                    isShowPassword = true;
                    iconPasswordOn.classList?.add("hidden");
                    iconPasswordOff.classList?.remove("hidden");
                    inputPassword.type = "text";
                } else {
                    isShowPassword = false;
                    iconPasswordOff.classList?.add("hidden");
                    iconPasswordOn.classList?.remove("hidden");
                    inputPassword.type = "password";
                }
            });
        })
    </script>
@endpush
