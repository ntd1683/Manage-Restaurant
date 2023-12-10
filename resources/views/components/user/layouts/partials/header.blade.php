<!-- Main Navigation Menu -->
<header id="navbar" class="sticky top-0 z-20 border-b border-default-200 bg-transparent transition-all">
    <div class="lg:h-20 h-14 flex items-center">
        <div class="container">
            <div class="grid lg:grid-cols-3 grid-cols-2 items-center gap-4">
                <div class="flex">
                    <!-- Navbar Brand Logo -->
                    <a href="{{ route("index") }}" class="pl-4">
                        <img src="{{ getImageFromStorage(option("logo_dark"), "images/logo-dark.png") }}" alt="logo" class="h-10 flex dark:hidden">
                        <img src="{{ getImageFromStorage(option("logo_light"), "images/logo-light.png") }}" alt="logo" class="h-10 hidden dark:flex">
                    </a>
                </div>

                <!-- Nevigation Menu -->
                <ul class="menu lg:flex items-center justify-center hidden relative">
                    <!-- Home Menu -->
                    <li class="menu-item">
                        <a class="inline-flex items-center text-sm lg:text-base font-semibold text-default-800 py-2 px-4 rounded-full hover:text-primary " href="{{ route("index") }}">Home </a>
                    </li>
                    <!-- Food Menu -->
                    <li class="menu-item">
                        <a class="inline-flex items-center text-sm lg:text-base font-semibold text-default-800 py-2 px-4 rounded-full hover:text-primary " href="{{ route("index") }}">Order </a>
                    </li>
                    <!-- Cart Menu -->
                    <li class="menu-item">
                        <a class="inline-flex items-center text-sm lg:text-base font-semibold text-default-800 py-2 px-4 rounded-full hover:text-primary " href="{{ route("cart") }}">Cart </a>
                    </li>
                    <!-- Camera Scan Menu -->
                    <li class="menu-item">
                        <a class="inline-flex items-center text-sm lg:text-base font-semibold text-default-800 py-2 px-4 rounded-full hover:text-primary w-max" href="{{ route("index") }}">Camera Scan</a>
                    </li>
                </ul>

                <ul class="flex items-center justify-end gap-x-6">
                    <!-- Search Form Input -->
                    <li class="2xl:flex relative menu-item hidden">
                        <input class="ps-10 pe-4 py-2.5 block w-64 border-transparent placeholder-primary-500 rounded-full text-sm bg-primary-400/40 text-primary" placeholder="Search for items..." type="search">
                        <span class="absolute start-4 top-3">
                                <i class="w-4 h-4 text-primary-500" data-lucide="search"></i>
                            </span>
                    </li>

                    <!-- Search Button (small screen) -->
                    <li class="2xl:hidden flex menu-item">
                        <button data-hs-overlay="#mobileSearchSidebar" class="relative flex text-base transition-all text-default-600 hover:text-primary">
                            <i class="w-5 h-5" data-lucide="search"></i>
                        </button>
                    </li>

                    <!-- Cart Page link -->
                    <li class="flex menu-item">
                        <a href="cart.html" class="relative flex text-base transition-all text-default-600 hover:text-primary">
                            <i class="w-5 h-5" data-lucide="shopping-bag"></i>
                            <span class="absolute z-10 -top-2.5 end-0 inline-flex items-center justify-center p-1 h-5 w-5 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 bg-red-500 rounded-full">1</span>
                        </a>
                    </li>

                    <!-- User Dropdown -->
                    <li class="flex menu-item">
                        <div class="hs-dropdown relative inline-flex [--trigger:hover] [--placement:bottom]">
                            <a class="hs-dropdown-toggle after:absolute hover:after:-bottom-10 after:inset-0 relative flex items-center text-base transition-all text-default-600 hover:text-primary" href="#">
                                <i class="w-5 h-5" data-lucide="user"></i>
                            </a>

                            <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                <ul class="flex flex-col gap-1">
                                    <li>
                                        <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="admin-dashboard.html" target="_blank"><i class="h-4 w-4" data-lucide="user-check"></i> Admin</a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="{{ route("cart") }}"><i class="h-4 w-4" data-lucide="shopping-cart"></i>
                                            Cart</a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="#"><i class="h-4 w-4" data-lucide="heart"></i>
                                            Order</a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded" href="auth-login.html"><i class="h-4 w-4" data-lucide="log-out"></i> Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Nav (Bottom Navbar) -->
<div class="flex lg:hidden">
    <div class="fixed inset-x-0 bottom-0 h-16 w-full grid grid-cols-4 items-center justify-items-center border-t border-default-200 bg-white dark:bg-default-50 z-40">
        <a href="{{ route("index") }}" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
            <i class="fa-solid fa-house text-lg"></i>
            <span class="text-xs font-medium">Home</span>
        </a>
        <a href="product-grid.html" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
            <i class="fa-solid fa-utensils text-lg"></i>
            <span class="text-xs font-medium">Order</span>
        </a>
        <a href="{{ route("cart") }}" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
            <i class="fa-regular fa-heart text-lg"></i>
            <span class="text-xs font-medium">Cart</span>
        </a>
        <a href="#" class="flex flex-col items-center justify-center gap-1 text-default-600" type="button">
            <i class="fas fa-camera-retro"></i>
            <span class="text-xs font-medium">Camera Scan</span>
        </a>
    </div>
</div>
