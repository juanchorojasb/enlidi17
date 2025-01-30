@props(['title' => 'Dashboard'])
<header class="bg-primary shadow">
    <nav x-data="{ open: false }" class="bg-primary border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white font-bold text-xl">
                        <x-application-logo class="block h-9 w-auto fill-current text-white" />
                    </a>
                    <h2 class="text-white font-bold text-xl ml-2">{{ $title }}</h2>
                    <nav class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:text-gray-200">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.index')" class="text-white hover:text-gray-200">
                            {{ __('Proyectos') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.stages.index')" :active="request()->routeIs('admin.stages.index')" class="text-white hover:text-gray-200">
                            {{ __('Stages') }}
                        </x-nav-link>
                        <x-nav-link :href="route('admin.documents.index')" :active="request()->routeIs('admin.documents.index')" class="text-white hover:text-gray-200">
                            {{ __('Documentos') }}
                        </x-nav-link>
                    </nav>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="text-gray-700">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="text-gray-700">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endauth
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
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="text-white hover:text-gray-200">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.index')" class="text-white hover:text-gray-200">
                    {{ __('Proyectos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.stages.index')" :active="request()->routeIs('admin.stages.index')" class="text-white hover:text-gray-200">
                    {{ __('Stages') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.documents.index')" :active="request()->routeIs('admin.documents.index')" class="text-white hover:text-gray-200">
                    {{ __('Documentos') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-white hover:text-gray-200">
                    {{ __('About') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-white hover:text-gray-200">
                    {{ __('Services') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-white hover:text-gray-200">
                    {{ __('Contact') }}
                </x-responsive-nav-link>
            </div>

            {{-- Opciones de usuario (responsive) --}}
            @auth
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-gray-200">
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-white hover:text-gray-200">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </nav>
</header>