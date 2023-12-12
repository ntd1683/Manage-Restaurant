<!-- End Header -->
<header class="sticky top-0 h-18 flex z-40 w-full border-b border-default-200 bg-white dark:bg-default-50 lg:ps-64">
    <nav class="flex items-center gap-4 w-full px-6">
        <!-- Navigation Toggle (in Small Screen) -->
        <div class="lg:hidden flex">
            <button type="button" class="text-default-500 hover:text-default-600" data-hs-overlay="#application-sidebar"
                    aria-controls="application-sidebar" aria-label="Toggle navigation">
                <i data-lucide="align-justify" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Logo -->
        <div class="lg:hidden flex">
            <a href="{{ route("admin.index") }}">
                <img src="{{ getImageFromStorage(option("logo_dark"), "images/logo-dark.png") }}" alt="logo" class="h-10 w-full flex dark:hidden">
                <img src="{{ getImageFromStorage(option("logo_light"), "images/logo-light.png") }}" alt="logo" class="h-10 w-full hidden dark:flex">
            </a>
        </div>

        <!-- Search Input -->
        <div class="lg:flex hidden">
            <label for="icon" class="sr-only">Search</label>
            <div class="relative lg:flex hidden">
                <input type="search"
                       class="ps-12 pe-4 py-2.5 block w-64 bg-default-50 text-default-600 border-default-200 rounded-full text-sm focus:border-primary focus:ring-primary"
                       placeholder="{{ __("Search for items...") }}">
                <span class="absolute start-4 top-2.5">
                        <i data-lucide="search" class="w-5 h-5 text-default-600"></i>
                    </span>
            </div>
        </div>

        <!-- Topbar Link and Dropdown Button -->
        <div class="flex items-center gap-4 ms-auto">
            <!-- Language -->
            <div class="lg:flex hidden">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="hs-dropdown-with-header" type="button"
                            class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-10 w-10 rounded-full font-medium text-default-700 align-middle bg-default-100 hover:text-primary transition-all text-xs">
                        <i data-lucide="globe" class="w-6 h-6"></i>
                    </button>

                    <div
                        class="hs-dropdown-menu mt-2 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[12rem] shadow-md rounded-lg border border-default-200 bg-white dark:bg-default-50 p-2">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm rounded transition-all hover:bg-default-100"
                           href="javascript:void(0)">
                            <img
                                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpENEQyQjUxRTYxM0IxMUU3QThGRDlFNzgyMDM4RjBCQyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpENEQyQjUxRjYxM0IxMUU3QThGRDlFNzgyMDM4RjBCQyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkQ0RDJCNTFDNjEzQjExRTdBOEZEOUU3ODIwMzhGMEJDIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkQ0RDJCNTFENjEzQjExRTdBOEZEOUU3ODIwMzhGMEJDIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAHkAAQEBAAMAAAAAAAAAAAAAAAABBgIFBwEBAAIDAQAAAAAAAAAAAAAAAAEFAgQGBxAAAQIBDQADAQAAAAAAAAAAAAECAzFRkRKi0qPjVAVVFhchQYEyEQEAAAMHBQEAAAAAAAAAAAAA4WKiUaGx0QJSFgEDBBQVMf/aAAwDAQACEQMRAD8A82fFive573uc9yqrnKqqqqvyqqqmwhKzp1JCs6dQFZ06gKzp1AVnTqArOnUCsixWPa9j3Ne1UVrkVUVFT5RUVCB2XWd701uHeNb3O1biuePebsq05nWd701uHeHudq3E495uyrTmdZ3vTW4d4e52rcTj3m7KtOZ1ne9Nbh3h7natxOPebsq05nWd701uHeHudq3E495uyrTmdZ3vTW4d4e52rcTj3m7KtOZ1ne9Nbh3h7natxOPebsq05nWd701uHeHudq3E495uyrTm3RRvTgAAAAAAADd+XpyeBmFJ9iS+Dm+QyVQPL05PAzB9iS+ByGSqB5enJ4GYPsSXwOQyVQPL05PAzB9iS+ByGSqB5enJ4GYPsSXwOQyVQPL05PAzB9iS+ByGSqB5enJ4GYPsSXwOQyVQPL05PAzB9iS+ByGSqDdlI5sAAAAAAAA5O/pZJfqT8M9f71/EdEoMQoAUAKAFACgCt/pJJfuT9MtH70/Dq//Z"
                                alt="user-image" class="h-4">
                            <span class="align-middle">German</span>
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm rounded transition-all hover:bg-default-100"
                           href="javascript:void(0)">
                            <img
                                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowMUM1QUQyRDYxM0MxMUU3QTE2RkM2RkVEMTY1NUZGQiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDowMUM1QUQyRTYxM0MxMUU3QTE2RkM2RkVEMTY1NUZGQiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjAxQzVBRDJCNjEzQzExRTdBMTZGQzZGRUQxNjU1RkZCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjAxQzVBRDJDNjEzQzExRTdBMTZGQzZGRUQxNjU1RkZCIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAHsAAAMBAQEBAAAAAAAAAAAAAAAGBwQBAgMBAAIDAQEBAAAAAAAAAAAAAAAGBAUHAwECEAABAwEGBAYDAAAAAAAAAAAAAQIDBxExsTN0NiFRMrJhQpI0RBZxcgQRAQABAwUBAAMAAAAAAAAAAAABwTI0coIDBAYxEYEC/9oADAMBAAIRAxEAPwDc573OVznKrlW1VVbVVVMnmZlWuWrzAHKlKr9mk4/Fk72F/wCcyJ0zR24LldHlMABGqsqv2pOPxo8XFZ272ieYxd00Jdq8yKYvw6172uRzXK1zVtRUWxUVAeTES0CIwgADnSnc0mlk72F95zInTNHbguV0ekwAEZqzutNNHi4rO3e0TzGLumhMIpiABpERg4AHOlO5pNLJ3sL7zmROmaO3Bcro9JgAIzVndaaaPFxWdu9onmMXdNCYRTEADSIjBwAOdKdzSaWTvYX3nMidM0duC5XR6TAARmrO6000eLis7d7RPMYu6aEwimIAGkRGDgAc6U7mk0snewvvOZE6Zo7cFyuj0mAAjNWd1ppo8XFZ272ieYxd00JhFMQAN8+fJl9S5fRf5fDkI/8Af2fjB5ePSfIONKtzSXe2ku/ZhfecyJ0zR24LldHlMABGqsbqS720d/5cVnbvaH5jF3TQmekimF9P58+PL6m5nRf5vDmew+f7tn7+vr//2Q=="
                                alt="user-image" class="h-4">
                            <span class="align-middle">Italian</span>
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm rounded transition-all hover:bg-default-100"
                           href="javascript:void(0)">
                            <img
                                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyODQ3Mjc2MTYxM0MxMUU3ODJENDgwMDE3MDIxNjRGOCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoyODQ3Mjc2MjYxM0MxMUU3ODJENDgwMDE3MDIxNjRGOCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjI4NDcyNzVGNjEzQzExRTc4MkQ0ODAwMTcwMjE2NEY4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjI4NDcyNzYwNjEzQzExRTc4MkQ0ODAwMTcwMjE2NEY4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAI4AAQACAgMAAAAAAAAAAAAAAAAEBQEDAgYHAQEAAgMBAQAAAAAAAAAAAAAAAgYDBAUBBxAAAQMBBgMFCAMAAAAAAAAAAQIDBAAREpMFVQZR0RYyktIzFTFBIkJiExQ0YXGREQACAQEGBQMDBQAAAAAAAAAAAQIDETGRUhMUIUFREgRxoSJhgTLwscHRBf/aAAwDAQACEQMRAD8ApFOOLUVKUVKUbVKJJJJ95rln0xIxeVxNALyuJoBeVxNALyuJoBeVxNALyuJoDKXHEKCkqKVJNqVAkEEe8UDR7x6BkWnRcFvw1R9zVzSxZXdafV4nFeS7babW7Ihw2GGkqW46tlsJSlItJPw1m8edarNRU2rfqzx1qnJybKyBL2JNnrhNxGmXb9xhciGGkOKtu3bxT8JvggBVnD2105+FUsfbVeN/D1/SJz14xUndzslbYWvoGRadFwW/DXG3NXNLFkdafV4j0DItOi4LfhpuauaWLGtPq8R6BkWnRcFvw03NXNLFjWn1eI9AyLTouC34abmrmlixrT6vEegZFp0XBb8NNzVzSxY1p9XiT6wGM6vuF8QkFMWJLiflvoVmMlX47iS2oFF5KG1POAKCRZeb/wAqwLxYqEJW2vstSfX6Xe7Njxvm+Li+26/+bFgzOxsz2q4p9qQuL+XFlqBelXY6xHKQEFJIZBVeCrRZaKsFD/LhoRlWj+azP+zR8rynOpKFNy+KuSt+XuXMERVyHpbUKQw7IN2Q+6uOptZaN1ASGnHFAhJ+YCqr53jqnRptO3jL0v5cLfW37Gbul+LaaXrbx9V+xOrkgUAoBQCgKSREczGG9CGVpyq8QtUkfaV91YcCiVhtRUSeJrt1/JppU7JqXarOCljxSRHx6s1NuSl92vYhP7FQiOlMaW0VvtluaS0oG0qcsWiwi8brtnxe8A/xWat51Hsj8pSceXLl1uuNil5Vkm3CzD3LmKsmXc9ITF+2lSDmFrRW6kKF0KuEr/q2tTy6sJUIRU4uUeSUrePHmrOF15pwlPudttnqrPtx5k+uSZhQCgFAeFdUbj1OVjL51dtnRyRwLDoU8qHVG49TlYy+dNnRyRwGhTyodUbj1OVjL502dHJHAaFPKh1RuPU5WMvnTZ0ckcBoU8qHVG49TlYy+dNnRyRwGhTyodUbj1OVjL502dHJHAaFPKh1RuPU5WMvnTZ0ckcBoU8qHVG49TlYy+dNnRyRwGhTyohyf2XfK7avK7Ht+T6eFbTJRuV5r7teEh3aAd2gHdoB3aAd2gNkb9lryu2nzex7fn+njXqIyud5/9k="
                                alt="user-image" class="h-4">
                            <span class="align-middle">Spanish</span>
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 text-sm rounded transition-all hover:bg-default-100"
                           href="javascript:void(0)">
                            <img
                                src="data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAAA8AAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo0MjI1RDJEQjYxM0MxMUU3ODE3M0YwMkM1MjgyRTVFMiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo0MjI1RDJEQzYxM0MxMUU3ODE3M0YwMkM1MjgyRTVFMiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjQyMjVEMkQ5NjEzQzExRTc4MTczRjAyQzUyODJFNUUyIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjQyMjVEMkRBNjEzQzExRTc4MTczRjAyQzUyODJFNUUyIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQABgQEBAUEBgUFBgkGBQYJCwgGBggLDAoKCwoKDBAMDAwMDAwQDA4PEA8ODBMTFBQTExwbGxscHx8fHx8fHx8fHwEHBwcNDA0YEBAYGhURFRofHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8fHx8f/8AAEQgAKgBAAwERAAIRAQMRAf/EAHUAAQEBAQAAAAAAAAAAAAAAAAADBggBAQADAQEAAAAAAAAAAAAAAAABAgYEAxAAAQAHBwUBAAAAAAAAAAAAAAHio9MEVKQykjNVFgcXMVFhAkIDEQEAAAQHAQADAAAAAAAAAAAAAaLiY6HRUgMTFRYxgQIy/9oADAMBAAIRAxEAPwDpwAAAAAAAABiOats85pop0dnX72nGGanJA5q2zzmminQ6/e04wzOSBzVtnnNNFOh1+9pxhmckDmrbPOaaKdDr97TjDM5IHNW2ec00U6HX72nGGZyQOats85pop0Ov3tOMMzkgc1bZ5zTRTodfvacYZnJA5q2zzmminQ6/e04wzOSDlg0rnAAAAAAAANHpFE0zWMx6O3NS3HjLslRpFE0zWHo7c1J4y7JUaRRNM1h6O3NSeMuyVGkUTTNYejtzUnjLslRpFE0zWHo7c1J4y7JUaRRNM1h6O3NSeMuyVGkUTTNYejtzUnjLslRpFE0zWHo7c1J4y7JU0RmG5AAAAAAAALRGP+mHa9sOx1+fHYmLz/T+Yffz9TukLF0BdAXQF0BdApD4/wCeHa9cSx1+vHcmCv7/AMx+/j6//9k="
                                alt="user-image" class="h-4">
                            <span class="align-middle">Russian</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Fullscreen Button -->
            <div class="lg:flex hidden">
                <button data-toggle="fullscreen"
                        class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-10 w-10 rounded-full font-medium text-default-700 align-middle bg-default-100 hover:text-primary transition-all text-xs">
                    <i data-lucide="maximize" class="w-6 h-6"></i>
                </button>
            </div>

            <!-- Setting Button -->
            <div class="md:flex hidden">
                <a href="{{ route("admin.setting") }}"
                   class="inline-flex flex-shrink-0 justify-center items-center gap-2 h-10 w-10 rounded-full font-medium text-default-700 align-middle bg-default-100 hover:text-primary transition-all text-xs">
                    <i data-lucide="settings" class="w-6 h-6"></i>
                </a>
            </div>

            <!-- Notification Dropdown -->
            <div class="md:flex hidden">
                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="hs-dropdown-with-header" type="button"
                            class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 h-10 w-10 rounded-full font-medium text-default-700 align-middle bg-default-100 hover:text-primary transition-all text-xs">
                        <i data-lucide="bell" class="w-6 h-6"></i>
                        <span class="absolute top-0 end-1 h-4 w-4 bg-yellow-500 rounded-full animate-ping"></span>
                        <span
                            class="absolute top-0 end-1 h-4 w-4 bg-yellow-500 text-xs font-medium text-white rounded-full">2</span>
                    </button>

                    <div
                        class="hs-dropdown-menu mt-2 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[20rem] shadow-md rounded-lg border border-default-200 bg-white dark:bg-default-50">
                        <div class="px-4 py-2 flex items-center justify-between">
                            <h6 class="text-sm font-medium"> Notification</h6>
                            <a href="javascript: void(0);" class="text-default-500">
                                <small>Clear All</small>
                            </a>
                        </div>

                        <div class="p-4 h-80 border-y border-dashed border-default-200" data-simplebar>
                            <h5 class="text-xs text-default-700 mb-2">Today</h5>

                            <a href="javascript:void(0);" class="flex items-center mb-4">
                                <img src="assets/avatar1-25906796.png" class="rounded-full h-10 w-10">
                                <div class="flex-grow truncate ms-2">
                                    <div class="flex items-center justify-between">
                                        <h5 class="text-sm font-medium text-default-800">Datacorp </h5>
                                        <small class="inline-flex text-xs text-default-500">1 min ago</small>
                                    </div>
                                    <small class="text-default-400">Caleb Flakelar commented on Admin</small>
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="flex items-center mb-4">
                                <div class="flex-shrink-0">
                                    <img src="assets/avatar2-189b0d01.png" class="rounded-full h-10 w-10">
                                </div>
                                <div class="flex-grow truncate ms-2">
                                    <div class="flex items-center justify-between">
                                        <h5 class="text-sm font-medium text-default-800">Admin </h5>
                                        <small class="inline-flex text-xs text-default-500">1 hr ago</small>
                                    </div>
                                    <small class="text-default-400">New user registered</small>
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="flex items-center mb-4">
                                <div class="flex-shrink-0">
                                    <img src="assets/avatar3-2bbdc0fd.png" class="rounded-full h-10 w-10">
                                </div>
                                <div class="flex-grow truncate ms-2">
                                    <div class="flex items-center justify-between">
                                        <h5 class="text-sm font-medium text-default-800">Cristina Pride </h5>
                                        <small class="inline-flex text-xs text-default-500">1 day ago</small>
                                    </div>
                                    <small class="text-default-400">Hi, How are you? What about our next meeting</small>
                                </div>
                            </a>

                            <h5 class="text-xs text-default-700 mb-2">Yesterday</h5>

                            <a href="javascript:void(0);" class="flex items-center mb-4">
                                <div class="flex-shrink-0">
                                    <img src="assets/avatar4-85475652.png" class="rounded-full h-10 w-10">
                                </div>
                                <div class="flex-grow truncate ms-2">
                                    <h5 class="text-sm font-semibold mb-1">Datacorp</h5>
                                    <small class="text-default-400">Caleb Flakelar commented on Admin</small>
                                </div>
                            </a>

                            <a href="javascript:void(0);" class="flex">
                                <div class="flex-shrink-0">
                                    <img src="assets/avatar5-504b77fd.png" class="rounded-full h-10 w-10">
                                </div>
                                <div class="flex-grow truncate ms-2">
                                    <h5 class="text-sm font-semibold mb-1">Karen Robinson</h5>
                                    <small class="text-default-400">Wow ! this admin looks good and awesome
                                        design</small>
                                </div>
                            </a>
                        </div>

                        <a href="javascript:void(0);"
                           class="px-4 py-2 block text-center text-primary font-medium text-sm">
                            View All
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div class="flex">
                <div class="hs-dropdown relative inline-flex ">
                    <button id="hs-dropdown-with-header" type="button"
                            class="hs-dropdown-toggle inline-flex flex-shrink-0 justify-center items-center gap-2 rounded-full font-medium text-default-700 align-middle transition-all text-xs">
                        <img class="inline-block h-10 w-10 rounded-full" src="assets/avatar1-25906796.png">
                        <div class="lg:block text-start hidden">
                            <p class="text-sm font-medium text-default-700">Kaiya Botosh</p>
                            <p class="text-xs text-default-500 mt-1">Admin</p>
                        </div>
                    </button>

                    <div
                        class="hs-dropdown-menu mt-2 transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[12rem] shadow-md rounded-lg p-2 border border-default-200 bg-white dark:bg-default-50">
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-default-800 transition-all hover:bg-default-100"
                           href="{{ route("admin.profile") }}">
                            <i class="w-4 h-4" data-lucide="user"></i>
                            {{ __("My Profile") }}
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-default-800 transition-all hover:bg-default-100"
                           href="home.html" target="_blank">
                            <i class="w-4 h-4" data-lucide="newspaper"></i>
                            Landing
                        </a>
                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-default-800 transition-all hover:bg-default-100"
                           href="{{ route("admin.setting") }}">
                            <i class="w-4 h-4" data-lucide="settings"></i>
                            Setting
                        </a>

                        <hr class="my-2 border-default-200 -mx-2">

                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-red-400 hover:bg-red-400/10"
                           href="{{ route("admin.logout") }}">
                            <i class="w-4 h-4" data-lucide="log-out"></i>
                            {{ __("Log out") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->
