<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
        </a>

        <div class="flex items-center md:order-2">
            @auth
                <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/user.png') }}" alt="user photo">
                </button>

                <!-- User menu dropdown -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">
                            {{ Auth::user()->name }}
                        </span>

                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">
                            {{ Auth::user()->email }}
                        </span>
                    </div>

                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <x-dropdown-link :href="route('logout')">
                                {{ __('My Profile') }}
                            </x-dropdown-link>
                        </li>

                        <li>
                            <x-dropdown-link :href="route('logout')">
                                {{ __('Edit Profile') }}
                            </x-dropdown-link>
                        </li>

                        <li>
                            <x-dropdown-link :href="route('logout')">
                                {{ __('Change Password') }}
                            </x-dropdown-link>
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            @guest
                <div class="hidden lg:block">
                    <x-primary-link-button href="{{ route('login') }}" class="me-3">
                        {{ __('Login') }}
                    </x-primary-link-button>

                    <x-secondary-link-button href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-secondary-link-button>
                </div>

                <div class="md:hidden me-5">
                    <a href="{{ route('login') }}">
                        <x-icon-user />
                    </a>
                </div>
            @endguest

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <!-- Nav links -->
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Adopt') }}
                    </x-nav-link>
                </li>

                <li>
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
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
