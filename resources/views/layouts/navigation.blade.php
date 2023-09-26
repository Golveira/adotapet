<nav class="border-b-2 border-gray-100 bg-white dark:bg-gray-900">
    <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between p-4">
        <!-- Logo -->
        <a class="flex items-center" href="{{ route('welcome') }}">
            <x-application-logo class="mr-3 h-8" />
        </a>

        <div class="flex items-center md:order-2">
            @auth
                <button
                    class="mr-3 flex rounded-full bg-gray-800 text-sm focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 md:mr-0"
                    id="user-menu-button" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom" type="button"
                    aria-expanded="false">
                    <span class="sr-only">Open user menu</span>
                    <x-avatar class="rounded-full ring-2" :avatar="Auth::user()->avatar" />
                </button>

                <!-- User menu dropdown -->
                <div class="z-10 hidden w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">
                            {{ Auth::user()->name }}
                        </span>

                        <span class="block truncate text-sm text-gray-500 dark:text-gray-400">
                            {{ Auth::user()->email }}
                        </span>
                    </div>

                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="user-menu-button">
                        <li>
                            <x-dropdown-link :href="route('favorites.index')">
                                {{ __('My Favorites') }}
                            </x-dropdown-link>
                        </li>

                        <li>
                            <x-dropdown-link :href="route('profile.show', Auth::user()->username)">
                                {{ __('My Profile') }}
                            </x-dropdown-link>
                        </li>

                        <li>
                            <x-dropdown-link :href="route('settings.index')">
                                {{ __('Settings') }}
                            </x-dropdown-link>
                        </li>
                    </ul>

                    <div class="py-2">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div class="hidden lg:block">
                    <x-button class="me-3" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-button>

                    <x-button href="{{ route('register') }}" color="alternative">
                        {{ __('Register') }}
                    </x-button>
                </div>

                <div class="me-5 md:hidden">
                    <a href="{{ route('login') }}">
                        <x-icons.user />
                    </a>
                </div>
            @endguest

            <button
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                data-collapse-toggle="navbar-user" type="button" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Nav links -->
        <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-user">
            <ul
                class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-gray-50 p-4 font-medium dark:border-gray-700 dark:bg-gray-800 md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-white md:p-0 md:dark:bg-gray-900">
                <li>
                    <x-nav-link :href="route('pets.index')" :active="request()->routeIs('pets.index')">
                        {{ __('Adopt') }}
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('pets.create')" :active="request()->routeIs('pets.create')">
                        {{ __('Foster') }}
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('About us') }}
                    </x-nav-link>
                </li>
            </ul>
        </div>
    </div>
</nav>
