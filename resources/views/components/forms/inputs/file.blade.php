@props([
    "title",
    "maxSize" => 1,
    'type' => 'image',
    "src" => "",
])
@php
    if($src !== "")
        $src = Storage::url($src);
@endphp
<label class="block">
    <span class="sr-only">{{ $title }}</span>
    <label class="block text-sm font-semibold text-default-900 mb-2">{{ $title }}</label>
    <input type="file" data-file-max-input="{{ $maxSize }}"
           {{ $attributes->merge(["class" => "input-file block w-full text-sm text-gray-500'
                  file:me-4 file:py-2 file:px-4
                  file:rounded-lg file:border-0
                  file:text-sm file:font-semibold
                  file:bg-blue-600 file:text-white
                  hover:file:bg-blue-700
                  file:disabled:opacity-50 file:disabled:pointer-events-none
                  dark:file:bg-blue-500
                  dark:hover:file:bg-blue-400"]) }}>
    <image @class(["mt-2 rounded-lg h-[200px] w-auto preview", "hidden" => $src == ""]) src="{{ $src }}"/>
</label>

@push("js")
    <script>
        document.querySelectorAll(".input-file").forEach(function (input) {
            input.addEventListener("change", function (e) {
                const file = e.target.files[0];
                const maxSize = e.target.dataset.fileMaxInput;

                if (file.size > maxSize * 1024 * 1024) {
                    Toastify({
                        text: "File size must be less than " + maxSize + "MB",
                        duration: 3000,
                        close: true,
                        stopOnFocus: true,
                        style: {
                            background: "#FF0000",
                        },
                        }).showToast();
                    e.target.value = "";
                } else {
                    const img = e.target.nextElementSibling;
                    if (img.classList.contains("hidden"))
                        img.classList.remove("hidden");
                    img.src = URL.createObjectURL(file);
                }
            });
        });
    </script>
@endpush
