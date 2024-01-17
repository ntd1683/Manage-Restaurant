<button onclick="toggleDialog()" class="hidden open-dialog">Toggle</button>
<span class="hidden bg-primary bg-alert bg-error"></span>
<div class="dialog opacity-0 relative z-10 transition ease-in-out duration-300" aria-labelledby="modal-title"
     role="dialog" aria-modal="true">
    <div class="dialog-show hidden fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="dialog-show hidden fixed inset-0 z-10 w-screen overflow-y-auto">
        <div
            class="dialog-sec flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0 ease-in-out duration-300 opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                <div>
                    <button onclick="toggleDialog()">
                        <i data-lucide="x-circle" class="h-6 w-6 hover:text-error-500 absolute right-1 top-1 hover:opacity-80"></i>
                    </button>
                    <div class="dialog-icon mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                        <i data-lucide="badge-check" class="dialog-icon-check hidden h-6 w-6 text-green-600"></i>
                        <i data-lucide="badge-x" class="dialog-icon-x hidden h-6 w-6 text-error"></i>
                        <i data-lucide="badge-alert" class="dialog-icon-alert hidden h-6 w-6 text-alert"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"></h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500" id="message"></p>
                        </div>
                    </div>
                </div>
                <div id="confirm" class="!hidden mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                    <x-forms.buttons onclick="toggleDialog()" class="!rounded !bg-white !text-gray-900 !shadow-sm !ring-1 !ring-inset !ring-gray-300 hover:!bg-gray-50 mt-3 inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold sm:col-start-1 sm:mt-0">{{ __("Cancel") }}</x-forms.buttons>
                    <x-forms.buttons onclick="actionOk()" class="message-ok inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2  sm:col-start-2"/>
{{--                    <button type="button" onclick="actionOk()"--}}
{{--                            class="message-ok inline-flex w-full justify-center rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">--}}
{{--                        {{ __("OK") }}--}}
{{--                    </button>--}}

{{--                    <button onclick="toggleDialog()" type="button"--}}
{{--                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">--}}
{{--                        --}}
{{--                    </button>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let actionOkCallback;

    function actionOk() {
        if (typeof actionOkCallback === 'function') {
            actionOkCallback();
        }

        toggleDialog();
    }

    function toggleDialog() {
        const dialog = document.querySelector(".dialog");
        dialog.classList.toggle("opacity-0");
        dialog.classList.toggle("opacity-100");

        const dialogSec = document.querySelector(".dialog-sec");
        dialogSec.classList.toggle("opacity-0");
        dialogSec.classList.toggle("opacity-100");
        dialogSec.classList.toggle("translate-y-4");
        dialogSec.classList.toggle("translate-y-0");
        dialogSec.classList.toggle("sm:translate-y-0");
        dialogSec.classList.toggle("sm:scale-95");
        dialogSec.classList.toggle("sm:scale-100");

        const dialogShow = document.querySelectorAll(".dialog-show");
        dialogShow.forEach(show => {
            show.classList.toggle("hidden");
        });
    }

    function setIcon(icon) {
        const dialogIcon = document.querySelector(".dialog-icon");
        const iconCheck = document.querySelector(".dialog-icon-check");
        const iconX = document.querySelector(".dialog-icon-x");
        const iconAlert = document.querySelector(".dialog-icon-alert");
        if(icon === "check") {
            if(iconCheck.classList.contains("hidden")) {
                iconCheck.classList.remove("hidden");
            }
            if(! iconX.classList.contains("hidden")) {
                iconX.classList.add("hidden");
            }
            if(! iconAlert.classList.contains("hidden")) {
                iconAlert.classList.add("hidden");
            }

            if(! dialogIcon.classList.contains("bg-green-100")) {
                dialogIcon.classList.add("bg-green-100");
            }
            if(dialogIcon.classList.contains("bg-error-100")) {
                dialogIcon.classList.remove("bg-error-100");
            }
            if(dialogIcon.classList.contains("bg-alert-100")) {
                dialogIcon.classList.remove("bg-alert-100");
            }
        } else if(icon === "x") {
            if(! iconCheck.classList.contains("hidden")) {
                iconCheck.classList.add("hidden");
            }
            if(iconX.classList.contains("hidden")) {
                iconX.classList.remove("hidden");
            }
            if(! iconAlert.classList.contains("hidden")) {
                iconAlert.classList.add("hidden");
            }

            if(dialogIcon.classList.contains("bg-green-100")) {
                dialogIcon.classList.remove("bg-green-100");
            }
            if(! dialogIcon.classList.contains("bg-error-100")) {
                dialogIcon.classList.add("bg-error-100");
            }
            if(dialogIcon.classList.contains("bg-alert-100")) {
                dialogIcon.classList.remove("bg-alert-100");
            }
        } else if(icon === "alert") {
            if(! iconCheck.classList.contains("hidden")) {
                iconCheck.classList.add("hidden");
            }
            if(! iconX.classList.contains("hidden")) {
                iconX.classList.add("hidden");
            }
            if(iconAlert.classList.contains("hidden")) {
                iconAlert.classList.remove("hidden");
            }

            if(dialogIcon.classList.contains("bg-green-100")) {
                dialogIcon.classList.remove("bg-green-100");
            }
            if(dialogIcon.classList.contains("bg-error-100")) {
                dialogIcon.classList.remove("bg-error-100");
            }
            if(! dialogIcon.classList.contains("bg-alert-100")) {
                dialogIcon.classList.add("bg-alert-100");
            }
        }
    }

    function setContent(icon, title, message, confirm, messageOk, callback) {
        setIcon(icon);
        document.getElementById("modal-title").textContent = title;

        const msOk = document.querySelector(".message-ok");
        msOk.textContent = messageOk;
        if (icon === "check")
            msOk.classList.add("bg-primary", "focus-visible:!outline-primary-600");
        else if (icon === "x")
            msOk.classList.add("!bg-error-500", "hover:!bg-error-300", "focus-visible:!outline-error-600");
        else
            msOk.classList.add("!bg-alert-500", "hover:!bg-alert-300", "focus-visible:!outline-alert-600");

        document.getElementById("message").textContent = message;
        console.log(confirm)
        if(confirm === true) {
            document.getElementById("confirm").classList.remove("!hidden");
        } else {
            document.getElementById("confirm").classList.add("!hidden");
        }

        actionOkCallback = callback;
    }

    function openDialog(options) {
        const {title = "", message, confirm = false, icon = "check", messageOk = "ok", callback = 1} = options;
        setContent(icon, title, message, confirm, messageOk, callback);
        document.querySelector(".open-dialog").click();
    }
</script>
