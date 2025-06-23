<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span class="ml-2 text-xl font-bold text-gray-800 dark:text-white">Citra Wedding</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex sm:items-center space-x-1">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-lg">
                    <i class="fas fa-tachometer-alt mr-2"></i> {{ __('Dashboard') }}
                </x-nav-link>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-lg">
                    <i class="fas fa-users mr-2"></i> {{ __('Data User') }}
                </x-nav-link>

                <!-- Master Dropdown -->
                <div class="relative">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button
                                class="flex items-center px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                <i class="fas fa-boxes mr-2"></i> Master
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>
                        <x-slot name="content" class="py-1 bg-white dark:bg-gray-700 rounded-md shadow-lg">
                            <x-dropdown-link :href="route('client.index')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-user-friends mr-2"></i> {{ __('Client') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('wardrobe.index')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-tshirt mr-2"></i> {{ __('Wardrobe') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-images mr-2"></i> {{ __('Album') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-paint-brush mr-2"></i> {{ __('Make Up') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-utensils mr-2"></i> {{ __('Catering') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('tenda.index')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-campground mr-2"></i> {{ __('Tenda') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-music mr-2"></i> {{ __('Hiburan') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-palette mr-2"></i> {{ __('Dekorasi') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-lg">
                    <i class="fas fa-box-open mr-2"></i> {{ __('Paket') }}
                </x-nav-link>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-lg">
                    <i class="fas fa-calendar-check mr-2"></i> {{ __('Booking') }}
                </x-nav-link>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-lg">
                    <i class="fas fa-money-bill-wave mr-2"></i> {{ __('Pembayaran') }}
                </x-nav-link>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="px-3 py-2 rounded-lg">
                    <i class="fas fa-file-alt mr-2"></i> {{ __('Laporan') }}
                </x-nav-link>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center ml-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center px-3 py-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                            <div class="flex items-center">
                                <div
                                    class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold mr-2">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="py-1 bg-white dark:bg-gray-700 rounded-md shadow-lg">
                        <x-dropdown-link :href="route('profile.edit')"
                            class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <i class="fas fa-user-circle mr-2"></i> {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile menu button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden bg-white dark:bg-gray-800 shadow-lg">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-tachometer-alt mr-3"></i> {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-users mr-3"></i> {{ __('Data User') }}
            </x-responsive-nav-link>

            <div class="px-4 py-3 font-medium text-gray-600 dark:text-gray-300 flex items-center">
                <i class="fas fa-boxes mr-3"></i> Master
            </div>
            <div class="pl-8 space-y-1">
                <x-responsive-nav-link :href="route('client.index')" class="flex items-center px-4 py-2">
                    <i class="fas fa-user-friends mr-3"></i> {{ __('Client') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center px-4 py-2">
                    <i class="fas fa-tshirt mr-3"></i> {{ __('Wardrobe') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center px-4 py-2">
                    <i class="fas fa-images mr-3"></i> {{ __('Album') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center px-4 py-2">
                    <i class="fas fa-paint-brush mr-3"></i> {{ __('Make Up') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center px-4 py-2">
                    <i class="fas fa-utensils mr-3"></i> {{ __('Catering') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('tenda.index')" class="flex items-center px-4 py-2">
                    <i class="fas fa-campground mr-3"></i> {{ __('Tenda') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center px-4 py-2">
                    <i class="fas fa-music mr-3"></i> {{ __('Hiburan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('dashboard')" class="flex items-center px-4 py-2">
                    <i class="fas fa-palette mr-3"></i> {{ __('Dekorasi') }}
                </x-responsive-nav-link>
            </div>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-box-open mr-3"></i> {{ __('Paket') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-calendar-check mr-3"></i> {{ __('Booking') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-money-bill-wave mr-3"></i> {{ __('Pembayaran') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center px-4 py-3">
                <i class="fas fa-file-alt mr-3"></i> {{ __('Laporan') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            <div class="px-4">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold mr-3">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}
                        </div>
                        <div class="font-medium text-sm text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center px-4 py-3">
                    <i class="fas fa-user-circle mr-3"></i> {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        class="flex items-center px-4 py-3">
                        <i class="fas fa-sign-out-alt mr-3"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
