<header class="bg-primary shadow">
    <nav class="bg-primary border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('welcome') }}" class="text-white font-bold text-xl">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                    <nav class="hidden sm:flex space-x-8 sm:-my-px sm:ms-10">
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-white hover:text-gray-200">
                            {{ __('Nosotros') }}
                        </x-nav-link>
                        <x-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-white hover:text-gray-200">
                            {{ __('Servicios') }}
                        </x-nav-link>
                        <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-white hover:text-gray-200">
                            {{ __('Contacto') }}
                        </x-nav-link>
                    </nav>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <a href="{{ route('login') }}" class="text-sm font-medium text-white hover:text-gray-200">
                        {{ __('Log In') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ms-4 text-sm font-medium text-white hover:text-gray-200">
                            {{ __('Register') }}
                        </a>
                    @endif
                </div>

                {{-- Menú hamburguesa (móvil) --}}
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-100 focus:outline-none focus:bg-gray-100 focus:text-white transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Menú responsive (móvil) --}}
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-primary">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-white hover:text-gray-200">
                    {{ __('Nosotros') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-white hover:text-gray-200">
                    {{ __('Servicios') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-white hover:text-gray-200">
                    {{ __('Contacto') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-4 pb-4 border-t border-gray-200">
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" class="text-white hover:text-gray-200">
                        {{ __('Log In') }}
                    </x-responsive-nav-link>

                    @if (Route::has('register'))
                        <x-responsive-nav-link :href="route('register')" class="text-white hover:text-gray-200">
                            {{ __('Register') }}
                        </x-responsive-nav-link>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>